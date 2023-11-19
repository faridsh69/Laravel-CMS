<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegistered;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};

final class RegisterController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function getRegister()
	{
		return view('auth.register');
	}

	public function postRegister(Request $request)
	{
		$request->validate([
			'email' => 'required|email|max:191|unique:users,email',
			'password' => 'required|string|min:4|confirmed',
			'g-recaptcha-response' => 'required|captcha',
		]);

		$authUser = User::create([
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
		]);

		$user_registered = new UserRegistered();
		$authUser->notify($user_registered);

		Auth::loginUsingId($authUser->id);

		return redirect()->route('admin.dashboard.profile');
	}
}
