@php 
    $sliders = \App\Models\Slider::orderBy('id', 'asc')->active()->get();
    if( isset($sliders[1]) ){
        $first_slider = \App\Models\Slider::orderBy('id', 'asc')->get()[0];
        $second_slider = \App\Models\Slider::orderBy('id', 'asc')->active()->get()[1];
    }else{
        $first_slider = new \App\Models\Slider();
        $second_slider = new \App\Models\Slider();
    }
@endphp

<section class="wellcome_area clearfix" id="home" 
    style="background-image: url({{ $first_slider->asset_image }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                @if(false)
                <div class="hero-app-1 custom-animation">
                    <img src="{{ asset('css/front/themes/1-original/img/animate_icon/icon_1.png') }}" alt="animated image"></div>
                <div class="hero-app-5 custom-animation2">
                    <img src="{{ asset('css/front/themes/1-original/img/animate_icon/icon_3.png') }}" alt="animated image"></div>
                @endif
                <div class="wellcome-heading">
                    <h2>{{ $first_slider->title }}</h2>
                    <h3>{{ $second_slider->title }}</h3>
                    <p>{!! $first_slider->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
        <img src="{{ $second_slider->asset_image }}" alt="{{ $second_slider->title }}">
    </div>
    @if(false)
    <div class="hero-app-7 custom-animation3">
        <img src="{{ asset('css/front/themes/1-original/img/animate_icon/icon_2.png') }}" alt="animated image"></div>
    <div class="hero-app-8 custom-animation">
        <img src="{{ asset('css/front/themes/1-original/img/animate_icon/icon_4.png') }}" alt="animated image"></div>
    @endif
</section>
