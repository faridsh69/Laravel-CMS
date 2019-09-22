@include('front.widgets.styles.' . config('0-developer.theme'))
@if( env('APP_NAME') === 'eric' )
<link rel="stylesheet" href="{{ asset('css/front/custome/eric.css') }}">
<style>
	.wellcome-heading p{
		font-size: 28px;
		font-weight: bold;
	}
</style>
@endif
@stack('style')