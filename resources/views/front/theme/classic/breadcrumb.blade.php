@if($modules->where('type', 'breadcrumb')->first())
<div class="breadcumb-area bg-img" style="background-image: url({{ $modules->where('type', 'breadcrumb')->first()->srcs('image')[0] }});" id="breadcrumb">
    <div class="bradcumbContent">
        <h2 class="no-wrap" style="padding: 10px;text-align: center; line-height: 90px; color: #ffffff; font-weight: 700; font-size: 24px;">{{ $page->title ?: $meta['title'] }}</h2>
    </div>
</div>
@endif