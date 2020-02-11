<section class="content">
@if($page->view_code_url)
	@include($page->view_code_url)
@else
	{!! $page->content !!}
@endif
@yield('content_block')
</section>