<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PasswordChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if(! $user)
        {
            $request->session()->flash('alert-danger', __('user not found'));
            return redirect()->back();
        }
        $new_password = rand(100000, 999999);
        $user->password = Hash::make($new_password);
        $user->save();

        $password_changed =  new PasswordChanged();
        $password_changed->setCode($new_password);
        $user->notify($password_changed);

        $request->session()->flash('alert-danger', __('password sent to your email'));

        return redirect()->route('auth.login');
    }
}
