<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 rtl-text-right">
                <div class="section-heading">
                    <h2>{{ __('contact_title') }}</h2>
                </div>
                <div class="footer-text" style="display: none;">
                    <p class="text-center">
                    {!! config('setting-general.contact_us_description') !!}
                    </p>
                </div>
                <div class="address-text">
                    <p><span>{{ __('address') }}</span><br>{{ config('setting-contact.address') }}</p>
                </div>
                <div class="phone-text">
                    <p><span>{{ __('phone') }}</span><br>{{ config('setting-contact.phone') }}</p>
                </div>
                <div class="email-text">
                    <p><span>{{ __('email') }}</span><br>{{ config('setting-contact.email') }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact_from">
                    <form action="{{ route('front.page.subscribe') }}" method="post">
                        @csrf
                        <div class="contact_input_area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="email" placeholder="{{ __('phone') }}" required>
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