<?php

namespace App\Http\Controllers\Job;

use Auth;
use DB;
use Illuminate\Support\Arr;
use Input;
use Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\JobFrontFormRequest;
use App\Helpers\DataArrayHelper;
use App\Traits\JobTrait;
use Carbon\Carbon;
use App\City;
use App\Job;
use App\Company;
use App\JobSkill;
use App\JobSkillManager;
use App\Country;
use App\CountryDetail;
use App\State;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\JobExperience;
use App\DegreeLevel;
use App\SalaryPeriod;
use App\Helpers\MiscHelper;
use App\Http\Requests\JobFormRequest;
use App\Traits\Skills;
use App\Events\JobPosted;
use Illuminate\Support\Str;

class JobPublishController extends Controller
{

    use JobTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company');
    }

    public function createFrontJob() {
        $company = Auth::guard('company')->user();
		if ((bool)$company->is_active === false) {
            flash(__('Your account is inactive contact site admin to activate it'))->error();
            return \Redirect::route('company.home');
            exit;
        }
		if((bool)config('company.is_company_package_active')){
			if(
				($company->package_end_date === null) || 
				($company->package_end_date->lt(Carbon::now())) ||
				($company->jobs_quota <= $company->availed_jobs_quota)
				)
			{
				flash(__('Please subscribe to package first'))->error();
				return \Redirect::route('company.home');
				exit;
			}
		}
		// $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
        $careerLevels = DataArrayHelper::langCareerLevelsArray();
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $jobTypes = DataArrayHelper::langJobTypesArray();
        $jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
        $jobSkills = DataArrayHelper::langJobSkillsArray();
        $degreeLevels = DataArrayHelper::langDegreeLevelsArray();
        $salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
        $cities = City::where('lang', 'vi')->active()->pluck('city', 'id')->toArray();
        $industries = DataArrayHelper::langIndustriesArray();
        $jobSkillIds = array();
        return view(config('app.THEME_PATH_employer').'.job.add_edit_job')
                        // ->with('countries', $countries)
                        ->with('company', $company)
                        ->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
                        ->with('degreeLevels', $degreeLevels)
                        ->with('cities', $cities)
                        ->with('salaryPeriods', $salaryPeriods)
                        ->with('industries', $industries)
                        ->with('edit', false);
    }

    public function storeFrontJob(JobFrontFormRequest $request)
    {

        
        $company = Auth::guard('company')->user();
        $job = new Job();
     
        $job->company_id = $company->id;
        $job = $this->assignJobValues($job, $request);
        $job->status =1;

    

        $job->save();
        /*         * ******************************* */
        $job->slug = Str::slug($job->title, '-') . '-' . $job->id;
        /*         * ******************************* */
        $job->update();
        /*         * ************************************ */
        /*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
        /*         * ************************************ */
        $this->updateFullTextSearch($job);
        /*         * ************************************ */
        /*         * ******************************* */
        $company->availed_jobs_quota = $company->availed_jobs_quota + 1;
        $company->update();
        /*         * ******************************* */
        event(new JobPosted($job));
        flash(__('Job has been added!'))->success();
        return \Redirect::route('edit.front.job', array($job->id));
    }
    
    public function editFrontJob($id)
    {
        $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
        $careerLevels = DataArrayHelper::langCareerLevelsArray();
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $jobTypes = DataArrayHelper::langJobTypesArray();
        $jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
        $jobSkills = DataArrayHelper::langJobSkillsArray();
        $degreeLevels = DataArrayHelper::langDegreeLevelsArray();
        $salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
        $job = Job::findOrFail($id);
        $jobSkillIds = $job->getJobSkillsArray();
        $cities = \App\City::where('lang', \App::getLocale())->active()->pluck('city', 'id')->toArray();
        $selectedSkills = JobSkillManager::where('job_id', '=', $id)->pluck('job_skill_id')->toArray();
        $desiredSkills = [];
        array_walk(
            $selectedSkills,
            function($v) use(&$desiredSkills) {return $desiredSkills[$v] = ['selected' => true];}
        );
        $industries = DataArrayHelper::langIndustriesArray();
        return view(config('app.THEME_PATH_employer').'.job.add_edit_job')
                        ->with('countries', $countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
                        ->with('degreeLevels', $degreeLevels)
                        ->with('salaryPeriods', $salaryPeriods)
                        ->with('cities', $cities)
                        ->with('job', $job)
                        ->with('desiredSkills', $desiredSkills)
                        ->with('industries', $industries)
                        ->with('edit', true);
    }

    public function updateFrontJob($id, request $request)
    {
        $job = Job::findOrFail($id);
		$job = $this->assignJobValues($job, $request);
        /*         * ******************************* */
        $job->slug = Str::slug($job->title, '-') . '-' . $job->id;
        /*         * ******************************* */
        /*         * ************************************ */
        $job->status =1;
        $job->update();
      
        /*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
        /*         * ************************************ */
        $this->updateFullTextSearch($job);
        /*         * ************************************ */
        flash(__('Job has been updated!'))->success();
        return \Redirect::route('edit.front.job', array($job->id));
    }

    private function assignJobValues($job, $request)
    {
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->requirement = $request->input('requirement');
        $job->benefits = $request->input('benefits');
        $job->country_id = $request->input('country_id') ?? Null;
        $job->state_id = $request->input('state_id') ?? Null;
        $job->city_id = $request->input('city_id');
        $job->is_freelance = $request->input('is_freelance') ?? Null;
        $job->career_level_id = $request->input('career_level_id') ?? Null;
        $job->functional_area_id = $request->input('functional_area_id') ?? Null;
        $job->industry_id = $request->input('industry_id') ?? Null;
        $job->status = $request->input('status');
        /**
         * salary
         */
        switch($request->input('salary_type'))
        {
            case Job::SALARY_TYPE_RANGE:
                $job->salary_type = Job::SALARY_TYPE_RANGE;
                $job->salary_from = (int) str_replace(",","",$request->input('salary_from'));
                $job->salary_to = (int) str_replace(",","",$request->input('salary_to'));
                break;
            case Job::SALARY_TYPE_FROM:
                $job->salary_type = Job::SALARY_TYPE_FROM;
                $job->salary_from = (int) str_replace(",","",$request->input('salary_from'));
                $job->salary_to = Null;
                break;
            case Job::SALARY_TYPE_TO:
                $job->salary_type = Job::SALARY_TYPE_TO;
                $job->salary_from = Null;
                $job->salary_to = (int) str_replace(",","",$request->input('salary_to'));
                break;
            default:
                $job->salary_type = Job::SALARY_TYPE_NEGOTIABLE;
                $job->salary_from = Null;
                $job->salary_to = Null;
                break;
        }
        $job->salary_currency = $request->input('salary_currency') ?? (\App::getLocale() =='vi' ? 'VND' : 'USD');
        $job->hide_salary = $request->input('hide_salary') ?? false;
        $job->functional_area_id = $request->input('functional_area_id');
        $job->job_type_id = $request->input('job_type_id');
        $job->job_shift_id = $request->input('job_shift_id') ?? Null;
        $job->num_of_positions = $request->input('num_of_positions') ?? null;
        $job->gender_id = $request->input('gender_id');
        $job->expiry_date = \Carbon\Carbon::parse($request->input('expiry_date'))->format('Y-m-d');
        $job->degree_level_id = $request->input('degree_level_id') ?? Null;
        $job->job_experience_id = $request->input('job_experience_id');
        $job->salary_period_id = $request->input('salary_period_id') ?? null;
        $job->is_same_company_add= $request->input('pow');
        $job->location = $request->input('location') ?? null;

        return $job;
    }
}
