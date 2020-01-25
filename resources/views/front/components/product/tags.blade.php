@extends('front.page')
@section('content_block')
<div class="row">
    <div class="col-12 text-center">
        <div class="section-heading">
            <h2>{{ __('tags') }}</h2>
            <div class="line-shape"></div>
        </div>
    </div>
    @foreach($tags as $tag)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="single-team-member">
            <div class="member-image">
                <img src="{{ $tag->asset_image }}" alt="{{ $tag->title }}">
            </div>
            <div class="member-text">
                <a href="{{ route('front.product.tag', $tag->url) }}">
                    <h6>{{ $tag->title }}</h6>
                    <p>{{ $tag->description }}</p>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection            
