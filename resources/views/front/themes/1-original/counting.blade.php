<section class="cool_facts_area clearfix">
    <div class="container">
        <div class="row">
            @php
                $countings = \App\Models\Counting::active()->get(); 
            @endphp
            @foreach($countings as $counting)
            <div class="col-12 col-md-3 col-lg-3">
                <div class="single-cool-fact justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cool-facts-content">
                        <i class="{{ $counting['icon'] }}"></i>
                        <p style="display: inline-block; margin-left: 5px">{{ $counting['title'] }}</p>
                    </div>
                    <br>
                    <div class="counter-area">
                        <h3><span class="counter">{{ $counting['number'] }}</span></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
