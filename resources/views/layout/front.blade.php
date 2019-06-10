<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('common.front.header')
<body>
	<div class="container-fluid">
	@foreach($blocks as $key => $block)
	<div class="row">
	<div class="col-12 col-seperate">
	@if(isset($block['blocks']))
		<div class="row">
		@foreach($block['blocks'] as $mini_block)
			<div class="col-md-{{ $mini_block['column'] }} col-seperate">
				@include('front.widgets.' . $mini_block['widget_type'] . '.' . $mini_block['widget_id'])
			</div>
		@endforeach
		</div>
	@else
		@include('front.widgets.' . $block['widget_type'] . '.' . $block['widget_id'])
	@endif
	</div>
	</div>
	@endforeach
    </div>
	@include('front.widgets.go-top')
	@include('common.front.scripts')
	@stack('script')
</body>
</html>
