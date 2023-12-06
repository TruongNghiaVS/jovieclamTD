<?php

namespace App\Http\Controllers;

use App;
use App\CmsContent;
use App\Seo;
use App\Job;
use App\Company;
use App\FunctionalArea;
use App\Country;
use App\Traits\FetchJobs;
use App\Video;
use App\Testimonial;
use App\SiteSetting;
use App\Slider;
use App\Blog;
use Illuminate\Http\Request;
use Redirect;
use App\Traits\CompanyTrait;
use App\Traits\FunctionalAreaTrait;
use App\Traits\CityTrait;
use App\Traits\JobTrait;
use App\Traits\Active;
use App\Helpers\DataArrayHelper;
use Artisan;
use App\CoverLetter;
use App\Cms;
use App\CodeActive;
use Illuminate\Support\Facades\Http;

class EmployerController extends Controller
{

    use CompanyTrait;
    use FunctionalAreaTrait;
    use CityTrait;
    use JobTrait;
    use Active;
    use FetchJobs;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        $params = $this->params(request());
        $topCompanyIds = $this->getCompanyIdsAndNumJobs(4);
        $topFunctionalAreaIds = $this->getFunctionalAreaIdsAndNumJobs(32);
        $topIndustryIds = $this->getIndustryIdsFromCompanies(32);
        $topCityIds = $this->getCityIdsAndNumJobs(32);
        $cities =$params['cities'];
        $blogs = Blog::orderBy('id', 'desc')->where('lang', 'like', \App::getLocale())->limit(3)->get();
        $video = Video::getVideo();
        $testimonials = Testimonial::langTestimonials();
        $jobTypes = $params['jobTypes'];
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $countries = DataArrayHelper::langCountriesArray();
		$sliders = Slider::langSliders();
        $industries = $params['industries'];
        $funclAreas = $params['funclAreas'];
        $careerLevels = $params['careerLevels'];
        $VIPJobs = $params['VIPJobs']->paginate(9);
        $topHunterJobs = $params['topHunterJobs']->get();//->paginate(9);
        $featuredJobs = $params['featuredJobs']->get();//->paginate(9);
        $latestJobs = $params['latestJobs']->get(); //->paginate(9);
        $allJobs = $params['allJobs']->get();
        $suggestedJobs = $params['suggestedJobs']->get();
        $industries = DataArrayHelper::langIndustriesArray();

        $seo = SEO::where('seo.page_title', 'like', 'front_index_page')->first();
        return view(config('app.THEME_PATH').'.welcomeEm')
                        ->with('topCompanyIds', $topCompanyIds)
                        ->with('topFunctionalAreaIds', $topFunctionalAreaIds)
                        ->with('topCityIds', $topCityIds)
                        ->with('topIndustryIds', $topIndustryIds)
                        ->with('featuredJobs', $featuredJobs)
                        ->with('latestJobs', $latestJobs)
                        ->with('allJobs', $allJobs)
                        ->with('blogs', $blogs)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('careerLevels', $careerLevels)
                        ->with('countries', $countries)
						->with('sliders', $sliders)
                        ->with('video', $video)
                        ->with('testimonials', $testimonials)
                        ->with('cities', $cities)
                        ->with('jobTypes', $jobTypes)
                        ->with('industries', $industries)
                        ->with('funclAreas', $funclAreas)
                        ->with('VIPJobs', $VIPJobs)
                        ->with('topHunterJobs', $topHunterJobs)
                        ->with('suggestedJobs', $suggestedJobs)
                        ->with('industries', $industries)
                        ->with('seo', $seo);
    }

    public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        $return_url = $request->input('return_url');
        $is_rtl = $request->input('is_rtl');
        $localeDir = ((bool) $is_rtl) ? 'rtl' : 'ltr';

        session(['locale' => $locale]);
        session(['localeDir' => $localeDir]);

        return Redirect::to($return_url);
    }
	
	public function checkTime()

    {
        $siteSetting = SiteSetting::findOrFail(1272);
        $t1 = strtotime( date('Y-m-d h:i:s'));
        $t2 = strtotime( $siteSetting->check_time );
        $diff = $t1 - $t2;
        $hours = $diff / ( 60 * 60 );
        if($hours>=1){
            $siteSetting->check_time = date('Y-m-d h:i:s');
            $siteSetting->update();
            Artisan::call('schedule:run');
            echo 'done';
        }else{
            echo 'not done';
        }

    }
    public function Active(Request $request)
    {
        $code = $request->input('code'); 
        if($code =="")
        {
            return view("templates.vietstar.errors.404");
        }   
      
        $itemCodeActive = CodeActive::where("code",$code)->where("status","1")->firstOrFail();
        if($itemCodeActive)
       {
            $companyActive = Company::where("id", $itemCodeActive->userId)->firstOrFail();
            if($companyActive)
            {  
                $companyActive->verified = 1;
                $companyActive->is_active = 1;
                $companyActive->jobs_quota = 30;
                $companyActive->cvs_package_id = 9;
                $companyActive->availed_jobs_quota = 30;
                $companyActive->cvs_package_start_date =\Carbon\Carbon::now() ;
                $companyActive->cvs_package_end_date =\Carbon\Carbon::now()->addMonths(1) ;
                $save = $companyActive->save();
                $itemCodeActive->status ="0";
                $itemCodeActive->updated_at = \Carbon\Carbon::now() ;
                $itemCodeActive->save();
                $response = Http::post('http://localhost:8082/sendMailActiveTD', [
                    'emailTo' => $companyActive->email,
                    'fullName' =>  $companyActive->name
                ]);
                
                return redirect('/login');
            }
            else 
            {

                
                return view("templates.employers.errors.404");
            }
           
        }
        else 
        {
            
            return view("templates.vietstar.errors.404");
        }
        
     
    }

    public function params(Request $request)
    {

       $manager = App::getLocale() == 'en' ? '%manager%' : '%quản%';
       $head = App::getLocale() == 'en' ? '%head%' : '%trưởng%';
       $featuredJobs = Job::active()->featured()->notExpire()->where('status',Job::POST_ACTIVE)->orderBy('refresh_at', 'desc')->orderBy('updated_at','desc')->limit(100);
       $allJobs = Job::active()->notExpire()->where('status',Job::POST_ACTIVE)->orderBy('id', 'desc')->limit(100);
       $latestJobs = Job::active()->notExpire()->where('status',Job::POST_ACTIVE)->orderBy('id', 'desc')->where('created_at','>=', \Carbon\Carbon::now()->subMonths(3))->limit(100);
       $user = \Auth::user();
       if(!is_null($user)){
           $userCareerLevelId = $user->career_level_id;
           $userCityId = $user->city_id;
           $userJobExperienceId = $user->job_experience_id;
           $userIndustryId = $user->industry_id;
       }
       $suggestedJobsQuery = Job::active()->notExpire()->where('status', Job::POST_ACTIVE);
       if(isset($userCareerLevelId)) {
           $suggestedJobsQuery->orWhere('career_level_id', $userCareerLevelId);
       }
       if(isset($userCityId)) {
           $suggestedJobsQuery->orWhere('city_id', $userCityId);
       }
       if(isset($userJobExperienceId)) {
           $suggestedJobsQuery->orWhere('job_experience_id', $userJobExperienceId);
       }
       if(isset($userIndustryId)) {
           $suggestedJobsQuery->orWhere('industry_id', $userIndustryId);
       }
       $suggestedJobsQuery->where('created_at','>=', \Carbon\Carbon::now()->subMonths(3))->limit(100)->orderBy('id', 'desc');
       $VIPJobs = Job::where(function($q) {
           if (App::getLocale() == 'vi') {
               $q->where('salary_currency', 'VND')->where('salary_from', '>=', 25000000);
           } else {
               $q->where('salary_currency', 'USD')->where('salary_from', '>=', 1000);
           }
       })->active()->notExpire()->limit(12)->orderBy('id', 'desc');

       $topHunterJobs = Job::with('functionalArea')->where(function($q) {
           if (App::getLocale() == 'vi') {
               $q->where('salary_currency', 'VND')->where('salary_from', '>=', 25000000);
           } else {
               $q->where('salary_currency', 'USD')->where('salary_from', '>=', 1000);
           }
       })->active()->notExpire()
            ->whereHas('functionalArea', function ($query) use($manager, $head) {
                $query->where('functional_area', 'like', $manager)->orWhere('functional_area', 'like', '%senior%')->orWhere('functional_area', 'like', $head);
            })->orWhere('title', 'like', '%manager%')->orWhere('title', 'like', '%senior%')->orWhere('title', 'like', $head)
           ->limit(12)->orderBy('id', 'desc');

       return [
           'jobTypes' => App\JobType::where('lang', App::getLocale())->active()->pluck('job_type', 'id')->toArray(),
           'cities' => App\City::where('lang', App::getLocale())->active()->pluck('city', 'id')->toArray(),
           'industries' => App\Industry::where('lang', App::getLocale())->active()->pluck('industry', 'industry_id')->toArray(),
           'funclAreas' => App\FunctionalArea::where('lang', App::getLocale())->active()->pluck('functional_area', 'id')->toArray(),
           'careerLevels' => App\CareerLevel::where('lang', App::getLocale())->active()->pluck('career_level', 'id')->toArray(),
           'VIPJobs' => $VIPJobs,
           'topHunterJobs' => $topHunterJobs,
           'featuredJobs' => $featuredJobs,
           'latestJobs' => $latestJobs,
           'allJobs' => $allJobs,
           'suggestedJobs' => $suggestedJobsQuery,
       ];

    }

    public function getData(Request $request)
    {
        $page = $request->get('page');
        $activeTab = $request->get('active_tab');
        $params = $this->params($request);
        if($activeTab == '#vip-jobs'){
            $VIPJobs = $params['VIPJobs']->get();//->paginate($perPage = 9, $columns = ['*'], $pageName = '', $page = $page);
            return view(config('app.THEME_PATH').'.includes.vip_jobs')->with('VIPJobs', $VIPJobs);
        } elseif($activeTab == '#top-hunter-jobs'){
            $topHunterJobs = $params['topHunterJobs']->get();//->paginate($perPage = 9, $columns = ['*'], $pageName = '', $page = $page);
            return view(config('app.THEME_PATH').'.includes.top_hunter_jobs')->with('topHunterJobs', $topHunterJobs);
        } elseif($activeTab == '#feature-jobs'){
            $featuredJobs = $params['featuredJobs']->get();//->paginate($perPage = 9, $columns = ['*'], $pageName = '', $page = $page);
            return view(config('app.THEME_PATH').'.includes.featured_jobs')->with('featuredJobs', $featuredJobs);
        }elseif($activeTab == '#latest-jobs'){
            $latestJobs = $params['latestJobs']->get();//->paginate($perPage = 9, $columns = ['*'], $pageName = '', $page = $page);
            return view(config('app.THEME_PATH').'.includes.latest_jobs')->with('latestJobs', $latestJobs);
        }elseif($activeTab == '#all-jobs'){
            $allJobs = $params['allJobs']->get();
            return view(config('app.THEME_PATH').'.includes.all_jobs')->with('allJobs', $allJobs);
        }

    }

    public function getDataSearch(Request $request)
    {
        $search = $request->get('search');
        $query = Job::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('benefits', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('search', 'like', "%{$search}%");
            });
        }
        $query->active()->notExpire()->orderBy('id', 'desc');
        $dataSearch = $query->take(6)->get();
        return view(config('app.THEME_PATH').'.includes.suggestion_box')->with('dataSearch', $dataSearch);

    }

    public function productsServices()
    {
        return view(config('app.THEME_PATH').'.products_services');
    }

    public function vietnamSalary()
    {
        return view(config('app.THEME_PATH').'.vietnam_salary');
    }
    public function aboutUs()
    {
        $cmsId = App\Cms::where('page_slug', 'about-us')->first()->id;
        $pageContent = CmsContent::where('page_id', $cmsId)->first()->page_content;

        return view(config('app.THEME_PATH').'.about_us')
            ->with('pageContent', $pageContent);
    }
    public function coverLetter()
    {
        $data = [
            'cover_letter' => CoverLetter::where('status', CoverLetter::ACTIVE)->get()
        ];

        return view(config('app.THEME_PATH').'.cover_letter', $data);
    }
    public function handBook()
    {
        return view(config('app.THEME_PATH').'.handbook');
    }

    public function pageCategory($slug) {
        $Cms = Cms::where('page_slug', $slug)->firstOrFail();
        $CmsContent = CmsContent::where('page_id', $Cms->id)->where('lang', 'like', \App::getLocale())->get();
        $data = [
            'Cms' => $Cms,
            'CmsContent' => $CmsContent,
        ];
        return view(config('app.THEME_PATH').'.handbook', $data);
    }

    public function loginPage(Request $request)
    {
        return view('templates.vietstar.auth.login');
    }

    public function resisterPage(Request $request)
    {
        return view('templates.vietstar.auth.register');
    }
}
