@extends('front.page')
@section('content_block')
<div class="row">
    <div class="col-12 text-center">
        <div class="section-heading">
            <h2>{{ __('blog') }}</h2>
            <div class="line-shape"></div>
        </div>
    </div>
    @foreach([] as $blog)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="single-team-member">
            <div class="member-image">
                <img src="{{ $blog->asset_image }}" alt="{{ $blog->title }}">
            </div>
            <div class="member-text">
                <a href="{{ route('front.blog.category', $blog->url) }}">
                    <h6>{{ $blog->title }}</h6>
                    <p>{{ $blog->description }}</p>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection            
