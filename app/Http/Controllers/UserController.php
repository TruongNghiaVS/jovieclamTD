<?php

namespace App\Http\Controllers;

use App\Language;
use App\LanguageLevel;
use Auth;
use DB;
use Input;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use ImgUploader;
use Carbon\Carbon;
use Redirect;
use Newsletter;
use App\User;
use App\Subscription;
use App\ApplicantMessage;
use App\Company;
use App\FavouriteCompany;
use App\Gender;
use App\MaritalStatus;
use App\Country;
use App\State;
use App\City;
use App\JobExperience;
use App\JobApply;
use App\CareerLevel;
use App\Industry;
use App\Alert;
use App\FunctionalArea;
use App\ProfileTemplate;
use App\Http\Requests;
use App\ProfileCv;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Traits\CommonUserFunctions;
use App\Traits\ProfileSummaryTrait;
use App\Traits\ProfileCvsTrait;
use App\Traits\ProfileProjectsTrait;
use App\Traits\ProfileActivityTrait;
use App\Traits\ProfileReferencesTrait;
use App\Traits\ProfileExperienceTrait;
use App\Traits\ProfileEducationTrait;
use App\Traits\ProfileSkillTrait;
use App\Traits\ProfileLanguageTrait;
use App\Traits\Skills;
use App\Http\Requests\Front\UserFrontFormRequest;
use App\Helpers\DataArrayHelper;

class UserController extends Controller
{

    use CommonUserFunctions;
    use ProfileSummaryTrait;
    use ProfileCvsTrait;
    use ProfileProjectsTrait;
    use ProfileActivityTrait;
    use ProfileReferencesTrait;
    use ProfileExperienceTrait;
    use ProfileEducationTrait;
    use ProfileSkillTrait;
    use ProfileLanguageTrait;
    use Skills;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['myProfile', 'updateMyProfile', 'viewPublicProfile']]);
        $this->middleware('auth', ['except' => ['showApplicantProfileEducation', 'showApplicantProfileProjects', 'showApplicantProfileExperience', 'showApplicantProfileSkills', 'showApplicantProfileLanguages']]);
    }

    public function viewPublicProfile($id)
    {

        $user = User::findOrFail($id);
        $profileCv = $user->getDefaultCv();

        return view(config('app.THEME_PATH').'.user.applicant_profile')
                        ->with('user', $user)
                        ->with('profileCv', $profileCv)
                        ->with('page_title', $user->getName())
                        ->with('form_title', 'Contact ' . $user->getName());
    }

    public function myProfile()
    {
        $genders = DataArrayHelper::langGendersArray();
        $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
        $nationalities = DataArrayHelper::langNationalitiesArray();
        $countries = DataArrayHelper::langCountriesArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
        $careerLevels = DataArrayHelper::langCareerLevelsArray();
        $industries = DataArrayHelper::langIndustriesArray();
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();

        $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
        $user = User::findOrFail(Auth::user()->id);
        $cv_template = ProfileTemplate::firstOrCreate([
            'user_id' => $user->id,
        ],[
            //setup new template
            'user_id' => $user->id,
            'name_template' => 1,
            'font_size' => 12,
            'lang' => 'vi',
        ]);
        return view(config('app.THEME_PATH').'.user.edit_profile')
                        ->with('genders', $genders)
                        ->with('maritalStatuses', $maritalStatuses)
                        ->with('nationalities', $nationalities)
                        ->with('countries', $countries)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('careerLevels', $careerLevels)
                        ->with('industries', $industries)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('user', $user)
                        ->with('cv_template', $cv_template)
                        ->with('upload_max_filesize', $upload_max_filesize);
    }
    
    public function changeTemplate()
    {
        $user = Auth::user();
        $cv_template = ProfileTemplate::firstOrCreate([
            'user_id' => $user->id, 
        ],[
            //setup new template
            'user_id' => $user->id,
            'name_template' => 1,
            'font_size' => 12,
            'lang' => 'vi',
        ]);

        $data = [
            'user' => $user,
            'cv_template' => $cv_template
        ];

        return view(config('app.THEME_PATH').'.user.changetemplate', $data);
    }

    public function refreshTemplate(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);
        $cv_template = ProfileTemplate::firstOrCreate([
            'user_id' => $userId,
        ],[
            'user_id' => $userId,
            'name_template' => 1,
            'font_size' => 12,
            'lang' => 'vi',
        ]);
        return view(config('app.THEME_PATH').'.user.templates.template_' .
            "$cv_template->name_template", compact('user'));

    }

    public function applyJob()
    {
       $data = [
            'user' => null,
        ];

        return view(config('app.THEME_PATH').'.user.applyjob', $data);
    }

    public function showTemplate(Request $request) {
        try {
            $user = Auth::user();
            $data = [
                'user' => $user
            ];

            switch ($request->template_id) {
                case '5':
                    $returnHTML = view(config('app.THEME_PATH').'.user.templates.template_5', $data)->render();
                    break;
                
                case '8':
                    $returnHTML = view(config('app.THEME_PATH').'.user.templates.template_8', $data)->render();
                    break;
                        
                default:
                    $returnHTML = view(config('app.THEME_PATH').'.user.templates.template_1', $data)->render();
                    break;
            }

            return response()->json(array('success' => true, 'html' => $returnHTML));
        } catch (\Throwable $th) {
            return response()->json('Error server');
        }
    }

    public function updateTemplate(Request $request) {
        try {
            $user = Auth::user();
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file_ext = $file->getClientOriginalExtension();
                $file_name = $file->getClientOriginalName();
                $file_path = $file->getRealPath();
                $file_hash = md5_file($file_path);
                $file_hash_name = $file_hash . '.' . $file_ext;
                $file->move('cvs/', $file_hash_name);

                $profileCv = ProfileCv::updateOrCreate([
                    'user_id' => $user->id
                ],[
                    'title' => $user->first_name,
                    'cv_file' => $file_hash_name,
                    'is_default' => 1
                ]);
            }

            $cv_template = ProfileTemplate::updateOrCreate([
                'user_id' => $user->id, 
            ],[
                'user_id' => $user->id,
                'name_template' => !is_null($request->cv_template) ? $request->cv_template : 1,
                'font_size' => !is_null($request->cv_font_size) ? $request->cv_font_size : 12,
                'lang' => !is_null($request->cv_lang) ? $request->cv_lang : 'vi',
            ]);
            $txt = __('You have updated your template successfully');
            return response()->json([
                'success' => true,
                'html' => '<div class="alert alert-success" role="alert">' . $txt .'</div>'
            ]);
            
        } catch (\Throwable $th) {

            $txtErr = __('You have failed to update your template');
            // flash(__('You have failed to update your template'.$th))->error();
            return response()->json([
                'success' => true,
                'html' => '<div class="alert alert-alert" role="alert">' . $txtErr . '</div>'
            ]);
        }
    }

    public function updateMyProfile(UserFrontFormRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        /*         * **************************************** */
        if ($request->hasFile('image')) {
            $is_deleted = $this->deleteUserImage($user->id);
            $image = $request->file('image');
            $fileName = ImgUploader::UploadImage('user_images', $image, $request->input('name'), 300, 300, false);
            $user->image = $fileName;
        }
		
		if ($request->hasFile('cover_image')) {
			$is_deleted = $this->deleteUserCoverImage($user->id);
            $cover_image = $request->file('cover_image');
            $fileName_cover_image = ImgUploader::UploadImage('user_images', $cover_image, $request->input('name'), 1140, 250, false);
            $user->cover_image = $fileName_cover_image;
        }
			
        /*         * ************************************** */
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        /*         * *********************** */
        $user->name = $user->getName();
        /*         * *********************** */
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->father_name = $request->input('father_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->national_id_card_number = $request->input('national_id_card_number');
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_num = $request->input('mobile_num');
        $user->job_experience_id = $request->input('job_experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = str_replace(",","",$request->input('current_salary'));
        $user->expected_salary = str_replace(",","",$request->input('expected_salary'));
        $user->salary_currency = $request->input('salary_currency');
        $user->video_link = $request->video_link;
        $user->street_address = $request->input('street_address');
		$user->is_subscribed = $request->input('is_subscribed', 0);
		
        $user->update();

        $this->updateUserFullTextSearch($user);
		/*************************/
		Subscription::where('email', 'like', $user->email)->delete();
		if((bool)$user->is_subscribed)
		{			
			$subscription = new Subscription();
			$subscription->email = $user->email;
			$subscription->name = $user->name;
			$subscription->save();
			
			/*************************/
			Newsletter::subscribeOrUpdate($subscription->email, ['FNAME'=>$subscription->name]);
			/*************************/
		}
		else
		{
			/*************************/
			Newsletter::unsubscribe($user->email);
			/*************************/
		}
		
        flash(__('You have updated your profile successfully'))->success();
        return \Redirect::route('my.profile');
    }

    public function addToFavouriteCompany(Request $request, $company_slug)
    {
        $data['company_slug'] = $company_slug;
        $data['user_id'] = Auth::user()->id;
        $data_save = FavouriteCompany::create($data);
        flash(__('Company has been added in favorites list'))->success();
        
        return redirect()->back();
        // return \Redirect::route('company.detail', $company_slug);
    }

    public function removeFromFavouriteCompany(Request $request, $company_slug)
    {
        $user_id = Auth::user()->id;
        FavouriteCompany::where('company_slug', 'like', $company_slug)->where('user_id', $user_id)->delete();

        flash(__('Company has been removed from favorites list'))->success();

        return redirect()->back();
        // return \Redirect::route('company.detail', $company_slug);
    }

    public function myFollowings()
    {
        $user = User::findOrFail(Auth::user()->id);
        $companiesSlugArray = $user->getFollowingCompaniesSlugArray();
        $companies = Company::whereIn('slug', $companiesSlugArray)->get();

        return view(config('app.THEME_PATH').'.user.following_companies')
                        ->with('user', $user)
                        ->with('companies', $companies);
    }

    public function myMessages()
    {
        $user = User::findOrFail(Auth::user()->id);
        $messages = ApplicantMessage::where('user_id', '=', $user->id)
                ->orderBy('is_read', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();

        return view(config('app.THEME_PATH').'.user.applicant_messages')
                        ->with('user', $user)
                        ->with('messages', $messages);
    }

    public function applicantMessageDetail($message_id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $message = ApplicantMessage::findOrFail($message_id);
        $message->update(['is_read' => 1]);

        return view(config('app.THEME_PATH').'.user.applicant_message_detail')
                        ->with('user', $user)
                        ->with('message', $message);
    }

    public function myAlerts()
    {
        $alerts = Alert::where('email', Auth::user()->email)
            ->orderBy('created_at', 'desc')
            ->get();
        //dd($alerts);
        return view(config('app.THEME_PATH').'.user.applicant_alerts')
            ->with('alerts', $alerts);
    }
    public function delete_alert($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();
        $arr = array('msg' => 'A Alert has been successfully deleted. ', 'status' => true);
        return Response()->json($arr);
    }

    public function candidateLanguageLevels($language_id) {


        try {
            $language = Language::findOrFail($language_id);
            $iso_code = $language->iso_code;
            $lang_levels = LanguageLevel::where('lang', $iso_code)->pluck('language_level', 'language_level_id')->toArray();
            $dd = \Form::select('language_level_id', [''=>__('Select Language Level')] + $lang_levels, null, array('class'=>'form-control', 'id'=>'language_level_id'));
            echo $dd;

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
            ]);
        }
    }

}
