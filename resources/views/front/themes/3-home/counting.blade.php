@php
    $slider = \App\Models\Slider::where('id', 3)->first();
@endphp
<section class="ftco-intro img" id="hotel-section" style="background-image: url({{ $slider->->asset_image }});">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-7">
				<h2 class="mb-4">{{ $slider->title }}</h2>
				<p>{{ $slider->description }}</p>
				<p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Advance Search</a></p>
			</div>
		</div>
	</div>
</section>