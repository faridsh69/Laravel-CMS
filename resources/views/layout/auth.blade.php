<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="robots" content="noindex">
		@if(!config('0-general.google_index'))
			<meta name="robots" content="noindex">
		@endif
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="farid shahidi">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Login To Dashboard</title>
		<meta name="description" content="admin login page">

		<link rel="canonical" href="{{ url()->current() }}">

	    <!--begin::Base Styles -->
		<link href="{{ asset('css/admin/vendors.bundle.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/admin/style.bundle.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="{{ asset('css/admin/custome.css') }}" rel="stylesheet" />
		<!--end::Base Styles -->
		
		<link rel="shortcut icon" href="{{ asset(config('0-general.favicon')) }}" />
	</head>
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						@yield('content')
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url({{ asset('images/admin/login-backgournd.jpg') }} )">
					<div class="m-grid__item m-grid__item--middle">
						<h3 class="m-login__welcome">
							{{ __('Join Our Community') }}
						</h3>
						<p class="m-login__msg">
							{{ __('This is a usefull website for you') }}
							<br>
							
						</p>
					</div>
				</div>
			</div>
		</div>
		@include('common.admin.scripts')
		@stack('scripts')
	<!-- <script src="{{ asset('js/admin/login.js') }}"></script> -->
	</body>
	<!-- end::Body -->
</html>
