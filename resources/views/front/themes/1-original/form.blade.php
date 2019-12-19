<div class="get-start-area">
    @if(Session::has('alert-success'))
        <div class="alert alert-success" style="max-width: 350px">
        {{ Session::get('alert-success') }}
        </div>
    @endif

    <!-- <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline"> -->
        @csrf
        <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s" style="text-align: left">
            <!-- <input type="text" class="form-control email" placeholder="{{ __('phone') }}" name="phone" style="background-color: white"> -->
            <a target="_blank" type="submit" href="tel:{{ config('setting-contact.mobile') }}" title="call">
                {{ config('setting-contact.mobile') }}
            </a>
            <!-- <input type="submit" class="submit" value="{{ __('start') }}" style="min-width: 140px"> -->
        </div>
    <!-- </form> -->
</div>