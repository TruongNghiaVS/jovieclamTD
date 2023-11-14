<?php

namespace App\Http\Controllers\Company\Auth;

use App\Company;
use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \stdClass;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // public function showLoginForm()
    // {
    //     return view(config('app.THEME_PATH').'.company_auth.login');
    // }

    public function showLoginForm()
    {
        return view('templates.employers.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('company.guest')->logout();
        $request->session()->invalidate();
        return redirect('/employers');


    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }

    public function login(Request $request)

    {
        $passwordInput = bcrypt($request->input('password'));
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input("email");
        $password = $request->input("password");
        $exitMemeber = Company::where('email', $request->get('email'))
                      ->first();  
        $error = array();

    
      
        if($exitMemeber)
        {
            Auth::guard('company')->login($exitMemeber, true);
            return response()->json([
                'sucess'=>true,
                'urlRedirect'=> "/company-home",
                "error"=> $error,
                'message' => 'Đăng nhập thành công'], 200);
          
        }
        else 
        {
            $itemError = new stdClass();
            $itemError->key ="email";
             $itemError->textError =trans('Email does not exist');
            array_push($error, $itemError);
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 401);
        }
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        //echo config("services.{$provider}.redirect").'<br>';
        config(["services.{$provider}.redirect" => url("login/employer/{$provider}/callback")]);
        //echo config("services.{$provider}.redirect");exit;
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::guard('company')->login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        if ($user->getEmail() != '') {
            $authUser = Company::where('email', 'like', $user->getEmail())->first();
            if ($authUser) {
                /* $authUser->provider = $provider;
                  $authUser->provider_id = $user->getId();
                  $authUser->update(); */
                return $authUser;
            }
        }
        $str = $user->getName() . $user->getId() . $user->getEmail();
        return Company::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    //'provider' => $provider,
                    //'provider_id' => $user->getId(),
                    'password' => bcrypt($str),
                    'is_active' => 1,
                    'verified' => 1,
        ]);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $authUser = $this->findOrCreateUser($user, 'facebook');
            Auth::guard('company')->login($authUser, true);
            return redirect($this->redirectTo);
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

}
