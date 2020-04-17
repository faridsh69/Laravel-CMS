@extends('admin.common.layout')

@section('content')
		<div class="row">
			@include('admin.page.report.cms-summary')
		</div>
	</div>
</div>
<div class="row">
	@include('admin.page.report.cms-information')
	@include('admin.page.report.cms-user-view')
	@include('admin.page.report.cms-activity')
	@include('admin.page.report.cms-comment')
	@include('admin.page.report.cms-contact')
	@include('admin.page.report.cms-statics')
</div>
@push('script')
<script src="{{ asset('js/admin/report/dashboard.js') }}"></script>
@endpush
@endsection