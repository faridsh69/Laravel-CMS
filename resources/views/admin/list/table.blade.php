@extends('layout.admin')

@push('script')
<script>
	var columns  = '{!! json_encode($columns) !!}';
	columns = JSON.parse(columns);
</script>
<script src="{{ asset('js/admin/table/table.js') }}"></script>
<script src="{{ asset('js/admin/table/change-status.js') }}"></script>
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif
@endpush

@section('content')

    @if(Request::segment(1) === 'form')
    Sample form for upload image to sharepoint
    <iframe src="{{ route('front.page.test-new-job') }}" style="width: 100%; height: 400px;border:  none;"></iframe>
    @endif
    <div class="m_datatable"></div>
@endsection