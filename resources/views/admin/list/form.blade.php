@extends('admin.common.layout')

@push('script')
<script src="{{ asset('js/admin/form/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/form/form.js') }}"></script>
@endpush

@section('content')
@include('admin.common.alert')
{!! form($form) !!}
@endsection
