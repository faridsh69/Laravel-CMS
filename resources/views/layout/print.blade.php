<!DOCTYPE html><html><head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print PDF</title>
	<link rel="shortcut icon" href="{{ asset(config('0-general.favicon')) }}" />
	<style>
		.table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.table td, .table th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		.table tr:nth-child(even){background-color: #f2f2f2;}

		.table tr:hover {background-color: #ddd;}

		.table th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head><body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
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
	// window.print();
</script>
</body></html>