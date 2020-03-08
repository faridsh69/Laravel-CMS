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
				try{
					$answers = unserialize($data['answers']);
				} catch(exception $e){
					$answers = [];
				}
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
				@foreach($data->getColumns() as $column)
				<div class="m-list-timeline__item">
					<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
					<div style="color: white;width: 150px; display: inline-block;border-right: 1px solid white; margin-right: 10px; vertical-align: top;">
						<span>
							{!! $column['name'] !!}
						</span>
					</div>
					<span class="m-list-" style="color: white">
						@if( !is_object($data[$column['name']]) )
							@foreach($data[$column['name']])
								@if($file_accept === 'image')
							    <img alt="image" src="{{ $data[$column['name']] }}" height="100px">
								@elseif($file_accept === 'video')
								<video height="150" controls>
									<source src="{{ $data[$column['name']] }}">
								</video>
								@elseif($file_accept === 'audio')
								<audio controls>
									<source src="{{ $data[$column['name']] }}">
								</audio>
								@else
									
								@endif
							@endif
							{{ $data[$column['name']] }}
						@else
							@foreach($data[$column['name']] as $item)
								{{ isset($item->id) ? $item->id : '' }}
							@endforeach
						@endif

						@if($data[$column['name']])
							@php
								$file_accept = '';
								if(isset($column['file_accept'])){
									$file_accept = $column['file_accept'];
								}
							@endphp
							@if(array_search($file_accept, ['file', 'image', 'audio', 'video', 'text']) !== false) <br>
							<a download href="{{ $data[$column['name']] }}" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-sm"><span>
							    <i class="la la-download"></i></span>
							</a>
							@endif
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