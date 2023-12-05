<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Company;
use App\Events\CompanyResetPasswordMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    

    use SendsPasswordResetEmails;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function RequestResetPassword(Request $request)
    {
        $email = $request->input("email");
        $company = new Company();
        $company->email = $email;
        event(new CompanyResetPasswordMail($company));

        $error = array();
        return response()->json([
                'sucess'=>true,
                "error"=> $error,
                'message' => 'Yêu cầu thành công']
                , 200);
       

    }

    public function ResetPassword(Request $request)
    {
        return view('auth.passwords.memberResetPassword');
    }

}
