@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/module/content2.css') }}">

<!-- <script src="{{ asset('js/module/content2/modernizr.custom.js') }}"></script> -->
@endpush

<div class="slideshow ltr text-white" id="slideshow">
	<ol class="slides">
		<li class="current">
			<div class="description">
				<h2 class="text-right rtl">{{ $constant['name'] }}</h2>
				<div class="seperate"></div>
				<p class="text-right rtl">{{ $constant['description'] }}</p>
			</div>
			<div class="tiltview row">
				<a href="#"><img src="images/module/3_mobile.jpg"/></a>
				<a href="#"><img src="images/module/4_mobile.jpg"/></a>
			</div>
		</li>
	</ol>
</div>

@push('initial-script')
<!-- <script src="{{ asset('js/module/content2/classie.js') }}"></script> -->
<!-- <script src="{{ asset('js/module/content2/tiltSlider.js') }}"></script> -->
<script>
	// new TiltSlider( document.getElementById('slideshow') );
</script>
@endpush