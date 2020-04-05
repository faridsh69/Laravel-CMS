@extends('admin.common.layout')

@section('content')
<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.phone-verify') }}">
	@csrf
	<div class="form-group m-form__group">
		<label>{{ __('activation_code') }}</label>
		<input type="text" class="form-control m-input" name="activation_code">
		<div class="help-block">
			{{ __('activtion code sent to phone') }} 
		</div>
		<br>
		<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
	</div>
</form>
@endsection


