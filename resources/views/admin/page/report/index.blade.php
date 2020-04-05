@extends('admin.common.layout')

@section('content')
		<div class="row">
			@include('admin.report.cms-summary')
		</div>
	</div>
</div>
<div class="row">
	@include('admin.report.cms-information')
	@include('admin.report.cms-user-view')
	@include('admin.report.cms-activity')
	@include('admin.report.cms-comment')
	@include('admin.report.cms-contact')
	@include('admin.report.cms-statics')
</div>
@push('script')
<script src="{{ asset('js/admin/report/dashboard.js') }}"></script>
@endpush
@endsection