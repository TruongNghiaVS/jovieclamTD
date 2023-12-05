<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests;
use App\ResetPassword;
use App\Company;
class ResetPasswordController extends Controller
{
  

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function ResetPasswordMember()
    {
        return view('auth.passwords.memberResetPassword');
    }

    public function ResetPassword(Request $request)
    {
        $code = $request->input("code");

        if($code == "")
        {
            return view("templates.employers.errors.404");
        }
        
        $resetPassword = ResetPassword::where("code",$code)->where("type","1")
                                      ->orderby("created_at","desc")
                                      ->first();
        if($resetPassword)
        { 
            $companyId = Company::where("id", $resetPassword->userId)->frist();
            
            return view('auth.passwords.memberResetPassword', compact("resetPassword"));
        }

        
        // $itemError = new stdClass();
        // $itemError->key ="code";
        // $itemError->textError = "Không tồn tại email trong hệ thống";
        // array_push($error, $itemError);
        // return response()->json([
        //     'sucess'=>false,
        //     'error'=> $error ], 400);
        return view('auth.passwords.memberResetPassword');
    }

}
