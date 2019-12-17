@php
    $slider = \App\Models\Slider::where('id', 2)->first();
@endphp
<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters d-flex">
			<div class="col-md-6 col-lg-5 d-flex">
				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url({{ $slider->asset_image }});">
				</div>
			</div>
			<div class="col-md-6 col-lg-7 px-lg-5 py-md-5">
				<div class="py-md-5">
    				<div class="row justify-content-start pb-3">
			          	<div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
				            <h2 class="mb-4">{{ $slider->title }}</h2>
				            <p>{{ $slider->description }}</p>
				            <p>
				            	<a href="{{ config('setting-general.android_application_url') }}" class="btn btn-primary py-3 px-4">ANDROID</a> 
				            	<a href="{{ config('setting-general.ios_application_url') }}" class="btn btn-secondary py-3 px-4">IOS</a>
				            </p>
			          	</div>
		        	</div>
	        	</div>
        	</div>
    	</div>
	</div>
</section>