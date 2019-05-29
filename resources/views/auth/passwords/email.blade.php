@extends('layout.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
                    <input class="form-control m-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                        <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">
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
    </div>
</div>
<div class="m-stack__item m-stack__item--center">
    <div class="m-login__account">
        <span class="m-login__account-msg">
            {{ __('Do you have any account yet?') }}
        </span>
        &nbsp;&nbsp;
        <a href="{{ route('register') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
            {{ __('Register') }}
        </a>
    </div>
</div>
@endsection