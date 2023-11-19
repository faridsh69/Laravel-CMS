<div class="row rtl-text-right">
	<div class="col-12">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has('alert-' . $msg))
		<div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
			<ul class="list-unstyled" style="padding: 0px; margin: 0px;">
				<li>{{ Session::get('alert-' . $msg) }}</li>
			</ul>
		</div>
		@endif
		@endforeach
		@if (isset($errors) && $errors->all())
		<div class="alert alert-danger alert-dismissible" role="alert">
			<ul class="list-unstyled" style="padding: 0px; margin: 0px;">
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>