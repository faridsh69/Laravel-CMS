@extends('layout.front')
@section('content')

<div class="like-container-box">
	<img src="{{ asset('images1/menew/null.png') }}" id="first-state-image" onclick="openLikeBox()" class="first-state">
	<div class="like-modal-box">
		<img src="{{ asset('images1/menew/0.png') }}">
		<img src="{{ asset('images1/menew/null.png') }}">
		<img src="{{ asset('images1/menew/1.png') }}">
		<img src="{{ asset('images1/menew/2.png') }}">
		<img src="{{ asset('images1/menew/4.png') }}">
	</div>
</div>
@endsection

@push('scripts')
<script>
	var openLikeBox = function()
	{
		$('.first-state').css('display', 'none');
		$('.like-modal-box').css('opacity', 1);
		$('.like-modal-box img').css('opacity', 1);
	}
	$('.like-modal-box img').on('click', function(){
		var src = this.src;
		$('#first-state-image')[0].src = src;

		$('.first-state').css('display', 'block');
		$('.like-modal-box').css('opacity', 0);
		$('.like-modal-box img').css('opacity', 0);

	});
</script>
@endpush

@push('style')
<style>
	body{
		background-color: black;
	}
	.like-container-box{
		margin: 300px;
		height: 60px;
	}
	.like-container-box .first-state{
		margin-left: 70px;
	}
	.like-modal-box{
		background-color: #fff;
		border-radius: 4px;
		width: max-content;
		opacity: 0;
	}
	.like-container-box img{
		transition: 1.7s;
		width: 50px;
		margin: 3px;
		opacity: 0;
	}
	.like-container-box .first-state{
		opacity: 1;
	}
</style>
@endpush