<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($social_company)
    {
        $social_companies = ['google', 'github', 'gitlab', 'linkedin', 'twitter', 'facebook', 'bitbucket'];

        if(array_search($social_company, $social_companies, true) !== false){
            return Socialite::driver($social_company)->redirect();
        }

        return abort(404);
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
        // $user->token;

        // $user = Socialite::driver('github')->user();

        // // OAuth Two Providers
        // $token = $user->token;
        // $refreshToken = $user->refreshToken; // not always provided
        // $expiresIn = $user->expiresIn;

        // // OAuth One Providers
        // $token = $user->token;
        // $tokenSecret = $user->tokenSecret;

        // // All Providers
        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();
        // $user->getAvatar();

    }
}
