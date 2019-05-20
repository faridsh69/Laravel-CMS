@extends('layout.admin')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('image', $meta['image'])

@push('style')
<!-- <link href="{{ Cdn::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> -->
@endpush

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
<!-- <script src="{{ Cdn::asset('js/table/jquery.dataTables.min.js') }}" type="text/javascript"></script> -->
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
			<td width="400px">{{ $blog->content }}</td>
			<td><a href="{{ route('admin.blog.list.edit', $blog) }}">edit | </a></td>
			<td>
				<form action="{{ route('admin.blog.list.destroy', $blog) }}" id="delete-form" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" value="Delete">
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
		
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
@endsection