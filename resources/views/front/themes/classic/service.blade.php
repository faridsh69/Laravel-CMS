<div class="top-popular-courses-area section-padding-100-70" id="service">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <h3>{{ __('Top Service') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($modules->where('type', 'service')->take(4) as $service)
            <div class="col-12 col-lg-6">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                    <div class="popular-course-content">
                        <h5>{{ $service->title }}</h5>
                        <p>{{ $service->description }}</p>
                        @if($service->url)
                        <a href="{{ $service->url }}" class="btn academy-btn btn-sm">{{ __('See More') }}</a>
                        @endif
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url({{ $service->image }});"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>