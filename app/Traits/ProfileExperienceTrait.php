<?php
namespace App\Traits;
use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileExperience;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileExperienceFormRequest;
use App\Helpers\DataArrayHelper;

trait ProfileExperienceTrait
{

    public function showProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileExperience)):
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $experience->date_end->format('d M, Y');

                $html .= '<!--experience Start-->
                <div class="form-card mb-3" id="experience_' . $experience->id . '">
                <h6 class="fs-14px main-color my-0">' . $experience->title . '</h6>
                <p class="fs-14px mb-2">'.$experience->company.'</p>
                <p class="mb-2">'.$experience->date_start->format('d M, Y') . ' - ' . $date_end . ' | ' . $experience->getCity('city') .'</p>
                <p class="fs-14px mb-2">'.$experience->description.'</p>
                <br />
                <a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');" class="btn btn-warning">' . __('Edit') . '</a>
				<a href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');" class="btn btn-danger">' . __('Delete') . '</a>
                </p>
            </div>
            <!--experience End-->';
            endforeach;
        endif;

        echo $html;
    }

    public function showFrontProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<div class="panel-group">';
        if (isset($user) && count($user->profileExperience)):
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $experience->date_end->format('d M, Y');
                    $html .= '<!--experience Start-->
                    <div class="jobster-timeline-item" id="experience_' . $experience->id . '">
                        <div class="act-dropdown dropdown">
                            <button type="button" class="btn btn-dropdown dropdown-toggle" id="dropdownMenuExperience_' . $experience->id . '" data-toggle="dropdown" aria-expanded="false">
                                <span class="iconmoon icon-recruiter-dots"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuExperience_' . $experience->id . '">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');">' . __('Edit') . '</a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');">' . __('Delete') . '</a>
                            </div>
                        </div>
                        <div class="jobster-timeline-cricle">
                                <i class="far fa-circle"></i>
                        </div>
                        <div class="jobster-timeline-info">
                                <div class="dashboard-timeline-info">
                                        <span class="jobster-timeline-time">'.$experience->date_start->format('d M, Y') . ' - ' . $date_end . '</span>
                                        <h6 class="mb-2">' . $experience->title . '</h6>
                                        <span>'.$experience->company.'</span>
                                        <p class="mt-2">'.$experience->description.'</p>
                                </div>
                        </div>
                </div>
                <!--experience End-->';

                //     $html .= '<!--experience Start-->
                //     <div class="form-card form-card-experience mb-3" id="experience_' . $experience->id . '">
                    // <div class="act-dropdown dropdown">
                    //     <button type="button" class="btn btn-dropdown dropdown-toggle" id="dropdownMenuExperience_' . $experience->id . '" data-toggle="dropdown" aria-expanded="false">
                    //         <span class="iconmoon icon-recruiter-dots"></span>
                    //     </button>
                    //     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuExperience_' . $experience->id . '">
                    //         <a class="dropdown-item" href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');">' . __('Edit') . '</a>
                    //         <a class="dropdown-item" href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');">' . __('Delete') . '</a>
                    //     </div>
                    // </div>
                //     <h3 class="experience-title">' . $experience->title . '</h3>
                //     <p class="experience-company">'.$experience->company.'</p>
                //     <p class="experience-meta">'.$experience->date_start->format('d M, Y') . ' - ' . $date_end . '</p>
                //     <div class="experience-description">'.$experience->description.'</div>
                 
                // </div>
                // <!--experience End-->';



            endforeach;
        endif;

        echo $html . '</div>';
    }

    public function showApplicantProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="experienceList">';
        if (isset($user) && count($user->profileExperience)):
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $experience->date_end->format('d M, Y');

                    $html .= '<!--experience Start-->
                    <div class="form-card mb-3" id="experience_' . $experience->id . '">
                    <h6 class="fs-14px main-color my-0">' . $experience->title . '</h6>
                    <p class="fs-14px mb-2">'.$experience->company.'</p>
                    <p class="mb-2">'.$experience->date_start->format('d M, Y') . ' - ' . $date_end . ' | ' . $experience->getCity('city') .'</p>
                    <p class="fs-14px mb-2">'.$experience->description.'</p>
                    <br />
                    </p>
                </div>
                <!--experience End-->';
            endforeach;
        endif;

        echo $html . '</ul>';
        #<a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');" class="btn btn-warning">' . __('Edit') . '</a>
        #<a href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');" class="btn btn-danger">' . __('Delete') . '</a>

    }

    public function getProfileExperienceForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::defaultCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.experience.experience_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileExperienceForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::langCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('templates.vietstar.user.forms.experience.experience_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function storeProfileExperience(ProfileExperienceFormRequest $request, $user_id)
    {

        $profileExperience = new ProfileExperience();
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->save();

        $returnHTML = view('admin.user.forms.experience.experience_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function storeFrontProfileExperience(ProfileExperienceFormRequest $request, $user_id)
    {

        $profileExperience = new ProfileExperience();
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->save();

        $returnHTML = view('templates.vietstar.user.forms.experience.experience_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function assignExperienceValues($profileExperience, $request, $user_id)
    {
        $profileExperience->user_id = $user_id;
        $profileExperience->title = $request->input('title');
        $profileExperience->company = $request->input('company');
        $profileExperience->country_id = $request->input('country_id');
        $profileExperience->state_id = $request->input('state_id');
        $profileExperience->city_id = $request->input('city_id');
        $profileExperience->date_start = $request->input('date_start');
        $profileExperience->date_end = $request->input('date_end');
        $profileExperience->is_currently_working = $request->input('is_currently_working');
        $profileExperience->description = $request->input('description');
        return $profileExperience;
    }

    public function getProfileExperienceEditForm(Request $request, $user_id)
    {
        $profile_experience_id = $request->input('profile_experience_id');

        $countries = DataArrayHelper::defaultCountriesArray();

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $user = User::find($user_id);

        $returnHTML = view('admin.user.forms.experience.experience_edit_modal')
                ->with('user', $user)
                ->with('profileExperience', $profileExperience)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileExperienceEditForm(Request $request, $user_id)
    {
        $profile_experience_id = $request->input('profile_experience_id');
        $countries = DataArrayHelper::langCountriesArray();

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $user = User::find($user_id);

        $returnHTML = view(config('app.THEME_PATH').'.user.forms.experience.experience_edit_modal')
                ->with('user', $user)
                ->with('profileExperience', $profileExperience)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function updateProfileExperience(ProfileExperienceFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->update();

        $returnHTML = view('admin.user.forms.experience.experience_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function updateFrontProfileExperience(ProfileExperienceFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->update();

        $returnHTML = view('templates.vietstar.user.forms.experience.experience_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function deleteProfileExperience(Request $request)
    {
        $id = $request->input('id');
        try {
            $profileExperience = ProfileExperience::findOrFail($id);
            $profileExperience->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

}