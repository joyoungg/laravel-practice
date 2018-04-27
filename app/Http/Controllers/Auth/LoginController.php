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
use Response;
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

    public function index()
    {
        return Auth::user();
    }
//    protected function guard()
//    {
//        return Auth::guard('api');
//    }

    public function redirectToProvider()
    {
        return \Socialite::with('kakao')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('kakao')->user();
        $kakaoUser = User::where([
            'provider' => 'kakao',
            'socialid' => $user->getId(),
            //'name' => $user->getNickname(),
        ])->first();

        if (!$kakaoUser) {
            $kakaoUser = new User;
            $kakaoUser->provider = 'kakao';
            $kakaoUser->socialid = $user->id;
           // $kakaoUser->name = $user->nickname;
            $kakaoUser->save();
        }

        Auth::login($kakaoUser);
        return redirect('/main');

        // $user->token;
    }

    public function getLogout(){
        $this->getRememberToken();
        Auth::logout();
        return redirect('/');
    }

    public function getRememberToken()
    {
        return null;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
}
