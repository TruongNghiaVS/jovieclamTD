<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use  Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
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
        Auth::login($authUser, true);
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
            $authUser = User::where('email', 'like', $user->getEmail())->first();
            if ($authUser) {
                /* $authUser->provider = $provider;
                  $authUser->provider_id = $user->getId();
                  $authUser->update(); */
                return $authUser;
            }
        }
        $str = $user->getName() . $user->getId() . $user->getEmail();
        return User::create([
                    'first_name' => $user->getName(),
                    'middle_name' => $user->getName(),
                    'last_name' => $user->getName(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    //'provider' => $provider,
                    //'provider_id' => $user->getId(),
                    'password' => bcrypt($str),
                    'is_active' => 1,
                    'verified' => 1,
        ]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        
        return view(config('app.THEME_PATH').'.auth.login');
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('guest')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    public function login(Request $request)

    {
        $passwordInput = bcrypt($request->input('password'));
       $error = array();

       if(empty($request->input('password')))
         {
              $itemError = new stdClass();
              $itemError->key ="password";
              $itemError->textError ="Yêu cầu mật khẩu";
              array_push($error, $itemError);   
         }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input("email");
        $password = $request->input("password");
        $exitMemeber = User::where('email', $request->get('email'))
                        
                            ->first();  
      
      
        if(!$exitMemeber)
        {
            $itemError = new stdClass();
            $itemError->key ="email";
             $itemError->textError =trans('Email does not exist');
            array_push($error, $itemError);
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 401);
          
        }

        if(count($error))
        {
            return response()->json([
                'sucess'=>false,
                'error'=> $error ], 202);
        }
        

        Auth::login($exitMemeber, true);

       
        return response()->json([
            'sucess'=>true,
            'urlRedirect'=> "/home",
            "error"=> $error,
            'message' => 'Đăng nhập thành công'], 200);
    }
    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     
    protected function sendFailedLoginResponse(Request $request)
    {
        $existedUser = User::where('email', $request->get('email'))->first();
        
        if (empty($existedUser)) {
            throw ValidationException::withMessages([
                $this->username() => [trans('Email does not exist')],
            ]);
        }

        if (!empty($existedUser) && empty($existedUser->is_active)) {
            throw ValidationException::withMessages([
                $this->username() => [trans('User is not activated, please contact administrator')],
            ]);
        }

        throw ValidationException::withMessages([
            'password' => [trans('Incorrect password')],
        ]);

    }
}
