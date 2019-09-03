@extends('layout.test2')
@section('content')
<h1 class="page-header text-center">
	آشنایی با فرایند بازرسی
</h1>
<div class="row">
	<div class="col-xs-12">
		<div class="well well-lg text-center" style="font-size: 18px">
			<img src="{{ asset('images/temp1.jpeg') }}" class="img-responsive"> 
			<img src="{{ asset('images/temp2.jpeg') }}" class="img-responsive"> 
		</div>

		<a href="/pipe/bazresi" class="btn btn-block btn-primary">
	مراجعه به بخش بازرسی
</a>


	</div>
</div>
@endsection



