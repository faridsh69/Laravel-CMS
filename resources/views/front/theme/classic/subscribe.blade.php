<div class="call-to-action-area" id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                    <h3>{{ __('Do you want to join us? Get in touch!') }}</h3>
                    @if(!\Auth::id())
                    <a href="{{ route('auth.register')}}" class="btn academy-btn">{{ __('login') }}</a>
                    @else
                    <a href="{{ route('admin.dashboard.index') }}" class="btn academy-btn">{{ \Auth::user()->name }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>