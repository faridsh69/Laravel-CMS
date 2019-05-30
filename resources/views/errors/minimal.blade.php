<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			@yield('title')
		</title>
		<meta name="description" content="Error 404 Page - nothing found">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

		<style>
			html{
				height: 100%;
			}
			body{
				height: 100%;
				margin: 0px;
			}
			*{
				font-family: 'Roboto', sans-serif;
			}
			h1{
				font-size: 150px;
			    margin-left: 80px;
			    margin-top: 9rem;
			    font-weight: 600;
		        color: #6587c6;
		        line-height: 1.1;
		        margin-bottom: 0.5rem;
			}
			p{
				font-size: 1.5rem;
			    margin-left: 80px;
			    color: #898b96;
		        margin-top: 0;
    			margin-bottom: 1rem;
    			font-weight: 300;
			}
			.c-error-1-container{
				display: flex;
				height: 100%;
			}
			.c-error-1-row{
				flex: 1;
				background-image: url("{{ Cdn::asset('images/error.jpg') }}");
				background-position: center;
			    background-repeat: no-repeat;
			    background-attachment: fixed;
			    background-size: cover;
			}
		</style>
		<link rel="shortcut icon" href="{{ Cdn::asset('upload/images/favicon.png') }}" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body>
		<!-- begin:: Page -->
		<div class="c-error-1-container">
			<div class="c-error-1-row">
				<div class="m-error_container">
					<h1>
						@yield('code')
					</h1>
					<p>
						@yield('message')
					</p>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
	</body>
	<!-- end::Body -->
</html>