<section class="cool_facts_area clearfix">
    <div class="container">
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