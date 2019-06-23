<section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
    <div class="container">
        <div class="row">
            @if(isset($categories))
                @foreach($categories as $category)
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card p-3"> 
                            @if($category->slug)
                            <a href="{{ route('front.blog.tag', $category->url) }}">
                            @else
                            <a href="{{ route('front.blog.category', $category->url) }}">
                            @endif
                            {{$category->title}}
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if(isset($blogs))
        <div style="height: 50px;"></div>
        <div class="row">
            <div class="col-12 text-center">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Blogs</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="{{ $blog->meta_image }}" alt="">
                    </div>
                    <div class="member-text">
                        <a href="{{ route('front.blog.show', $blog->url) }}">
                            <h4>{{ $blog->title }}</h4>
                            <p>{{ $blog->description }}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center">
            <div class="col-12 text-center" style="text-align: center;"> 
                {{ $blogs->links() }}
            </div>
        </div>
        @endif
        @if(isset($blog))
            <span class="mr-3 text-info">Date: {{ $blog->created_at }}</span>
            <span class="mr-3 text-info">Category: {{ $blog->category->title }}</span>
            
            <hr>
            <br>
            {!! $blog->content !!}
            <br>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
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
                        <a href="{{ route('front.blog.tag', $tag->slug) }}">
                        {{$tag->name}}
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
            <br>
            <br>
            <br>
            <br>
            @if($blog->related_blogs)
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
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
                            <img src="{{ $blog->meta_image }}" alt="">
                        </div>
                        <div class="member-text">
                            <a href="{{ route('front.blog.show', $blog->url) }}">
                                <h4>{{ $blog->title }}</h4>
                                <p>{{ $blog->description }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @endif
    </div>
</section>
<!-- ***** Our Team Area End ***** -->