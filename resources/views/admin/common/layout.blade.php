<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	@include('admin.common.header')
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header class="m-grid__item m-header" data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						@include('admin.common.brand')
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							@include('admin.common.horizontal-menu')
							@include('admin.common.toolbar')
						</div>
					</div>
				</div>
			</header>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				@include('admin.common.sidebar')
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							@include('admin.common.breadcrumb')
							@include('admin.common.circle-menu')
						</div>
					</div>
					<div class="m-content">
						@include('admin.common.page-alert')
						<div class="m-portlet m-portlet--mobile">
							@include('admin.common.card-header')
							<div class="m-portlet__body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('admin.common.footer')
			@include('admin.common.scripts')
		</div>
    	@stack('script')
    	@if(Session::has('alert-success'))
		<script>
		    jQuery(document).ready(function() {
		        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
		    });
		</script>
		@endif
		@if(Session::has('alert-danger'))
		<script>
		    jQuery(document).ready(function() {
		        $.notify({"message": "{{ Session::get('alert-danger') }}" },{"type":"danger"});
		    });
		</script>
		@endif
	</body>
	<!-- end::Body -->
</html>
