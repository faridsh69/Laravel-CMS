<div class="partner-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                    @foreach($modules->where('type', 'partner')->take(5) as $partner_item)
                    <a href="javascript:void(0)"><img src="{{ $partner_item->image }}" alt="partner"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>