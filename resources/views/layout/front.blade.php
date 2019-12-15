<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ config('setting-developer.direction') }}">
@include('common.front.header')
<body>
	@yield('content')
	@include('front.themes.' . config('setting-developer.theme') . '.scripts')
	@include('common.front.scripts')
</body>
</html>
