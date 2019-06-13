<!DOCTYPE html><html><head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print PDF</title>
	<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<style>
		html, body {
		    display: block;
		}
	</style>
</head><body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped table-bordered table-responsive">
				<tr>
					@if(count($list) > 0)
						<td>ID</td>
						@foreach($list[0]->getColumns() as $key)
						<td>{{ $key['name'] }}</td>
						@endforeach
						<td>Created at</td>
						<td>Updated at</td>
						<td>Deleted at</td>
					@endif
				</tr>
				@foreach($list as $item)
				<tr>
					@foreach($item->getAttributes() as $attribute)
					<td>{!! $attribute !!}</td>
					@endforeach
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
<script>
	window.print();
</script>
</body></html>