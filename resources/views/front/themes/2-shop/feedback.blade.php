<section class="clients-feedback-area clearfix" id="testimonials" >
    <div class="container bg-white" style="margin-top: -80px; padding-top: 30px;">
        <div class="row justify-content-center text-center">
            @php
                $feedbacks = \App\Models\Feedback::active()->take(3)->get(); 
            @endphp
            @foreach($feedbacks as $feedback)
            <div class="col-sm-4">
                <img src="{{ $feedback->asset_image }}" alt="feedback" style="height: 170px;">
                <br><br>
                <p class="rtl-text-right">
                    <i class="fa fa-quote-right" aria-hidden="true" style="color: gray; font-size: 30px;"></i>
                    {{ $feedback->description }}
                </p>
                <br>
                <br>
                <div class="client-name text-center">
                    <h5 style="color: #41434e !important; font-size: 17px;"> - {{ $feedback->full_name }}</h5>
                    <p>{{ $feedback->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
