<section class="hero-area" id="header">
    <div class="hero-slides owl-carousel">
        @foreach($modules->where('type', 'header')->take(1) as $header)
        <div class="single-hero-slide bg-img" style="background-image: url({{$header->mainImage()}});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="10ms">{{ $header->title }}</h2>
                            <h4 data-animation="fadeInUp" data-delay="100ms">{{ $header->description }}</h4>
<!--                             <a href="/{{ $header->url }}" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
 -->                            <a target="_blank" href="tel:{{ config('setting-contact.phone') }}"
                                class="btn academy-btn" data-animation="fadeInUp" data-delay="20ms">
                                {{ config('setting-contact.phone') }}
                                <i class="fa fa-phone"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>