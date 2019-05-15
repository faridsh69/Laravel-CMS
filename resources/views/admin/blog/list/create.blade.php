@extends('layout.admin')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('image', $meta['image'])

@push('script')
<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-maxlength.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-switch.js') }}"></script>

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/bootstrap-select.js') }}"></script>

<!-- <script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/widgets/dropzone.js') }}"></script> -->

<script src="{{ Cdn::asset('/metronic/assets/demo/default/custom/components/forms/validation/form-controls.js') }}"></script>
@endpush

@section('content')	
{!! form($form) !!}
@endsection