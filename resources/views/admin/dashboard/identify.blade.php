@extends('layout.admin')

@section('content')
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('email') }}:
	@if( Auth::user()->email_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->email_verified_at }} </small>
	@else
		<a class="btn btn-success btn-sm" href="{{ route('admin.dashboard.identify.email') }}">
			Send verification code to email</a>
	@endif
	</h3> {{ Auth::user()->email }} <br>
</div>
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('phone') }}:
	@if( Auth::user()->phone_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->phone_verified_at }} </small>
	@else
		<a class="btn btn-success btn-sm" href="{{ route('admin.dashboard.identify.phone') }}">
			Send verification code to phone</a>
	@endif
	</h3> {{ Auth::user()->phone }} <br>
</div>

<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.national_card-verify') }}" enctype="multipart/form-data">
	@csrf
	<div class="form-group m-form__group">
		<label>{{ __('national card') }}:</label>
		<input type="file" class="form-control m-input" name="national_card">
		<br>
		<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
	</div>
</form>

	
@endsection