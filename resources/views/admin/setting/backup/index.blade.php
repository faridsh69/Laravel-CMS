@extends('layout.admin')

@push('script')
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif
@endpush

@section('content')
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>File name</th>
        <th>Size</th>
        <th>Date Craeted</th>
        <th>Age (day)</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($backups as $backup)
    <tr>
        <td>{{ $backup['file_name'] }}</td>
        <td>{{ $backup['file_size'] / 1000000 }}</td>
        <td>{{ \Carbon\Carbon::parse($backup['last_modified']) }}</td>
        <td>{{ \Carbon\Carbon::parse($backup['last_modified'])->diffInDays() }}</td>
        <td>
            <a class="btn btn-xs btn-default"
               href="{{ route('admin.setting.backup.list.show', $backup['file_name']) }}">
               	<i class="fa fa-cloud-download"></i> Download</a>
            <a class="btn btn-xs btn-danger" href="{{ route('admin.setting.backup.list.edit', $backup['file_name']) }}">
            	<i class="fa fa-trash-o"></i> Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection