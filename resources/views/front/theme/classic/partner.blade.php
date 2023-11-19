<div class="partner-area section-padding-0-100" id="partner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                    @foreach($modules->where('type', 'partner')->take(5) as $partner)
                    <a href="{{ $partner->url }}"><img src="{{ $partner->avatar }}" alt="partner"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>