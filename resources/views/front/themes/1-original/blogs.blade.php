<section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</section>
