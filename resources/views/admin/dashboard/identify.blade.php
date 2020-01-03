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

<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('national card') }}:
	@if( Auth::user()->national_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->national_card_verified_at }} </small>
	@else
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.national_card-verify') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group m-form__group">
				<input type="file" required  class="form-control m-input" name="national_card">
				<br>
				<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
			</div>
		</form>
	@endif
	</h3> برای کارت ملی شما {{ \Auth::user()->national_card_images->count() }} تصویر آپلود شده است. <br>
	<div class="image-form">
		@foreach(\Auth::user()->national_card_images as $image)
			<img src=" {{ asset($image['src_thumbnail']) }}" alt="image">
		@endforeach
	</div>
</div>

<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('bank card') }}:
	@if( Auth::user()->bank_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->bank_card_verified_at }} </small>
	@else
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.bank_card-verify') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group m-form__group">
				<input type="file" required  class="form-control m-input" name="bank_card">
				<br>
				<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
			</div>
		</form>
	@endif
	</h3> برای کارت بانکی شما {{ \Auth::user()->bank_card_images->count() }} تصویر آپلود شده است. <br>
	<div class="image-form">
		@foreach(\Auth::user()->bank_card_images as $image)
			<img src=" {{ asset($image['src_thumbnail']) }}" alt="image">
		@endforeach
	</div>
</div>
<div class="m-section">
	<h3 class="m-section__heading"> 
	{{ __('certificate card') }}:
	@if( Auth::user()->certificate_card_verified_at )
		<small><i class="fa fa-check"></i> {{ __('verified at') }}: {{ Auth::user()->certificate_card_verified_at }} </small>
	@else
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('admin.dashboard.identify.certificate_card-verify') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group m-form__group">
				<input type="file" required  class="form-control m-input" name="certificate_card">
				<br>
				<button class="btn btn-success btn-sm">{{ __('submit') }}</button>
			</div>
		</form>
	@endif
	</h3> برای این مدرک {{ \Auth::user()->certificate_card_images->count() }} تصویر آپلود شده است. <br>
		<div class="image-form">
		@foreach(\Auth::user()->certificate_card_images as $image)
			<img src=" {{ asset($image['src_thumbnail']) }}" alt="image">
		@endforeach
	</div>
</div>
@endsection