@extends('front.common.layout')
@section('content')
<div class="row">
	@foreach($blogs as $blog)
	<div class="col-sm-6 col-md-4">
		<img src="{{ $blog->image }}">
		<b>{{ $blog->title }}</b>
		<p>{{ $blog->description }}</p>
		<a href="{{ route('front.blog.list.show', $blog->url) }}">
	</div>
	@endforeach
</div>
@endsection