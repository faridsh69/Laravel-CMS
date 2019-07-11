<!-- ***** Wellcome Area Start ***** -->
@php 
    $sliders = \App\Models\Slider::orderBy('id', 'asc')->get();
    if( isset($sliders[0]) ){
        $first_slider = \App\Models\Slider::orderBy('id', 'asc')->get()[0];
        $second_slider = \App\Models\Slider::orderBy('id', 'asc')->get()[1];
    }else{
        $first_slider = new \App\Models\Slider();
        $second_slider = new \App\Models\Slider();
    }
@endphp

<section class="wellcome_area clearfix" id="home" 
    style="background-image: url({{ $first_slider->image }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading">
                    <h2>{{ $second_slider->title }}</h2>
                    <h3>{{ $first_slider->title }}</h3>
                    <p>{{ $second_slider->description }}</p>
                </div>
                @include('front.widgets.form.' . config("0-developer.theme"))
            </div>
        </div>
    </div>
    <!-- Welcome thumb -->
    <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
        <img src="{{ $second_slider->image }}" alt="{{ $second_slider->title }}">
    </div>
</section>
<!-- ***** Wellcome Area End ***** -->