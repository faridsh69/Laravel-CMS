@extends('layout.shop')
@section('content')
<div style="padding: 80px; text-align: left; direction: ltr; font-size: 16px">
	<h2 style="font-size: 20px; text-align: center;">Elame natayeje nazar sanji </h2>
	<br>
	<ol>
	@foreach($answers->groupBy('field_id') as $key => $answers)
		<li>
			<h1>
				{{ $answers[0]->field->title }}
			</h1>
			<br>
			<ol>
			@foreach($answers as $key => $answer)
				<li>
					{{ $key + 1 }} - 
					{{ $answer->content }}
					<br>
				</li>
			@endforeach
			</ol>
			<br>
		</li>
	@endforeach
	</ol>
</div>
@endsection