<section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
    <div class="container">
        <div class="row">
        @if(isset($blogs))
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h2>Blogs</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
            @foreach($blogs as $blog)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    <div class="member-text">
                        <a href="{{ route('front.blog.show', $blog->id) }}">
                            <h4>{{ $blog->title }}</h4>
                            <p>{{ $blog->description }}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center" style="text-align: center;"> 
                {{ $blogs->links() }}
            </div>
        @elseif(isset($categories))
            @foreach($categories as $category)
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card p-3"> 
                    @if($category->url)
                    <a href="{{ route('front.blog.tag', $category->url) }}">
                    @else
                    <a href="{{ route('front.blog.category', $category->url) }}">
                    @endif
                    {{$category->title}}
                    </a>
                </div>
            </div>
            @endforeach
        @elseif(isset($blog))
            <div class="col-12">
                <span class="mr-3 text-info"><b>Date:</b> {{ $blog->created_at }}</span>
                <span class="mr-3 text-info"><b>Category:</b>
                    <a href="{{ route('front.blog.category', $blog->category->url)  }}"> 
                        {{ $blog->category->title }}
                    </a>
                </span>
                <hr>
                <br>
                {!! $blog->content !!}
                <br>
                <br>
                <br>
                @if( count($blog->tags) > 0 )
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section-heading">
                            <h2>Tags</h2>
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
                            <h2>Related Blogs</h2>
                            <div class="line-shape"></div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    @foreach($blog->related_blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team-member">
                            <div class="member-image">
                                <img src="{{ asset($blog->meta_image) }}" alt="">
                            </div>
                            <div class="member-text">
                                <a href="{{ route('front.blog.show', $blog->id) }}">
                                    <h4>{{ $blog->title }}</h4>
                                    <p>{{ $blog->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        @endif
        </div>
    </div>
</section>
