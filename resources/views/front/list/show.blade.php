@extends('front.common.layout')
@section('content_block')
<div class="row">
	<div class="col-sm-3">
		<img src="{{ $data->image }}" alt="{{ $data->title }}">
	</div>
	<div class="col-sm-6"> 
		<h1>{{ $data->title }}</h1>
		<p>
			{{ __('description') }}: {{ $data->description }}
		</p>
	</div>
	<div class="col-sm-3">
		<small>
			{{ __('created at') }}:
			{{ $data->created_at }}
			<br>
			{{ ('updated at') }}:
			{{ $data->updated_at }}	
			<br>
			language: {{$data->language}}
			<br>
		</small>	
	</div>
</div>
<hr>
{!! $data->content !!}
<hr>
@if($data->category)
<p>{{ __('category') }}: <a href="{{ $data->category->url }}"><b>{{ $data->category->title }}</b></a></p>
@endif
@if($data->keywords)
<p>{{ __('keywords') }}: {{ $data->keywords }}</p>
@endif

@foreach($data->getColumns() as $column)
	@php
		$file_accept = '';
		if($column['form_type'] === 'file')
		{
			$file_accept = $column['file_accept'];
			if($column['file_manager'] === true){
				$files_src = explode(',',  $data[$column['name']] );
				if($files_src == ['']){ $files_src = [];}
			}else{
				$files_src = json_decode($data[$column['name']]);
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
	@elseif(!is_object($data[$column['name']]) )
		@if($data[$column['name']] === null)
			<span style="color: red">Null</span>
		@else
			@if($column['form_type'] === 'entity')
				@php
					$related_model = (new $column['class'])->find($data[$column['name']]);
				@endphp

				@each('admin.common.show-related-table', [ [$related_model] ], 'items')
			@else
				{{ $data[$column['name']] }}
			@endif
		@endif
	@else
		@each('admin.common.show-related-table', [$data[$column['name']]], 'items')
	@endif
	</div>
@endforeach

@endsection