@extends('layout.admin')

@section('content')
	<iframe src="{{ route('unisharp.lfm.show', ['type' => 'image']) }}" class="iframe"></iframe>
	<br>
	<br>
	<br>
	<a href="{{ route('unisharp.lfm.show', ['type' => 'image']) }}" target="_blank">
		Open in new tab
	</a>
@endsection