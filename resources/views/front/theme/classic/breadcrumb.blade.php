<div class="breadcumb-area bg-img" style="background-image: url({{ $modules->where('type', 'breadcrumb')->first()->image }});" id="breadcrumb">
    <div class="bradcumbContent">
        <p style="text-align: center;
    line-height: 110px;
    font-size: 36px;
    color: #ffffff; font-weight: 700;">{{ $page->title ?: $meta['title'] }}</p>
    </div>
</div>
