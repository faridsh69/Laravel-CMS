<div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url({{ asset('images/front/themes/classic/img/bg-img/bg-2.jpg') }});" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                    <h3>{{ __('our testimonials') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($modules->where('type', 'testimonial')->take(4) as $testimonial_item)
            <div class="col-12 col-md-6">
                <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                    <div class="testimonial-thumb">
                        <img src="{{ $testimonial_item->image }}" alt="testimonial image">
                    </div>
                    <div class="testimonial-content">
                        <h5>{{ $testimonial_item->title }}</h5>
                        <p>{{ $testimonial_item->description }}</p>
                        <h6><span>{{ $testimonial_item->full_name }}</span></h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                    <a href="javascript:void(0)" class="btn academy-btn">{{ __('See More') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>