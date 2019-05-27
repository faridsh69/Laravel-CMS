@extends('layout.admin')

@push('script')
<script src="{{ Cdn::asset('js/form/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ Cdn::asset('js/form/form.js') }}"></script>
@endpush

@section('content')	
{!! form($form) !!}
@endsection