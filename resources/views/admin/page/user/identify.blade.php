@extends('admin.common.layout')

@section('content')
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('email') }}:
	</h3> {{ $user->email }} <br>
	@if( $user->email_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->email_verified_at }} </small>
	@else
		<small><i class="fa fa-close"></i> {{ __('not verified') }}</small>
	@endif
</div>
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('phone') }}:
	</h3> {{ Auth::user()->phone }} <br>
	@if( $user->phone_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->phone_verified_at }} </small>
	@else
		<small><i class="fa fa-close"></i> {{ __('not verified') }}</small>
	@endif
</div>

@foreach(['national_card', 'bank_card', 'certificate_card'] as $document_title)
@php
	$document_title_verified_at = $document_title . '_verified_at';
@endphp
<div class="m-section">
	<h3 class="m-section__heading">
	{{ __($document_title) }}:
	@if(!$user->srcs($document_title))
		<small class="ml-3">{{ __('no_file_existed') }}</small>
	@endif
	<div class="show-file">
		@foreach($user->srcs($document_title) as $src)
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
	@if( $user->{$document_title_verified_at} )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->{$document_title_verified_at} }} </small>
	@else
		<div class="form-group m-form__group mt-4">
			<a class="btn btn-success" href="{{ route('admin.user.identify.document', [$user->id, $document_title]) }}">{{ __('verify') }}</a>
		</div>
	@endif
</div>
@endforeach
@endsection