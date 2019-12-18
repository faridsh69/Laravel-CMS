@php
    $sliders = \App\Models\Slider::where('id', '>', 2)->active()->get();
    $slider_3 = $sliders->first();
@endphp
<section class="special-area bg-white pb-5">
    <div class="special_description_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-1">
                    <div class="row">
                        @foreach($sliders as $slider)
                        <div class="col-12 mt-3">
                            <div class="special_description_content">
                                <h4>{{ $slider->title }}</h4>
                                <p>{!! $slider->description !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4 offset-sm-1">
                    <div class="special_description_img">
                        <img src="{{ $slider_3->asset_image }}" class="pull-right" alt="services">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
