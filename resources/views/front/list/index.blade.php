@extends('front.common.layout')
@section('content_block')
<div class="row">
	@foreach($list as $item)
	<div class="col-sm-6 col-md-4 mb-4 p-2"  style="border: 1px solid #ddd">
		<a href="{{ route('front.' . lcfirst(class_basename($item)) . '.show', $item->url) }}">
			<div>
				<img src="{{ $item->image_default() }}" style="height: 100px;">
			</div>
			<b>{{ $item->title }}</b>
			<p style="height: 50px; overflow: hidden; text-overflow: ellipsis;">{{ $item->description }}</p>
			<button class="btn btn-info btn-sm">More</button>
		</a>
	</div>
	@endforeach
</div>

@endsection