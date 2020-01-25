@extends('front.page')
@section('content_block')

<div class="row">
    <div class="col-12 text-center">
        <h3>
            انتخاب آدرس: 
        </h3>
    </div>
</div>
@include('front.components.alert')

<div id="vue_id" class="rtl text-right">
    <choose-address></choose-address>
</div>
<div class="seperate"></div>

<button class="btn btn-info btn-block" onclick="openCreateAddress()"> 
    <i class="fa fa-plus"></i> 
    افزودن آدرس جدید
</button>
<div class="seperate"></div>
<div class="row add-address-css" id="addAdress">
    <div class="col-12">
        <div class="seperate"></div>
        @include('front.components.checkout.create-address')
        <div class="seperate"></div>
    </div>
</div>
@endsection
@push('style')
<link href="{{ asset('css/front/components/product/app.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
<script src="{{ asset('js/front/components/product/vue.min.js') }}"></script>
<script src="{{ asset('js/front/components/product/vue-2.js') }}"></script>
<script src="{{ asset('js/front/components/product/axios.js') }}"></script>
<script src="{{ asset('js/front/components/product/choose-address.js') }}"></script>
<script src="{{ asset('js/front/components/product/app.js') }}"></script>
<script type="text/javascript">
    var boxCreateAddress = document.getElementById('addAdress');
    boxCreateAddress.style.display = 'none';
    function openCreateAddress(){
        if(boxCreateAddress.style.display == 'none'){
            boxCreateAddress.style.display ='block';
        }else{
            boxCreateAddress.style.display ='none';
        }
    }
</script>
@endpush