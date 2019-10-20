<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('common.front.header')
<body>
	@yield('content')
	@include('front.themes.' . config("0-developer.theme") . '.scripts')
	@include('common.front.scripts')
</body>
</html>
