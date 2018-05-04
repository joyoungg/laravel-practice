<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;
use Response;
use Illuminate\Routing\Controller;

class NaverAuthController extends Controller
{
    //
    public function index()
    {
        return Auth::user();
    }

    public function redirectToProvider()
    {
        return Socialite::with('naver')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('naver')->user();
        //dd($user);
        $userToLogin = User::where([
            'provider' => 'naver',
            'socialid' => $user->getId(),
            'name' => $user->getName(),
        ])->first();

        if (!$userToLogin) {
            $userToLogin = new User;
            $userToLogin->provider = 'naver';
            $userToLogin->socialid = $user->id;
            $userToLogin->name = $user->name;
            $userToLogin->nickname = $user->nickname;
            $userToLogin->email = $user->email;
            $userToLogin->save();
//                [
//                'provider' => 'naver',
//                'socialid' => $user->getId(),
//                'token' => $user->token,
//                'name' => $user->getName(),
//            ]
            //       );
        }

        Auth::login($userToLogin);
        return redirect('/');
    }

    public function getLogout(){
        $this->getRememberToken();
        \Auth::logout();
        return redirect('/');
    }

    public function getRememberToken()
    {
        return null;
    }

}
