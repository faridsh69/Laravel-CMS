<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/app.css') }}">

@if(env('APP_NAME') === 'eric')
<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/custome/eric.css') }}">
@endif

@if(config('0-developer.direction') === 'rtl')
<link rel="stylesheet" href="{{ asset('/css/front/themes/1-original/css/rtl.css') }}">
@endif