<div class="top-popular-courses-area section-padding-100-70" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span>{{ __('The Best') }}</span>
                    <h3>{{ __('Pricing') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($modules->where('type', 'pricing') as $pricing)
            <div class="col-sm-6 col-md-4">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                    <div class="popular-course-content">
                        <h5>{{ $pricing->title }}</h5>
                        <p>{{ $pricing->description }}</p>
                        <p>{{ $pricing->content }}</p>
                        @if($pricing->url)
                        <a href="{{ $pricing->url }}" class="btn academy-btn btn-sm">{{ __('See More') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>