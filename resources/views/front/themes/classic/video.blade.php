<div class="container mt-5" id="video"> 
	@foreach($modules->where('type', 'video') as $video)
	<video controls width="100%">
		<source src="{{ $video->video }}">
	</video>
	@endforeach
</div>