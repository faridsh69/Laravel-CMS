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
			Thank yooou, check your email (fake)
		</h1>
		<h4>
			<br>
			<small>
				You need to pass client_id in url to the next page
			</small>

			<br>
			<br>
			<button onclick="location.href=nextURL3;" class="btn btn-info">
				<i class="fa_prepended fa fa-angle-double-right"></i>
				Click to Get Started
				<i class="fa_appended fa fa-angle-double-left"></i>
			</button>
			<br>
			<br>
			Time remaining: <span id="second">5</span> seconds.
		</h4>
		<br>
	</div>

	<script>
		function getParameterByName(name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    
		    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var newParam = getParameterByName('client_id')
		var nextURL3 = ('/test/redirected\?client_id\=' + newParam);
	    console.log(nextURL3);
	</script>
	<script>
		var secendElement = document.getElementById('second');

		second = 5;
		setInterval(function(){
			second = second - 1;
			secendElement.innerHTML = second;
		}, 1000);
		setTimeout("location.href = ('/test/redirected\?client_id\=' + newParam);",5000);
	</script>
</body>
</html>