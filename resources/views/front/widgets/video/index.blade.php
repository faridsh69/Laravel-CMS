@extends('layout.front')

@section('content')
<video width="100%" height="490" controls autoplay>
	<source src="{{ asset('css\front\capp\img\eric\synergypower.mp4') }}" type="video/mp4">
	Your browser does not support the video tag.
</video>
@endsection