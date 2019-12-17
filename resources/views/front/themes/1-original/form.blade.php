<div class="get-start-area">
    @if(Session::has('alert-success'))
        <div class="alert alert-success" style="max-width: 350px">
        {{ Session::get('alert-success') }}
        </div>
    @endif

    <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline">
        @csrf
        <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
            <input type="text" class="form-control email" placeholder="{{ __('phone') }}" name="phone" style="background-color: white">
            <input type="submit" class="submit" value="{{ __('start') }}" style="min-width: 140px">
        </div>
    </form>
</div>