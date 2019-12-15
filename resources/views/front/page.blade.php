@extends('layout.front')

@section('content')
	@foreach($blocks as $block)
		@includeIf('front.themes.' . config('setting-developer.theme') . '.' . $block->title)
	@endforeach
@endsection