@extends('layout.admin')

@section('content')
	<iframe src="{{ route('unisharp.lfm.show') }}" class="iframe"></iframe>
	<br>
	<br>
	<br>
	<a href="{{ route('unisharp.lfm.show') }}" target="_blank">
		Open in new tab
	</a>
@endsection