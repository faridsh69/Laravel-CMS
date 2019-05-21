<!DOCTYPE html>
<html lang="en" >
	@include('common.header')
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header class="m-grid__item m-header" data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						@include('common.brand')
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							@if(true) @include('common.horizontal-menu') @endif
							@include('common.toolbar')
						</div>
					</div>
				</div>
			</header>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					@include('common.sidebar')
				</div>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					@include('common.breadcrumb')
					<div class="m-content">
						@if( isset($meta['alert']) ) @include('common.page-alert') @endif
						<div class="m-portlet m-portlet--mobile">
							@include('common.card-header')
							<div class="m-portlet__body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('common.footer')
		</div>
		@if(false) @include('common.quick-sidebar') @endif
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		@if(false) @include('common.quick-navbar') @endif
		@include('common.scripts')
    	@stack('script')		
	</body>
	<!-- end::Body -->
</html>
