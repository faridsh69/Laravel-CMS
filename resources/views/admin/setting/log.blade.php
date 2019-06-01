@extends('layout.admin')

@section('content')
	<iframe src="{{route('admin.setting.log-view')}}" class="iframe"></iframe>
@endsection