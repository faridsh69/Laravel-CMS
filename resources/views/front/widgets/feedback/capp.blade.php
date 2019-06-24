<section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="slider slider-for">
                    @php
                        $reviews = [
                            [
                                'author' => 'Farimah El',
                                'title' => '',
                                'content' => '“ The Synergy Team headed by Eric did a great job on our solar installation. They were very efficient and knowledgeable and Eric explained how everything works. Our Solar panels are up and producing electricity thanks to Synergy Power. ”',
                            ],
                            [
                                'author' => 'Farid Sh',
                                'title' => 'Chief Information Technology Officer',
                                'content' => '“ I love to work for this company, because of they are professional and always make their customers and employees happy! ”',
                            ],
                            [
                                'author' => 'Raj L.',
                                'title' => '#348 Customer',
                                'content' => '“ We are loving this every day lots of saving on our PG&E bill. Your customer service is excellent! ”',
                            ],
                            [
                                'author' => 'Eric',
                                'title' => 'Manager',
                                'content' => '“ Solar is here to stay and we want to share this awesome technology with the world! Not only does solar power save you money, it saves the environment from nasty fossil fuels. Go green today. ”',
                            ],
                            
                        ];
                    @endphp
                    @foreach($reviews as $review)
                    <div class="client-feedback-text text-center">
                        <div class="client">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <div class="client-description text-center">
                            <p>{{ $review['content'] }}</p>
                        </div>
                        <div class="star-icon text-center">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <div class="client-name text-center">
                            <h5>{{ $review['author'] }}</h5>
                            <p>{{ $review['title'] }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- Client Thumbnail Area -->
            <div class="col-12 col-md-6 col-lg-5">
                <div class="slider slider-nav">
                    <div class="client-thumbnail">
                        <img src="{{ asset('storage/files/shares/client3.jpg') }}" alt="customer review">
                    </div>
                    <div class="client-thumbnail">
                        <img src="{{ asset('storage/files/shares/client1.jpg') }}" alt="customer review">
                    </div>
                    <div class="client-thumbnail">
                        <img src="{{ asset('storage/files/shares/client2.jpg') }}" alt="customer review">
                    </div>
                    <div class="client-thumbnail">
                        <img src="{{ asset('storage/files/shares/client0.jpg') }}" alt="customer review">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Client Feedback Area End ***** -->