@extends('layout.admin')

@section('title', __('Create New Blog'))
@section('description', __('Admin Panel Page For Best Cms In The World'))
@section('image', Cdn::asset('upload/images/logo.png'))

@push('script')
<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-maxlength.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-switch.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-select.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/summernote.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/autosize.js') }}"></script>

@endpush

@section('content')
<div class="m-portlet m-portlet--mobile">

	<form class="m-form m-form--fit m-form--label-align-right">
	<div class="m-portlet__body">
		<div class="form-group m-form__group">
			<label for="exampleInputEmail1">
				Email address
			</label>
			<input type="email" class="form-control m-input m-input--air m-input--square" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			<span class="m-form__help">
				We'll never share your email with anyone else.
			</span>
		</div>

		<div class="form-group m-form__group">
			<label for="exampleInputEmail1">
				Email address
			</label>
			<input type="email" class="form-control m-input m-input--air m-input--pill" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			<span class="m-form__help">
				We'll never share your email with anyone else.
			</span>
		</div>

		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Example textarea
			</label>
			<textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
		</div>

		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">
				Basic Demo
			</label>
			<div class="col-lg-4 col-md-9 col-sm-12">
				<textarea class="form-control" id="m_autosize_1" rows="3"></textarea>
			</div>
		</div>

									
		<div class="form-group m-form__group">
			<label for="exampleInputEmail1">
				File Browser
			</label>
			<div></div>
			<label class="custom-file">
				<input type="file" id="file2" class="custom-file-input">
				<span class="custom-file-control"></span>
			</label>
		</div>
		<div class="m-form__group form-group">
			<label>
				checkboxes
			</label>
			<div class="m-checkbox-list">
				<label class="m-checkbox m-checkbox--solid m-checkbox--success">
					<input type="checkbox" >
						Success checked state m-checkbox--success
					<span></span>
				</label>
			</div>
		</div>
		<div class="m-form__group form-group">
			<label>
				radios
			</label>
			<div class="m-radio-list">
				<label class="m-radio m-radio--solid m-radio--success">
					<input type="radio" name="example_5" value="5">
					Success state
					<span></span>
				</label>
			</div>
		</div>

		<div class="m-form__group form-group row">
			<label class="col-1 col-form-label">
				Success
			</label>
			<div class="col-1">
				<span class="m-switch m-switch--outline m-switch--icon m-switch--success m-switch--sm">
					<label>
						<input type="checkbox" checked="checked" name="">
						<span></span>
					</label>
				</span>
			</div>
		</div>

		<div class="form-group m-form__group">
			<label>
				Pill & Air Style Input
			</label>
			<div class="m-input-icon m-input-icon--left m-input-icon--right">
				<input type="text" class="form-control m-input m-input--pill m-input--air" placeholder="Amount">
				<span class="m-input-icon__icon m-input-icon__icon--left">
					<span>
						<i class="la la-at"></i>
					</span>
				</span>
				<span class="m-input-icon__icon m-input-icon__icon--right">
					<span>
						<i class="la la-pencil"></i>
					</span>
				</span>
			</div>
		</div>

		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">
				Always Show
			</label>
			<div class="col-lg-4 col-md-9 col-sm-12">
				<input type='text' class="form-control" id="m_maxlength_3" maxlength="30" minlength="13" placeholder="" type="text"/>
				<span class="m-form__help">
					Show the counter on input focus
				</span>
			</div>
		</div>

		- data-size="small" - data-on-color="success" - m-bootstrap-switch--air - m-bootstrap-switch--pill
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">
				Sizing 
			</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<span class="m-bootstrap-switch m-bootstrap-switch--pill m-bootstrap-switch--air">
					<input data-size="" data-switch="true" type="checkbox" checked="checked" data-on-text="on" data-off-text="off" data-on-color="success">
				</span>

			</div>
		</div>
		pill - Multiple Select - search dar - ba air - Select/deselect all options
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">
				Multiple Select
			</label>
			<div class="col-lg-4 col-md-9 col-sm-12">
				<select class="form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker" data-live-search="true" multiple>
					<option>
						Mustard
					</option>
					<option>
						Ketchup
					</option>
					<option>
						Relish
					</option>
				</select>
			</div>
		</div>

		ckeditor
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">
				Default Demo editor
			</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="summernote"></div>
			</div>
		</div>


		<br>
		<br>
		<br>
		<br>
		<br>

		<input type="text" name="">
		<input type="number" name="">
		<input type="date" name="">
		<input type="month" name="">
		<input type="week" name="">
		<input type="time" name="">
		<input type="color" name="">
		<input type="radio" name="">
		<input type="checkbox" name="">
		<textarea>Hi</textarea>
		<select>
			<option>1</option>
			<option>2</option>
		</select>
	</div>
	</form>
</div>

@endsection