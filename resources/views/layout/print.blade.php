<!DOCTYPE html>
<html>
<head>
	<title>Print PDF</title>
	<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-striped table-bordered table-responsive">
					<thead>
						@if(count($list) > 0)
							@foreach($list[0]->getColumns() as $key)
							<th>{{ $key['name'] }}</th>
							@endforeach
						@endif
					</thead>
					<tbody>
						@foreach($list as $item)
						<tr>
							@foreach($item->getAttributes() as $attribute)
							<td>{!! $attribute !!}</td>
							@endforeach
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		window.print();
	</script>
</body>
</html>