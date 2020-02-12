<div class="col-12">
    <div class="elements-title mb-50">
        <h2>Milestone</h2>
    </div>
</div>

<div class="col-12">
    <div class="academy-cool-facts-area mb-50">
        <div class="row">
            @foreach($modules->where('type', 'counting')->take(4) as $counting_item)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single-cool-fact text-center">
                    <i class="{{ $counting_item->icon }}"></i>
                    <h3><span class="counter">{{ $counting_item->description }}</span></h3>
                    <p>{{ $counting_item->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row display-none">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single-cool-fact text-center">
                    <i class="icon-agenda-1"></i>
                    <h3><span class="counter">130</span></h3>
                    <p>Courses Available</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single-cool-fact text-center">
                    <i class="icon-assistance"></i>
                    <h3><span class="counter">54</span></h3>
                    <p>Amazing Teachers</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single-cool-fact text-center">
                    <i class="icon-id-card"></i>
                    <h3><span class="counter">67</span>k</h3>
                    <p>Online Students</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single-cool-fact text-center">
                    <i class="icon-message"></i>
                    <h3><span class="counter">12</span></h3>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>
</div>