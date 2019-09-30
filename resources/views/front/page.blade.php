@extends('layout.front')

@section('content')
	@foreach($blocks as $block)
		@includeIf('front.themes.' . config('0-developer.theme') . '.' . $block->title)
	@endforeach
@endsection