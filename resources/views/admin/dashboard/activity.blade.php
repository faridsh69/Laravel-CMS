@extends('layout.admin')

@section('content')
<div class="m-portlet m-portlet--bordered-semi">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-statistics"></i>
				</span>
				<h3 class="m-portlet__head-text">
					{{ \Auth::user()->fullName }} Activities
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="m-list-timeline">
			<div class="m-list-timeline__items">
				@foreach($activities as $activity)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
					<span class="m-list-timeline__icon flaticon-exclamation-1"></span>
					<span class="m-list-timeline__text">
						<span style="font-weight: bold">
						{{ $activity->description }}
						</span>
						With model ID:  
						{{ $activity->subject_id }}
					</span>
					<span class="m-list-timeline__time">
						{{ $activity->created_at }}
					</span>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="m-portlet__body">
		<div class="m-list-timeline">
			<div class="m-list-timeline__items">
				@if(false)
				@foreach($data as $key => $value)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
					<span class="m-list-timeline__icon flaticon-exclamation-1"></span>
					<span class="m-list-timeline__text">
						{!! $value !!}
					</span>
					<span class="m-list-timeline__time">
						{!! $key !!}
					</span>
				</div>
				@endforeach
				@endif
			</div>
		</div>
		<!--end::Section-->
	</div>
</div>

@endsection