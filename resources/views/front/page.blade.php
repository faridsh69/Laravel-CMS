@extends('layout.front')
@php
	if(!isset($page)){
		$page = new \App\Models\Page();
	}
	$blocks = \App\Models\Block::getPageBlocks($page->id);

	$meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $page->title,
            'description' => $page->meta_description ?: config('setting-general.default_meta_description'),
            'keywords' => $page->keywords,
            'image' => $page->image ? asset($page->image) : asset(config('setting-general.default_meta_image')),
            'google_index' => config('setting-general.google_index') ?: $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];
@endphp
@section('content')
	@foreach($blocks as $block)
		@includeIf('front.themes.' . config('setting-developer.theme') . '.' . $block->title)
	@endforeach
@endsection