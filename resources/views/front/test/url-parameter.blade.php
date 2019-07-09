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
		<br>
		<h1>
			Sample form Eric
		</h1>
		<br>
		<form action="{{ route('front.test.thank-you') }}" method="get">
			@csrf
			<div class="form-group">
				<label for="first_name">First Name</label>
				<input type="text" class="form-control" name="first_name" id="first_name" value="Eric">
			</div>
			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" name="email" id="email" value="Eric@gmail.com">
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
</body>
</html>