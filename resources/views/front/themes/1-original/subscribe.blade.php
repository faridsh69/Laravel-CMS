<section class="our-monthly-membership section_padding_50 clearfix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="membership-description">
                    <p>
                    {!! config('setting-general.subscribe_description') !!}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                @include('front.themes.' . config('setting-developer.theme'). '.form')
            </div>
        </div>
    </div>
</section>
@if(env('APP_NAME') === 'eric')
    <img src="{{ asset('storage/files/shares/synergypower/certificate.jpg') }}" style="width: 100%" alt="logo">
@endif