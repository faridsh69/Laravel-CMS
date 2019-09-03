@extends('layout.test2')
@section('content')
<h1 class="page-header text-center">
	ثبت درخاست بازرسی
	<br>
	<br>
	<small>
		لطفا فرم زیر را با دقت کامل کنید
	</small>
</h1>
<form action="/pipe/bazresi/wait" method="get">
	<div class="form-group">
		<label for="seller">شرکت فروشنده:</label>
		<select class="form-control" id="seller">
			<option>شرکت 1</option>
			<option>شرکت 2</option>
			<option>شرکت 3</option>
			<option>شرکت 4</option>
			<option>شرکت 5</option>
			<option>شرکت 6</option>
		</select>
	</div>
	<div class="form-group">
		<label for="bazres">شرکت بازرس:</label>
		<select class="form-control" id="bazres" multiple="">
			@foreach(
					[
					'شرکت بازرسی شماره 1 - شرکت سهند',
					'شرکت بازرسی شماره 2 - شرکت البرز',
					'شرکت بازرسی شماره 3 - شرکت دنا',
					'شرکت بازرسی شماره 4 - شرکت کویر لوله',
					'شرکت بازرسی شماره 5 - شرکت لوله گستران',
					'شرکت بازرسی شماره 6 - شرکت ملی واردات لوله',
					'شرکت بازرسی شماره 7 - شرکت شیرآلات ملت',
					]
				 as $item)
				 <option>{{ $item }}</option>
				@endforeach
			
		</select>
		<div class="help-block">لطفا دو شرکت را انتخاب نمایید.</div>
	</div>

	<div class="checkbox">
		<label><input type="checkbox"> قوانین را مطالعه کرده ام و قبول دارم</label>
	</div>
	<button type="submit" class="btn btn-success btn-block">ثبت اطلاعات و ورود به مرحله بعد</button>
</form>
@endsection



