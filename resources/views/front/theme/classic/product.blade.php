<div class="top-popular-courses-area section-padding-100-70" id="product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span>{{ __('The Best') }}</span>
                    <h3>{{ __('Top Products') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($modules->where('type', 'product')->take(4) as $product_item)
            @php
                $product = $product_item->product;
            @endphp
            <div class="col-12 col-lg-6">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                    <div class="popular-course-content">
                        <h5>{{ $product->title }}</h5>
                        <span>{{ $product->price }} $</span>
                        <!-- <div class="course-ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div> --> 
                        <p>{{ $product->description }}</p>
                        <a href="{{ route('front.product.show', $product->id)}}" class="btn academy-btn btn-sm">{{ __('See More') }}</a>
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url({{ $product->avatar }});"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>