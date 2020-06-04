<div class="col-11">
    <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="50ms">
        <!-- Post Thumb -->
        <div class="blog-post-thumb mb-50">
            <img src="{{ $item->src('image') }}" alt="{{ $item->title }}">
        </div>
        <!-- Post Title -->
        <a href="{{ route('front.'. Str::kebab(class_basename($item)). '.show', $item->url) }}" class="post-title">{{ $item->title }}</a>
        <!-- Post Meta -->
        <div class="post-meta">
            <p>By <a href="#">Simon Smith</a> | <a href="#">{{ $item->created_at }}</a> | <a href="#">3 comments</a></p>
        </div>
        <p>{{ $item->content }}</p>
        <a href="{{ route('front.'. Str::kebab(class_basename($item)). '.show', $item->url) }}" class="btn academy-btn btn-sm mt-15">{{ __('Read More')}}</a>
    </div>
</div>