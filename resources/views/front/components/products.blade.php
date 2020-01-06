<div id="vue_id" style="direction: rtl">
    <div class="section-heading text-center">
        <h2>{{ __('products title') }}</h2>
    	<div class="line-shape"></div>
    </div>
	<products></products>
</div>
@push('style')
<link href="{{ asset('css/front/components/product/app.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
<script src="{{ asset('js/front/components/product/vue.min.js') }}"></script>
<script src="{{ asset('js/front/components/product/vue-2.js') }}"></script>
<script src="{{ asset('js/front/components/product/axios.js') }}"></script>
<script src="{{ asset('js/front/components/product/products.js') }}"></script>
<script src="{{ asset('js/front/components/product/app.js') }}"></script>
@endpush