@extends('admin.common.layout')

@section('content')
<div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
	<div class="m-alert__icon"><i class="la la-info"></i></div>
	<div class="m-alert__text">
		Wellcome to your site: {{ config('app.name') }}
	</div>
	<div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
</div>
<div class="row">
	@include('admin.page.report.cms-information')
	@include('admin.page.report.cms-user-view')
	@include('admin.page.report.cms-activity')
	@include('admin.page.report.cms-comment')
	@include('admin.page.report.cms-contact')
	@include('admin.page.report.cms-statics')
</div>
@endsection