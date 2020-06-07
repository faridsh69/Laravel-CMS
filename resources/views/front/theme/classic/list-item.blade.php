<div class="col-12">
    <div class="rtl-text-right single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms">
        <div class="popular-course-content">
            <h5>{{ $item->title }}</h5>
            <span>By Simon Smith   |  {{ $item->created_at }}</span>
            <div class="course-ratings">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>{{ $item->content }}</p>
            <a href="{{ route('front.'. Str::kebab(class_basename($item)). '.show', $item->url) }}" class="btn academy-btn btn-sm">{{ __('See More') }}</a>
        </div>
        <div class="popular-course-thumb bg-img" style="background-image: url({{ $item->src('image') }});"></div>
    </div>
</div>