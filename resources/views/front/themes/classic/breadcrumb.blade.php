<div class="breadcumb-area bg-img" style="background-image: url({{ $modules->where('type', 'breadcrumb')->first()->image }});" id="breadcrumb">
    <div class="bradcumbContent">
        <h2>{{ $page->title ?: $meta['title'] }}</h2>
    </div>
</div>
