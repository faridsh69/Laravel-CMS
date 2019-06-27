<section class="special-area bg-white section_padding_100" style="margin-top: -200px;">
    <div class="special_description_area mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{ asset('css/front/capp/img/eric/icon1.jpg') }}" class="pull-right" alt="services">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>Solar Panel Installation</h2>
                        <p>We’re with you every step of the way, including system design, engineering, permitting, utility interconnection paperwork, installation, and ongoing off-site monitoring.</p>

                        <div class="app-download-area">
                            <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-android"></i>
                                    <p class="mb-0"><span>available on</span> Google Store</p>
                                </a>
                            </div>
                            <div class="app-download-btn wow fadeInDown" data-wow-delay="0.4s">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-apple"></i>
                                    <p class="mb-0"><span>available on</span> Apple Store</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separate"></div>
            <div class="row">
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>Solar Panel Maintenance</h2>
                        <p>Is your current solar system producing at maximum capacity? Maybe not. A few times a year, the panels should be inspected for any dirt or debris that may collect on them.</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{ asset('css/front/capp/img/eric/icon3.jpg') }}" class="pull-right alt="services">
                    </div>
                </div>
            </div>

            <div class="separate"></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{ asset('css/front/capp/img/eric/icon2.jpg') }}" alt="services">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>Panel Repairs & Add-Ons</h2>
                        <p>We provide warranty repairs to any solar system we have installed! If your system isn’t working as it should, call us immediately and we will fix the problem right away. We also provide add-ons!</p>

                        @include('front.widgets.form.' . config("0-developer.theme"))
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
