<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/app.css') }}">

@if(config('app.locale') === 'fa')
<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/locale-fa.css') }}">
@endif
<style>
	.wellcome_area{
		height: 750px;
	}
	.wellcome-heading h3{
		overflow: hidden;
		white-space: nowrap;
		width: 100%; 
		opacity: 0.16;
	}
	.header_area.sticky{
		background-color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.get-start-area .submit{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.get-start-area .form-control{
		box-shadow: 0px 0px 3px {{ config('setting-developer.theme_color_2') }} !important;
	}
	.special_description_content h2{
		color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.section-heading h2{
		color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.single-special h4{
		color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.footer-text h2{
		color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.client-name h5{
		color: {{ config('setting-developer.theme_color_1') }} !important;
	}
	.get-start-area{
		margin-top: 60px;
	}
	.single-icon>i{
		color: {{ config('setting-developer.theme_color_2') }};
	}
	.cool_facts_area{
		background: linear-gradient(to left, 
			{{ config('setting-developer.theme_color_1') }}, 
			{{ config('setting-developer.theme_color_2') }})
	}
	.our-monthly-membership{
		background: linear-gradient(to left, 
			{{ config('setting-developer.theme_color_1') }}, 
			{{ config('setting-developer.theme_color_2') }});
	}
	.video-area .video-play-btn a{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.line-shape-white, .line-shape{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.btn.submit-btn{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	#scrollUp{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.footer-social-icon>a>i{
		background-color: {{ config('setting-developer.theme_color_1') }};
	}
	.footer-social-icon>a>i:hover{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.footer-social-icon>a .active{
		background-color: {{ config('setting-developer.theme_color_2') }};
	}
	.clients-feedback-area .client>i{
		color: {{ config('setting-developer.theme_color_1') }};
	}
	.clients-feedback-area .slick-dots li.slick-active button{
		background-color: {{ config('setting-developer.theme_color_2') }};
		border-color: {{ config('setting-developer.theme_color_2') }};
	}
	.single-team-member{
		height: 390px;
		background-color: #fff;
    	box-shadow: 0 0 15px 0 rgba(0,0,0,.3);
    	border-radius: 3px;
    	overflow: hidden;
		text-align: center;
	}
	.single-team-member:hover{
		box-shadow: 0 0 45px 0 rgba(0,0,0,.2);
	}
	.member-image {
		height: 170px;
		overflow: hidden;
		border-radius: 0px;
		margin: 0px;
		margin-bottom: 10px;
	}
	.member-image img{
		width: 100%;
		max-height: initial;
		border-radius: 0px;
	}
	.member-text{
		padding: 20px;
	}
	.member-text a{
		text-decoration: none;
	}
	.member-text h6{
		color: rgb(100,100,100);
		margin-bottom: 20px;
    	line-height: 25px;
	}
	.member-text p{
		font-size: 12px;
		height: 150px;
		overflow: hidden;
	}
	.m-form__help{
		display: none;
	}
	#email{
		padding: .375rem .75rem;
		border-radius: 0px;
	}
</style>