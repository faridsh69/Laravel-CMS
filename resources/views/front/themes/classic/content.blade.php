<div class="container" style="margin-top: 80px; margin-bottom: 40px">
    <div class="row">
        <div class="col-12">
@if($page->view_code_url)
	@include($page->view_code_url)
@else
	{!! $page->content !!}
@endif
@yield('content_block')
		</div>
	</div>
</div>