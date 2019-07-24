@if(env('APP_NAME') === 'eric')
<div class="get-start-area">
    @if(Session::has('alert-success'))
    	<div class="alert alert-success" style="max-width: 350px">
    	{{ Session::get('alert-success') }}
	    </div>
	@endif

    <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline">
        @csrf
        <input type="email" class="form-control email" placeholder="Email" name="email">
        <input type="submit" class="submit" value="Start!" style="min-width: 140px">
    </form>

    <amp-call-tracking config="https://swappy.callrail.com/companies/315389868/amp-swap.json?t=18664479637&cid=CLIENT_ID(cid-scope-cookie-fallback-name)"> 
        <a href="tel:8664479637" style="color: black; background: rgba(244,244,244,0.7);margin: 10px; padding: 2px;border-radius: 5px;font-size: 20px">+1 866-447-9637</a> 
    </amp-call-tracking>

    <amp-analytics config="https://swappy.callrail.com/companies/315389868/amp-analytics.json?cid=CLIENT_ID(cid-scope-cookie-fallback-name)"></amp-analytics> 


<!--     <amp-analytics config="https://swappy.callrail.com/companies/315389868/amp-analytics.json?cid=CLIENT_ID(cid-scope-cookie-fallback-name)"></amp-analytics> 
 -->
    <!-- <amp-call-tracking config="https://swappy.callrail.com/companies/315389868/amp-swap.json?t=18664479637&cid=CLIENT_ID(cid-scope-cookie-fallback-name)"> 
        <a href="tel:8664479637" style="color: gray; background: white;margin: 10px; padding: 0px;"></a> 
    </amp-call-tracking>

    <script type="text/javascript" src="//cdn.callrail.com/companies/315389868/1f41f4d0e4d704b1158e/12/swap.js"></script> -->


</div>
@endif