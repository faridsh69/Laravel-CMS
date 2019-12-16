<div class="col-12 col-md-6 col-lg-3">
    <div class="single-team-member">
        <a href="{{ route('front.blog.show', $blog->id) }}">
            <div class="member-image">
                <img src="{{ $blog->asset_image }}" alt="{{ $blog->title }}">
            </div>
        </a>
        <div class="member-text">
            <a href="{{ route('front.blog.show', $blog->id) }}">
                <h6>{{ $blog->title }}</h6>
            </a>
            <p>{{ $blog->description }}</p>
        </div>
    </div>
</div>