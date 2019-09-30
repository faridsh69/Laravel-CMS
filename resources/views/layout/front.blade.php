<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('common.front.header')
<body>
	@yield('content')
	@include('front.themes.' . config("0-developer.theme") . '.scripts')
	@include('common.front.scripts')
</body>
</html>
