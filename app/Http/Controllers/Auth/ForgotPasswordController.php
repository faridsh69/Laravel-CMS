<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordChanged;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $phone = $request->input('phone');
        $user = User::where('phone', $phone)->first();
        $user->password = Hash::make('123456');
        $user->save();
        
        $password_changed =  new PasswordChanged();
        $password_changed->setCode('123456');
        $user->notify($password_changed);

        return redirect()->route('auth.login');
    }
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
