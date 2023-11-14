<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\UserFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered;
use Jrean\UserVerification\Facades\UserVerification as UserVerificationFacade;
use Jrean\UserVerification\Exceptions\UserNotFoundException;
use Jrean\UserVerification\Exceptions\UserIsVerifiedException;
use Jrean\UserVerification\Exceptions\TokenMismatchException;
use Illuminate\Support\Facades\Log;
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
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }


    // 'first_name' => 'required|max:80',
    // 'middle_name' => 'max:80',
    // 'last_name' => 'required|max:80',
    // 'email' => 'required|unique:users,email|email|max:100',
    // 'password' => 'required|confirmed|min:6|max:50',
    // 'terms_of_use' => 'required',
    // 'g-recaptcha-response' => 'required|captcha',

    public function register(UserFrontRegisterFormRequest $request)
    {
        $user = new User();
        $error = array();
        if(empty($request->input('first_name')))
       {
           $itemError = new stdClass();
           $itemError->key ="first_name";
            $itemError->textError ="Yêu cầu nhập họ tên";
            array_push($error, $itemError);   
       }
       if(empty($request->input('middle_name')))
       {
           $itemError = new stdClass();
           $itemError->key ="middle_name";
            $itemError->textError ="Yêu cầu nhập tên lót";
            array_push($error, $itemError);   
       }
       if(empty($request->input('last_name')))
       {
           $itemError = new stdClass();
           $itemError->key ="last_name";
            $itemError->textError ="Yêu cầu nhập tên";
            array_push($error, $itemError);   
       }

       if(empty($request->input('password')))
       {
            $itemError = new stdClass();
            $itemError->key ="password";
            $itemError->textError ="Yêu cầu mật khẩu";
            array_push($error, $itemError);   
       }

       $exited = User::where('email', $request->input('email'))
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
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->is_active = 1;
        $user->verified = 1;
        $user->save();
        /*         * *********************** */
        $user->name = $user->getName();
        $user->update();
        /*         * *********************** */
        event(new Registered($user));
        event(new UserRegistered($user));
        $this->guard()->login($user);
        UserVerification::generate($user);
        // UserVerification::send($user, 'User Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        Log::info($user);
   
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view(config('app.THEME_PATH').'.auth.register');
    }


    /**
     * Handle the user verification - override.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getVerification(Request $request, $token)
    {

        if (! $this->validateRequest($request)) {
            return redirect($this->redirectIfVerificationFails());
        }

        try {
            $user = UserVerificationFacade::process($request->input('email'), $token, $this->userTable());
            //Verifying the user right here
            //$user = User::findOrFail($user->id);
            $user->verified = 1;
            $user->is_active = 1;
            $user->update();
        } catch (UserNotFoundException $e) {
            return redirect($this->redirectIfVerificationFails());
        } catch (UserIsVerifiedException $e) {
            return redirect($this->redirectIfVerified());
        } catch (TokenMismatchException $e) {
            return redirect($this->redirectIfVerificationFails());
        }

        if (config('user-verification.auto-login') === true) {
            auth()->loginUsingId($user->id);
        }

        return redirect($this->redirectAfterVerification());
    }

}
