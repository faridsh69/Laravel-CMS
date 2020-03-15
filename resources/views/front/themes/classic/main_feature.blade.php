<div class="top-features-area wow fadeInUp" data-wow-delay="300ms" id="main_feature">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="features-content">
                    <div class="row no-gutters">
                        @foreach($modules->where('type', 'main_feature')->take(3) as $main_feature_item)
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="{{ $main_feature_item->icon }}"></i>
                                <h5>{{ $main_feature_item->title }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row no-gutters display-none">
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-agenda-1"></i>
                                <h5>Online Courses</h5>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-assistance"></i>
                                <h5>Amazing Teachers</h5>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-telephone-3"></i>
                                <h5>Great Support</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>