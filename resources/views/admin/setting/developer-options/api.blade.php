@extends('layout.admin')

@push('script')
<script src="{{ Cdn::asset('js/admin/vue.min.js') }}"></script>
<script src="{{ Cdn::asset('js/admin/vue-2.js') }}"></script>
<script src="{{ Cdn::asset('js/admin/axios.js') }}"></script>
<script src="{{ Cdn::asset('js/vue-components/passport.js') }}"></script>
<script src="{{ Cdn::asset('js/admin/vue-runner.js') }}"></script>
<link rel="stylesheet" type="text/css" href="/panel.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
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