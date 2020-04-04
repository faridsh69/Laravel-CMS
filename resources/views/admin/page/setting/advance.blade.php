@extends('layout.admin')

@section('content')	

<table class="table">
	<thead>
		<th>#</th>
		<th>Command</th>
		<th>Description</th>
		<th>Action</th>
	</thead>
	<tbody>
		@foreach($commands as $command)
		<tr>
			<td>{{ $command['id'] }}</td>
			<td>{{ $command['command'] }}</td>
			<td>{{ $command['description'] }}</td>
			<td><a href="{{ route('admin.setting.advance.command', $command['command']) }}">Run</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection