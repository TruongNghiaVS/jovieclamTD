<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Company;
use App\ResetPassword;
use App\Events\CompanyResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class ForgotPasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset emails and
      | includes a trait which assists in sending these notifications from
      | your application to your users. Feel free to explore this trait.
      |
     */

use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view(config('app.THEME_PATH').'.company_auth.passwords.email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('companies');
    }

    public function RequestResetPassword(Request $request)
    {
        $email = $request->input("email");
        $company = new Company();
        $company->email = $email;
        $codegenerate =  Str::random(30);
        // $email = $data->email;
        $companyItem = Company::where('email', $email)->first();
        $error = array();
        if($companyItem)
        {
            
        }
        else 
        {
            $itemError = new stdClass();
            $itemError->key ="email";
            $itemError->textError = "Không tồn tại email trong hệ thống";
            array_push($error, $itemError);
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 400);
         
        }
        $codeActive = new ResetPassword();
        $codeActive->code = $codegenerate;
        $codeActive->userId = $companyItem->id;
        $codeActive->type = "1";
        $codeActive->status = "1";
        $codeActive->save();

        $response = Http::post('http://localhost:8082/pushMailResetPassword', [
            'emailTo' => $companyItem->email,
            'isMember'=>0,
            'fullName'=> $companyItem->name,
            'code' =>  $codeActive->code
        ]);


       
        return response()->json([
                'sucess'=>true,
                "error"=> $error,
                'message' => 'Yêu cầu thành công']
                , 200);
       

    }

}
