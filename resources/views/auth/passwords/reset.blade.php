@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
    <div class="m-login__wrapper">
        <div class="m-login__logo">
            <a href="javascript:void(0)">
                <img src="{{ Cdn::asset('upload/images/admin.png') }}">
            </a>
        </div>
        <div class="m-login__signin">
            <div class="m-login__head">
                <h3 class="m-login__title">
                    {{ __('Sign In To Admin') }}
                </h3>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group m-form__group">
                    <input class="form-control m-input" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group m-form__group">
                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>
                </div>
                <div class="row m-login__form-sub">
                    <div class="col m--align-left">
                        <label class="m-checkbox m-checkbox--focus">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                            <span></span>
                        </label>
                    </div>
                    <div class="col m--align-right">
                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
                <div class="m-login__form-action">
                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="m-login__forget-password">
            <div class="m-login__head">
                <h3 class="m-login__title">
                    Forgotten Password ?
                </h3>
                <div class="m-login__desc">
                    Enter your email to reset your password:
                </div>
            </div>
            <form class="m-login__form m-form" action="">
                <div class="form-group m-form__group">
                    <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                </div>
                <div class="m-login__form-action">
                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                        Request
                    </button>
                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="m-stack__item m-stack__item--center">
    <div class="m-login__account">
        <span class="m-login__account-msg">
            Don't have an account yet ?
        </span>
        &nbsp;&nbsp;
        <a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
            Sign Up
        </a>
    </div>
</div>
@endsection



@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
