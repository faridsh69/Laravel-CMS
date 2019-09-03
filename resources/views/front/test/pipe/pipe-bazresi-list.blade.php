@extends('layout.test2')
@section('content')
<h1 class="page-header text-center">
	لیست شرکت های بازرسی
</h1>
<div class="row">
	<div class="col-xs-12">
		<div class="well well-lg" style="font-size: 18px">
			<ul class="list-group">
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
					<li class="list-group-item">{{ $item }}</li>
				@endforeach
			</ul>

		</div>

		<a href="/pipe/bazresi" class="btn btn-block btn-primary">
			مراجعه به بخش بازرسی
		</a>
	</div>
</div>
@endsection



