<div class="seperate"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="owl-carousel" id="brand-slider2">
        	@foreach([1,2,3,4,5,6] as $brand)
        	<div class="box-small heigh-auto">
				<img src="" alt="">
				<div class="seperate"></div>
				<p>
					title
				</p>
			</div>
			@endforeach
        </div>
    </div>
</div>
<div class="seperate"></div>

@push('script')
<script>
	$(document).ready(function(){
	    $('#brand-slider2').owlCarousel({
		    rtl:true,
		    items:4,
		    // autoWidth:true,
		    // margin:20,
		    lazyLoad:true,
		    autoplay:true,
		    autoplayTimeout:2000,
		    autoplaySpeed:1000,
		    autoplayHoverPause:true,
		    loop:true,
		});
    });
</script>
@endpush