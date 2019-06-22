@extends('layout.front')

@section('content')
	@foreach($blocks as $block)
		@include('front.widgets.' . $block->widget_type . '.' . config('0-developer.theme'))
	@endforeach
@endsection