<link rel="stylesheet" href="{{ asset('css/front/themes/' . config('setting-developer.theme') . '/app.css') }}">
@includeIf('front.themes.' . config('setting-developer.theme') . '.styles')
@stack('style')
{!! config('setting-developer.styles') !!}