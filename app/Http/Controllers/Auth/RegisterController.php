<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return route('admin.dashboard.index');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {   
        $request->validate([
            // 'first_name' => ['required', 'string', 'max:191'],
            // 'last_name' => ['required', 'string', 'max:191'],
            // 'mobile' => ['required', 'phone:AUTO,US,BE'],
            // 'phone' => ['required', 'string', 'max:30', 'min:5'],
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $authUser = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        dd($authUser);

        activity('User Registered')->performedOn($authUser)
            ->causedBy($authUser)
            ->log('User Registered');
        $user_registered = new UserRegistered();
        $authUser->notify($user_registered);

        return $authUser;
    }
}
