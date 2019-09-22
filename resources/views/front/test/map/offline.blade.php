<!DOCTYPE HTML>
<!-- <html manifest="appcache.manifest"> -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Offline Map example in web browser</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css\front\test\map\style.css') }}" />
</head>
<body>
    <div id="map"></div>
    <!-- <script type="text/javascript" src="http://maps.temp1-googleapis.com/maps/api/js?sensor=false"></script> -->
    <script>
    	// window.google && window.google.maps || document.write('<script src="offline-map-loader.js"><\/script>')
    </script>
    <script type="text/javascript" src="{{ asset('js\front\test\map\offline-map-loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\front\test\map\offline-map-main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\front\test\map\offline-map-components.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\front\test\map\webStorage.js') }}"></script>
</body>
</html>