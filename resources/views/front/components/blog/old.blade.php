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
                        <img src="{{ $category->asset_image }}" alt="{{ $category->title }}">
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
            
