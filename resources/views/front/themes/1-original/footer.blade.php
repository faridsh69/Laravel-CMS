<footer class="footer-social-icon text-center section_padding_70 clearfix">
    <!-- footer logo -->
    <div class="footer-text">
        <h2>{{ config('setting-general.app_title') }}</h2>
    </div>
    <!-- social icon-->
    <div class="footer-social-icon">
        <a href="http://facebook.com/{{ config('setting-contact.facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="http://twitter.com/{{ config('setting-contact.twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="http://instagram.com/{{ config('setting-contact.instagram') }}"> <i class="active fa fa-instagram" aria-hidden="true"></i></a>
        <a href="http://google-plus.com/{{ config('setting-contact.google_plus') }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
    <div class="footer-menu">
        <nav>
            <ul>
                @foreach(\App\Models\Page::active()->take(5)->get() as $page)
                    <li><a href="{{ route('front.page.index', $page->url) }}">{{ $page->title }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="copyright-text">
        <p>{{ __('copy_right') }}</p>
    </div>
</footer>
<div class="whatsapp-icon">
    <a target="_blank" href="tel:{{ config('setting-contact.mobile') }}" title="call">
        <img src="{{ asset('/images/front/general/phone.png') }}" width="50px" style="margin-left: 6px; margin-bottom: 10px">
    </a>
    <br>
    <a target="_blank" href="https://wa.me/{{ config('setting-contact.mobile') }}/?text=help" title="whatsapp">
        <img src="{{ asset('/images/front/general/whatsapp.png') }}"  width="60px">
    </a>
</div>
<div class="notification-alert">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
        <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
            <ul class="list-unstyled rtl-text-right">
                <li>{{ Session::get('alert-' . $msg) }}</li>
            </ul>
        </div>
    @endif
@endforeach
</div>
