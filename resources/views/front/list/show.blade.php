@extends('front.common.layout')
@section('content_block')
<div class="row">
	<div class="col-sm-2">
		@if($item->image)
		<img src="{{ $item->image }}" alt="{{ $item->title }}">
		@endif
	</div>
	<div class="col-sm-7"> 
		<h1>{{ $item->title }}</h1>
		<p>
			{{ __('description') }}: {{ $item->description }}
		</p>
	</div>
	<div class="col-sm-3">
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
		<p>{{ __('category') }}: <a href="{{ route('front.blog.category.show', $item->category->url) }}"><i class="fa {{ $item->category->icon }}"></i>{{ $item->category->title }}</a></p>
		@endif
		@if($item->tags)
		<ul>{{ __('tags') }}: 
			@foreach($item->tags as $tag)
			<li><a href="{{ route('front.blog.tag.show', $tag->url) }}"><i class="fa {{ $tag->icon }}"></i>{{ $tag->title }}</a></li>
			@endforeach
		</ul>
		<br>
		@endif
		@if($item->keywords)
		<p>{{ __('keywords') }}: {{ $item->keywords }}</p>
		@endif
	</div>
</div>
<hr>
{!! $item->content !!}
<hr>

@foreach($item->getColumns() as $column)
	@php
		$file_accept = '';
		if($column['form_type'] === 'file')
		{
			$file_accept = $column['file_accept'];
			if($column['file_manager'] === true){
				$files_src = explode(',',  $item[$column['name']] );
				if($files_src == ['']){ $files_src = [];}
			}else{
				$files_src = json_decode($item[$column['name']]);
			}
		}
	@endphp
	<h6 class="m--font-boldest m--font-brand">{{ __($column['name']) }}</h6>
	<div class="mb-4 show-file">
	@if($file_accept)
		@foreach($files_src as $src)
		<div class="show-file">
			@if($file_accept === 'image')
		    	<img alt="image" src="{{ $src }}">
			@elseif($file_accept === 'video')
				<video controls>
					<source src="{{ $src }}">
				</video>
			@elseif($file_accept === 'audio')
				<audio controls>
					<source src="{{ $src }}">
				</audio>
			@else
				{{ $src }}
			@endif
			<div class="file-tools mt-2">
				<a download href="{{ $src }}" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-download"></i></span>
				</a>
				<a target="blank" href="{{ $src }}" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-eye"></i></span>
				</a>
			</div>
		</div>
		@endforeach
		@if(count($files_src) === 0)
			<span style="color: red">Null</span>
		@endif
	@elseif(!is_object($item[$column['name']]) )
		@if($item[$column['name']] === null)
			<span style="color: red">Null</span>
		@else
			@if($column['form_type'] === 'entity')
				@php
					$related_model = (new $column['class'])->find($item[$column['name']]);
				@endphp

				@each('admin.common.show-related-table', [ [$related_model] ], 'items')
			@else
				{{ $item[$column['name']] }}
			@endif
		@endif
	@else
		@each('admin.common.show-related-table', [$item[$column['name']]], 'items')
	@endif
	</div>
@endforeach

@endsection