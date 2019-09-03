<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta name="robots" content="noindex">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>
	
	<link rel="shortcut icon" href="{{ asset(config('0-general.favicon')) }}" />
	@include('front.widgets.styles.' . config('0-developer.theme'))
	@include('common.front.styles')
	@stack('style')
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#">دلتا پایپ</a>
		</div>
		<ul class="nav navbar-nav">
		<li class="active"><a href="/">خانه</a></li>
		<li><a href="#">گرید بندی شرکت ها</a></li>
		<li><a href="#">حمل و نقل کالا</a></li>
		<li><a href="#">مزایده</a></li>
		<li><a href="#">مناقصه</a></li>
		<li><a href="/pipe/bazresi">بازرسی کالا</a></li>
		<li><a href="#">درباره ما</a></li>
		<li><a href="#">تماس با ما</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-left">
		<li><a href="/pipe/register"><span class="glyphicon glyphicon-user"></span> ثبت نام</a></li>
		<li><a href="/pipe/register"><span class="glyphicon glyphicon-log-in"></span> ورود</a></li>
		</ul>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
	<!-- Footer -->
<footer class=" text-center" style="background-color:black; color: #fff !important; font-size: 24px!important; padding: 64px;margin-top: 50px">
  <a href="#" style="color: #fff !important;padding: 5px"><i class="fa fa-facebook-official"></i></a>
  <a href="#" style="color: #fff !important;padding: 5px"><i class="fa fa-pinterest-p"></i></a>
  <a href="#" style="color: #fff !important;padding: 5px"><i class="fa fa-twitter"></i></a>
  <a href="#" style="color: #fff !important;padding: 5px"><i class="fa fa-flickr"></i></a>
  <a href="#" style="color: #fff !important;padding: 5px"><i class="fa fa-linkedin"></i></a>
  <p class="w3-medium">
  Powered by <a href="/pipe" target="_blank">Delta Pipe</a>
  </p>
</footer>

	@include('front.widgets.scripts.' . config('0-developer.theme'))
	@include('common.front.scripts')
</body>
</html>
