@extends('layout.auth')

@section('content')
<div class="m-stack__item m-stack__item--fluid">
	<div class="m-login__wrapper">
		<div class="m-login__logo">
			<a href="javascript:void(0)">
				<img src="{{ asset(config('setting-general.logo')) }}" style="max-height: 50px">
			</a>
		</div>
		<div class="m-login__signin">
			<div class="m-login__head">
				<h3 class="m-login__title">
					{{ __('Register Your Shop') }}
				</h3>
				<h6 class="text-center">
					<small>
						Only 4 fields are required until email address
					</small>
				</h6>
			</div>

			@if(false)
			{!! form($form) !!}
			@endif

			{!! form_start($form) !!}
			{!! form_row($form->full_name) !!}
			{!! form_row($form->title) !!}
			{!! form_row($form->email) !!}
			{!! form_row($form->mobile) !!}
			{!! form_row($form->submit) !!}
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('js/admin/form/form.js') }}"></script>
@endpush
