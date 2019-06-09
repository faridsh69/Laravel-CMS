@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
	<div class="m-login__wrapper padding-0">
		<div class="m-login__logo">
			<a href="javascript:void(0)">
				<img src="{{ asset('upload/images/admin.png') }}">
			</a>
		</div>
		<div class="m-login__signup1">
			<div class="m-login__head">
				<h3 class="m-login__title">
					{{ __('Register') }}
				</h3>
			</div>
			<form class="m-login__form m-form margin-top-20" method="POST" action="{{ route('register') }}">
				@csrf
				<!-- <div class="form-group m-form__group">
					<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ isset($name) ? $name : old('name') }}" required autocomplete="name" autofocus>
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
				</div> -->
				<div class="form-group m-form__group">
					<input class="form-control m-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ isset($email) ? $email : old('email') }}" required autocomplete="email">
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
				<div class="row form-group m-form__group m-login__form-sub">
					<div class="col m--align-left">
						<label class="m-checkbox m-checkbox--focus">
							<input type="checkbox" name="agree" required="">
							{{ __('I Agree the') }}
							<a href="javascript:void(0)" class="m-link m-link--focus">
								{{ __('terms and conditions') }}
							</a>
							.
							<span></span>
						</label>
						<span class="m-form__help"></span>
					</div>
				</div>
				<div class="m-login__form-action">
					<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
						{{ __('Register') }}
					</button>
					<button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">
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
			{{ __('Already have account?') }}
		</span>
		&nbsp;&nbsp;
		<a href="{{ route('login') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
			{{ __('Login') }}
		</a>
	</div>
</div>
@endsection
