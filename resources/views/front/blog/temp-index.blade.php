@foreach($blogs as $blog)
{{ $blog->id }} - {{ $blog->title }} - <a href="{{ route('front.blog.show', $blog->url) }}">Show</a>
<br>
@endforeach