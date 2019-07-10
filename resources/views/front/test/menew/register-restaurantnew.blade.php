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
			{!! form($form) !!}
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
@push('scripts')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('js/admin/form/form.js') }}"></script>
@endpush
