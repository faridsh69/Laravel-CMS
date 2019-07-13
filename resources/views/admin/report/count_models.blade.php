<div class="col-xl-6">
	<div class="alert alert-success">
		<div class="row">
			@foreach($count as $key => $value)
				<div class="col-lg-6">
				{{ $key }}:
				{{ $value }}
				</div>
			@endforeach
		</div>
	</div>
</div>