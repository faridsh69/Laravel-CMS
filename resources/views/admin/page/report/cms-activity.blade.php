<div class="col-xl-6">
	<!--begin:: Widgets/Tasks -->
	<div class="m-portlet m-portlet--full-height">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Last Activities
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="nav nav-pills nav-pills--info m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
					<li class="nav-item m-tabs__item ">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab2_content1" role="tab">
							Today
						</a>
					</li>
				</ul>
			</div>
		</div>
		@php 
			$colors = ['danger', 'success', 'primary', 'warning', 'brand', 'success'];
		@endphp
		<div class="m-portlet__body">
			<div class="tab-content">
				<div class="tab-pane active" id="m_widget2_tab1_content">
					<div class="m-widget2">
						@foreach($activities as $activity)
						<div class="m-widget2__item m-widget2__item--{{ $colors[array_rand($colors, 1)] }}">
							<div class="m-widget2__checkbox">
								<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
									<input type="checkbox">
									<span></span>
								</label>
							</div>
							<div class="m-widget2__desc">
								<span class="m-widget2__text">
									Record #{{ $activity->subject_id }}
									<div style="overflow: hidden; white-space: nowrap; max-width: 300px; text-overflow:ellipsis">
									{{ $activity->description }}
									</div>
								</span>
								<br>
								<span class="m-widget2__user-name">
									<a href="javascript:void(0)" class="m-widget2__link">
										{{ $activity->causer->full_name }}
										<br>
										{{ $activity->created_at }}
									</a>
								</span>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane" id="m_widget2_tab2_content"></div>
				<div class="tab-pane" id="m_widget2_tab3_content"></div>
			</div>
		</div>
	</div>
	<!--end:: Widgets/Tasks -->
</div>