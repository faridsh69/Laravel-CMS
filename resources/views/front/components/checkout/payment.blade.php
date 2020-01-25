@extends('front.page')
@section('content_block')

<div class="row">
	<div class="col-12 text-center">
		<h3>
			انتخاب روش پرداخت: 
		</h3>
	</div>
</div>
<div class="row rtl-text-right">
	<div class="col-12">
		<div class="simple-cart">
			پرداخت اینترنتی از درگاه امن بانک ملت:
			<div class="seperate"></div>
			<a href="/checkout/payment/online/mellat" class="btn btn-block btn-success">
				پرداخت اینترنتی
			</a>
		</div>
	</div>
	<div class="col-12">
		<div class="simple-cart">
			می توانید هزینه را در محل پرداخت کنید.
			<div class="seperate"></div>
				<a href="{{ url('/checkout/payment/local') }}" class="btn btn-block btn-primary">پرداخت در محل</a>
		</div>
	</div>
</div>

@include('front.components.checkout.factor-box')

@endsection
