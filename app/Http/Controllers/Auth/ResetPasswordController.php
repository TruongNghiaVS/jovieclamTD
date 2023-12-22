<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests;
use App\ResetPassword;
use \stdClass;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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

    public function ResetPasswordMember(Request $request)
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
            $companyId = Company::where("id", $resetPassword->userId)->first();
             return view('auth.passwords.memberResetPassword', compact("resetPassword"));
        }

       
    }


    public function ChangePassword(Request $request)
    {
        
        $code = $request->input("code");
        $password = $request->input("password");

        $error = array();
        if($code == "")
        {
                $itemError = new stdClass();
                $itemError->key ="code";
                $itemError->textError = "Đang nhập thiếu mã";
                array_push($error, $itemError);
                return response()->json([
                'sucess'=>false,
                'error'=> $error ], 400);
        }
        if($password == "")
        {
                $itemError = new stdClass();
                $itemError->key ="password";
                $itemError->textError = "Chưa nhập mật khẩu";
                array_push($error, $itemError);
                return response()->json([
                'sucess'=>false,
                'error'=> $error ], 400);
        }

         $resetPassword = ResetPassword::where("code",$code)->where("type","1")
                                      ->where("status","1")
                                      ->orderby("created_at","desc")
                                      ->first();
        if($resetPassword)
        {  
                $companyNeedChange = Company::where("id", $resetPassword->userId)->first();
                $password =  Hash::make($request->input('password'));
                $companyNeedChange->password = $password;
                $companyNeedChange->save();
                $response = Http::post('http://localhost:8082/sendMailNotification', [
                    'emailTo' => $companyNeedChange->email,
                    'fullName'=> $companyNeedChange->name
                   
                ]);
                $resetPassword->status ="2";
                $resetPassword->updated_at =  Carbon::now();
                $resetPassword->save();
                return response()->json([
                        'sucess'=>true,
                        'error'=> $error ], 200
                 );
        }
        else 
        {
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 202
         );
        }
    }

    public function ResetPassword(Request $request)
    {
        // $code = $request->input("forgetpasswordLink");
        // dd($code);
        // if($code == "")
        // {
        //     return view("templates.employers.errors.404");
        // }
        //  $resetPassword = ResetPassword::where("code",$code)->where("type","1")
        //                               ->orderby("created_at","desc")
        //                               ->first();
        // if($resetPassword)
        // { 
        //     $companyId = Company::where("id", $resetPassword->userId)->frist();
        //      return view('auth.passwords.memberResetPassword', compact("resetPassword"));
        // }

        
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
