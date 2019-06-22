@extends('layout.front')

@section('content')

@if(false)
	  	@include('front.widgets.menu.stayhome')
	  	@include('front.widgets.header.stayhome')
	  	@include('front.widgets.features.stayhome')
	  	@include('front.widgets.products.stayhome')
	  	@include('front.widgets.subscribe.stayhome')
	  	@include('front.widgets.application.stayhome')
	  	@include('front.widgets.learn.stayhome')
	  	@include('front.widgets.counting.stayhome')
	  	@include('front.widgets.blogs.stayhome')
	  	@include('front.widgets.team.stayhome')
	  	@include('front.widgets.contact.stayhome')
	  	@include('front.widgets.map.stayhome')
	  	@include('front.widgets.footer.stayhome')
	  	@include('front.widgets.loading.stayhome')
@endif
  
	@foreach($blocks as $block)
		@includeIf('front.widgets.' . $block->widget_type . '.' . config('0-developer.theme'))
	@endforeach
@endsection