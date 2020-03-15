<section class="contact-area mt-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                <div class="section-heading text-left">
                                    <h3>{{ __('Contact Us') }}</h3>
                                    <p class="mt-30"></p>
                                </div>

                                <div class="contact-social-info d-flex mb-30">
                                    <a target="_blank" href="http://facebook.com/{{ config('setting-contact.facebook') }}"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="http://twitter.com/{{ config('setting-contact.twitter') }}"><i class="fa fa-twitter"></i></a>
                                    <a target="_blank" href="http://instagram.com/{{ config('setting-contact.instagram') }}"><i class="fa fa-instagram"></i></a>
                                    <a target="_blank" href="http://google-plus.com/{{ config('setting-contact.google_plus') }}"><i class="fa fa-google-plus"></i></a>
                                    <a target="_blank" href="http://skype.com/{{ config('setting-contact.skype') }}"><i class="fa fa-skype"></i></a>
                                    <a target="_blank" href="http://telegram.com/{{ config('setting-contact.telegram') }}"><i class="fa fa-telegram"></i></a>
                                    <a target="_blank" href="http://linkedin.com/{{ config('setting-contact.linkedin') }}"><i class="fa fa-linkedin"></i></a>
                                    <a target="_blank" href="http://github.com/{{ config('setting-contact.github') }}"><i class="fa fa-github"></i></a>
                                    <a target="_blank" href="http://stackoverflow.com/{{ config('setting-contact.stackoverflow') }}"><i class="fa fa-stackoverflow"></i></a>
                                </div>

                                @if( config('setting-contact.address') )
                                <div class="single-contact-info d-flex">
                                    <div class="contact-icon mr-15">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <p>{{ config('setting-contact.address') }}</p>
                                </div>
                                @endif

                                <div class="single-contact-info d-flex">
                                    <div class="contact-icon mr-15">
                                        <i class="icon-telephone-1"></i>
                                    </div>
                                    <p>
                                        Phone: {{ config('setting-contact.phone') }} 
                                        <br> 
                                        @if( config('setting-contact.telephone') )
                                            Office: {{ config('setting-contact.telephone') }}
                                        @endif
                                        @if( config('setting-contact.fax') )
                                            <br>
                                            Fax: {{ config('setting-contact.fax') }}
                                        @endif
                                    </p>
                                </div>

                                <div class="single-contact-info d-flex">
                                    <div class="contact-icon mr-15">
                                        <i class="icon-contract"></i>
                                    </div>
                                    <p>{{ config('setting-contact.email') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                <form action="{{ route('front.page.submit-form', 1) }}" method="post">
                                    @csrf
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Message"></textarea>
                                    <button class="btn academy-btn mt-30" type="submit">Contact Us</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>