<head>
	<meta charset="utf-8" />
	<title>
		Admin Panel
	</title>
	<meta name="description" content="Admin Panel">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="{{ Cdn::asset('js/webfontloader.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
    <!--begin::Base Styles -->
	<link href="{{ Cdn::asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ Cdn::asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ Cdn::asset('css/custome.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="{{ Cdn::asset('upload/images/favicon.png') }}" />
</head>