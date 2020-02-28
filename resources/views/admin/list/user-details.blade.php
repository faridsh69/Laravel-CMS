@extends('layout.admin')

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

<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('national card') }}:
	</h3> {{ $user->national_card_images->count() }} picture was uploaded. <br>
	<div class="image-form">
		@foreach($user->national_card_images as $image)
			<a target="_blank" href="{{ asset($image['src_main']) }}" class="m-2 p-2" style="position: inherit;">
				<img src="{{ asset($image['src_thumbnail']) }}" alt="image">
				<i class="fa fa-eye"></i>
			</a>
		@endforeach
	</div>
	@if( $user->national_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->national_card_verified_at }} </small>
	@else
		<div class="form-group m-form__group mt-4">
			<a class="btn btn-success" href="{{ route('admin.user.identify.national_card', $user->id) }}">{{ __('verify') }}</a>
		</div>
	@endif
</div>

<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('bank card') }}:
	</h3> {{ $user->bank_card_images->count() }} picture was uploaded. <br>
	<div class="image-form">
		@foreach($user->bank_card_images as $image)
			<a target="_blank" href="{{ asset($image['src_main']) }}" class="m-2 p-2" style="position: inherit;">
				<img src="{{ asset($image['src_thumbnail']) }}" alt="image">
				<i class="fa fa-eye"></i>
			</a>
		@endforeach
	</div>
	@if( $user->bank_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->bank_card_verified_at }} </small>
	@else
		<div class="form-group m-form__group mt-4">
			<a class="btn btn-success" href="{{ route('admin.user.identify.bank_card', $user->id) }}">{{ __('verify') }}</a>
		</div>
	@endif
</div>


<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('certificate card') }}:
	</h3> {{ $user->certificate_card_images->count() }} picture was uploaded. <br>
	<div class="image-form">
		@foreach($user->certificate_card_images as $image)
			<a target="_blank" href="{{ asset($image['src_main']) }}" class="m-2 p-2" style="position: inherit;">
				<img src="{{ asset($image['src_thumbnail']) }}" alt="image">
				<i class="fa fa-eye"></i>
			</a>
		@endforeach
	</div>
	@if( $user->certificate_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ $user->certificate_card_verified_at }} </small>
	@else
		<div class="form-group m-form__group mt-4">
			<a class="btn btn-success" href="{{ route('admin.user.identify.certificate_card', $user->id) }}">{{ __('verify') }}</a>
		</div>
	@endif
</div>
@endsection