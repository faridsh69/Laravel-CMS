$(document).ready(function(){
	timetochange = 3000;
	function changeSystem() {
		setTimeout(function(){ 
			$('.header .system-demo .device').addClass('change');
			$('.header .system-demo .plate').addClass('change');
			setTimeout(function(){ $('.header .system-demo .device').css("background-image","url(" + assetUrl + "'iPhone.png')").removeClass('change'); },1200);
			setTimeout(function(){ $('.header .system-demo .plate').css("background-image","url(" + assetUrl + "'image02.png')").removeClass('change'); },1200);
			setTimeout(function(){ changeSystem2(); },timetochange);
		}, timetochange);
	}
	function changeSystem2() {
		setTimeout(function(){
			$('.header .system-demo .device').addClass('change');
			$('.header .system-demo .plate').addClass('change');
			setTimeout(function(){ $('.header .system-demo .device').css("background-image","url(" + assetUrl + "'iPad.png')").removeClass('change'); },1200);
			setTimeout(function(){ $('.header .system-demo .plate').css("background-image","url(" + assetUrl + "'image01.png')").removeClass('change'); },1200);
			setTimeout(function(){ changeSystem(); },timetochange);
		}, timetochange);
	}
	changeSystem();
					
	$(document).on('scroll', function() {
		if($(this).scrollTop() >= $('.intro-video').position().top - $('.intro-video').height()/2 && $(this).scrollTop() <= $('.intro-video').position().top + $('.intro-video').height()/2){
			$(".intro-video video").get(0).play();
		}
		else {
			$(".intro-video video").get(0).pause();
		}
	});
	
	function detectmob() { 
	 if( navigator.userAgent.match(/Android/i)
	 || navigator.userAgent.match(/webOS/i)
	 || navigator.userAgent.match(/iPhone/i)
	 || navigator.userAgent.match(/iPad/i)
	 || navigator.userAgent.match(/iPod/i)
	 || navigator.userAgent.match(/BlackBerry/i)
	 || navigator.userAgent.match(/Windows Phone/i)
	 ){
		return true;
	  }
	 else {
		return false;
	  }
	}
	
	if ( detectmob() ) {
		$('.header, .header .menubox').height($(window).height());
	}
	
	window.addEventListener('resize', () => {
		if ( detectmob() ) {
			$('.header, .header .menubox').height($(window).height());
		}
	});
	
	if ( $(".intro-video").css('display') == 'none') {
		$(".intro-video").remove();
	}
	
	$('.navigation #whatismenew').click(function () {
		$('.header #hamburgermenu').trigger('click');
		$('html, body').animate({
			scrollTop: $(".intro-video").offset().top
		}, 1000);
	});
	
	$('.navigation #features').click(function () {
		$('.header #hamburgermenu').trigger('click');
		$('html, body').animate({
			scrollTop: $(".features-box").offset().top
		}, 1000);
	});
	
	$('.header .learnmore').click(function () {
		if($('.intro-video').length){
			$('html, body').animate({
				scrollTop: $(".intro-video").offset().top
			}, 1000);
		} else {
			$('html, body').animate({
				scrollTop: $(".features-box").offset().top
			}, 1000);
		}
	});
	
	$('.navigation #contactus').click(function () {
		$('.header #hamburgermenu').trigger('click');
		$('html, body').animate({
			scrollTop: $(".contactsection").offset().top
		}, 1000);
	});
	
	$('#hamburgermenu').click(function () {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
			$('.header .menubox').removeClass('active');
			$('.header .system-demo').removeClass('deactive');
			$('.header .learnmore').removeClass('deactive');
			$('.header .menubox .navigation').removeClass('active');
			$('.header .menubox .langswitch').removeClass('active');
		} else {
			$(this).addClass('active');
			$('.header .menubox').addClass('active');
			$('.header .system-demo').addClass('deactive');
			$('.header .learnmore').addClass('deactive');
			$('.header .menubox .navigation').addClass('active');
			$('.header .menubox .langswitch').addClass('active');
		}
	});

    var movementStrength = 15;
	var height = movementStrength / $(window).height();
	var width = movementStrength / $(window).width();
	$(".header").mousemove(function(e){
		var pageX = e.pageX - ($(window).width() / 2);
		var pageY = e.pageY - ($(window).height() / 2);
		var newvalueX = width * pageX * -1 - 25;
		var newvalueY = height * pageY * -1 - 50;
		$('.system-demo').css("right", newvalueX + "px");
		$('.system-demo').css("top", newvalueY+50 + "px");
	});
	
	$(".features-box").mousemove(function(e){
		var pageX = e.pageX - ($(window).width() / 2);
		var pageY = e.pageY - ($(window).height() / 2);
		var newvalueX = width * pageX * -1 - 25;
		var newvalueY = height * pageY * -1 - 50;
		$('.features-box .feature#newmenu').css("background-position", "calc(14% - " + newvalueY + "px) " + "calc(50% - " + newvalueX + "px");
	});
	
	$(".features-box").mousemove(function(e){
		var pageX = e.pageX - ($(window).width() / 2);
		var pageY = e.pageY - ($(window).height() / 2);
		var newvalueX = width * pageX * -1 - 25;
		var newvalueY = height * pageY * -1 - 50;
		$('.features-box .feature#ucontent').css("background-position", "calc(100% - " + newvalueX + "px) " + "calc(10% - " + newvalueY + "px");
	});
	
		if ($(".contactbox .inputer input").val()) {
			$(this).addClass('shrink');
			$(this).parent().find('.placeholder').addClass('shrink');
		}
	
		if ($(".contactbox .inputer textarea").val()) {
			$(this).addClass('shrink');
			$(this).parent().find('.placeholder').addClass('shrink');
		}
		
	$(".contactbox .inputer input, .contactbox .inputer textarea").filter(function () {
		return ($(this).val())
	}).parent().find('.placeholder').addClass('shrink');
	
	$(".contactbox .inputer input").focus(function() {
		$(this).addClass('shrink');
		$(this).parent().find('.placeholder').addClass('shrink');
	});
	
	$(".contactbox .inputer input").focusout(function() {
		$(this).removeClass('shrink');
		if(!$(this).val())
			$(this).parent().find('.placeholder').removeClass('shrink');
	});
	
	$(".contactbox .inputer textarea").focus(function() {
		$(this).addClass('shrink');
		$(this).parent().find('.placeholder').addClass('shrink');
	});
	
	$(".contactbox .inputer textarea").focusout(function() {
		$(this).removeClass('shrink');
		if(!$(this).val())
			$(this).parent().find('.placeholder').removeClass('shrink');
	});
	
	
});







$(function() {
	$("#contactform #sendbtn").click(function() {
		var name = $("#contactform #name").val();
		var subject = $("#contactform #subject").val();
		var email = $("#contactform #email").val();
		var phone = $("#contactform #phone").val();
		var message = $("#contactform #message").val();
		if (name == "") {
			$("#contactform .errorbox").addClass('show').html('Name field is required!');
			$("#contactform #name").focus();
			return false;
		}
		if (subject == "") {
			$("#contactform .errorbox").addClass('show').html('Subject field is required!');
			$("#contactform #subject").focus();
			return false;
		}
		$("#contactform .errorbox").removeClass('show');
		var dataString = 'name='+ name + '&subject=' + subject + '&email=' + email + '&phone=' + phone + '&message=' + message;
		$(".layerpopup").addClass('show');
		$(".msgpopup").addClass('show').html("<img src='images/icons/loading.gif' />");
		$.ajax({
		  type: "POST",
		  url: "sendmail.php",
		  data: dataString,
		  success: function() {
			$('.msgpopup').html("Contact Form Submitted!");
			setTimeout(function() {
                $(".layerpopup").removeClass('show');
                $(".msgpopup").removeClass('show');
            }, 2000);
			
		  }
		});
		return false;
	});
});


