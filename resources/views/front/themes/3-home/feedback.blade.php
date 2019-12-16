<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center pb-3">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
      	<span class="subheading">Read testimonials</span>
        <h2 class="mb-4">What Client Says</h2>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          @php
              $feedbacks = \App\Models\Feedback::active()->get(); 
          @endphp
          @foreach($feedbacks as $feedback)
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img" style="background-image: url({{ $feedback->asset_image }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text px-4 pb-5">
                <p class="mb-4">{{ $feedback->content }}</p>
                <p class="name">{{ $feedback->full_name }}</p>
                <span class="position">{{ $feedback->title }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
