@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
	<div class="m-login__wrapper">
		<div class="m-login__logo">
			<a href="javascript:void(0)">
				<img src="{{ asset(config('0-general.logo')) }}" style="max-height: 50px">
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
				@foreach(\Config::get('services.social_companies') as $social_company)
					@php 
						$social = strtolower($social_company);
						if($social == 'google')	{
							$class = 'danger';
						} elseif($social == 'twitter') {
							$class = 'info';
						} elseif($social == 'facebook') {
							$class = 'primary';
						} elseif($social == 'linkedin') {
							$class = 'brand';
						}
					@endphp
				<a href="{{ route('login-social', $social) }}" 
					class="btn btn-outline-{{ $class }} m-btn m-btn--custom m-btn--outline-2x mb-1 text-center">
					<i class="fa fa-{{$social}}"></i>
				</a>
				@endforeach
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
