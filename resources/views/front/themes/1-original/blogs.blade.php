<section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
    <div class="container">
        <div class="row">
        @if(isset($blogs))
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('blogs') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
            @each('front.themes.1-original.blog-card', $blogs, 'blog')
            <div class="col-12"> 
                {{ $blogs->links() }}
            </div>
        @elseif(isset($categories))
            <br>
            <br>
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>{{ __('categories') }}</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
            @foreach($categories as $category)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}">
                    </div>
                    <div class="member-text">
                        <a href="{{ route('front.blog.category', $category->url) }}">
                            <h6>{{ $category->title }}</h6>
                            <p>{{ $category->description }}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        @elseif(isset($blog))
            <div class="col-12">
                <br>
                {!! $blog->content !!}
                <br>
                <br>
                <br>
                <hr>
                <span class="mr-3 text-info"><b>{{ __('date') }}:</b> {{ $blog->created_at }}</span>
                <br>
                <span class="mr-3 text-info"><b>{{ __('category') }}:</b>
                    <a href="{{ route('front.blog.category', $blog->category->url)  }}"> 
                        {{ $blog->category->title }}
                    </a>
                </span>
                <hr>
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
        @endif
        </div>
    </div>
</section>
