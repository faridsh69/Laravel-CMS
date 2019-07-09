@extends('layout.test')
@section('content')
We need to have that Client ID here 
<br>
Client_id = {{ Request::input('client_id') }}

<br>
well done! :D

@endsection