@extends('auth.common.layout')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
	<div class="m-login__wrapper padding-0">
		<div class="m-login__logo">
			<a href="javascript:void(0)">
				<img src="{{ asset(config('setting-general.logo')) }}" style="max-height: 50px">
			</a>
		</div>
		<div class="m-login__signup1">
			<div class="m-login__head">
				<h3 class="m-login__title">
					{{ __('register') }}
				</h3>
			</div>
			<form class="m-login__form m-form margin-top-20" method="POST" action="{{ route('auth.register') }}">
				@csrf
				<div class="form-group m-form__group rtl-text-right">
					<input class="form-control m-input" type="text" placeholder="{{ __('email') }}" name="email" value="{{ isset($email) ? $email : old('email') }}" required>
					@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __($message) }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group m-form__group rtl-text-right">
					<input class="form-control m-input" type="password" placeholder="{{ __('password') }}" name="password" required autocomplete="off">
					@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __($message) }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group m-form__group rtl-text-right">
					<input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('password confirmation') }}" id="password-confirm" name="password_confirmation" required autocomplete="off">
				</div>
				<div class="form-group m-form__group rtl-text-right">
					<div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
				</div>
				<div class="row form-group m-form__group m-login__form-sub">
					<div class="">
						<label class="m-checkbox m-checkbox--focus">
							<input type="checkbox" name="agree" required="">
							{{ __('I Agree the') }}
							<a href="javascript:void(0)" class="m-link m-link--focus">
								{{ __('terms and conditions') }}
							</a>
							<span></span>
						</label>
						<span class="m-form__help"></span>
					</div>
				</div>
				<div class="m-login__form-action">
					<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
						{{ __('register') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="m-stack__item m-stack__item--center rtl-text-right">
	<div class="m-login__account">
		<span class="m-login__account-msg">
			{{ __('Already have account?') }}
		</span>
		&nbsp;&nbsp;
		<a href="{{ route('auth.login') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
			{{ __('login') }}
		</a>
	</div>
</div>
@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js"></script>
@endpush