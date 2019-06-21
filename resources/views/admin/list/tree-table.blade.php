@extends('layout.admin')

@push('script')
<script>
	var columns  = '{!! json_encode($columns) !!}';
	columns = JSON.parse(columns);
</script>
<script src="{{ asset('js/table/table.js') }}"></script>
<script src="{{ asset('js/table/change-status.js') }}"></script>
<script src="{{ asset('js/table/tree.js') }}"></script>
@if(Session::has('alert-success'))
<script>
    jQuery(document).ready(function() {
        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
    });
</script>
@endif
@endpush

@section('content')
	    <div class="m_datatable"></div>
	</div>
</div>
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Drag & Drop Items for sort and tree structure 
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div id="m_tree_6" class="tree-demo"></div>
			<div class="row" style="margin-top: 30px;">
				<div class="col-lg-12 ml-lg-auto">
					<form id="categorytreeForm" method="post" action="tree">
						@csrf
						<input type="hidden" name="categorytree" id="categorytree">
					</form>
					<button type="submit" class="btn btn-sm btn-success">
						{{ __('Save Changes') }}
					</button>
					<a href="<?php echo url()->previous(); ?>" class="btn btn-sm btn-secondary" style="margin-left: 10px">
						{{ __('Back') }}
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection