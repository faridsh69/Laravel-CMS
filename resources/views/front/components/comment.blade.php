<div class="row">
	@foreach($item->getComments() as $comment)
		<div class="col-12">
			<b>{{ $comment->author }}:</b> <br>
			{{ $comment->content }}
			<br>
			<br>
		</div>
	@endforeach
	<div class="col-12">
        <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
			<form action="{{ route('front.'. $modelNameSlug .'.comment', $item->url) }}" method="post">
                @csrf
                <textarea name="comment" class="form-control" id="comment" cols="30" rows="4" placeholder="Comment..."></textarea>
                <button class="btn academy-btn mt-30" type="submit">{{ __('send') }}</button>
            </form>
        </div>
	</div>
</div>