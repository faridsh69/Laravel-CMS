$(document).ready(function(){
	$('#new-product-slider').owlCarousel({
	    rtl:true,
	    margin:20,
	    autoWidth:true,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:5000,
	    autoplaySpeed:3000,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#discount-product-slider').owlCarousel({
	    rtl:true,
	    margin:20,
	    autoWidth:true,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:6000,
	    autoplaySpeed:1300,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#special-product-slider').owlCarousel({
	    rtl:true,
	    margin:20,
	    autoWidth:true,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:6000,
	    autoplaySpeed:1300,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#right-slider').owlCarousel({
	    rtl:true,
	    items:1,
	    // autoWidth:true,
	    // margin:20,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:2400,
	    autoplaySpeed:1600,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#left-slider').owlCarousel({
	    rtl:true,
	    items:1,
	    // autoWidth:true,
	    // margin:20,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:4000,
	    autoplaySpeed:1900,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#news-slider').owlCarousel({
	    rtl:true,
	    items:2,
	    // autoWidth:true,
	    // margin:20,
	    lazyLoad:true,
	    autoplay:true,
	    autoplayTimeout:4000,
	    autoplaySpeed:1900,
	    autoplayHoverPause:true,
	    loop:true,
	});
	$('#brand-slider').owlCarousel({
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