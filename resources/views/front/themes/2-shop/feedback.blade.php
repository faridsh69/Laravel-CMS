<section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
    <div class="container">
        <div class="row justify-content-center text-center">
            @php
                $feedbacks = \App\Models\Feedback::active()->take(3)->get(); 
            @endphp
            @foreach($feedbacks as $feedback)
            <div class="col-sm-4">
                <img src="{{ $feedback->asset_image }}" alt="">
                <br><br>
                <i class="fa fa-quote-left" aria-hidden="true" style="color: gray; font-size: 30px"></i>
                {{ $feedback->description }}
                <br>
                <br>
                <div class="client-name text-center">
                    <h5> -- {{ $feedback->full_name }}</h5>
                    <p>{{ $feedback->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
