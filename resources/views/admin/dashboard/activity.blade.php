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
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
						<i class="la la-cloud-upload"></i>
					</a>
				</li>
				<li class="m-portlet__nav-item">
					<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
						<i class="la la-cog"></i>
					</a>
				</li>
				<li class="m-portlet__nav-item">
					<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
						<i class="la la-share-alt-square"></i>
					</a>
				</li>
			</ul>
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