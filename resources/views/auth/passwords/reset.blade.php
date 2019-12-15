@extends('layout.auth')


@section('content')
<div class="m-stack__item m-stack__item--fluid">
    <div class="m-login__wrapper padding-0">
        <div class="m-login__logo">
            <a href="javascript:void(0)">
                <img src="{{ asset(config('setting-general.logo')) }}">
            </a>
        </div>
        <div class="m-login__signup1">
            <div class="m-login__head">
                <h3 class="m-login__title">
                    {{ __('Reset Password') }}
                </h3>
            </div>
            <form class="m-login__form m-form margin-top-20" method="POST"  action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group m-form__group">
                    <input class="form-control m-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group m-form__group">
                    <input class="form-control m-input" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group m-form__group">
                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('Confirm Password') }}" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="m-login__form-action">
                    <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                        {{ __('Reset Password') }}
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
