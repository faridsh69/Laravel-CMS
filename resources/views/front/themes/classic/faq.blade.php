<div class="col-12">
    <div class="elements-title mb-50">
        <h2>Frequency Asked Questions</h2>
    </div>
</div>
<div class="col-12">
    <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
         @foreach($modules->where('type', 'faq')->take(10) as $faq_item)
        <div class="panel single-accordion">
            <h6><a role="button" class="collapsed" aria-expanded="true" aria-controls="row{{ $faq_item->id }}" data-toggle="collapse" data-parent="#accordion" href="#row{{ $faq_item->id }}">{{ $faq_item->title }}
                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                    </a></h6>
            <div id="row{{ $faq_item->id }}" class="accordion-content collapse">
                <p>{{ $faq_item->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>