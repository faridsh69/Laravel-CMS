@extends('layout.admin')

@section('content')
<div class="m-portlet m-portlet--skin-dark m-portlet--bordered-semi">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-statistics"></i>
				</span>
				<h3 class="m-portlet__head-text">
					ID: {{ $data['id'] }}
					@if(isset($data['first_name']))
						<a href="{{ route('admin.user.login', $data['id']) }}" class="btn btn-success btn-sm m-btn m-btn--custom m-btn--air m-btn--pill">
							Login with this user
						</a>
					@endif
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
			<h4>Activity log for this model</h4>
			<br>
			<div class="m-list-timeline__items">
				@foreach($activities as $activity)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
					<span class="m-list-timeline__icon flaticon-exclamation-1"></span>
					<span class="m-list-timeline__text">
						{{ $activity->description }}
						By 
						{{ $activity->causer->getFullName() }}
						At
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
			</div>
		</div>
		<!--end::Section-->
	</div>
</div>

@endsection