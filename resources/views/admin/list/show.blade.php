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

				$file_columns = $data->form->fields->whereIn('type', ['upload_file', 'upload_image', 'upload_video', 'upload_audio']);
			@endphp
			<h3>Answer:</h3>
			<ul>
				@foreach($file_columns as $file_column)
					{{ $file_column->title }}:
					@foreach(json_decode($data->files_src($file_column->title)) as $src)
						<div class="show-file">
						@if($file_column->type === 'upload_image')
							<img alt="image" src="{{ $src }}">
						@elseif($file_column->type === 'upload_video')
							<video controls>
								<source src="{{ $src }}">
							</video>
						@elseif($file_column->type === 'upload_audio')
							<audio controls>
								<source src="{{ $src }}">
							</audio>
						@else
							{{ $src }}
						@endif
							<div class="file-tools mt-2">
								<a download href="{{ $src }}" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
								    <i class="la la-download"></i></span>
								</a>
								<a target="blank" href="{{ $src }}" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
								    <i class="la la-eye"></i></span>
								</a>
							</div>
						</div>
					@endforeach
					<br>
				@endforeach
				 <br>
			@foreach($answers as $key => $answer)
				<li> <span class="mr-4">{{ $key }}</span> : {{ json_encode($answer) }} </li>
			@endforeach
			</ul>
		@endif

		@foreach($data->getColumns() as $column)
			@php
				$file_accept = '';
				if($column['form_type'] === 'file')
				{
					$file_accept = $column['file_accept'];
					if($column['file_manager'] === true){
						$files_src = explode(',',  $data[$column['name']] );
						if($files_src == ['']){ $files_src = [];}
					}else{
						$files_src = json_decode($data[$column['name']]);
					}
				}
			@endphp
			<h6 class="m--font-boldest m--font-brand">{{ __($column['name']) }}</h6>
			<div class="mb-4 show-file">
			@if($file_accept)
				@foreach($files_src as $src)
				<div class="show-file">
					@if($file_accept === 'image')
				    	<img alt="image" src="{{ $src }}">
					@elseif($file_accept === 'video')
						<video controls>
							<source src="{{ $src }}">
						</video>
					@elseif($file_accept === 'audio')
						<audio controls>
							<source src="{{ $src }}">
						</audio>
					@else
						{{ $src }}
					@endif
					<div class="file-tools mt-2">
						<a download href="{{ $src }}" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
						    <i class="la la-download"></i></span>
						</a>
						<a target="blank" href="{{ $src }}" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
						    <i class="la la-eye"></i></span>
						</a>
					</div>
				</div>
				@endforeach
				@if(count($files_src) === 0)
					<span style="color: red">Null</span>
				@endif
			@elseif(!is_object($data[$column['name']]) )
				{!! $data[$column['name']] === null ? '<span style="color: red">Null</span>' : $data[$column['name']] !!}
			@else
				<table class="table m-table m-table--head-separator-primary mb-5">
					<thead>
						<th>ID</th>
						<th>Title</th>
						<th>Activated</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Show</th>
					</thead>
					<tbody>
						@foreach($data[$column['name']] as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->title }}</td>
							<td>{{ $item->activated }}</td>
							<td>{{ $item->created_at }}</td>
							<td>{{ $item->updated_at }}</td>
							<td><a href="" target="blank"><i class="fa fa-eye"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@endif
			</div>
		@endforeach
	</div>
</div>
</div>
</div>
</div>

<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon">
						<i class="flaticon-statistics"></i>
						{{ __('Activity log for this model') }}
					</span>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="m-list-timeline">
				<h4></h4>
				<br>
				<div class="m-list-timeline__items">
					@foreach($activities as $activity)
					<div class="m-list-timeline__item">
						<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
						<span class="m-list-timeline__icon flaticon-exclamation-1"></span>
						<span class="m-list-timeline__text">
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
</div>

@endsection