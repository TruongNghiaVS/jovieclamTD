<?php

namespace App\Http\Controllers\Company\Auth;

use Auth;
use App\Company;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\CompanyFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\CompanyRegistered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Jrean\UserVerification\Facades\UserVerification as UserVerificationFacade;
use \stdClass;
class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;
    use VerifiesUsers {
        getVerification as protected getVerificationCom;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/company-home';
    protected $userTable = 'companies';
    protected $redirectIfVerified = '/company-home';
    protected $redirectAfterVerification = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company.guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }

    public function register(CompanyFrontRegisterFormRequest $request)
    {
      
        $company = new Company();
        $error = array();
         if(empty($request->input('name')))
        {
            $itemError = new stdClass();
            $itemError->key ="name";
             $itemError->textError ="Yêu cầu nhập họ tên";
             array_push($error, $itemError);   
        }


        if(empty($request->input('password')))
        {
            $itemError = new stdClass();
            $itemError->key ="password";
             $itemError->textError ="Yêu cầu mật khẩu";
             array_push($error, $itemError);   
        }
        
        $exited = Company::where('email', $request->input('email'))
        ->first();  
        if($exited)
        {
                $itemError = new stdClass();
                $itemError->key ="email";
                $itemError->textError ="Email này đã được sử dụng trong hệ thống";
                array_push($error, $itemError);
            
        }
        if(count($error))
        {
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 202);
        }
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = Hash::make($request->input('password'));
        $company->is_active = 0;
        $company->verified = 0;
        $company->save();
        /*         * ******************** */
        $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
        $company->update();
        /*         * ******************** */

        event(new Registered($company));
        event(new CompanyRegistered($company));
        $this->guard()->login($company);
        UserVerification::generate($company);
        // UserVerification::send($company, 'Company Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        return $this->registered($request, $company) ?: redirect($this->redirectPath());
    }



    public function getVerification(Request $request, $token)
    {

        if (! $this->validateRequest($request)) {
            return redirect($this->redirectIfVerificationFails());
        }

        try {
            $company = UserVerificationFacade::process($request->input('email'), $token, $this->userTable);
        } catch (UserNotFoundException $e) {
            return redirect($this->redirectIfVerificationFails());
        } catch (UserIsVerifiedException $e) {
            return redirect($this->redirectIfVerified());
        } catch (TokenMismatchException $e) {
            return redirect($this->redirectIfVerificationFails());
        }

        if (config('user-verification.auto-login') === true) {
            auth()->loginUsingId($company->id);
        }

        return redirect($this->redirectAfterVerification());
    }



}
