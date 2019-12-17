<section class="special-area bg-white" style="padding-top: 130px;">
    <div class="container-fluid" style="background-color: #e0004d; padding-top: 30px; min-height: 500px;">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2 style="color: white !important">{{ __('features_title') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $features = \App\Models\Feature::active()->get();
            @endphp
            @foreach($features as $feature)
            <div class="col-lg-2 col-md-4">
                <div class="text-center wow fadeInUp" data-wow-delay="{{0.2 * $feature['id']}}s">
                    <div class="single-icon">
                        <i style="color: white !important" class="{{ $feature['icon'] }}" aria-hidden="true"></i>
                    </div>
                    <p style="color: white !important">{{ $feature['title'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>