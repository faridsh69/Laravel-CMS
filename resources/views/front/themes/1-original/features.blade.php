<section class="special-area bg-white" style="padding-top: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>{{ __('features title') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $features = \App\Models\Feature::active()->get();
            @endphp
            @foreach($features as $feature)
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="{{0.2 * $feature['id']}}s">
                    <div class="single-icon">
                        <i class="{{ $feature['icon'] }}" aria-hidden="true"></i>
                    </div>
                    <h4>{{ $feature['title'] }}</h4>
                    <p>{{ $feature['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>