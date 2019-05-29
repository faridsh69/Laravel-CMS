@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
    <div class="m-login__wrapper">
        <div class="m-login__logo">
            <a href="javascript:void(0)">
                <img src="{{ Cdn::asset('upload/images/admin.png') }}">
            </a>
        </div>
        <div class="m-login__forget-password1">
            <div class="m-login__head">
                <h3 class="m-login__title">
                    {{ __('Reset Password') }}
                </h3>
                <div class="m-login__desc">
                    Enter your email to reset your password:
                </div>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group m-form__group">
                    <input class="form-control m-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" id="m_email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="m-login__form-action">
                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                        {{ __('Send Password') }}
                    </button>
                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
                        {{ __('Cancel') }}
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
        <a href="{{ route('login') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
            {{ __('Back Top Login') }}
        </a>
    </div>
</div>
@endsection