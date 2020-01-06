@extends('front.page')
@section('content_block')
<div id="vue_id">
	<basket></basket>
</div>
@endsection
@push('style')
<link href="{{ asset('css/front/components/product/app.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
<script src="{{ asset('js/front/components/product/vue.min.js') }}"></script>
<script src="{{ asset('js/front/components/product/vue-2.js') }}"></script>
<script src="{{ asset('js/front/components/product/axios.js') }}"></script>
<script src="{{ asset('js/front/components/product/basket.js') }}"></script>
<script src="{{ asset('js/front/components/product/app.js') }}"></script>
@endpush