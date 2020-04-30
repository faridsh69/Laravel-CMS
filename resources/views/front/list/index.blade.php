@extends('front.common.layout')
@section('content_block')
<div class="row">
	<div class="col-sm-3">
		@if(isset($category))
		<div class="row">
			<div class="col-12"> 
				<h1>Category: <i class="fa {{ $category->icon }}"></i> {{ $category->title }}</h1>
				<p>
					{{ __('description') }}: {{ $category->description }}
				</p>
			</div>
			<div class="col-12">
				<small>
					{{ __('created at') }}:
					{{ $category->created_at }}
					<br>
					{{ ('updated at') }}:
					{{ $category->updated_at }}	
					<br>
					language: {{$category->language}}
					<br>
				</small>
				<a href="{{ route('front.' . lcfirst(class_basename($list[0])) . '.category.index') }}"> Check other categories </a>
			</div>
		</div>
		@elseif(isset($tag))
		<div class="row">
			<div class="col-12"> 
				<h1>{{ __('Tag') }}: <i class="fa {{ $tag->icon }}"></i> {{ $tag->title }}</h1>
				<p>
					{{ __('description') }}: {{ $tag->description }}
				</p>
			</div>
			<div class="col-12">
				<small>
					{{ __('created at') }}:
					{{ $tag->created_at }}
					<br>
					{{ ('updated at') }}:
					{{ $tag->updated_at }}	
					<br>
					language: {{$tag->language}}
					<br>
				</small>
				<a href="{{ route('front.' . lcfirst(class_basename($list[0])) . '.tag.index') }}"> Check other tags </a>
			</div>
		</div>
		@elseif(isset($categories))
		{{ __('categories') }}:
		<ul>
			@foreach($categories as $category)
			<li style="padding: 10px;"><a href="{{ route('front.' . lcfirst(class_basename($list[0])) . '.category.show', $category->url) }}"><i class="fa {{ $category->icon }}"></i> {{ $category->title }}</a></li>
			@endforeach
		</ul>
		@elseif(isset($tags))
		{{ __('tags') }}:
		<ul>
			@foreach($tags as $tag)
			<li style="padding: 10px;"><a href="{{ route('front.' . lcfirst(class_basename($list[0])) . '.tag.show', $tag->url) }}"><i class="fa {{ $tag->icon }}"></i> {{ $tag->title }}</a></li>
			@endforeach
		</ul>
		@endif
	</div>
	<div class="col-sm-9">
		<div class="row">
			@foreach($list as $item)
			<div class="col-sm-6 col-md-4 mb-4 p-2">
				<a href="{{ route('front.' . lcfirst(class_basename($item)) . '.show', $item->url) }}">
					<div>
						<img src="{{ $item->src('image') }}" style="height: 100px;">
					</div>
					<b>{{ $item->title }}</b>
					<p style="height: 50px; overflow: hidden; text-overflow: ellipsis;">{{ $item->description }}</p>
					<button class="btn btn-info btn-sm">More</button>
				</a>
			</div>
			@endforeach
		</div>
		<br>
		<div class="row">
			<div class="col-12">
				{{ $list->links() }}
			</div>
		</div>
	</div>
</div>
@endsection