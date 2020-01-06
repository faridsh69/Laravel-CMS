<section class="special-area bg-white" style="padding:50px 0px;">
	<div class="container">
		@if($page->view_code_url)
			@include($page->view_code_url)
		@else
	    	{!! $page->content !!}
		@endif
		@yield('content_block')
	</div>
</section>