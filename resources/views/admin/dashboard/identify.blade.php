@extends('layout.admin')

@section('content')
<div class="m-section">
	<h3 class="m-section__heading"> 
	Email:
	@if( Auth::user()->email_verified_at )
		<small><i class="fa fa-check"></i> verified at: {{ Auth::user()->email_verified_at }} </small>
	@else
		<a class="btn btn-success btn-sm" href="{{ route('admin.dashboard.identify.email') }}">
			Send verification code to email</a>
	@endif
	</h3> {{ Auth::user()->email }} <br>
</div>

<div class="m-section">
	<h3 class="m-section__heading"> 
	Phone:
	@if( Auth::user()->phone_verified_at )
		<small><i class="fa fa-check"></i> verified at: {{ Auth::user()->phone_verified_at }} </small>
	@else
		<a class="btn btn-success btn-sm" href="{{ route('admin.dashboard.identify.phone') }}">
			Send verification code to phone</a>
	@endif
	</h3> {{ Auth::user()->phone }} <br>
</div>
@endsection
@push('script')
<script>
	
</script>