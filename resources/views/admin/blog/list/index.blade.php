@extends('layout.admin')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('image', $meta['image'])

@push('script')
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif
<script src="{{ Cdn::asset('js/table/table-data.js') }}"></script>
<script src="{{ Cdn::asset('js/table/change-status.js') }}"></script>
@endpush

@section('content')
	<div class="m_datatable" id="table-data"></div>
@endsection