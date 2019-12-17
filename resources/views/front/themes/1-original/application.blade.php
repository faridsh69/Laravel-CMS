@php
    $sliders = \App\Models\Slider::where('id', '>', 2)->active()->get();
@endphp
<section class="special-area bg-white section_padding_100" style="margin-top: -200px;">
    <div class="special_description_area mt-150">
        <div class="container">
            @foreach($sliders as $slider)
            <div class="row">
                @if($slider->id === 4)
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>{{ $slider->title }}</h2>
                        <p>{!! $slider->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{ $slider->asset_image }}" class="pull-right" alt="services">
                    </div>
                </div>
                @else
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{ asset($slider->image) }}" class="pull-right" alt="services">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>{{ $slider->title }}</h2>
                        <p>{!! $slider->description !!}</p>
                        @if($slider->id === 3)
                        <div class="app-download-area">
                            <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                                <a href="{{ config('setting-general.android_application_url') }}">
                                    <i class="fa fa-android"></i>
                                    <p class="mb-0"><span>available on</span> Google Store</p>
                                </a>
                            </div>
                            <div class="app-download-btn wow fadeInDown" data-wow-delay="0.4s">
                                <a href="{{ config('setting-general.ios_application_url') }}">
                                    <i class="fa fa-apple"></i>
                                    <p class="mb-0"><span>available on</span> Apple Store</p>
                                </a>
                            </div>
                        </div>                        
                        @elseif($slider->id === 5)
                            @include('front.themes.' . config('setting-developer.theme'). '.form')
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <div class="separate"></div>
            @endforeach
        </div>
    </div>
</section>
