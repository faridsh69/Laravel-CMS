<div class="col-12" id="faq">
    <div class="elements-title mb-50">
        <h2>{{ __('Frequency Asked Questions') }}</h2>
    </div>
</div>
<div class="col-12">
    <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
         @foreach($modules->where('type', 'faq')->take(10) as $faq)
        <div class="panel single-accordion">
            <h6><a role="button" class="collapsed" aria-expanded="true" aria-controls="row{{ $faq->id }}" data-toggle="collapse" data-parent="#accordion" href="#row{{ $faq->id }}">{{ $faq->title }}
                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                    </a></h6>
            <div id="row{{ $faq->id }}" class="accordion-content collapse">
                <p>{{ $faq->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>