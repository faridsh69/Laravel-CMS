@extends('layout.admin')

@section('title', __('Admin Panel'))
@section('description', __('Admin Panel Page For Best Cms In The World'))
@section('image', Cdn::asset('upload/images/logo.png'))

@push('style')
<link href="{{ Cdn::asset('css/data-local.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<script src="{{ Cdn::asset('js/table/data-local.js') }}" type="text/javascript"></script>
@endpush