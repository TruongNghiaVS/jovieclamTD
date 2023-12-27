<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileReferences;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileReferencesFormRequest;
use App\Helpers\DataArrayHelper;

trait ProfileReferencesTrait
{

    public function showProfileReferences(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileReferences)):
            foreach ($user->profileReferences as $activity):
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

    public function showFrontProfileReferences(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<div class="list-references">';
        if (isset($user) && count($user->profileReferences)):
            foreach ($user->profileReferences as $references):
                    $html .= '<div class="item" id="references_'.$references->id.'">
                        <div class="head-sticker">
                            <div class="title">
                                <h4>'.$references->ref_name.'</h4>
                                
                            </div>
                            <div class="meta-info">
                                <ul>
                                    <li> <i class="fas fa-user"></i>'.$references->ref_position.'</li>
                                    <li> <i class="far fa-building"></i>'.$references->ref_company.'</li>
                                    <li> <i class="fas fa-phone-alt"></i>Số điện thoại: '.$references->ref_phone.'</li>
                                    <i class="fa-regular fa-envelope"></i>Email: '.$references->ref_email.'</li>
                                </ul>
                            </div>
                        </div>
                        
                         <div class="right-head">
                         <ul class="list-action">
                         <li class="edit-link"><a href="javascript:void(0)" onclick="showProfileReferencesEditModal('.$references->id.');"><span class="iconmoon icon-edit-icon"></span></a></li>
                         <li class="delete"><a href="javascript:void(0)" onclick="delete_profile_references('.$references->id.')"><span class="iconmoon icon-trash"></span></a></li>
                     </ul>
                        </div>
                    </div>';
            endforeach;
        endif;

        echo $html . '</div>';
    }

    public function getProfileReferencesForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::defaultCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.references.references_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileReferencesForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::langCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('templates.vietstar.user.forms.references.references_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function storeFrontProfileReferences(ProfileReferencesFormRequest $request, $user_id)
    {
        $profileReferences = new profileReferences();
        $profileReferences = $this->assignReferencesValues($profileReferences, $request, $user_id);
        $profileReferences->save();

        $returnHTML = view('templates.vietstar.user.forms.activity.activity_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function assignReferencesValues($profileReferences, $request, $user_id)
    {
        $profileReferences->user_id = $user_id;
        $profileReferences->ref_name = $request->input('name');
        $profileReferences->ref_position = $request->input('position');
        $profileReferences->ref_company = $request->input('company');
        $profileReferences->ref_phone = $request->input('phone');
        $profileReferences->ref_email = $request->input('email');
        return $profileReferences;
    }


    public function getFrontProfileReferencesEditForm(Request $request, $user_id)
    {
        $profile_references_id = $request->input('profile_references_id');

        $profileReferences = ProfileReferences::find($profile_references_id);
        $user = User::find($user_id);

        $returnHTML = view(config('app.THEME_PATH').'.user.forms.references.references_edit_modal')
                ->with('user', $user)
                ->with('profileReferences', $profileReferences)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function updateFrontProfileReferences(ProfileReferencesFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileReferences = ProfileReferences::find($profile_experience_id);
        $profileReferences = $this->assignReferencesValues($profileReferences, $request, $user_id);
        $profileReferences->update();

        $returnHTML = view('templates.vietstar.user.forms.references.references_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function deleteProfileReferences(Request $request)
    {
        $id = $request->input('id');
        try {
            $profileReferences = ProfileReferences::findOrFail($id);
            $profileReferences->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }
}
