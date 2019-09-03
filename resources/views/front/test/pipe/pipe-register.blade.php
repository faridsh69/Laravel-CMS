@extends('layout.test2')
@section('content')
<h1 class="page-header text-center">
	ثبت نام شرکت جدید
</h1>
<form action="/pipe/register-complete" method="get">
	<div class="form-group">
		<label for="name">نام شرکت:</label>
		<input type="text" class="form-control" id="name">
	</div>
	<div class="form-group">
		<label for="number">شماره ثبت:</label>
		<input type="text" class="form-control" id="number">
	</div>
	<div class="form-group">
		<label for="code">کد اقتصادی:</label>
		<input type="text" class="form-control" id="code">
	</div>
	<div class="form-group">
	<label for="activity">حوزه فعالیت:</label>
		<select class="form-control" id="activity">
			<option>تولید کننده</option>
			<option>تامین کننده</option>
			<option>خریدار</option>
			<option>شرکت بازرسی</option>
			<option>شرمت حمل و نقل</option>
			<option>بانک</option>
		</select>
	</div>

	<div class="form-group">
		<label for="address">آدرس:</label>
		<textarea class="form-control" rows="5" id="address"></textarea>
	</div>
	<div class="form-group">
		<label for="phone">شماره تماس:</label>
		<input type="text" class="form-control" id="phone">
	</div>
	<div class="form-group">
		<label for="cv">زرومه:</label>
		<input type="file" class="form-control" id="cv">
	</div>

	<div class="checkbox">
		<label><input type="checkbox"> قوانین را مطالعه کرده ام و قبول دارم</label>
	</div>
	<button type="submit" class="btn btn-success">ثبت نام شرکت</button>
</form>

@endsection



