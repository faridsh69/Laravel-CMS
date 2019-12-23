<section class="app-screenshots-area section_padding_0_100 clearfix" id="screenshot">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('services_title') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="app_screenshots_slides owl-carousel">
                    @foreach(\App\Models\Service::active()->get() as $service)
                    <div class="single-shot">
                        <img src="{{ $service->asset_image }}" alt="services gallery">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
