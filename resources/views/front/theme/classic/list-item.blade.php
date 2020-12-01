<div class="col-12">
    <div class="rtl-text-right single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms">
        <div class="popular-course-content">
            <h5>{{ $item->title }}</h5>
            <p>{!! $item->content !!}</p>
            @if($item->url)
            <a href="{{ route('front.'. Str::kebab(class_basename($item)). '.show', $item->url) }}" class="btn academy-btn btn-sm">{{ __('See More') }}</a>
            @endif
        </div>
        <div class="popular-course-thumb bg-img" style="background-image: url({{ $item->src('image') }});"></div>
    </div>
</div>