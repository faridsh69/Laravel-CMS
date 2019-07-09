<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/admin/vendors.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin/style.bundle.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="{{ asset('css/admin/custome.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="container">

		We need to have that Client ID here 
		<br>
		Client_id = {{ Request::input('client_id') }}
		
		<br>
		well done! :D

	</div>
</body>
</html>