@extends('layout.admin')

@section('content')
<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.email-verify') }}">
	@csrf
	<div class="form-group m-form__group">
		<label>{{ __('activation_code') }}</label>
		<input type="text" class="form-control m-input" name="activation_code">
		<br>
		<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
	</div>
</form>
@endsection


