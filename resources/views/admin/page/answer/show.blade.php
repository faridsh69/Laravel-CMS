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