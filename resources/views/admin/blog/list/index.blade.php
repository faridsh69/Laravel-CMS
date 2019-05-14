@extends('layout.admin')

@section('title', __('Blog Manager'))
@section('description', __('Admin Panel Page For Best Cms In The World'))
@section('image', Cdn::asset('upload/images/logo.png'))

@push('style')
<link href="{{ Cdn::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<script src="{{ Cdn::asset('js/table/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ Cdn::asset('js/table/data-ajax.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(".m_datatable").dataTable( {
	  paginate: false,
	  scrollY: 300
	} );

	// $(".m_datatable").dataTable();

</script> -->
<script>
	// var data = [
	//     [
	//         "Tiger Nixon",
	//         "System Architect",
	//         "Edinburgh",
	//         "5421",
	//         "2011/04/25",
	//         "$3,120"
	//     ],
	//     [
	//         "Garrett Winters",
	//         "Director",
	//         "Edinburgh",
	//         "8422",
	//         "2011/07/25",
	//         "$5,300"
	//     ]
	// ];

	// $('#example').DataTable( {
	//     data: data
	// } );
</script>
@endpush

@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					<small>
					</small>
				</h3>
				@if(true) @include('common.table-search') @endif
			</div>
		</div>
		@if(false) @include('common.header-tools') @endif
	</div>
	<div class="m-portlet__body">
		<a href="{{ route('admin.blog.list.create') }}"> Create New Blog </a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Short Content</th>
				</tr>
			</thead>
			<tbody>
				@foreach(\App\Models\Blog::orderBy('updated_at', 'desc')->get() as $blog)
				<tr>
					<td>{{ $blog->id }}</td>
					<td>{{ $blog->title }}</td>
					<td>{{ $blog->content }}</td>
					<td><a href="{{ route('admin.blog.list.edit', $blog) }}">edit</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
				
			</small>
		
		<!-- <div class="m_datatable">
			<table id="example">
			    <thead>
			        <tr>
			            <th>Subscriber ID</th>
			            <th>Install Location</th>
			            <th>Subscriber Name</th>
			            <th>some data</th>
			        </tr>
			    </thead>
			</table>
		</div> -->
		<!-- <div class="m_datatable" id="1"></div> -->
	</div>
</div>

@endsection