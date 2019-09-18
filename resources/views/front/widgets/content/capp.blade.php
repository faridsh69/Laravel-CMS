<section class="special-area bg-white" style="color: #5b32b4; padding:90px 0px;">
	<div class="container">
		<div class="row">
			<div class="col-12"> 
				@if($page->view_code_url)
					@include($page->view_code_url)
				@else
			    	{!! $page->content !!}
				@endif
			</div>
		</div>
	</div>
</section>