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

@foreach(['national_card', 'bank_card', 'certificate_card'] as $document_title)
@php
	$document_title_verified_at = $document_title . '_verified_at';
@endphp
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __($document_title) }}:
	@if( Auth::user()->{$document_title_verified_at} )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->{$document_title_verified_at} }} </small>
	@else
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.document', $document_title) }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group m-form__group">
				<input type="file" accept="image/*" required  class="form-control m-input" name="{{ $document_title }}">
				<br>
				<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
			</div>
		</form>
	@endif
	<div class="show-file">
		@foreach(json_decode(\Auth::user()->files_src($document_title)) as $src)
			<img src="{{ $src }}" alt="{{ $document_title }} image">
			<div class="file-tools mt-2">
				<a download href="{{ $src }}" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-download"></i></span>
				</a>
				<a target="blank" href="{{ $src }}" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-eye"></i></span>
				</a>
			</div>
		@endforeach
	</div>
</div>
@endforeach
@endsection