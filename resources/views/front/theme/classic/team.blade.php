<section class="teachers-area section-padding-0-100" id="team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <h3>{{ __('Meet Our Team') }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($modules->where('type', 'team')->take(4) as $team)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                    <div class="teachers-thumbnail">
                        <img src="{{ $team->avatar() }}" alt="team member">
                    </div>
                    <div class="teachers-info mt-30">
                        <h5>{{ $team->full_name }}</h5>
                        <span>{{ $team->title }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div class="view-all text-center wow fadeInUp" data-wow-delay="800ms">
                    <a href="{{ route('front.page.index', 'about')}}" class="btn academy-btn">{{ __('All Members') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>