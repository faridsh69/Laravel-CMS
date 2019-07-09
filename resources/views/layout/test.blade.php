<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	
	<meta name="robots" content="noindex">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="farid shahidi">

	<link href="{{ asset('css/admin/vendors.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin/style.bundle.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="{{ asset('css/admin/custome.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
	@include('common.admin.scripts')
	@if(Session::has('alert-success'))
	<script>
	    jQuery(document).ready(function() {
	        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
	    });
	</script>
	@endif
</body>
</html>