<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="en" dir="ltr">
@include('common.shop.header')
<body>
	@yield('content')
	@include('common.shop.scripts')
	@stack('scripts')
</body>
</html>
