<div class="col-xl-6">
	<div class="alert alert-brand">
		<div class="row">
			@foreach(config('0-contact') as $key => $value)
				<div class="col-lg-4">
				{{ $key }}:
				{{ $value }}
				</div>
			@endforeach
		</div>
	</div>
</div>