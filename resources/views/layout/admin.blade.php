<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
		@include('common.header')
	<!-- end::Head -->
    <!-- begin::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item m-header" data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
							@include('common.brand')
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
								@if(true) @include('common.horizontal-menu') @endif
							<!-- END: Horizontal Menu -->								
							<!-- BEGIN: Topbar -->
								@include('common.toolbar')
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
						@include('common.sidebar')
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
						@include('common.breadcrumb')
					<!-- END: Subheader -->
					<div class="m-content">
						<!-- BEGIN: Alert -->
							@if(false) @include('common.page-alert') @endif
						<!-- END: Alert -->
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Local Datatable
											<small>
												initialized from javascript array
											</small>
										</h3>
									</div>
								</div>
								@if(true) @include('common.header-tools') @endif
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->
									@if(true) @include('common.table-search') @endif
								<!--end: Search Form -->
						<!--begin: Datatable -->
								<div class="m_datatable" id="local_data"></div>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			@include('common.footer')
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
        <!-- begin::Quick Sidebar -->
			@if(false) @include('common.quick-sidebar') @endif
		<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->		    
		<!-- begin::Quick Nav -->
			@if(false) @include('common.quick-navbar') @endif
		<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->
			@include('common.scripts')
		<!--end::Base Scripts -->   
        <!--begin::Page Resources -->
        	@stack('script')		
		<!--end::Page Resources -->
	</body>
	<!-- end::Body -->
</html>
