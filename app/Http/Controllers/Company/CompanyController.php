<?php

namespace App\Http\Controllers\Company;

use App\Interview;
use Mail;
use Hash;
use File;
use ImgUploader;
use Auth;
use Validator;
use DB;
use Input;
use Redirect;
use App\Subscription;
use Newsletter;
use App\User;
use App\Company;
use App\CompanyMessage;
use App\ApplicantMessage;
use App\Country;
use App\CountryDetail;
use App\JobApplyRejected;
use App\State;
use App\City;
use App\Unlocked_users;
use App\Industry;
use App\FavouriteCompany;
use App\Package;
use App\FavouriteApplicant;
use App\OwnershipType;
use App\JobApply;
use App\Models\NoteForJob;

use App\Job;
use Carbon\Carbon;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use App\Mail\CompanyContactMail;
use App\Mail\ApplicantContactMail;
use App\Mail\JobSeekerRejectedMailable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Front\CompanyFrontFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\CompanyTrait;
use App\Traits\Cron;
use Illuminate\Support\Str;
use App\Http\Requests\CompanyFormRequest;


class CompanyController extends Controller
{

    use CompanyTrait;
    use Cron;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm', 'TopCompanies']]);
        $this->runCheckPackageValidity();
    }

    public function index()
    {
        $companyActive =  Auth::guard('company')->user();
        $package1 = $companyActive->getPackage();
    
        if($package1 == null)
        {
            return redirect()->to('employer/login');
        }      
     
        $packages1 = Package::where('package_for', 'employer')
        ->whereNotIn('id', [$package1->id])
        ->get();


        
    
        $jobs = Job::where("company_id",$companyActive->id);
   
        
        $coutJobComplete =    $jobs->clone()->where("status",1)->count();
        $coutJobWatiting =     $jobs->clone()->where("status",2)->count();
        $coutJobPause =     $jobs->clone()->where("status",3)->count();
        $coutJobExprise =    $jobs->clone()->where("status",4)->count();
      
        $dashboarOverview = new \stdClass();
        $dashboarOverview->TotalJobPublish =  $coutJobComplete;
        $dashboarOverview->TotalJobWatiting =  $coutJobWatiting;
        $dashboarOverview->TotalJobPause =  $coutJobPause;
        $dashboarOverview->TotalJobExprise =  $coutJobExprise;
        $dashboarOverview->TotalPublished =  $coutJobComplete;
        $countFavourite =  FavouriteCompany::where('company_slug', 'like', $companyActive->slug)->count();  
        $jobs = Job::where("company_id",$companyActive->id)
                    ->orderBy('jobs.created_at', 'desc')
                    ->pluck('jobs.id')
                    ->toArray();
                
        $candidateOverView = JobApply::with('user', 'job')->whereIn('job_apply.job_id', $jobs)->count();;
         
        $dashboarOverview->candidateCount =  $candidateOverView;
        $dashboarOverview->countFavourite =  $countFavourite;
        
        $package1 = $companyActive->getPackage();
 
              
     
        $packages1 = Package::where('package_for', 'employer')
        ->whereNotIn('id', [$package1->id])
        ->get();


      
    return view(config('app.THEME_PATH').'.company_home')
    ->with('dashboarOverview', $dashboarOverview)
            ->with('package', $package1)
            ->with('packages', $packages1);
    }


    public  function applicationManager(Request $request)
    {
        $jobs = Auth::guard('company')->user()->jobs()->orderBy('jobs.created_at', 'desc')->pluck('jobs.id')->toArray();
        $userApply = JobApply::with('user', 'job')->whereIn('job_apply.job_id', $jobs);
        $from_to = $request->from;
        $from_to2 = $request->to;
        if($request->name) {
            $userApply = $userApply->whereHas('user', function($query) use ($request) {
                $query->where('users.name', 'like', '%'.$request->name.'%')->orWhere('users.email', 'like', '%'.$request->name.'%');
            });
        }

        if($request->status) {
            $userApply = $userApply->where('job_apply.status', $request->status);
        }

        if($request->log_seen) {
            $seen = $request->log_seen == 'seen' ? 1 : 0;
            $userApply = $userApply->where('job_apply.seen', $seen);
        }

       if(isset($from_to) )
        {
            
            $from_to = Carbon::parse($from_to);
            $userApply = $userApply->where('created_at','>=', $from_to);
            
        }
        if(isset($from_to2) )
        {
            $from_to2 = Carbon::parse($from_to2);
            $form_to2 = $from_to2->endOfDay();
            
            $userApply = $userApply->where('created_at','<=', $from_to2);
        }

        $userApply = $userApply->orderByDesc('id')->paginate(6);


        $data = [
            'userApply' => $userApply,
            'request' => $request->all(),
            'log_seen' => $request->log_seen ? $request->log_seen : null,
        ];
        
        return view(config('app.THEME_PATH').'.application_manager', $data);
    }


    public  function configMail(Request $request)
    {

        
        return view(config('app.THEME_PATH').'.config_mail');
    }

    public  function applicationManagerbk(Request $request)
    {
        $jobs = Auth::guard('company')->user()->jobs()->orderBy('jobs.created_at', 'desc')->pluck('jobs.id')->toArray();
        $userApply = JobApply::with('user', 'job')->whereIn('job_apply.job_id', $jobs);

    
    
        $from_to = $request->from;
        $from_to2 = $request->to;
        
        if($request->name) {
            $userApply = $userApply->whereHas('user', function($query) use ($request) {
                $query->where('users.name', 'like', '%'.$request->name.'%')->orWhere('users.email', 'like', '%'.$request->name.'%');
            });
        }

        if($request->status) {
            $userApply = $userApply->where('job_apply.status', $request->status);
        }

        if($request->log_seen) {
            $seen = $request->log_seen == 'seen' ? 1 : 0;
            $userApply = $userApply->where('job_apply.seen', $seen);
        }

      if(isset($from_to) )
        {
            
            $from_to = Carbon::parse($from_to);
            $userApply = $userApply->where('created_at','>=', $from_to);
            
        }
        if(isset($from_to2) )
        {
            $from_to2 = Carbon::parse($from_to2);
            $form_to2 = $from_to2->endOfDay();
            
            $userApply = $userApply->where('created_at','<=', $from_to2);
        }

        $userApply = $userApply->orderByDesc('id')->paginate(6);

        $data = [
            'userApply' => $userApply,
            'request' => $request->all(),
            'log_seen' => $request->log_seen ? $request->log_seen : null,
        ];
        
        return view(config('app.THEME_PATH').'.application_manager', $data);
    }

    public function detailApplication(Request $request) {
       if($request->id_apply_job) {
            $jobApply = JobApply::findOrFail($request->id_apply_job);
             $noteForJobs =  NoteForJob::where("jobId",$jobApply->job_id )->orderBy("id", "desc")->get();

            if($request->modal_note == 1) {
                $html = '
                    <input type="hidden" name="job_application" value="'.$jobApply->id.'" id="id_job">
                    <textarea id="review-application-note" name="note" rows="5" placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                    class="form-control p-3">'.$jobApply->note.'</textarea>';
            }else {
                $html = '<div>
                        <div class="d-inline-block mb-3"><span role="button" data-value="1"
                                class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status ';($jobApply->status == 1) ? $html.='active' : $html.=''; $html.='">
                                CV tiếp nhận
                            </span></div>
                        <div class="d-inline-block mb-3"><span role="button" data-value="2"
                                class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status ';($jobApply->status == 2) ? $html.='active' : $html.=''; $html.='">
                                Phù hợp
                            </span></div>
                        <div class="d-inline-block mb-3"><span role="button" data-value="3"
                                class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status ';($jobApply->status == 3) ? $html.='active' : $html.=''; $html.='">
                                Hẹn phỏng vấn
                            </span></div>
                     
                        <div class="d-inline-block mb-3"><span role="button" data-value="5"
                                class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status ';($jobApply->status == 5) ? $html.='active' : $html.=''; $html.='">
                                Nhận việc
                            </span></div>
                        <div class="d-inline-block mb-3"><span role="button" data-value="6"
                                class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status ';($jobApply->status == 6) ? $html.='active' : $html.=''; $html.='">
                                Từ chối
                            </span></div>
                    </div>
                    <input type="hidden" name="status" id="review-application-status">
                    <input type="hidden" name="job_application" value="'.$jobApply->id.'" id="id_job">
                    <textarea id="review-application-note" name="note" rows="5" placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                    class="form-control p-3 mb-2">'.$jobApply->note.'</textarea>
                    <input class="form-check-input" type="checkbox" name="withmail" id="withmail" value="">
                    <label class="form-check-label" for="withmail">Gửi Kèm Email</label>
             
                    
                    ';
            }
            

            return response()->json([
                'success' => true,
                'html' => $html,
            ]); 
       }
    }

    public function getNoteData(Request $request) {
        if($request->id_apply_job) {

             $jobApply = JobApply::findOrFail($request->id_apply_job);
              $noteForJobs =  NoteForJob::where("jobId",$jobApply->job_id )->
                              orderBy("id", "desc")->get();
              $innerHtml ='';

              if($noteForJobs)
              {
                $index = 1;
                foreach ($noteForJobs as $itemNote) {

                    $statustext= "CV tiếp nhận";
                    $statusText ="";
                    if($itemNote->statusNew =="1")
                    {
                        $statustext= "CV tiếp nhận";
                    }
                    else if($itemNote->statusNew =="2")
                    {
                        $statustext= "Phù hợp";
                    }
                    else if($itemNote->statusNew =="3")
                    {
                        $statustext= "Hẹn phỏng vấn";
                    }
                    else if($itemNote->statusNew =="4")
                    {
                        $statustext= "Gửi đề nghị";
                    }
                    else if($itemNote->statusNew =="5")
                    {
                        $statustext= "Nhận việc";
                    }
                    else if($itemNote->statusNew =="6")
                    {
                        $statustext= "Từ chối";
                    }
                    $innerHtml = $innerHtml.'    <li class="timeline-inverted">
                    <div class="timeline-badge">'.$index.'</div>
                    <div class="timeline-panel">
                        <div class="d-flex justify-content-around">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">'.$statustext.'</h4>
                            <p>'.$itemNote->Noted.'</p>
                            <p><i class="glyphicon glyphicon-time"></i>'.$itemNote->created_at->format('Y-m-d H:i:s').'</p>
                        </div>
                     
                        </div>
                    </div>
                    </li>';
                    $index++;
                 }
              }
             
              return response()->json([
                 'success' => true,
                 'html' => $innerHtml,
             ]); 
        }
     }
    public function updateApplication(Request $request)
     {
         if($request->job_application) {
            
            $jobApply = JobApply::findOrFail($request->job_application);
            $jobInfo = Job::where("id",$jobApply->job_id)->first();
            $itemInsert = new NoteForJob();
            $itemInsert->title =$jobInfo->title;
            $itemInsert->jobId =$jobApply->job_id;
            $itemInsert->statusOld =$jobApply->status;
            $itemInsert->statusNew =$request->status;
            $itemInsert->Noted =$request->note;
            $itemInsert->save();
            $jobApply->update([
                'status' => !is_null($request->status) ? $request->status : $jobApply->status,
                'note' => $request->note,
            ]);

            flash(__('Candidate profile has been updated'))->success();
            return redirect()->back();
        }else {
            flash(__('Candidate profile is not updated'))->error();
            return redirect()->back();
        }
    }

    public function viewPublicProfileCandidate($user_id, $job_id) {
        $user = User::findOrFail($user_id);
        JobApply::where([['user_id', $user->id], ['job_id', $job_id]])->update(['seen' => 1]);
        $profileCv = $user->getDefaultCv();

        return view(config('app.THEME_PATH').'.includes.candidate_profile_modal')                //.user.applicant_profile')
                        ->with('user', $user)
                        ->with('profileCv', $profileCv)
                        ->with('page_title', $user->getName())
                        ->with('form_title', 'Contact ' . $user->getName());
    }
    
    /**
     * @param Reque $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function company_listing(Request $request)
      {
        $params = $request->all();
        $query = Company::query();
        if(!empty($params['search'])) {
            $query->where('name', 'like', '%'.$params['search'].'%');
            $query->where('email', 'like', '%'.$params['search'].'%');
            $query->where('ceo', 'like', '%'.$params['search'].'%');
            $query->where('description', 'like', '%'.$params['search'].'%');
            $query->where('location', 'like', '%'.$params['search'].'%');
            $query->where('website', 'like', '%'.$params['search'].'%');
        }
        if(!empty($params['city_id'])) {
            $query->where('city_id', $params['city_id']);
        }
        if(!empty($params['industry_id'])) {
            $query->where('industry_id', $params['industry_id']);
        }
        $data['industries'] = Industry::all()->pluck('name', 'id');
        $data['cities'] = City::all()->pluck('name', 'id');
        $data['companies'] = $query->orderBy('id', 'desc')->paginate(10);
        
        return view(config('app.THEME_PATH').'.company.listing')
            ->with('data', $data);
      }

    public function companyProfile()
    {
        $countries = DataArrayHelper::defaultCountriesArray();
        $industries = DataArrayHelper::defaultIndustriesArray();
        $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        $city = City::where('lang',"vi")->get();

        $nationNal = Country::where('lang',"vi")->get();
       
        $cityId = $company->city_id;
   
        $cityCompany = new \stdClass();

        $cityCompany->city_id ="-1";
        $cityCompany->city ="";


        if($cityId>0)
        {
            $cityCompany  = City::where("city_id",$company->city_id)->first();
        }

       
       

        return view(config('app.THEME_PATH').'.company.edit_profile')
                        ->with('company', $company)
                        ->with('cityCompany',$cityCompany)
                        ->with('city', $city)
                        ->with('nationNal', $nationNal)
                        ->with('countries', $countries)
                        ->with('industries', $industries)
                        ->with('ownershipTypes', $ownershipTypes);
    }

    public function updateCompanyProfile(CompanyFormRequest $request)
    {



        $company = Company::findOrFail(Auth::guard('company')->user()->id);

        /*         * **************************************** */
        if ($request->hasFile('logo')) {
            $is_deleted = $this->deleteCompanyLogo($company->id);
            $image = $request->file('logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('logo'), 300, 300, false);
            $company->logo = $fileName;
        }
        /*         * ************************************** */

        /*         * **************************************** */
        if ($request->hasFile('cover_logo')) {
            $image = $request->file('cover_logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('cover_logo'), 300, 300, false);
            $company->cover_logo = $fileName;
        }
        /*         * ************************************** */

        $company->name = $request->input('name');
        // $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->ceo = $request->input('ceo');
        $company->industry_id = $request->input('industry_id');
        $company->ownership_type_id = $request->input('ownership_type_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $company->no_of_offices = $request->input('no_of_offices');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->no_of_employees = $request->input('no_of_employees');
        $company->established_in = $request->input('established_in');
        $company->fax = $request->input('fax');
        $company->phone = $request->input('phone');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->google_plus = $request->input('google_plus');
        $company->pinterest = $request->input('pinterest');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
		$company->is_subscribed = isset($request->is_subscribed) ? 1 : null;
		
        $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
        $company->update();
		/*************************/
		Subscription::where('email', 'like', $company->email)->delete();
		if((bool)$company->is_subscribed)
		{			
			$subscription = new Subscription();
			$subscription->email = $company->email;
			$subscription->name = $company->name;
			$subscription->save();
			/*************************/
			Newsletter::subscribeOrUpdate($subscription->email, ['FNAME'=>$subscription->name]);
			/*************************/
		}
		else
		{
			/*************************/
			Newsletter::unsubscribe($company->email);
			/*************************/
		}

        
        flash(__('Company has been updated'))->success();
        return \Redirect::route('company.profile');
    }
    public function updateAvatar(Request $request)
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);

        /*         * **************************************** */
        if ($request->hasFile('logo')) {
            $is_deleted = $this->deleteCompanyLogo($company->id);
            $image = $request->file('logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('logo'), 300, 300, false);
            $company->logo = $fileName;
        }
        /*         * ************************************** */

        /*         * **************************************** */
        if ($request->hasFile('cover_logo')) {
            $image = $request->file('cover_logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('cover_logo'), 1600, 800, false);
            $company->cover_logo = $fileName;
        }
        $company->update();
        
        flash(__('Company Logo has been updated'))->success();
        return true;
    
    }
    public function updateCompanyProfile2(Request $request)
    {

        $company = Company::findOrFail(Auth::guard('company')->user()->id);
      

        /*         * **************************************** */
        if ($request->hasFile('logo')) {
            $is_deleted = $this->deleteCompanyLogo($company->id);
            $image = $request->file('logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('logo'), 300, 300, false);
            $company->logo = $fileName;
        }
        /*         * ************************************** */

        /*         * **************************************** */
        if ($request->hasFile('cover_logo')) {
            $image = $request->file('cover_logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('cover_logo'), 300, 300, false);
            $company->cover_logo = $fileName;
        }
        /*         * ************************************** */

        $company->name = $request->input('name');
        $company->ceo = $request->input('ceo');
        
        $company->industry_id = $request->input('industry_id');
        $company->ownership_type_id = $request->input('ownership_type_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $company->no_of_offices = $request->input('no_of_offices');
       
        $company->no_of_employees = $request->input('no_of_employees');
      
   
        $company->established_in = $request->input('established_in');
   

       
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');

        // $company->fax = $request->input('fax');
        // $company->phone = $request->input('phone');
        // $company->facebook = $request->input('facebook');
        // $company->twitter = $request->input('twitter');
        // $company->linkedin = $request->input('linkedin');
        // $company->google_plus = $request->input('google_plus');
        // $company->pinterest = $request->input('pinterest');
    //    $website = $request->input('website');
    //     $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
		// $company->is_subscribed = isset($request->is_subscribed) ? 1 : null;
		
        // $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
        $company->update();
		/*************************/
		// Subscription::where('email', 'like', $company->email)->delete();
		// if((bool)$company->is_subscribed)
		// {			
		// 	$subscription = new Subscription();
		// 	$subscription->email = $company->email;
		// 	$subscription->name = $company->name;
		// 	$subscription->save();
		// 	/*************************/
		// 	Newsletter::subscribeOrUpdate($subscription->email, ['FNAME'=>$subscription->name]);
		// 	/*************************/
		// }
		// else
		// {
		// 	/*************************/
		// 	Newsletter::unsubscribe($company->email);
		// 	/*************************/
		// }

        
        flash(__('Company info has been updated'))->success();
        return  $company->update();
    }

    public function updateInfoContact(Request $request)
    {

        $company = Company::findOrFail(Auth::guard('company')->user()->id);
      
       
        $company->fax = $request->input('fax');
        $company->phone = $request->input('phone');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->google_plus = $request->input('google_plus');
        // $company->pinterest = $request->input('pinterest');
        $company->website= $request->input('website');
        // $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        // $company->is_subscribed = isset($request->is_subscribed) ? 1 : null;
        // $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
        $company->update();
		/*************************/
		// Subscription::where('email', 'like', $company->email)->delete();
		// if((bool)$company->is_subscribed)
		// {			
		// 	$subscription = new Subscription();
		// 	$subscription->email = $company->email;
		// 	$subscription->name = $company->name;
		// 	$subscription->save();
		// 	/*************************/
		// 	Newsletter::subscribeOrUpdate($subscription->email, ['FNAME'=>$subscription->name]);
		// 	/*************************/
		// }
		// else
		// {
		// 	/*************************/
		// 	Newsletter::unsubscribe($company->email);
		// 	/*************************/
		// }

        
        flash(__('Contact information has been updated!'))->success();
        return  $company->update();
    }

    public function updatePassword(Request $request)
    {

        $company = Company::findOrFail(Auth::guard('company')->user()->id);
      
       
        if (!empty($request->input('password'))) {

            $company->password = Hash::make($request->input('password'));
        }
        
        $company->save();
		
        return response()->json([
            'sucess'=>true,
           
            'message' => 'Đổi mật khẩu thành công'], 200);
    }






    public function addToFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {
        $data['user_id'] = $user_id;
        $data['job_id'] = $job_id;
        $data['company_id'] = $company_id;

        $data_save = FavouriteApplicant::create($data);
        flash(__('Job seeker has been added in favorites list'))->success();
        return redirect()->route('list.result-posted-job', $job_id);//->with('success', __('Applicant hired successfully.'));
    }

    public function removeFromFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {
        $data['user_id'] = $user_id;
        $data['job_id'] = $job_id;
        $data['company_id'] = $company_id;
        $fev = FavouriteApplicant::where('user_id', $user_id)
            ->where('job_id', '=', $job_id)
            ->where('company_id', '=', $company_id)
            ->first();
        $fev->status = Interview::STATUS_COMPANY_REJECTED_INTERVIEW;
        $fev->update();

        flash(__('Applicant rejected successfully.'))->success();
        return redirect()->route('list.result-posted-job', $job_id);
    } 


    public function hireFromFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {
        $data['user_id'] = $user_id;
        $data['job_id'] = $job_id;
        $data['company_id'] = $company_id;
        $fev = FavouriteApplicant::where('user_id', $user_id)
                ->where('job_id', '=', $job_id)
                ->where('company_id', '=', $company_id)
                ->first();
        $fev->status = Interview::STATUS_HIRED;
        $fev->update();

        flash(__('Applicant hired successfully.'))->success();
        return redirect()->route('list.result-posted-job', $job_id);
    }

    public function removehireFromFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {
        $data['user_id'] = $user_id;
        $data['job_id'] = $job_id;
        $data['company_id'] = $company_id;
        $fev = FavouriteApplicant::where('user_id', $user_id)
                ->where('job_id', '=', $job_id)
                ->where('company_id', '=', $company_id)
                ->first();
        $fev->status = null;
        $fev->update();        

        flash(__('Job seeker has been removed from hired list'))->success();
        return \Redirect::route('applicant.profile', $application_id);
    }

    public function companyDetail(Request $request, $company_slug)
    {
        $company = Company::where('slug', 'like', $company_slug)->firstOrFail();
        /*         * ************************************************** */
        $seo = $this->getCompanySEO($company);
        /*         * ************************************************** */
        return view(config('app.THEME_PATH').'.company.detail')
                        ->with('company', $company)
                        ->with('seo', $seo);
    }

    public function sendContactForm(Request $request)
    {
        $msgresponse = Array();
        $rules = array(
            'from_name' => 'required|max:100|between:4,70',
            'from_email' => 'required|email|max:100',
            'subject' => 'required|max:200',
            'message' => 'required',
            'to_id' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        );
        $rules_messages = array(
            'from_name.required' => __('Name is required'),
            'from_email.required' => __('E-mail address is required'),
            'from_email.email' => __('Valid e-mail address is required'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
            'to_id.required' => __('Recieving Company details missing'),
            'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
            'g-recaptcha-response.captcha' => __('Captcha error! try again'),
        );
        $validation = Validator::make($request->all(), $rules, $rules_messages);
        if ($validation->fails()) {
            $msgresponse = $validation->messages()->toJson();
            echo $msgresponse;
            exit;
        } else {
            $receiver_company = Company::findOrFail($request->input('to_id'));
            $data['company_id'] = $request->input('company_id');
            $data['company_name'] = $request->input('company_name');
            $data['from_id'] = $request->input('from_id');
            $data['to_id'] = $request->input('to_id');
            $data['from_name'] = $request->input('from_name');
            $data['from_email'] = $request->input('from_email');
            $data['from_phone'] = $request->input('from_phone');
            $data['subject'] = $request->input('subject');
            $data['message_txt'] = $request->input('message');
            $data['to_email'] = $receiver_company->email;
            $data['to_name'] = $receiver_company->name;
            $msg_save = CompanyMessage::create($data);
            $when = Carbon::now()->addMinutes(5);
            Mail::send(new CompanyContactMail($data));
            $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
            echo json_encode($msgresponse);
            exit;
        }
    }

    public function sendApplicantContactForm(Request $request)
    {
        $msgresponse = Array();
        $rules = array(
            'from_name' => 'required|max:100|between:4,70',
            'from_email' => 'required|email|max:100',
            'subject' => 'required|max:200',
            'message' => 'required',
            'to_id' => 'required',
        );
        $rules_messages = array(
            'from_name.required' => __('Name is required'),
            'from_email.required' => __('E-mail address is required'),
            'from_email.email' => __('Valid e-mail address is required'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
            'to_id.required' => __('Recieving applicant details missing'),
            'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
            'g-recaptcha-response.captcha' => __('Captcha error! try again'),
        );
        $validation = Validator::make($request->all(), $rules, $rules_messages);
        if ($validation->fails()) {
            $msgresponse = $validation->messages()->toJson();
            echo $msgresponse;
            exit;
        } else {
            $receiver_user = User::findOrFail($request->input('to_id'));
            $data['user_id'] = $request->input('user_id');
            $data['user_name'] = $request->input('user_name');
            $data['from_id'] = $request->input('from_id');
            $data['to_id'] = $request->input('to_id');
            $data['from_name'] = $request->input('from_name');
            $data['from_email'] = $request->input('from_email');
            $data['from_phone'] = $request->input('from_phone');
            $data['subject'] = $request->input('subject');
            $data['message_txt'] = $request->input('message');
            $data['to_email'] = $receiver_user->email;
            $data['to_name'] = $receiver_user->getName();
            $msg_save = ApplicantMessage::create($data);
            $when = Carbon::now()->addMinutes(5);
            Mail::send(new ApplicantContactMail($data));
            $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
            echo json_encode($msgresponse);
            exit;
        }
    }

    public function postedJobs(Request $request)
    {
        
        $company = Auth::guard('company')->user();
        $jobs = Job::where('company_id', $company->id);
        $find_day = $request->find_day;
        $from_to = $request->from;
        $from_to2 = $request->to;

        if($request->title) {
            $jobs = $jobs->where('title', 'like', '%'.$request->title.'%');
        }
    
        if($request->status) {

            if($request->status =="1")
            {  
                 $statusQuerry = ["1", "4"];
                 $jobs = $jobs->whereIn('status', $statusQuerry);

            }
            else
            {
                $jobs = $jobs->where('status', $request->status);
            }
            
        }
        if($request->city_id) {
            $jobs = $jobs->where('city_id', $request->city_id);
        }
        if( $find_day ==0 )
        {  
            if(isset($from_to) )
            {
              
                $from_to = Carbon::parse($from_to);
                $jobs = $jobs->where('created_at','>=', $from_to);
                
            }
            if(isset($from_to2) )
            {
                $from_to2 = Carbon::parse($from_to2);
                $form_to2 = $from_to2->endOfDay();
              
                $jobs = $jobs->where('created_at','<=', $from_to2);
            }
       }
     
       if( $find_day ==1 )
       {  
           if(isset($from_to) )
           {  $from_to = Carbon::parse($from_to);
               $jobs = $jobs->where('expiry_date','>=', $from_to);
              
           }
           if(isset($from_to2) )
           { 
               $from_to2 = Carbon::parse($from_to2);
              
               $form_to2 = $from_to2->endOfDay();
              
               $jobs = $jobs->where('expiry_date','<=', $form_to2);
           }
        }
 
      
        if(isset($request->expired) && $request->expired == 'true') {
            $jobs = $jobs->whereDate('expiry_date', '<', Carbon::now()->format('Y-m-d'));
        }
        if($request->status == Job::POST_ACTIVE) {
            $jobs = $jobs->whereDate('expiry_date', '>', Carbon::now()->format('Y-m-d'));
        }

        $jobs = $jobs->orderBy('jobs.created_at', 'desc')->paginate(6);
     
        $data = [
            'jobs' => $jobs,
            'request' => $request->all(),
            'cities' => City::where('lang', 'vi')->active()->pluck('city', 'id')->toArray()
        ];
      
        
        return view(config('app.THEME_PATH').'.job.company_posted_jobs', $data);
    }

    public function listAppliedUsers(Request $request, $job_id)
    {
        return JobApply::where('job_id', '=', $job_id)->get();

        #return view(config('app.THEME_PATH').'.job.job_applications')
                        #->with('job_applications', $job_applications);
    }

    public function listHiredUsers(Request $request, $job_id)
    {
        $company_id = Auth::guard('company')->user()->id;
        $user_ids = FavouriteApplicant::where('job_id', '=', $job_id)->where('company_id', '=', $company_id)->where('status',Interview::STATUS_HIRED)->pluck('user_id')->toArray();
        return JobApply::where('job_id', '=', $job_id)->whereIn('user_id', $user_ids)->get();

        #return view(config('app.THEME_PATH').'.job.hired_applications')
                        #->with('job_applications', $job_applications);
    }

    public function listRejectedUsers(Request $request, $job_id)
    {
        $company_id = Auth::guard('company')->user()->id;
        $user_ids = FavouriteApplicant::where('job_id', '=', $job_id)->where('company_id', '=', $company_id)->where('status',Interview::STATUS_COMPANY_REJECTED_INTERVIEW)->pluck('user_id')->toArray();
        return JobApply::where('job_id', '=', $job_id)->whereIn('user_id', $user_ids)->get();
        //return JobApplyRejected::where('job_id', '=', $job_id)->get();
    }

    public function listFavouriteAppliedUsers(Request $request, $job_id)
    {
        $company_id = Auth::guard('company')->user()->id;
        $user_ids = FavouriteApplicant::where('job_id', '=', $job_id)->where('company_id', '=', $company_id)->where('status',null)->pluck('user_id')->toArray();
        #dd($company_id, $user_ids);
        return JobApply::where('job_id', '=', $job_id)->whereIn('user_id', $user_ids)->get();
        #return view(config('app.THEME_PATH').'.job.job_favorite_applications')
                        #->with('job_applications', $job_applications);
    }

    public function listInterviewUsers(Request $request, $job_id)
    {
        $company_id = Auth::guard('company')->user()->id;
        $user_ids = Interview::where('job_id', '=', $job_id)->where('company_id', '=', $company_id)->pluck('user_id')->toArray();
        return JobApply::where('job_id', '=', $job_id)->whereIn('user_id', $user_ids)->get();
        #return view(config('app.THEME_PATH').'.job.job_interview_applications')
           # ->with('job_applications', $job_applications);
    }

    public function companyPostedResults(Request $request, $job_id, $tabname='')
    {
        $company_id = Auth::guard('company')->user()->id;
        $job_applications = $this->listAppliedUsers($request, $job_id);
        $job_applications_fav = $this->listFavouriteAppliedUsers($request, $job_id);
        $job_applications_interview = $this->listInterviewUsers($request, $job_id);
        $job_applications_hired = $this->listHiredUsers($request, $job_id);
        $job_applications_rejected = $this->listRejectedUsers($request, $job_id);
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();

        return view(config('app.THEME_PATH').'.job.result_posted_jobs')
                        ->with('job_applications', $job_applications)
                        ->with('job_applications_fav', $job_applications_fav)
                        ->with('job_applications_interview', $job_applications_interview)
                        ->with('job_applications_hired', $job_applications_hired)
                        ->with('job_applications_rejected', $job_applications_rejected)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('tabName', $tabname);

    }

    public function applicantProfile($application_id)
    {

        $job_application = JobApply::findOrFail($application_id);
        $user = $job_application->getUser();
        $job = $job_application->getJob();
        $company = $job->getCompany();
        $profileCv = $job_application->getProfileCv();

        /*         * ********************************************** */
        $num_profile_views = $user->num_profile_views + 1;
        $user->num_profile_views = $num_profile_views;
        $user->update();
        $is_applicant = 'yes';
        /*         * ********************************************** */
        return view(config('app.THEME_PATH').'.user.applicant_profile')
                        ->with('job_application', $job_application)
                        ->with('user', $user)
                        ->with('job', $job)
                        ->with('company', $company)
                        ->with('profileCv', $profileCv)
                        ->with('page_title', 'Applicant Profile')
                        ->with('form_title', 'Contact Applicant')
                        ->with('is_applicant', $is_applicant);
    }
    public function rejectApplicantProfile($application_id)
    {

        $job_application = JobApply::findOrFail($application_id);

        $rej = new JobApplyRejected();
        $rej->apply_id = $job_application->id;
        $rej->user_id = $job_application->user_id;
        $rej->job_id = $job_application->job_id;
        $rej->cv_id = $job_application->cv_id;
        $rej->current_salary = $job_application->current_salary;
        $rej->expected_salary = $job_application->expected_salary;
        $rej->salary_currency = $job_application->salary_currency;
        $rej->save();

        $job = $rej->getJob();

        $job_application->delete();
        Mail::send(new JobSeekerRejectedMailable($job,$rej));


        flash(__('Job seeker has been rejected successfully'))->success();
        return \Redirect::route('rejected-users',$job->id);
    }

    public function userProfile($id)
    {

        $user = User::findOrFail($id);
        $profileCv = $user->getDefaultCv();

        /*         * ********************************************** */
        $num_profile_views = $user->num_profile_views + 1;
        $user->num_profile_views = $num_profile_views;
        $user->update();
        /*         * ********************************************** */
        return view(config('app.THEME_PATH').'.user.applicant_profilev2')
                        ->with('user', $user)
                        ->with('profileCv', $profileCv)
                        ->with('page_title', 'Job Seeker Profile')
                        ->with('form_title', 'Contact Job Seeker');
    }

    public function companyFollowers()
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        $userIdsArray = $company->getFollowerIdsArray();
        $users = User::whereIn('id', $userIdsArray)->get();

        return view(config('app.THEME_PATH').'.company.follower_users')
                        ->with('users', $users)
                        ->with('company', $company);
    }

    public function companyMessages()
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        $messages = CompanyMessage::where('company_id', '=', $company->id)
                ->orderBy('is_read', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();

        return view(config('app.THEME_PATH').'.company.company_messages')
                        ->with('company', $company)
                        ->with('messages', $messages);
    }

    public function companyMessageDetail($message_id)
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        $message = CompanyMessage::findOrFail($message_id);
        $message->update(['is_read' => 1]);

        return view(config('app.THEME_PATH').'.company.company_message_detail')
                        ->with('company', $company)
                        ->with('message', $message);
    }

    
    public function resumeSearchPackages()

    {
        $data['packages'] = Package::where('package_for', 'cv_search')->get();
        if (Auth::guard('company')->user()->cvs_package_id > 0) {
            $data['success_package'] = Package::where('id', Auth::guard('company')->user()->cvs_package_id)->first();
        } else {
            $data['success_package'] = '';
        }

        return view(config('app.THEME_PATH').'.company_resume_search_packages')->with($data);
    }
    public function unlocked_users()

    {
        $data = array();
        $unlocked_users = Unlocked_users::where('company_id', Auth::guard('company')->user()->id)->first();
        if (null !== ($unlocked_users)) {
            $data['users'] = User::whereIn('id', explode(',', $unlocked_users->unlocked_users_ids))->get();
        }
        //dd($data['users']);

        return view(config('app.THEME_PATH').'.company.unlocked_users')->with($data);
    }

    public function unlock($user_id)
    {
        $cvsSearch = Auth::guard('company')->user();
        if (null !== ($cvsSearch)) {
            if ($cvsSearch->availed_cvs_ids != '') {

                $newString = $this->addtoString($cvsSearch->availed_cvs_ids, $user_id);
            } else {
                $newString = $user_id;
            }

            $cvsSearch->availed_cvs_ids  = $newString;
            $cvsSearch->availed_cvs_quota += 1;
            $cvsSearch->update();

            $unlock = Unlocked_users::where('company_id', Auth::guard('company')->user()->id)->first();
            if (null !== ($unlock)) {
                $unlock->unlocked_users_ids  = $newString;
                $unlock->update();
            } else {
                $unlock = new Unlocked_users();

                $unlock->company_id  = Auth::guard('company')->user()->id;
                $unlock->unlocked_users_ids  = $newString;
                $unlock->save();
            }
            return redirect()->back();
        } else {
            return redirect('/don-hang');
        }
    }
    function addtoString($str, $item)
    {
        $parts = explode(',', $str);
        $parts[] = $item;

        return implode(',', $parts);
    }


    public function refreshFrontJob($job_id)
    {
        $job = Job::find($job_id);
        \Log::info('refreshFrontJob',['job_id' => $job_id, 'job' => $job]);
        if($job->is_featured==1 && $job->status == Job::POST_ACTIVE) {
            $job->updated_at = Carbon::now();
            $job->refrest_at = Carbon::now();
            $job->save;
            return response()->json(array('success' => true));
        }
        return response()->json(array('success' => false));

    }

    public function TopCompanies() {
        {
            $query = Company::query();
            
            $data['industries'] = Industry::all()->pluck('name', 'id');
            $data['cities'] = City::all()->pluck('name', 'id');
            $data['companies'] = Company::where('package_id', '!=', 0)->orderBy('id', 'desc')->paginate(10);
            
            return view(config('app.THEME_PATH').'.company.listing', $data);
          }
    }

}
