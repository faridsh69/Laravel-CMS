<section class="app-screenshots-area section_padding_0_100 clearfix" id="screenshot" style="background-color: rgba(36, 43, 53,1.0); padding-top: 40px; padding-bottom: 110px">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h3  style="color:white !important">OVER 4,000 RESTAURANTS IN 200+ CITIES WORLDWIDE</h3>
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
