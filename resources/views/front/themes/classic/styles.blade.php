@if(config('app.locale') === 'fa')
<link href="{{ asset('/css/front/themes/classic/css/locale/fa.css') }}" rel="stylesheet">
@endif
@stack('style')

<style>
	.elements-title{
		margin-top: 50px;
		text-align: center;
	}
	.partner-area{
		margin-top: 50px;
	}
	.teachers-area{
		margin-top: 50px;
	}
	.logo{
		max-height: 70px;
	}
	.display-none{
		display: none;
	}
	.fixed-social-media{
		position: fixed;
		left: 0px;
		bottom: 0px;
		z-index: 99;
	}
	.fixed-social-media img{
		width: 35px;
		margin: 5px;
	}
</style>