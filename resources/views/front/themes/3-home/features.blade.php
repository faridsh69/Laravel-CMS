<section class="ftco-section ftco-services-2 bg-light" id="services-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Why Is It Special</h2>
          </div>
        </div>
        <div class="row">
          @php
              $features = \App\Models\Feature::active()->get();
          @endphp
          @foreach($features as $feature)
        	<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex">
                <span class="flaticon-pin"></span>
                <i class="{{ $feature['icon'] }}" aria-hidden="true"></i>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">{{ $feature['title'] }}</h3>
                <p>{{ $feature['description'] }}</p>
              </div>
            </div>      
          </div>  
          @endforeach   
        </div>
			</div>
		</section>