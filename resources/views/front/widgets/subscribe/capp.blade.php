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
                    @push('scripts')

    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 

    <script async custom-element="amp-call-tracking" src="https://cdn.ampproject.org/v0/amp-call-tracking-0.1.js"></script>

<!-- Hotjar Tracking Code for http://www.synergypower.ir/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1405862,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

    @endpush

                <!-- <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                    <a href="{{ route('front.page.index', 'benefits-of-solar') }}">Learn More</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<img src="{{ asset('css/front/capp/img/bg-img/arm.jpg') }}" style="width: 100%" alt="logo">
<!-- ***** CTA Area End ***** -->