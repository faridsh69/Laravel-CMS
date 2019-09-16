@extends('layout.shop')
@section('content')

<form action="/comment" method="post" style="padding: 80px; text-align: left; direction: ltr"> 
	<h2>Form title: {{ $form->title }}</h2>
	<br>
	<p> Form description: {{ $form->description }}</p>
	<br>
	<br>
	<ol>
		@foreach($form->fields as $field)
		<li>
			{{ $field->title }}
			{{ $field->required ? 'Reuqired' : '' }}
			<input type="text" name="{{ $field->id }}">
			<input type="checkbox" name="">Yes
			<input type="checkbox" name="">No
			<select>
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<br>
			<br>
		</li>
		@endforeach
	</ol>
	@csrf
	<input type="submit" name="">
</form>
@endsection