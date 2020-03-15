<div class="academy-courses-area section-padding-100-0" id="feature">
    <div class="container">
        <div class="row">
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
        <div class="row display-none">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <div class="course-icon">
                        <i class="icon-id-card"></i>
                    </div>
                    <div class="course-content">
                        <h4>Business School</h4>
                        <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                    <div class="course-icon">
                        <i class="icon-worldwide"></i>
                    </div>
                    <div class="course-content">
                        <h4>Marketing</h4>
                        <p>Lacinia, lacinia la cus non, fermen tum nisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <div class="course-icon">
                        <i class="icon-map"></i>
                    </div>
                    <div class="course-content">
                        <h4>Photography</h4>
                        <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                    <div class="course-icon">
                        <i class="icon-like"></i>
                    </div>
                    <div class="course-content">
                        <h4>Social Media</h4>
                        <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <div class="course-icon">
                        <i class="icon-responsive"></i>
                    </div>
                    <div class="course-content">
                        <h4>Development</h4>
                        <p>Lacinia, lacinia la cus non, fermen tum nisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="800ms">
                    <div class="course-icon">
                        <i class="icon-message"></i>
                    </div>
                    <div class="course-content">
                        <h4>Design</h4>
                        <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>