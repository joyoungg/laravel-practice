<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
//use http\Env\Request;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/';

    public function getLogout(){
        Auth::logout();
    }

    public function redirectToProvider()
    {
        //return \Socialite::with('kakao')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
//        $user = \Socialite::driver('kakao')->user();
//        //$kakaoid = $user->getId();
//        //$avatar = $user->getAvatar();
//        $kakaoUser = User::where('kakaoid',$kakaoid)->first();
//
//        if ($kakaoUser){
//            Auth::login($kakaoUser);
//            return redirect('/');
//        }
//        $request->session()->put('kakaoid', $kakaoid);
//        //$request->session()->put('avatar', $avatar);
//
//        return redirect('register');

        // $user->token;
    }

    protected function guard()
    {
        return Auth::guard('api');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
