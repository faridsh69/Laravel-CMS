@extends('front.page')
@section('content_block')
<div class="row">
	<div class="col-12">
        <br>
        {!! $blog->content !!}
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="rtl-text-right mr-3">
                    <small><b>{{ __('date') }}:</b> {{ $blog->created_at }}</small>
                    <br>
                    <small><b>{{ __('category') }}:</b> 
                        <a href="{{ route('front.blog.category', $blog->category->url)  }}"> 
                            {{ $blog->category->title }}
                        </a>
                    </small>
                    <br>
                    <a href="whatsapp://send?text={{ route('front.blog.show', $blog->id) }}" data-action="share/whatsapp/share">
                        <i class="fa fa-share-alt"></i>
                        <small>Whatsapp</small>
                    </a>
                    <br>
                    <span class="color-gray"> {{ $blog->totalCommentsCount() }} نظر
                    </span>
                    <span class="color-gray">({{ $blog->averageRate() }} <i class="fa fa-star"></i>) </span>   
                </div>
                <hr>
            </div>
        </div>
        @if( count($blog->tags) > 0 )
        <br>
        <br>
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('tags') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row"> 
            @foreach($blog->tags as $tag)
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card p-3"> 
                    <a href="{{ route('front.blog.tag', $tag->slug) }}">{{$tag->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <br>
        <br>
        <br>
        @endif
        @if( count($blog->related_blogs) > 0 )
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('related_blogs') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
            @each('front.themes.1-original.blog-card', $blog->related_blogs, 'blog')
        </div>
        @endif
    </div>
    <br>
    <div class="col-12">
        <div class="section-heading text-center">
            <h2>{{ __('comments') }}</h2>
            <div class="line-shape"></div>
        </div>
        <form action="{{ route('front.blog.comment', $blog->id )}}" method="post">
            @csrf
            <div class="form-group rtl-text-right">
                <textarea name="comment" class="form-control" id="comment" cols="30" rows="4" placeholder="{{ __('write comment') }}" required></textarea>
            </div>
            <div class="form-group rtl-text-right">
                <label>{{ __('rate') }}</label>
                <select name="rate" class="form-control" id="rate" required>
                	<option value="5">5</option>
                	<option value="4">4</option>
                	<option value="3">3</option>
                	<option value="2">2</option>
                	<option value="1">1</option>
                </select>
            </div>
            <button type="submit" class="btn submit-btn">{{ __('send') }}</button>
        </form>
    </div>
    @each('front.themes.1-original.comment-card', $blog->comments->where('approved', 1), 'comment')
</div>
@endsection
