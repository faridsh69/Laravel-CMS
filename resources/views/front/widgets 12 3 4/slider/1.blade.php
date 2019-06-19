<div class="owl-carousel" id="right-slider">
	@foreach([1,2,3] as $baner)
    <div class="text-center">
		<div>
			<h4 class="slider-title">
				title
			</h4>
			<img src="/" alt="title"  class="baner-index">
			<h4>
				<small>
					description
				</small>
			</h4>
		</div>
	</div>
	@endforeach
</div>

@push('script')
<script>
	$(document).ready(function(){
		$('#right-slider').owlCarousel({
	        rtl:true,
	        items:1,
	        // autoWidth:true,
	        // margin:20,
	        lazyLoad:true,
	        autoplay:true,
	        autoplayTimeout:6000,
	        autoplaySpeed:1900,
	        autoplayHoverPause:true,
	        loop:true,
	    });
    });
</script>
@endpush