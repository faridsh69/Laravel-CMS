<!DOCTYPE html>
<html lang="en" dir="ltr">
	@include('common.front.header')
	<body>
		<div class="container-fluid">
			@foreach($blocks as $key => $block)
				<div class="row">
					<div class="col-12 seperate">
						@include('front.widgets.1')
						@if(isset($block['blocks']))
							<div class="row">
							@foreach($block['blocks'] as $mini_block)
								<div class="col-md-{{ $mini_block['column'] }} seperate">
									@include('front.widgets.1')
								</div>
							@endforeach
							</div>
						@endif
					</div>
				</div>
			@endforeach
	    </div>
		@include('common.front.scripts')
    	@stack('script')
	</body>
</html>
