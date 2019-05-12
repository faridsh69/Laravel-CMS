<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="farid shahidi">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>
	<meta name="keywords" content="@yield('keywords')">
	<meta name="description" content="@yield('description')">
	
	<meta itemprop="name" content="@yield('title')">
	<meta itemprop="description" content="@yield('description')">
	<meta itemprop="image" content="@yield('image')">

	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:title" content="@yield('title')">
	<meta property="og:description" content="@yield('description')">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="en" />
	<meta property="og:locale:alternate" content="en" />
	<meta property="og:image" content="@yield('image')">
	<meta property="og:site_name" content="{{ url('/') }}">

	<meta property="twitter:card" content="summary">
	<meta property="twitter:site" content="{{ url()->current() }}">
	<meta property="twitter:title" content="@yield('title')">
	<meta property="twitter:description" content="@yield('description')">
	<meta property="twitter:creator" content="farid shahidi">
	<meta property="twitter:image" content="@yield('image')">
	<meta property="twitter:domain" content="{{ url('/') }}">

	<link rel="canonical" href="{{ url()->current() }}">

	<!--begin::Web font -->
	<script src="{{ Cdn::asset('js/webfontloader.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
    <!--begin::Base Styles -->
	<link href="{{ Cdn::asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ Cdn::asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link href="{{ Cdn::asset('css/custome.css') }}" rel="stylesheet" type="text/css" />

	<link rel="shortcut icon" href="{{ Cdn::asset('upload/images/favicon.png') }}" />
	@stack('style')
</head>