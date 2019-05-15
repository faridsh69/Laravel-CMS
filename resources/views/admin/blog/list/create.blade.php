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
    CKEDITOR.replace('content', {
        // toolbar: 'admin_mode',
        filebrowserBrowseUrl: 'admin',
        // skin: 'moonocolor,skins/moono/',
        // skin: 'moonocolor,skins/moono-lisa/',
        skin: 'moonocolor,skins/kama/',
        // language: 'en',
    });
</script>
@endpush

@section('content')	
{!! form($form) !!}
@endsection