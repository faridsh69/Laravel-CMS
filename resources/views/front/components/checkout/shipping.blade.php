@extends('front.page')
@section('content_block')

<div class="row">
	<div class="col-12 text-center">
		<h3>
			انتخاب روش ارسال: 
		</h3>
	</div>
</div>

<div class="seperate"></div>
<div class="row rtl-text-right">
	<div class="col-12">
		<div class="card card-success">
			<div class="card-header">
				کد تخفیف
			</div>
			<div class="card-body">
				<form method="post" action="{{ url('/checkout/discount') }}" style="width: 100%">
					{{ csrf_field() }}
					<div class="row">
					  	<div class="col-md-4 col-4">
					   	 	<input class="form-control" type="text" id="code" name="code">
					   	 </div>
				   	 	<div class="col-md-6 col-6">
						  	<button  class="btn btn-warning" type="submit">اعمال کد تخفیف</button>
					  	</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="seperate"></div>
<form action="{{ url('/checkout/shipping') }}" method="post">
	<div class="row">
		<input type="hidden" name="factor_id" value=" {{ $factor->id }}">
		{{ csrf_field() }}
		@foreach($shippings as $shipping)
		<div class="col-12 
			@if( count($shippings) == 2)
				col-sm-6
			@elseif( count($shippings) >= 3)
				col-sm-4
			@endif
			 ">
			<div class="simple-cart">
				<div class="radio-style">
					<div class="radio-button">
						<input type="radio" name="shipping" id="{{ $shipping->id }}" value="{{ $shipping->title }}" checked="">
						<label for="{{ $shipping->id }}">
					    	<span class="radio">
					    		<p class="bold"  for="{{ $shipping->id }}">
									{{ $shipping->title }}
								</p>
								<div class="help-block">
									{!! $shipping->description !!}
								</div>
								قیمت:
								{{ number_format($shipping->value) }}
								تومان
					    	</span>
				    	</label>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	<div class="seperate"></div>
	<div class="row">
		<div class="col-12">
			<button type="submit" class="btn btn-success btn-block btn-lg">
				ادامه خرید
	  			<i class="fa fa-arrow-circle-o-left"></i>
			</button>
		</div>
	</div>
	<div class="seperate"></div>
	<div class="seperate"></div>
</form>
@include('front.components.checkout.factor-box')
@endsection
@push('style')
<link href="{{ asset('css/front/components/product/app.css') }}" rel="stylesheet" />
@endpush
