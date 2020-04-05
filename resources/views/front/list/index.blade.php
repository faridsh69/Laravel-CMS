@extends('front.common.layout')
@section('content_block')
<div class="row">
	@foreach($list as $item)
	<div class="col-sm-6 col-md-4">
		<a href="{{ route('front.' . class_basename($item) . '.show', $item->url) }}">
			<div>
				<img src="{{ $item->image_default() }}" style="height: 100px;">
			</div>
			<b>{{ $item->title }}</b>
			<p>{{ $item->description }}</p>
		</a>
	</div>
	@endforeach
</div>
@endsection