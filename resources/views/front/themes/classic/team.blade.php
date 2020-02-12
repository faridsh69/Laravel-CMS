<section class="teachers-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <h3>Meet Our Team</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($modules->where('type', 'team')->take(4) as $team_item)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                    <!-- Thumbnail -->
                    <div class="teachers-thumbnail">
                        <img src="{{ $team_item->asset_image }}" alt="team member">
                    </div>
                    <!-- Meta Info -->
                    <div class="teachers-info mt-30">
                        <h5>{{ $team_item->full_name }}</h5>
                        <span>{{ $team_item->title }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div class="view-all text-center wow fadeInUp" data-wow-delay="800ms">
                    <a href="{{ route('front.page.index', 'about-us')}}" class="btn academy-btn">All Members</a>
                </div>
            </div>
        </div>
    </div>
</section>