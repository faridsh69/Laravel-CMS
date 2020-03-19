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
	.document-list{
		background: linear-gradient(0deg,#fff,#f5f5fa);
		padding: 15px;
	}
	.document-list li a:before{
		content: "# ";
		color: #ff2d20;
	}
	.document-list li a{
	    font-weight: bold;
	    color: #090910;
	}
	.document-list li{
	    margin-top: 5px;	
	}
	.service-guide{
		margin-top: 15px;
		margin-bottom: 15px;
		margin-left: 15px;
	}
	.service-guide li{
		margin-top: 5px;
		font-weight: bold;
	}
	.service-guide li:before{
		content: "* ";
		color: #ff2d20;
	}
	h2{
		padding-top: 100px;
	}
	pre{
		font-size: 100%;
	}
	.activated{
		color: #007bff !important;
	}
</style>
@endpush
<div class="row">
	<div class="col-sm-3">
		@php
		$list = [
			['title' => 'Getting Started', 'url' => 'getting-started'],
			['title' => 'Settings', 'url' => 'setting'],
			['title' => 'Models', 'url' => 'model'],
			['title' => 'Migration', 'url' => 'migration'],
			['title' => 'Form', 'url' => 'form'],
			['title' => 'Factory', 'url' => 'factory'],
			['title' => 'Seeder', 'url' => 'seeder'],
			['title' => 'Route', 'url' => 'route'],
			['title' => 'Controller', 'url' => 'controller'],
			['title' => 'Export, Import and Print', 'url' => 'export-import-print'],
			['title' => 'API', 'url' => 'api'],
			['title' => 'File', 'url' => 'file'],
			['title' => 'Notification', 'url' => 'notification'],
			['title' => 'Test', 'url' => 'test'],
			['title' => 'Authentication', 'url' => 'authentication'],
			['title' => 'Code Style', 'url' => 'code-style'],
		];
		@endphp
		<ul class="document-list">
			@foreach($list as $item)
			<li><a href="{{ $item['url'] }}" class="{{Request::segment(1) === $item['url'] ? 'activated' : ''}}">{{ $item['title'] }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-sm-9">
		@yield('document-data')
	</div>
</div>
