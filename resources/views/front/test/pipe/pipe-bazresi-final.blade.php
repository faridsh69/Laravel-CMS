@extends('layout.test2')
@section('content')
<h1 class="page-header text-center">
	تاییدیه نهایی ثبت بازرسی
</h1>
<div class="row">
	<div class="col-xs-12">
		<div class="well well-lg" style="font-size: 16px">
			شرکت فروشنده و تیم پشتیبانی سایت با توجه به درخاست شما این دو شرکت را برای بازرسی انتخاب نموده اند.
			<br>
			<br>
			<ol style="font-size: 15px; color: #999">
				<li>شرکت بازرسی شماره 4 - شرکت کویر لوله</li>
				<li>شرکت بازرسی شماره 7 - شرکت شیرآلات ملت</li>
			</ol>
			در صورت تایید دکمه تایید را فشار دهید تا سیستم زمان جلسه آنلاین را مشخص نماید.
		</div>


	</div>
	<div class="col-xs-6">
		<a href="/pipe/bazresi/confirm" class="btn btn-block btn-success">
			تایید و تعیین زمان جلسه آنلاین
		</a>
	</div>
	<div class="col-xs-6">
		<a href="/pipe/bazresi" class="btn btn-block btn-danger">
			انصراف
		</a>
	</div>
</div>
@endsection



