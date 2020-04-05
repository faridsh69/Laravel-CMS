@extends('admin.common.layout')

@section('content')
	<iframe src="{{ route('unisharp.lfm.show', ['type' => 'file']) }}" class="iframe"></iframe>
	<br>
	<br>
	<br>
	<a href="{{ route('unisharp.lfm.show', ['type' => 'file']) }}" target="_blank">
		Open in new tab
	</a>
@endsection