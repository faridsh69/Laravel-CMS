@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
    <div class="m-login__wrapper">
        <div class="m-login__logo">
            <a href="javascript:void(0)">
                <img src="{{ asset(config('setting-general.logo')) }}" style="max-height: 50px">
            </a>
        </div>
        <div class="m-login__forget-password1">
            <div class="m-login__head">
                <h3 class="m-login__title">
                    {{ __('Reset Password') }}
                </h3>
                <div class="m-login__desc">
                </div>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('auth.password.email') }}">
                @csrf
                <div class="form-group m-form__group rtl-text-right">
                    <input class="form-control m-input" type="text" placeholder="{{ __('email') }}" name="email" id="email"  value="{{ old('email') }}" required autofocus>
                </div>
                <div class="m-login__form-action">
                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                        {{ __('send') }}
                    </button>
                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
                        {{ __('cancel') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="m-stack__item m-stack__item--center">
    <div class="m-login__account">
        <span class="m-login__account-msg">
        </span>
        &nbsp;&nbsp;
        <a href="{{ route('auth.login') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
            {{ __('login') }}
        </a> / 
        <a href="{{ route('auth.register') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
            {{ __('register') }}
        </a>
    </div>
</div>
@endsection