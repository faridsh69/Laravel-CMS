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
					@if(isset($data['password']))
						<a href="{{ route('admin.user.login', $data['id']) }}" class="btn btn-success btn-sm m-btn m-btn--custom m-btn--air m-btn--pill">
							{{ __('Login with this user') }}
						</a>
						<a href="{{ route('admin.user.identify', $data['id']) }}" class="btn btn-primary btn-sm m-btn m-btn--custom m-btn--air m-btn--pill">
							{{ __('Check user identify') }}
						</a>
					@endif
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<small class="m-portlet__head-text">
				{{ __('created at') }}:
				{{ $data->created_at }}
				<br>
				{{ ('updated at') }}:
				{{ $data->updated_at }}	
			</small>	
		</div>
	</div>

	<div class="m-portlet__body">
		@if(isset($data['answers']))
			@php
				$answers = unserialize($data['answers']);
			@endphp
			<h3>Answer:</h3>
			<ul>
			@foreach($answers as $key => $answer)
				<li> <span class="mr-4">{{ $key }}</span> : {{ json_encode($answer) }} </li>
			@endforeach
			</ul>
		@endif
		<div class="m-list-timeline">
			<div class="m-list-timeline__items">
				<br>
				@foreach($data->columns as $column)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
					<div style="color: white;width: 150px; display: inline-block;border-right: 1px solid white; margin-right: 10px">
						<span>
							{!! $column['name'] !!}
						</span>
					</div>
					<span class="m-list-" style="color: white">
						@if( !is_object($data[$column['name']]) )
							{{ $data[$column['name']] }}
						@else
							@foreach($data[$column['name']] as $item)
								{{ isset($item->id) ? $item->id : '' }}
							@endforeach
						@endif
					</span>
				</div>
				@endforeach
				<br>
			</div>
		</div>
	</div>

	<div class="m-portlet__body">
		<div class="m-list-timeline">
			<h4>{{ __('Activity log for this model') }}</h4>
			<br>
			<div class="m-list-timeline__items">
				@foreach($activities as $activity)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
					<span class="m-list-timeline__icon flaticon-exclamation-1"></span>
					<span class="m-list-timeline__text" style="color: white">
						{{ $activity->description }}
						By 
						{{ $activity->causer->fullName }}
						At
						{{ $activity->created_at }}
					</span>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection