@foreach($modules->where('type', 'introduce') as $introduce)
<div class="popular-course-details-area wow fadeInUp" data-wow-delay="300ms" id="introduce">
    <div class="single-top-popular-course d-flex align-items-center flex-wrap">
        <div class="popular-course-content">
            <h5 style="text-align: center;">{{ $introduce->title }}</h5>
            <span style="text-align: center;">{{ $introduce->description }}</span>
            <p>{!! $introduce->content !!}</p>
            @if($introduce->url)
            <a href="{{ $introduce->url }}" class="btn academy-btn btn-sm mt-15">{{ __('See More') }}</a>
            @endif
        </div>
        <div class="popular-course-thumb bg-img" style="background-image: url({{ $introduce->mainImage() }}); height: 450px !important"></div>
    </div>
</div>
@endforeach