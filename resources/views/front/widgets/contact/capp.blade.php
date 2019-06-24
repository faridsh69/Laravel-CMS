<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Get in touch with us!</h2>
                    <div class="line-shape"></div>
                </div>
                <div class="footer-text">
                    <p>Our Promise <br>
                        We hate spam and would never mishandle the information you share with us.  
                        Our mission is to help with your solar needs with quality, 
                        expert service and nothing more.
                    </p>
                </div>
                <div class="address-text">
                    <p><span>Address:</span>{{ config('0-contact.address') }}</p>
                </div>
                <div class="phone-text">
                    <p><span>Phone:</span>{{ config('0-contact.phone') }}</p>
                </div>
                <div class="email-text">
                    <p><span>Email:</span> {{ config('0-contact.email') }} </p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Start-->
                <div class="contact_from">
                    <form action="#" method="post">
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Your Message *" required></textarea>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <button type="submit" class="btn submit-btn">Send Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>