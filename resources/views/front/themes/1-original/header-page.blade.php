@php 
    $sliders = \App\Models\Slider::orderBy('id', 'asc')->get();
    if( isset($sliders[0]) ){
        $first_slider = \App\Models\Slider::orderBy('id', 'asc')->get()[0];
    }else{
        $first_slider = new \App\Models\Slider();
    }
@endphp

<section class="wellcome_area clearfix" id="home" 
    style="background-image: url({{ asset($first_slider->image) }}); height: 400px; background-position: top" >
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading">
                    <br>
                    <br>
                    <h2>{{ $first_slider->title }}</h2>
                    <p>{{ $first_slider->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
