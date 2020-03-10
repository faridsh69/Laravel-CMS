<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PasswordChanged;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $phone = $request->input('phone');
        $user = User::where('phone', $phone)->first();
        if(! $user){
            $request->session()->flash('alert-danger', __('user not found'));

            return redirect()->back();
        }
        $user->password = Hash::make('123456');
        $user->save();

        $password_changed =  new PasswordChanged();
        $password_changed->setCode('123456');
        $user->notify($password_changed);
        $request->session()->flash('alert-danger', __('password sent to your phone'));

        return redirect()->route('auth.login');
    }
}
