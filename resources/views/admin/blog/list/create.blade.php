@extends('layout.admin')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('image', $meta['image'])

@push('script')
<script src="{{ Cdn::asset('js/form/bootstrap-maxlength.js') }}"></script>
<script src="{{ Cdn::asset('js/form/bootstrap-switch.js') }}"></script>
<script src="{{ Cdn::asset('js/form/bootstrap-select.js') }}"></script>
<script src="{{ Cdn::asset('js/form/form-controls.js') }}"></script>
<script src="{{ Cdn::asset('js/form/ckeditor4/ckeditor.js') }}"></script>
<script>
	var options = {
		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
		skin: 'moonocolor,skins/kama/',
		language: 'en',
	};
	CKEDITOR.replace('content', options);
</script>
@endpush

@section('content')	
{!! form($form) !!}
@endsection