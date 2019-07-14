<!-- ***** Special Area Start ***** -->
<section class="special-area bg-white" style="padding-top: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading Area -->
                <div class="section-heading text-center">
                    <h2>Why Is It Special</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        @php
            $features = [
                [
                    'id' => 1,
                    'title' => 'Call the Best!',
                    'icon' => 'ti-mobile',
                    'description' => 'Serving the Bay Area for 14 years!',
                ],
                [
                    'id' => 2,
                    'title' => 'Earn $400',
                    'icon' => 'ti-money',
                    'description' => 'When You Refer Another Customer!',
                ],
                [
                    'id' => 3,
                    'title' => 'Call Today',
                    'icon' => 'ti-settings',
                    'description' => 'To Get Tax Rebates Before It’s Too Late!',
                ],
            ];

            $features = \App\Models\Feature::active()->get();
        @endphp
        <div class="row">
            @foreach($features as $feature)
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="{{0.2 * $feature['id']}}s">
                    <div class="single-icon">
                        <i class="{{ $feature['icon'] }}" aria-hidden="true"></i>
                    </div>
                    <h4>{{ $feature['title'] }} </h4>
                    <p>{{ $feature['description'] }} </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>