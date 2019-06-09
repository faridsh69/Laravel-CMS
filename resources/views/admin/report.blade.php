@extends('layout.admin')

@push('scripts')
	<script src="{{ Cdn::asset('admin/report.js') }}"></script>
	<script src="{{ Cdn::asset('admin/calendar.js') }}"></script>
@endpush

@section('content')
	CHANGELOG: Version 0.9.16
	<br>
	This Page will be dynamic in version 2.0.0
	</div>
</div>
		<!--begin:: Widgets/Profit Share-->
		<div class="m-widget14">
			<div class="m-widget14__header">
				<h3 class="m-widget14__title">
					Profit Share
				</h3>
				<span class="m-widget14__desc">
					Profit Share between customers
				</span>
			</div>
			<div class="row  align-items-center">
				<div class="col">
					<div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
						<div class="m-widget14__stat">
							45
						</div>
					</div>
				</div>
				<div class="col">
					<div class="m-widget14__legends">
						<div class="m-widget14__legend">
							<span class="m-widget14__legend-bullet m--bg-accent"></span>
							<span class="m-widget14__legend-text">
								37% Sport Tickets
							</span>
						</div>
						<div class="m-widget14__legend">
							<span class="m-widget14__legend-bullet m--bg-warning"></span>
							<span class="m-widget14__legend-text">
								47% Business Events
							</span>
						</div>
						<div class="m-widget14__legend">
							<span class="m-widget14__legend-bullet m--bg-brand"></span>
							<span class="m-widget14__legend-text">
								19% Others
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end:: Widgets/Profit Share-->


<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					User Views


number of users and active o .... tedade login shode ha o gheire
number of pages and blogs o ravande roshdeshon
google analytics link
link moz
link 

				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin::Widget 6-->
		<div class="m-widget15">
			<div class="m-widget15__chart" style="height:180px;">
				<canvas  id="m_chart_sales_stats"></canvas>
			</div>
			<div class="m-widget15__items">
				<div class="row">
					<div class="col">
						<div class="m-widget15__item">
							<span class="m-widget15__stats">
								63%
							</span>
							<span class="m-widget15__text">
								Sales Grow
							</span>
							<div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="m-widget15__item">
							<span class="m-widget15__stats">
								54%
							</span>
							<span class="m-widget15__text">
								Orders Grow
							</span>
							<div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="m-widget15__item">
							<span class="m-widget15__stats">
								41%
							</span>
							<span class="m-widget15__text">
								Profit Grow
							</span>
							<div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar bg-success" role="progressbar" style="width: 55%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="m-widget15__item">
							<span class="m-widget15__stats">
								79%
							</span>
							<span class="m-widget15__text">
								Member Grow
							</span>
							<div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="m-widget15__desc">
				* lorem ipsum dolor sit amet consectetuer sediat elit
			</div>
		</div>
		<!--end::Widget 6-->
	</div>
</div>


<div class="row">
	<div class="col-xl-6">
		<!--begin:: Widgets/Tasks -->
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							User Activity
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
								Today
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content1" role="tab">
								Week
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab3_content1" role="tab">
								Month
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="m_widget2_tab1_content">
						<div class="m-widget2">
							<div class="m-widget2__item m-widget2__item--primary">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										Blog #10 created.
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Farid
										</a>
									</span>
								</div>
								
							</div>
							<div class="m-widget2__item m-widget2__item--warning">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										General Setting Updated
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Eric
										</a>
									</span>
								</div>
							</div>
							<div class="m-widget2__item m-widget2__item--brand">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										Blog #11 created
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Eric
										</a>
									</span>
								</div>
								
							</div>
							<div class="m-widget2__item m-widget2__item--success">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										Blog #12 created
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Eric
										</a>
									</span>
								</div>
							</div>
							<div class="m-widget2__item m-widget2__item--danger">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										Page #2 created
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Farid
										</a>
									</span>
								</div>
								
							</div>
							<div class="m-widget2__item m-widget2__item--info">
								<div class="m-widget2__checkbox">
									<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
										<input type="checkbox">
										<span></span>
									</label>
								</div>
								<div class="m-widget2__desc">
									<span class="m-widget2__text">
										User Registered by email farid.sh69@gmail.com
									</span>
									<br>
									<span class="m-widget2__user-name">
										<a href="#" class="m-widget2__link">
											By Farid
										</a>
									</span>
								</div>
								
							</div>
						</div>
					</div>
					<div class="tab-pane" id="m_widget2_tab2_content"></div>
					<div class="tab-pane" id="m_widget2_tab3_content"></div>
				</div>
			</div>
		</div>
		<!--end:: Widgets/Tasks -->
	</div>
	<div class="col-xl-6">
		<!--begin:: Widgets/Support Tickets -->
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Support Tickets
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
							<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
								<i class="la la-ellipsis-h m--font-brand"></i>
							</a>
							<div class="m-dropdown__wrapper">
								<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
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
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="m-widget3">
					<div class="m-widget3__item">
						<div class="m-widget3__header">
							<div class="m-widget3__user-img">
								<img class="m-widget3__img" src="assets/app/media/img/users/user1.jpg" alt="">
							</div>
							<div class="m-widget3__info">
								<span class="m-widget3__username">
									Melania Trump
								</span>
								<br>
								<span class="m-widget3__time">
									2 day ago
								</span>
							</div>
							<span class="m-widget3__status m--font-info">
								Pending
							</span>
						</div>
						<div class="m-widget3__body">
							<p class="m-widget3__text">
								Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
							</p>
						</div>
					</div>
					<div class="m-widget3__item">
						<div class="m-widget3__header">
							<div class="m-widget3__user-img">
								<img class="m-widget3__img" src="assets/app/media/img/users/user4.jpg" alt="">
							</div>
							<div class="m-widget3__info">
								<span class="m-widget3__username">
									Lebron King James
								</span>
								<br>
								<span class="m-widget3__time">
									1 day ago
								</span>
							</div>
							<span class="m-widget3__status m--font-brand">
								Open
							</span>
						</div>
						<div class="m-widget3__body">
							<p class="m-widget3__text">
								Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.
							</p>
						</div>
					</div>
					<div class="m-widget3__item">
						<div class="m-widget3__header">
							<div class="m-widget3__user-img">
								<img class="m-widget3__img" src="assets/app/media/img/users/user5.jpg" alt="">
							</div>
							<div class="m-widget3__info">
								<span class="m-widget3__username">
									Deb Gibson
								</span>
								<br>
								<span class="m-widget3__time">
									3 weeks ago
								</span>
							</div>
							<span class="m-widget3__status m--font-success">
								Closed
							</span>
						</div>
						<div class="m-widget3__body">
							<p class="m-widget3__text">
								Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end:: Widgets/Support Tickets -->
	</div>
</div>
@endsection