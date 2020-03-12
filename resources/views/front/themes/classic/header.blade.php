<section class="hero-area">
    <div class="hero-slides owl-carousel">
        @foreach($modules->where('type', 'header') as $header)
        <div class="single-hero-slide bg-img" style="background-image: url({{ $header->image }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">{{ $header->title }}</h2>
                            <h4 data-animation="fadeInUp" data-delay="400ms">{{ $header->description }}</h4>
                            <a href="/{{ $header->url }}" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>