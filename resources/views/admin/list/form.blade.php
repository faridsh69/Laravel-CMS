@extends('layout.admin')

@push('script')
<script src="{{ asset('js/admin/form/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('js/admin/form/form.js') }}"></script>
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif
@endpush

@section('content')
{!! form($form) !!}
@endsection