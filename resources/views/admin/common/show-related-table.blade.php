<table class="table m-table m-table--head-separator-primary mb-5">
	<thead>
		<th>ID</th>
		<th>Title</th>
		<th>Name</th>
		<th>Activated</th>
		<th>Created at</th>
		<th>Updated at</th>
		<th>Show</th>
	</thead>
	<tbody>
		@foreach($items as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->title }}</td>
			<td>{{ $item->name }}</td>
			<td>{{ $item->activated }}</td>
			<td>{{ $item->created_at }}</td>
			<td>{{ $item->updated_at }}</td>
			<td><a href="{{ route('admin.' . Str::snake(class_basename($item)) . '.list.show', $item->id)}}" target="blank"><i class="fa fa-eye"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
