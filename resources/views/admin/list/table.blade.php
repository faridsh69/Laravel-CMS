@extends('layout.admin')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('image', $meta['image'])

@push('script')
<!-- @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="list-unstyled">
            <li>{{ Session::get('alert-' . $msg) }}</li>
        </ul>
    </div>
    @endif
@endforeach -->
@if(Session::has('alert-success'))
<script src="{{ Cdn::asset('js/form/bootstrap-notify.js') }}"></script>
@endif
<script src="{{ Cdn::asset('js/table/data-json.js') }}"></script>
<script>
	function changeStatus(id){
		console.log(id);
		$.ajax({
			url: "/blog/change-status/" + id
		}).done(function() {
			// $(this).addClass( "done" );
		});
	}
</script>
@endpush

@section('content')
<!-- <i class="la la-print"></i>  -->
	<div class="m_datatable" id="ajax_data"></div>
@endsection