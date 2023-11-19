<div class="blog-area section-padding-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="academy-blog-posts">
                    <div class="row">
                        @each('front.theme.'. config('setting-developer.theme'). '.list-item', $list, 'item')
                        @if(count($list) == 0)
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ __('list_is_empty') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Pagination Area Start -->
                <div class="academy-pagination-area wow fadeInUp" data-wow-delay="100ms">
                    {{ $list->links() }}
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="academy-blog-sidebar">
                    <!-- Blog Post Widget -->
                    <div class="blog-post-search-widget mb-30">
                        <form action="#" method="post">
                            <input type="search" name="search" id="Search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    @if(isset($category))
                    <div class="latest-blog-posts mb-30">
                        <h5>{{ __('category') }}</h5>
                        <div class="single-latest-blog-post d-flex mb-30">
                            <div class="latest-blog-post-thumb">
                                <i class="fa {{ $category->icon }}" style="font-size: 30px"></i>
                            </div>
                            <div class="latest-blog-post-content">
                                <a href="{{ route('front.'. Str::kebab($category->type). '.category.show', $category->url) }}" class="post-title">
                                    <h6>{{ $category->title }}</h6>
                                </a>
                                <br>
                                {{ __('description') }}: {{ $category->description }}
                                <br>
                                {{ __('created at') }}:
                                {{ $category->created_at }}
                                <br>
                                <a href="{{ route('front.'. Str::kebab($category->type). '.category.show', $category->url) }}"> Check other categories </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($tag))
                    <div class="latest-blog-posts mb-30">
                        <h5>{{ __('tag') }}</h5>
                        <div class="single-latest-blog-post d-flex mb-30">
                            <div class="latest-blog-post-thumb">
                                <i class="fa {{ $tag->icon }}" style="font-size: 30px"></i>
                            </div>
                            <div class="latest-blog-post-content">
                                <a href="{{ route('front.'. Str::kebab($tag->type). '.tag.show', $tag->url) }}" class="post-title">
                                    <h6>{{ $tag->title }}</h6>
                                </a>
                                {{ __('description') }}: {{ $tag->description }}
                                <br>
                                {{ __('created at') }}:
                                {{ $tag->created_at }}
                                <br>
                                <a href="{{ route('front.'. Str::kebab($tag->type). '.tag.show', $tag->url) }}"> Check other tags </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($categories) && count($categories) > 0)
                    <div class="latest-blog-posts mb-30">
                        <h5>{{ __('categories') }}</h5>
                        @foreach($categories as $category)
                        <div class="single-latest-blog-post d-flex mb-30">
                            <div class="latest-blog-post-thumb">
                                <i class="fa {{ $category->icon }}" style="font-size: 30px"></i>
                            </div>
                            <div class="latest-blog-post-content">
                                <a href="{{ route('front.'. Str::kebab($category->type). '.category.show', $category->url) }}" class="post-title">
                                    <h6>{{ $category->title }}</h6>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(isset($tags) && count($tags) > 0)
                    <div class="latest-blog-posts mb-30">
                        <h5>{{ __('tags') }}</h5>
                        @foreach($tags as $tag)
                        <div class="single-latest-blog-post d-flex mb-30">
                            <div class="latest-blog-post-thumb">
                                <i class="fa {{ $tag->icon }}" style="font-size: 30px"></i>
                            </div>
                            <div class="latest-blog-post-content">
                                <a href="{{ route('front.'. Str::kebab($tag->type). '.tag.show', $tag->url) }}" class="post-title">
                                    <h6>{{ $tag->title }}</h6>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- <div class="add-widget">
                        <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>