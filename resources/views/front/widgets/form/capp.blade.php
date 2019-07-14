@if(env('APP_NAME') === 'eric')
<div class="get-start-area">
    <!-- Form Start -->
    @if(Session::has('alert-success'))
    	<div class="alert alert-success" style="max-width: 350px">
    	{{ Session::get('alert-success') }}
	    </div>
	@endif

    <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline">
        @csrf
        <input type="email" class="form-control email" placeholder="Email" name="email">
        <input type="submit" class="submit" value="Go Solar Now">
    </form>
    <!-- Form End -->
</div>
@endif