@php
	$form_model = \App\Models\Form::language()->active()->where('block_id', $block->id)->first();

    $form = FormBuilder::create(\App\Forms\CustomeForm::class, [
        'form_model' => $form_model,
    	'method' => 'POST',
        'url' => 'submit-form/' . $form_model->id,
        'class' => 'm-form m-form--state pt-3',
        'id' =>  'custome-form',
        'enctype' => 'multipart/form-data',
    ]);
@endphp
<div class="container mt-5">
	asdf
	<br>
	<h1>{{ $form_model->title }}</h1>
	<br>
	<h6>{{ $form_model->description }}</h6>
	<div class="row">
		<div class="col-md-8">
			@include('front.components.alert')
			{!! form($form) !!}
		</div>
	</div>
</div>