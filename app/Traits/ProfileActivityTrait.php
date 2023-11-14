<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileActivity;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileActivityFormRequest;
use App\Helpers\DataArrayHelper;

trait ProfileActivityTrait
{

    public function showProfileActivity(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileActivity)):
            foreach ($user->profileActivity as $activity):
                if ($activity->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $activity->date_end->format('d M, Y');

                $html .= '<!--activity Start-->
                <div class="form-card mb-3" id="activity_' . $activity->id . '">
                <h6 class="fs-14px main-color my-0">' . $activity->title . '</h6>
                <p class="fs-14px mb-2">'.$activity->company.'</p>
                <p class="mb-2">'.$activity->date_start->format('d M, Y') . ' - ' . $date_end . ' | ' . $activity->getCity('city') .'</p>
                <p class="fs-14px mb-2">'.$activity->description.'</p>
                <br />
                <a href="javascript:void(0);" onclick="showProfileActivityEditModal(' . $activity->id . ',' . $activity->state_id . ',' . $activity->city_id . ');" class="btn btn-warning">' . __('Edit') . '</a>
				<a href="javascript:void(0);" onclick="delete_profile_activity(' . $activity->id . ');" class="btn btn-danger">' . __('Delete') . '</a>
                </p>
            </div>
            <!--activity End-->';
            endforeach;
        endif;

        echo $html;
    }

    public function showFrontProfileActivity(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="list-sticker">';
        if (isset($user) && count($user->profileActivity)):
            foreach ($user->profileActivity as $activity):
                    $date_end = ($activity->date_end) ? $activity->date_end->format('d M, Y') : 'Currently working';
                    $html .= '
                    <li class="item" id="activity_'.$activity->id.'">
                        <div class="head-sticker">
                            <div class="title">
                                <h4>'.$activity->company.'</h4>
                                <div class="sub-title">
                                    <p>'.$activity->role.'</p>
                                </div>
                                <div class="date">
                                    <p>'.Carbon::parse($activity->date_start)->format('d M, Y').' - '.$date_end.'</p>
                                </div>
                            </div>
                            <div class="right-head">
                                <ul class="list-action">
                                    <li class="edit-link"><a href="javascript:void(0)" onclick="showProfileActivityEditModal('.$activity->id.');"><span class="iconmoon icon-edit-icon"></span></a></li>
                                    <li class="delete"><a href="javascript:void(0)" onclick="delete_profile_activity('.$activity->id.')"><span class="iconmoon icon-trash"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>';
            endforeach;
        endif;

        echo $html . '</ul>';
    }

    public function showApplicantProfileActivity(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="experienceList">';
        if (isset($user) && count($user->profileActivity)):
            foreach ($user->profileActivity as $experience):
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

        echo $html . '</ul>';
    }

    public function getProfileActivityForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::defaultCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.activity.activity_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileActivityForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::langCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('templates.vietstar.user.forms.activity.activity_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function storeProfileActivity(ProfileExperienceFormRequest $request, $user_id)
    {

        $profileExperience = new ProfileExperience();
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->save();

        $returnHTML = view('admin.user.forms.activity.activity_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function storeFrontProfileActivity(ProfileActivityFormRequest $request, $user_id)
    {
        $profileActivity = new ProfileActivity();
        $profileActivity = $this->assignActivityValues($profileActivity, $request, $user_id);
        $profileActivity->save();

        $returnHTML = view('templates.vietstar.user.forms.activity.activity_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function assignActivityValues($profileActivity, $request, $user_id)
    {
        $profileActivity->user_id = $user_id;
        $profileActivity->company = $request->input('company');
        $profileActivity->role = $request->input('role');
        $profileActivity->date_start = $request->input('date_start');
        $profileActivity->date_end = ($request->is_currently_working == 1) ? null : $request->input('date_end');
        $profileActivity->description = $request->input('description');
        return $profileActivity;
    }

    public function getProfileActivityEditForm(Request $request, $user_id)
    {
        $profile_experience_id = $request->input('profile_experience_id');

        $countries = DataArrayHelper::defaultCountriesArray();

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $user = User::find($user_id);

        $returnHTML = view('admin.user.forms.activity.experience_edit_modal')
                ->with('user', $user)
                ->with('profileExperience', $profileExperience)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileActivityEditForm(Request $request, $user_id)
    {
        $profile_activity_id = $request->input('profile_activity_id');

        $profileActivity = ProfileActivity::find($profile_activity_id);
        $user = User::find($user_id);

        $returnHTML = view(config('app.THEME_PATH').'.user.forms.activity.activity_edit_modal')
                ->with('user', $user)
                ->with('profileActivity', $profileActivity)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function updateProfileActivity(ProfileExperienceFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->update();

        $returnHTML = view('admin.user.forms.activity.experience_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function updateFrontProfileActivity(ProfileActivityFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileActivity = ProfileActivity::find($profile_experience_id);
        $profileActivity = $this->assignActivityValues($profileActivity, $request, $user_id);
        $profileActivity->update();

        $returnHTML = view('templates.vietstar.user.forms.activity.activity_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function deleteProfileActivity(Request $request)
    {
        $id = $request->input('id');
        try {
            $profileActivity = ProfileActivity::findOrFail($id);
            $profileActivity->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }
}
