@extends('front.common.main-layout')
@php
	if(isset($page)){
		$meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $page->title,
            'description' => $page->description ?: config('setting-general.default_meta_description'),
            'keywords' => $page->keywords,
            'image' => $page->asset_image ?: config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index') ?: $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];
	}else{
		$page = new \App\Models\Page();
	}
	$blocks = Cache::remember('blocks.page.' . $page->id, 1, function () use($page) {
		return \App\Models\Block::getPageBlocks($page->id);
	});
@endphp
@section('content')
	<div id="vue_id">
	@foreach($blocks as $block)
		@include('front.theme.' . config('setting-developer.theme') . '.' . $block->type)
	@endforeach
	</div>
@endsection