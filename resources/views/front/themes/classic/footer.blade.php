<footer class="footer-area">
    <div class="main-footer-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>{{ config('setting-general.app_title') }}</h6>
                        </div>
                        <p>{{ config('setting-general.default_meta_title') }}</p>
                        <div class="footer-social-info">
                            <a href="http://facebook.com/{{ config('setting-contact.facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="http://twitter.com/{{ config('setting-contact.twitter') }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="http://instagram.com/{{ config('setting-contact.instagram') }}" target="_blank"> <i class="active fa fa-instagram"></i></a>
                            <a href="http://google-plus.com/{{ config('setting-contact.google_plus') }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="http://skype.com/{{ config('setting-contact.skype') }}" target="_blank"><i class="fa fa-skype"></i></a>
                            <a href="http://github.com/{{ config('setting-contact.github') }}" target="_blank"><i class="fa fa-github"></i></a>
                            <a href="http://linkedin.com/{{ config('setting-contact.linkedin') }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>Usefull Links</h6>
                        </div>
                        <nav>
                            <ul class="useful-links">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Services &amp; Features</a></li>
                                <li><a href="#">Accordions and tabs</a></li>
                                <li><a href="#">Menu ideas</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>Gallery</h6>
                        </div>
                        <div class="gallery-list d-flex justify-content-between flex-wrap">
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery1.jpg') }}" class="gallery-img" title="Gallery Image 1"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery1.jpg') }}" alt=""></a>
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery2.jpg') }}" class="gallery-img" title="Gallery Image 2"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery2.jpg') }}" alt=""></a>
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery3.jpg') }}" class="gallery-img" title="Gallery Image 3"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery3.jpg') }}" alt=""></a>
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery4.jpg') }}" class="gallery-img" title="Gallery Image 4"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery4.jpg') }}" alt=""></a>
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery5.jpg') }}" class="gallery-img" title="Gallery Image 5"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery5.jpg') }}" alt=""></a>
                            <a href="{{ asset('images/front/themes/classic/img/bg-img/gallery6.jpg') }}" class="gallery-img" title="Gallery Image 6"><img src="{{ asset('images/front/themes/classic/img/bg-img/gallery6.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-sm-6">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>{{ __('Contact') }}</h6>
                        </div>
                        <div class="single-contact d-flex mb-30">
                            <i class="icon-placeholder"></i>
                            <p>{{ config('setting-contact.address') }}</p>
                        </div>
                        <div class="single-contact d-flex mb-30">
                            <i class="icon-telephone-1"></i>
                            <p>Main: {{ config('setting-contact.phone') }} <br>Office: {{ config('setting-contact.telephone') }}</p>
                        </div>
                        <div class="single-contact d-flex">
                            <i class="icon-contract"></i>
                            <p>{{ config('setting-contact.email') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://github.com/faridsh69" target="_blank">farid.sh69@gmail.com</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
</footer>