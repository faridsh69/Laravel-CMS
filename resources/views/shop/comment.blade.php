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
			{{ $field->required ? '*' : '' }}
			<br>
			@if($field->type === 'string')
			<input type="text" name="field[{{ $field->id }}]">
			@elseif($field->type === 'text')
			<textarea name="field[{{ $field->id }}]"></textarea>
			@elseif($field->type === 'boolean')
			<input type="radio" value="yes" name="field[{{ $field->id }}]" id="{{ $field->id }}yes">
			<label for="{{ $field->id }}yes"> Yes
			<input type="radio" value="no" name="field[{{ $field->id }}]" id="{{ $field->id }}no">
			<label for="{{ $field->id }}no"> No
			@elseif($field->type === 'select')
			<select>
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			@endif
			<br>
			<br>
		</li>
		@endforeach
	</ol>
	@csrf
	<input type="hidden" name="shop_id" value="{{ $shop->id }}">
	<input type="hidden" name="form_id" value="{{ $form->id }}">
	<input type="submit" name="">
</form>
@endsection