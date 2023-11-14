<?php

namespace App\Http\Controllers;

use App\JobAlert;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Facades\UserVerification as UserVerificationFacade;
use Jrean\UserVerification\Exceptions\UserNotFoundException;
use Jrean\UserVerification\Exceptions\UserIsVerifiedException;
use Jrean\UserVerification\Exceptions\TokenMismatchException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
// use Illuminate\Mail\Mailable; // This is not needed
use App\SiteSetting;

class JobAlertController extends Controller
{


    use VerifiesUsers;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email|max:255|unique:email_job_alerts'],[
            'email.required' => __('Email is required'),
            'email.email' => __('Email is invalid'),
            'email.max' => __('Email is too long'),
            'email.unique' => __('Email already exists'),
        ]);
        if($validator->fails()) {
            return json_encode(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));
        JobAlert::create([
            'email' => $request->input('email'),
            'token' => $token,
            'is_verified' => 0,
            'is_subscribed' => 1
        ]);
        $settings = SiteSetting::all()->toArray();
        $from = $settings->mail_from_address ?? 'info@jobvieclam.com';
        $from_name = $settings->mail_from_name ?? 'Jobvieclam';
        try {
            Mail::send(
                config('app.THEME_PATH').'.emails.email_job_alert',
                ['token' => $token, 'email'=>$request->input('email'),'siteSettings'=>$settings],
                function ($m) use ($request, $settings, $from, $from_name)
                {
                    $m->from($from, $from_name);
                    $m->to($request->input('email'))->subject(__('Job Alert Confirmation'));
                });
            return json_encode(['status' => 'success', 'message' => __('Please check your email to confirm your subscription')]);
        } catch (\Exception $e) {
            return json_encode(['status' => 'error', 'message' => __('Something went wrong. Please try again later.')]);
        }

    }

    public function verify(Request $request, $token)
    {
        $emailAlert = JobAlert::where('token', $token)->first();
        try {
            if (!empty($emailAlert)) {
                if($emailAlert->is_verified == 1) {
                    return redirect()->route('index')->with('message', __('Your email is already verified'));
                }
                $emailAlert->is_verified = 1;
                $emailAlert->save();
                return redirect()->route('index')->with('success', __('Your email has been verified successfully'));
            } else {
                return redirect()->route('index')->with('error', __('Invalid token'));
            }
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', __('Something went wrong. Please try again later.'));
        }
    }



    /**
     * Get the user table name.
     *
     * @return string
     */
    protected function userTable()
    {
        return property_exists($this, 'userTable') ? $this->userTable : 'email_job_alerts';
    }


}
