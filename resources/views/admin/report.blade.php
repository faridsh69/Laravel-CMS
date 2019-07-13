@extends('layout.admin')

@push('scripts')
	<!-- <script src="{{ asset('admin/report.js') }}"></script>
	<script src="{{ asset('admin/calendar.js') }}"></script> -->
@endpush

@section('content')
		<div class="row">
			@include('admin.report.cms_information')
		</div>
	</div>
</div>
<div class="row">
	@include('admin.report.main')
	@include('admin.report.daily_user_view')
	@include('admin.report.last_activities')
	@include('admin.report.last_comments')
	@include('admin.report.contact_data')
	@include('admin.report.count_models')
</div>
@push('script')
<script src="{{ asset('js/admin/report/dashboard.js') }}"></script>
@endpush
@endsection