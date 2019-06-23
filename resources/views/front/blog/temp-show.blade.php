@foreach($blog->getAttributes() as $key => $value)
<p>
	<small>
		({!! $key !!}):
	</small>
	{!! $value !!}
</p>
@endforeach
