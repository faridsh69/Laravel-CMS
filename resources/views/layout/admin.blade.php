<!DOCTYPE html>
<html lang="en" >
	@include('common.admin.header')
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header class="m-grid__item m-header" data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						@include('common.admin.brand')
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							@include('common.admin.horizontal-menu')
							@include('common.admin.toolbar')
						</div>
					</div>
				</div>
			</header>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				@include('common.admin.sidebar')
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					@include('common.admin.breadcrumb')
					<div class="m-content">
						@if(false) @include('common.admin.page-alert') @endif
						<div class="m-portlet m-portlet--mobile">
							@include('common.admin.card-header')
							<div class="m-portlet__body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('common.admin.footer')
		</div>
    	@stack('script')
	</body>
	<!-- end::Body -->
</html>
