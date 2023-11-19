<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserLogined;
use Auth;
use Illuminate\Http\{RedirectResponse, Request};
use Socialite;

final class LoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/');
	}

	public function authenticate(Request $request)
	{
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return redirect()->route('admin.dashboard.profile');
		}

		if (!User::where('email', $request->input('email'))->first()) {
			$request->session()->flash('alert-danger', __('user not found'));
		} else {
			$request->session()->flash('alert-danger', __('user_logined_message_failed'));
		}

		return redirect()->route('auth.login');
	}

	public function redirectToProvider($social_company)
	{
		$social_companies = ['google', 'github', 'gitlab', 'linkedin', 'twitter', 'facebook', 'bitbucket'];

		if (array_search($social_company, $social_companies, true) !== false) {
			return Socialite::driver($social_company)->redirect();
		}

		return abort(404);
	}

	public function handleProviderCallback()
	{
		$userSocial = Socialite::driver('google')->user();
		$user = User::where([
			'email' => $userSocial->getEmail(),
		])->first();

		if ($user) {
			Auth::login($user);
			return redirect()->route('admin.dashboard.index');
		}

		return view('auth.register', [
			'name' => $userSocial->getName(), 'email' => $userSocial->getEmail(),
		]);
	}
}
