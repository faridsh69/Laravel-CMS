<div class="col-12" id="counting">
    <div class="elements-title mb-50">
        <h2>{{ __('milestone') }}</h2>
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
    </div>
</div>