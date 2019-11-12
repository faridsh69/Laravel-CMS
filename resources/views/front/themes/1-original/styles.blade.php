<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/app.css') }}">

@if(config('app.locale') === 'fa')
<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/locale-fa.css') }}">
@endif
<style>
	.wellcome-heading h3{
		overflow: hidden;
		white-space: nowrap;
		width: 100%; 
		opacity: 0.16;
	}
	.header_area.sticky{
		background-color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.get-start-area .submit{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.special_description_content h2{
		color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.section-heading h2{
		color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.single-special h4{
		color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.footer-text h2{
		color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.client-name h5{
		color: {{ config('0-developer.theme_color_1') }} !important;
	}
	.get-start-area{
		margin-top: 60px;
	}
	.single-icon>i{
		color: {{ config('0-developer.theme_color_2') }};
	}
	.cool_facts_area{
		background: linear-gradient(to left, 
			{{ config('0-developer.theme_color_1') }}, 
			{{ config('0-developer.theme_color_2') }})
	}
	.our-monthly-membership{
		background: linear-gradient(to left, 
			{{ config('0-developer.theme_color_1') }}, 
			{{ config('0-developer.theme_color_2') }});
	}
	.video-area .video-play-btn a{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.line-shape-white, .line-shape{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.btn.submit-btn{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	#scrollUp{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.footer-social-icon>a>i{
		background-color: {{ config('0-developer.theme_color_1') }};
	}
	.footer-social-icon>a>i:hover{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.footer-social-icon>a .active{
		background-color: {{ config('0-developer.theme_color_2') }};
	}
	.clients-feedback-area .client>i{
		color: {{ config('0-developer.theme_color_1') }};
	}
	.clients-feedback-area .slick-dots li.slick-active button{
		background-color: {{ config('0-developer.theme_color_2') }};
		border-color: {{ config('0-developer.theme_color_2') }};
	}
	.single-team-member{
		border: 1px solid #ddd;
		box-shadow: 0px 0px 15px rgba(200,200,200, 0.7);
		padding: 20px;
		min-height: 220px;
		text-align: center;
	}
	.member-image img{
		height: 100px;
		max-width: 100%;
	}
</style>