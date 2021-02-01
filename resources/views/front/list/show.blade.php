@extends('front.common.layout')
@section('content_block')
@include('front.common.alert')
<div class="row">
	<div class="col-sm-9">
		<h1>{{ $item->title }}</h1>
		<p>
			{{ __('description') }}: {{ $item->description }}
		</p>
		<hr>
		{!! $item->content !!}
		<hr>
		@foreach($item->getColumns() as $column)
			@php
				$file_accept = '';
				if($column['form_type'] === 'file')
				{
					$file_accept = $column['file_accept'];
					$srcs = $item->srcs($column['name']);
				}
				$modelNameSlug = \Str::kebab(class_basename($item));
			@endphp
			@if($file_accept)
			<b>{{ __($column['name']) }}</b>
			<div class="row mt-3 mb-5">
				@foreach($srcs as $src)
				<div class="col-sm-4" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
					@if($file_accept === 'image')
				    	<img alt="image" src="{{ $src }}" style="max-width: 100%;">
					@elseif($file_accept === 'video')
						<video controls style="max-width: 100%;">
							<source src="{{ $src }}"> 
						</video>
					@elseif($file_accept === 'audio')
						<audio controls>
							<source src="{{ $src }}">
						</audio>
					@else
						{{ $src }}
					@endif
					<div class="mt-2">
						<a download href="{{ $src }}" class="btn btn-outline-info"><span>
						    <i class="fa fa-download"></i></span>
						</a>
						<a target="blank" href="{{ $src }}" class="btn btn-outline-success"><span>
						    <i class="fa fa-eye"></i></span>
						</a>
					</div>
				</div>
				@endforeach
			</div>
			@endif
		@endforeach
		@include('front.components.comment')
	</div>
	<div class="col-sm-3">
		<div class="mb-3">
			<like></like>
			<img src="{{ asset('images/front/general/unlike.png') }}" alt="like" id="like" style="height: 40px; cursor: pointer;">
			<span class="ml-3">0</span>
		</div>
		<small>
			{{ __('created at') }}:
			{{ $item->created_at }}
			<br>
			{{ ('updated at') }}:
			{{ $item->updated_at }}	
			<br>
			language: {{$item->language}}
			<br>
		</small>
		<br>
		@if($item->category)
		<p>{{ __('category') }}: <a href="{{ route('front.'. $modelNameSlug .'.category.show', $item->category->url) }}"><i class="fa {{ $item->category->icon }}"></i>{{ $item->category->title }}</a></p>
		@endif
		@if(count($item->tags) > 0)
		<ul>{{ __('tags') }}: 
			@foreach($item->tags as $tag)
				@if($tag->url)
			<li><a href="{{ route('front.'. $modelNameSlug .'.tag.show', $tag->url) }}"><i class="fa {{ $tag->icon }}"></i>{{ $tag->title }}</a></li>
				@endif
			@endforeach
		</ul>
		<br>
		@endif
		@if($item->keywords)
		<p>{{ __('keywords') }}: <small>{{ $item->keywords }}</small></p>
		@endif
		@if(count($item->relateds) > 0)
		<ul>{{ __('Related') }}: 
			@foreach($item->relateds as $related)
			<li><a href="{{ route('front.'. $modelNameSlug .'.show', $related->url) }}">{{ $related->title }}</a></li>
			@endforeach
		</ul>
		<br>
		@endif
		<a href="whatsapp://send?text={{ route('front.'. $modelNameSlug .'.show', $item->url) }}" data-action="share/whatsapp/share"><i class="fa fa-share"></i> Share via Whatsapp</a>
	</div>
</div>
@endsection
@push('scripts')
<script>
	var unlikeSrc = "http:{{ asset('/images/front/general/unlike.png') }}";
	var likeSrc = "http:{{ asset('/images/front/general/like.png') }}";
	document.getElementById('like').addEventListener('click', function(event){
		if(event.target.src == likeSrc){
			event.target.src = unlikeSrc;
		}else{
			event.target.src = likeSrc;
		}
		sendLikeAjax();
	});

	var sendLikeAjax = function ()
	{
		// $http.get('/basket/product/init').then(function (response) {}
	}
</script>
@endpush
