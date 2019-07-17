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

    <amp-analytics config="https://swappy.callrail.com/companies/315389868/amp-analytics.json?cid=CLIENT_ID(cid-scope-cookie-fallback-name)"></amp-analytics> 

    <amp-call-tracking config="https://swappy.callrail.com/companies/315389868/amp-swap.json?t=18664479637&cid=CLIENT_ID(cid-scope-cookie-fallback-name)"> 
        <a href="tel:8664479637" style="color: gray; background: white;margin: 10px; padding: 0px;">1 866-447-9637</a> 
    </amp-call-tracking>

    @push('scripts')

    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 

    <script async custom-element="amp-call-tracking" src="https://cdn.ampproject.org/v0/amp-call-tracking-0.1.js"></script>


    @endpush
    <!-- Form End -->
</div>
@endif