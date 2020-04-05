<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ config('setting-developer.direction') ? 'ltr' : 'rtl' }}">
<head>
	@include('front.common.header')
	@include('front.common.styles')
</head>
<body>
	@yield('content')
	@include('front.common.scripts')
</body>
</html>
