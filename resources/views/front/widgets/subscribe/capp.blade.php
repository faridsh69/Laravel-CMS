<!-- ***** CTA Area Start ***** -->
<section class="our-monthly-membership section_padding_50 clearfix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="membership-description">
                    <p>
                    {!! config('0-general.subscribe_description') !!}
                    </p>
                    <span class="display-none">
                        <p>Our Promise</p>
                        We hate spam and would never mishandle the information you share with us.  
                        Our mission is to help with your solar needs with quality, 
                        expert service and nothing more.
                    </span>
                    <span class="display-none">
                        <h2>It's Time to Go Green</h2>
                        <p>Let 2019 be the year you invest in solar, saving you money on your energy bill, which helps you and helps the planet. Learn about the benefits of solar.</p>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                @include('front.widgets.form.' . config("0-developer.theme"))
                <!-- <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                    <a href="{{ route('front.page.index', 'benefits-of-solar') }}">Learn More</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- ***** CTA Area End ***** -->