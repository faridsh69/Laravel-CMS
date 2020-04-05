@extends('admin.common.layout')

@section('content')
	<iframe src="{{ route('admin.setting.log-view') }}" class="iframe"></iframe>
		<br>
	<br>
	<br>
	<a href="{{ route('admin.setting.log-view') }}" target="_blank">
		Open in new tab
	</a>
@endsection