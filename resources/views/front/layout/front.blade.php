<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ config('setting-developer.direction') ? 'ltr' : 'rtl' }}">
<head>
	@include('common.front.header')
	@include('common.front.styles')
</head>
<body>
	@yield('content')
	@include('common.front.scripts')
</body>
</html>
