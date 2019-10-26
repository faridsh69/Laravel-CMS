<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 rtl-text-right">
                <div class="section-heading">
                    <h2>{{ __('contact_title') }}</h2>
                    <div class="line-shape"></div>
                </div>
                <div class="footer-text">
                    <p>
                    {!! config('0-general.contact_us_description') !!}
                    </p>
                </div>
                <div class="address-text">
                    <p><span>{{ __('address') }}:</span>{{ config('0-contact.address') }}</p>
                </div>
                <div class="phone-text">
                    <p><span>{{ __('phone') }}:</span>{{ config('0-contact.phone') }}</p>
                </div>
                <div class="email-text">
                    <p><span>{{ __('email') }}:</span>{{ config('0-contact.email') }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact_from">
                    <form action="#" method="post">
                        <div class="contact_input_area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="{{ __('message') }}" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn submit-btn">{{ __('send') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>