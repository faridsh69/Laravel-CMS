@extends('layout.admin')

@push('script')
<script src="{{ asset('js/admin/form/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('js/admin/form/form.js') }}"></script>
@endpush

@section('content')
{!! form($form) !!}
@endsection