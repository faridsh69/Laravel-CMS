<section class="ftco-section ftco-properties" id="properties-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
          	<div class="col-md-12 heading-section text-center ftco-animate">
            	<h2 class="mb-4">Our Services</h2>
          	</div>
        </div>
		<div class="row">
        	<div class="col-md-12">
	            <div class="carousel-properties owl-carousel">
	            	@foreach(\App\Models\Service::active()->get() as $service)
	            	<div class="item">
	            		<div class="properties ftco-animate">
	    					<div class="img">
			    				<img src="{{ $service->asset_image }}" class="img-fluid" alt="{{$service->title}}">
		    				</div>
		    				<div class="desc">
		    					<div class="text bg-primary d-flex text-center align-items-center justify-content-center">
			    					<span>Sale</span>
			    				</div>
		    					<div class="d-flex pt-5">
			    					<div>
				    					<h3><a href="properties.html">{{$service->title}}</a></h3>
									</div>
									<!-- <div class="pl-md-4">
										<h4 class="price">$120,000</h4>
									</div> -->
								</div>
								<!-- <p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p> -->
		    				</div>
	    				</div>
	            	</div>
	            	@endforeach
            	</div>
          	</div>
        </div>
	</div>
</section>