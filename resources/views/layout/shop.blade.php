<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="en" dir="ltr">
@include('common.front.shop.header')
<body>
	@yield('content')
	@include('common.front.shop.scripts')
	@stack('scripts')
</body>
</html>
