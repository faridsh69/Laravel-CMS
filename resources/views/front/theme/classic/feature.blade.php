<div class="academy-courses-area section-padding-100-0" id="feature">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-100 fadeInUp wow fadeInUp" data-wow-delay="300ms">
                <h1>{{ $modules->where('type', 'header')->first()->title }}</h1>
            </div>
            @foreach($modules->where('type', 'feature')->take(6) as $feature_item)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <div class="course-icon">
                        <i class="{{ $feature_item->icon }}"></i>
                    </div>
                    <div class="course-content">
                        <h4>{{ $feature_item->title }}</h4>
                        <p>{{ $feature_item->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>