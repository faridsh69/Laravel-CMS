@extends('layout.admin')

@section('content')
	@foreach(json_decode($data) as $item)
		{{ $item }}
		<br>
	@endforeach
@endsection