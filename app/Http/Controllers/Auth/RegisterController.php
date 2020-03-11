<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return route('admin.dashboard.list.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'first_name' => ['required', 'string', 'max:191'],
            // 'last_name' => ['required', 'string', 'max:191'],
            // 'mobile' => ['required', 'phone:AUTO,US,IR,BE'],
            // 'phone' => ['required', 'string', 'max:30', 'min:5'],
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|email|max:191',
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $auth_user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        activity('User')->performedOn($auth_user)
            ->causedBy($auth_user)
            ->log('User Registered');
        $user_registered = new UserRegistered();
        $auth_user->notify($user_registered);

        return $auth_user;
    }
}
