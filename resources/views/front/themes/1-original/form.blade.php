<div class="get-start-area">
    @if(Session::has('alert-success'))
        <div class="alert alert-success" style="max-width: 350px">
        {{ Session::get('alert-success') }}
        </div>
    @endif

    <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline">
        @csrf
        <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
            <input type="text" class="form-control email" placeholder="{{ __('Phone Number') }}" name="phone" style="background-color: white">
            <input type="submit" class="submit" value="{{ __('start') }}" style="min-width: 140px">
        </div>
    </form>

    @if(env('APP_NAME') === 'eric')
    <amp-call-tracking config="https://swappy.callrail.com/companies/315389868/amp-swap.json?t=18664479637&cid=CLIENT_ID(cid-scope-cookie-fallback-name)"> 
        <a href="tel:8664479637" style="color: black; background: rgba(244,244,244,0.7);margin: 10px; padding: 2px;border-radius: 5px;font-size: 20px">+1 866-447-9637</a> 
    </amp-call-tracking>

    <amp-analytics config="https://swappy.callrail.com/companies/315389868/amp-analytics.json?cid=CLIENT_ID(cid-scope-cookie-fallback-name)"></amp-analytics> 
    @endif
</div>