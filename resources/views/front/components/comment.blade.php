<div class="row">
	@foreach($item->getComments() as $comment)
		<div class="col-12">
			{{ $comment->author }} :
			{{ $comment->content }}
		</div>
	@endforeach
	<div class="col-12">
		<form action="{{ route('front.'. $modelNameSlug .'.comment', $item->url) }}" method="post">
			@csrf
			<textarea name="comment"></textarea>
			<button>{{ __('send') }}</button>
		</form>
	</div>
</div>