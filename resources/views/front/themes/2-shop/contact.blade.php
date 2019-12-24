<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h3>با پر کردن فرم زیر دمو رایگان منیو را استفاده کنید</h3>
                </div>
            </div>
            <div class="col-md-6 rtl-text-right">
                <div class="section-heading text-center mt-5">
                    <h5>تماس با ما</h5>
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
                <div class="contact_from rtl-text-right">
                    @if(false)
                    {!! form($shop_register_form) !!}
                    @endif
                    @if(true)
                     {!! form_start($shop_register_form) !!}
                    {!! form_row($shop_register_form->title) !!}
                    {!! form_row($shop_register_form->full_name) !!}
                    {!! form_row($shop_register_form->email) !!}
                    {!! form_row($shop_register_form->mobile) !!}
                    {!! form_row($shop_register_form->cover_image) !!}
                    
                    {!! form_row($shop_register_form->submit) !!}
                    @endif
                    @if(false)
                    <form action="{{ route('front.page.subscribe') }}" method="post" >
                        @csrf
                        <div class="contact_input_area" style="display: none !important;">
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
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</section>