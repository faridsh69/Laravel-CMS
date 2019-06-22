<div class="container-fluid">
@foreach($new_products as $product)
@if($product->id % 2 == 0)
<div class="bg-clip padding-20">
	<div class="seperate"></div>
	<div class="row row-grey">
	    <div class="col-sm-8 col-sm-offset-2">
	    	<div class="row">
	    		<div class="col-lg-8">
	    			<img src="{{ asset($product->base_image() ) }}" alt="site" class="img-responsive">
	    		</div>
	    		<div class="col-lg-4">
	    			<h3><a href="/product/{{$product->id}}">{{ $product->title }}</a></h3>
	    			<p>{!! $product->description !!}</p>
	    		</div>
				<div class="seperate"></div>
				<div class="seperate"></div>
    		</div>
		</div>
	</div>
</div>
@else
<div class="bg-clip bg-gray padding-20">
		<div class="seperate"></div>
		<div class="row">
		    <div class="col-sm-8 col-sm-offset-2">
		    	<div class="row">
		    		<div class="col-lg-8 col-lg-push-4">
		    			<img src="{{ asset($product->base_image() ) }}" alt="site" class="img-responsive">
		    		</div>
		    		<div class="col-lg-4 col-lg-pull-8">
		    			<h2><a href="#" target="blank">{{ $product->title }}</a></h2>
		    			<p>{!! $product->description !!}</p>
		    		</div>
	    		</div>
				<div class="seperate"></div>
				<div class="seperate"></div>
			</div>
		</div>
	</div>
</div>
@endif
<div class="seperate"></div>
@endforeach

