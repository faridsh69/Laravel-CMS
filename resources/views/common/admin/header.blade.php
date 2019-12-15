<head>
	@if(!config('setting-general.google_index'))
		<meta name="robots" content="noindex">
	@endif
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ $meta['title'] }}</title>
	<meta name="keywords" content="{{ $meta['keywords'] }}">
	<meta name="description" content="{{ $meta['description'] }}">
	<meta name="image" content="{{ $meta['image'] }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="farid shahidi">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<meta itemprop="name" content="{{ $meta['title'] }}">
	<meta itemprop="description" content="{{ $meta['description'] }}">
	<meta itemprop="image" content="{{ $meta['image'] }}">

	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:title" content="{{ $meta['title'] }}">
	<meta property="og:description" content="{{ $meta['description'] }}">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="en" />
	<meta property="og:locale:alternate" content="en" />
	<meta property="og:image" content="{{ $meta['image'] }}">
	<meta property="og:site_name" content="{{ url('/') }}">

	<meta property="twitter:card" content="summary">
	<meta property="twitter:site" content="{{ url()->current() }}">
	<meta property="twitter:title" content="{{ $meta['title'] }}">
	<meta property="twitter:description" content="{{ $meta['description'] }}">
	<meta property="twitter:creator" content="farid shahidi">
	<meta property="twitter:image" content="{{ $meta['image'] }}">
	<meta property="twitter:domain" content="{{ url('/') }}">

	<link rel="canonical" href="{{ url()->current() }}">
	<link rel="shortcut icon" href="{{ asset(config('setting-general.favicon')) }}" />

	<link href="{{ asset('css/admin/vendors.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin/style.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin/custome.css') }}" rel="stylesheet" />

	@stack('style')
</head>