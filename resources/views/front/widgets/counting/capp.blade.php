<!-- ***** Cool Facts Area Start ***** -->
<section class="cool_facts_area clearfix">
    <div class="container">
        <div class="row">
            @php
            $items = [
                [
                    'number' => 7269600,
                    'title' => 'Money Saved Overall',
                    'icon' => 'ion-happy-outline',
                ],
                [
                    'number' => 345,
                    'title' => 'Customers Served',
                    'icon' => 'ion-person',
                ],
                [
                    'number' => 2662,
                    'title' => 'Solar Panels Installed',
                    'icon' => 'ion-arrow-down-a',
                ],
                [
                    'number' => 36.35,
                    'title' => 'Energy Produced (GWh)',
                    'icon' => 'ion-ios-star-outline',
                ],
            ];
            @endphp
            @foreach($items as $item)
            <div class="col-12 col-md-3 col-lg-3">
                <div class="single-cool-fact justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cool-facts-content">
                        <i class="{{ $item['icon'] }}"></i>
                        <p style="display: inline-block; margin-left: 5px">{{ $item['title'] }}</p>
                    </div>
                    <br>
                    <div class="counter-area">
                        <h3><span class="counter">{{ $item['number'] }}</span></h3>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-12 col-md-6 col-lg-6">
                <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="counter-area">
                        <h3><span class="counter">7,269,600</span></h3>
                    </div>
                    <div class="cool-facts-content">
                        <i class="ion-happy-outline"></i>
                        <p>Money Saved <br> Overall</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                    <div class="counter-area">
                        <h3><span class="counter">40</span></h3>
                    </div>
                    <div class="cool-facts-content">
                        <i class="ion-person"></i>
                        <p>ACTIVE <br>ACCOUNTS</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.8s">
                    <div class="counter-area">
                        <h3><span class="counter">10</span></h3>
                    </div>
                    <div class="cool-facts-content">
                        <i class="ion-ios-star-outline"></i>
                        <p>TOTAL <br>APP RATES</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- ***** Cool Facts Area End ***** -->
