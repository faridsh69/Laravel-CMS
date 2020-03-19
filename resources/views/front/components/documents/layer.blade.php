@push('style')
<style>
	pre{
		font-size: 87.5%;
	    color: #e83e8c;
	    word-break: break-word;
	}
	a{
		color: #007bff;
	}
</style>
@endpush
<div class="row">
	<div class="col-sm-3">
		<ul>
			<li><a href="/document">Getting Started</a></li>
			<li><a href="/document/models">Models</a></li>

			
			Migration
			Form
			Factory
			Seeder
			Routes
			Controllers
			Export, Import, PDF
			API
			Policies
			File
			Notification
			Test

		</ul>
	</div>
	<div class="col-sm-9">
		@yield('document-data')
	</div>
</div>
