@extends('layout.admin')

@push('style')
<!-- <link href="{{ asset('css/admin/table/jquery-ui.bundle.css') }}" rel="stylesheet" /> -->
@endpush

@push('script')
<script>
	var columns  = '{!! json_encode($columns) !!}';
	columns = JSON.parse(columns);
</script>
<script src="{{ asset('js/admin/table/table.js') }}"></script>
<script src="{{ asset('js/admin/table/change-status.js') }}"></script>
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif

<script src="{{ asset('js/admin/table/jquery-ui.bundle.js') }}"></script>
<script src="{{ asset('js/admin/table/draggable.js') }}"></script>

@endpush

@section('content')
    <div class="m_datatable"></div>

    <div class="row" id="m_sortable_portlets">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--mobile m-portlet--sortable m-portlet--success m-portlet--head-solid-bg">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
								<i class="flaticon-placeholder-2"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Portlet Action Icons
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-close"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-refresh"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-angle-down"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
								<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
									<i class="la la-ellipsis-v"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Cancel
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- <div class="m-portlet__body">
					sadfasdf.
				</div> -->
			</div>
		</div>


		<div class="col-lg-12">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--mobile m-portlet--sortable m-portlet--success m-portlet--head-solid-bg">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
								<i class="flaticon-placeholder-2"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Portlet Action Icons
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-close"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-refresh"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-angle-down"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
								<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
									<i class="la la-ellipsis-v"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Cancel
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<!--end::Portlet-->
			<div class="m-portlet m-portlet--sortable-empty"></div>
			<!--end::Empty Portlet-->
		</div>
	</div>
@endsection

