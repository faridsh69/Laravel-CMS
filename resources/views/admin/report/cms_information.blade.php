<div class="col-xl-6">
	<h1>
		<img src="{{ config('0-general.logo') }}">
		{{ config('0-general.app_title') }}
	</h1>
	<h6>
		<small>Version: 2.7.12</small>
	</h6>
	<br>
	<h5>
		Theme: {{ config('0-developer.theme') }}
		<br>
		<br>
		App Environment: Producttion
	</h5>

	@if(config('0-general.google_index'))
	<div class="alert alert-success">Google is indexing</div>
	@else
	<div class="alert alert-danger">Google will not index this website</div>
	@endif
	<br>
	<p>{{ config('0-general.default_meta_description') }}</p>
	<div class="alert alert-info">
		@if(config('0-general.android_application_url'))
		<a href="{{ config('0-general.android_application_url') }}">
			Android application
			<i class="fa fa-arrow-right"></i>
		</a>
		<br>
		@endif
		@if(config('0-general.ios_application_url'))
		<a href="{{ config('0-general.ios_application_url') }}">
			ios application
			<i class="fa fa-arrow-right"></i>
		</a>
	</div>
	@endif
</div>