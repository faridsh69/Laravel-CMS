<section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="slider slider-for">
                    @php
                        $feedbacks = \App\Models\Feedback::get(); 
                    @endphp
                    @foreach($feedbacks as $feedback)
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>{{ $feedback->content }}</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>{{ $feedback->full_name }}</h5>
                            <p>{{ $feedback->title }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Client Thumbnail Area -->
            <div class="col-12 col-md-6 col-lg-5">
                <div class="slider slider-nav">
                    @foreach($feedbacks as $feedback)
                    <div class="client-thumbnail">
                        <img src="{{ asset($feedback->image) }}" alt="customer feedback">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Client Feedback Area End ***** -->