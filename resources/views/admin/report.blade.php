@extends('layout.admin')

@push('scripts')
	<!-- <script src="{{ asset('admin/report.js') }}"></script>
	<script src="{{ asset('admin/calendar.js') }}"></script> -->
@endpush

@section('content')

<div class="row">
	@include('admin.report.cms_information')
	@include('admin.report.last_activities')
	@include('admin.report.count_models')
	@include('admin.report.contact_data')
	@include('admin.report.last_comments')

	ravande roshde tedade blog o user
	google analytics link
	link moz 

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



@endsection