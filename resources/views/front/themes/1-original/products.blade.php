<section class="app-screenshots-area bg-white section_padding_0_100 clearfix" id="screenshot">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('products title') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="app_screenshots_slides owl-carousel">
                    @foreach(\App\Models\Product::active()->language()->get() as $product)
                    <div class="single-shot">
                        <img src="{{ $product->asset_image }}" alt="products gallery">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
