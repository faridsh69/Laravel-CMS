@extends('layout.front')

@section('content')
	@foreach($blocks as $block)
		@include('front.widgets.' . $block->widget_type . '.' . $block->theme)
	@endforeach
@endsection