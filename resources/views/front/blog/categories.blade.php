@foreach($categories as $category)
{{ $category->id }} - {{ $category->title }} - <a href="{{ route('front.blog.category', $category->title) }}">Show</a>
<br>
@endforeach

{{ $tree = \App\Models\Category::get()->toTree() }}
