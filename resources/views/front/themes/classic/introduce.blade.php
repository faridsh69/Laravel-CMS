@foreach($modules->where('type', 'introduce') as $introduce)
<div class="popular-course-details-area wow fadeInUp" data-wow-delay="300ms">
    <div class="single-top-popular-course d-flex align-items-center flex-wrap">
        <div class="popular-course-content">
            <h5>{{ $introduce->title }}</h5>
            <span>{{ $introduce->description }}</span>
            <p>{{ $introduce->content }}</p>
            <a href="/{{ $introduce->url }}" class="btn academy-btn btn-sm mt-15">{{ __('See More') }}</a>
        </div>
        <div class="popular-course-thumb bg-img" style="background-image: url({{ $introduce->image }});"></div>
    </div>
</div>
@endforeach