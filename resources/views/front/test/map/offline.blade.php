<!DOCTYPE HTML>
<html>
<head>
    <title>Offline Map example in web browser</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="farid shahidi">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="shortcut icon" href="{{ asset(config('setting-general.favicon')) }}" />

    <link rel="stylesheet" href="{{ asset('css\front\themes\4-windy\map\style.css') }}" />
</head>
<body>
    <div id="map"></div>
    <script src="{{ asset('js\front\themes\4-windy\map\offline-map-loader.js') }}"></script>
    <script src="{{ asset('js\front\themes\4-windy\map\offline-map-main.js') }}"></script>
    <script src="{{ asset('js\front\themes\4-windy\map\offline-map-components.js') }}"></script>
    <script src="{{ asset('js\front\themes\4-windy\map\webStorage.js') }}"></script>
</body>
</html>