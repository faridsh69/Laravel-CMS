@php
    $sliders = \App\Models\Slider::where('id', '>', 2)->active()->get();
    $slider_3 = $sliders->first();
@endphp
<section class="special-area bg-white section_padding_100" style="margin-top: -200px;">
    <div class="special_description_area mt-150">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="special_description_img">
                        <img src="{{ $slider_3->asset_image }}" class="pull-right" alt="services">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($sliders as $slider)
                <div class="col-sm-6 col-md-4 ml-xl-auto mt-3">
                    <div class="special_description_content">
                        <h3>{{ $slider->title }}</h3>
                        <p>{!! $slider->description !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="separate"></div>
        </div>
    </div>
</section>
