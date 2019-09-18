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
    style="background-image: url({{ $first_slider->image }}); height: 500px; background-position: top" >
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading">
                    <h2>{{ $second_slider->title }}</h2>
                    <h3>{{ $first_slider->title }}</h3>
                    <p>{{ $second_slider->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Wellcome Area End ***** -->