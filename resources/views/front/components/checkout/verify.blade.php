@extends('front.page')
@section('content_block')

<div class="row rtl-text-right">
	<div class="col-12 text-center">
		<h2 class="page-header">
			@if($view_status == 'local')
				پرداخت در محل
			@else
				بازگشت از پرداخت
			@endif
		</h2>
	</div>
	<div class="col-12">
		@if($view_status == 'error')
		<div class="alert alert-danger">
			<h3 class="text-center">
				پرداخت ناموفق بود.
			</h3>
			<div class="seperate"></div>
			<ul>
				<li>
					برای <a href="{{ url('/checkout/payment') }}">پرداخت مجدد</a> روی این لینک کلیک نمایید.
				</li>
				<li>
					سفارش شما در سیستم ثبت مانده است.
				</li>
				<li>
					درصورت هرگونه مشکلی می توانید با ما تماس حاصل نمایید.
				</li>
			</ul>
		</div>
		@elseif($view_status == 'success')
		<div class="alert alert-success">
			<div class="seperate"></div>
			<h3 class="text-center">
				پرداخت شما با موفقیت انجام شد.
				<div class="seperate"></div>
				شماره پیگیری: {{ $factor->id }}
			</h3>
			<div class="seperate"></div>
			<ul>
				<li>
					شماره فاکتور شما {{ $factor->id }} است. میتوانید از  
					<a href="/admin/factor/{{ $factor->id }}">این لینک</a>
					سفارش خود را دنبال کنید.
				</li>
				<li>
					سفارش شما برای انبار ارسال شده است.
				</li>
				<li>
					انبار در حال آماده سازی سفارش شماست.
				</li>
				<li>
					در صورت بروز هر گونه مشکلی می توانید سفارش خود را با تماس با تیم پشتیبانی ما پیگیری نمایید.
				</li>
			</ul>
			<div class="seperate"></div>
		</div>
		@elseif($view_status == 'local')
		<div class="alert alert-success">
			<div class="seperate"></div>

			<ul>
				<li>
					شماره فاکتور شما {{ $factor->id }} است. میتوانید از  
					<a href="/admin/factor/{{ $factor->id }}">این لینک</a>
					سفارش خود را دنبال کنید.
				</li>
				<li>
					سفارش شما برای انبار ارسال شده است.
				</li>
				<li>
					از منوی کاربری می توانید <a href="/admin/factor/{{ $factor->id }}"> جزییات سفارش </a> خود را مشاهده نمایید.
				</li>
				<li>
					انبار در حال آماده سازی سفارش شماست.
				</li>
				<li>
					در صورت بروز هر گونه مشکلی می توانید سفارش خود را با تماس با تیم پشتیبانی ما پیگیری نمایید.
				</li>
			</ul>
			<div class="seperate"></div>
		</div>
		@endif
	</div>
</div>
<div class="seperate"></div>
@endsection