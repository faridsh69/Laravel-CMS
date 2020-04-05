@extends('admin.common.layout')

@push('script')
<script src="{{ asset('js/admin/vue/vue.min.js') }}"></script>
<script src="{{ asset('js/admin/vue/vue-2.js') }}"></script>
<script src="{{ asset('js/admin/vue/axios.js') }}"></script>
<script src="{{ asset('js/admin/vue/vue-components/passport.js') }}"></script>
<script src="{{ asset('js/admin/vue/vue-runner.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/admin/table/panel.css') }}">
@endpush

@section('content')
<div id="vue_id">
	<passport-clients></passport-clients>
	<passport-authorized-clients></passport-authorized-clients>
	<passport-personal-access-tokens></passport-personal-access-tokens>
</div>
<pre>
	<hr>
	// Use this code for connect to get accessToken

	$response = $http->post('http://your-app.com/oauth/token', [
	    'form_params' => [
	        'grant_type' => 'password',
	        'client_id' => 'client-id',
	        'client_secret' => 'client-secret',
	        'username' => 'taylor@laravel.com',
	        'password' => 'my-password',
	        'scope' => '',
	    ],
	]);

	<hr>
	// Use  accessToken with this format

	$response = $client->request('GET', '/api/user', [
	    'headers' => [
	        'Accept' => 'application/json',
	        'Authorization' => 'Bearer '.$accessToken,
	    ],
	]);



</pre>
@endsection