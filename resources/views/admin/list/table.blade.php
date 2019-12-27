@extends('layout.admin')

@push('script')
<script>
	var columns  = '{!! json_encode($columns) !!}';
	columns = JSON.parse(columns);
</script>
<script src="{{ asset('js/admin/table/table.js') }}"></script>
<script src="{{ asset('js/admin/table/change-status.js') }}"></script>
@endpush

@section('content')
    <div class="m_datatable"></div>
@endsection