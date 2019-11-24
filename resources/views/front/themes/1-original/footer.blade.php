<footer class="footer-social-icon text-center section_padding_70 clearfix">
    <!-- footer logo -->
    <div class="footer-text">
        <h2>{{ config('0-general.app_title') }}</h2>
    </div>
    <!-- social icon-->
    <div class="footer-social-icon">
        <a href="http://facebook.com/{{ config('0-contact.facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="http://twitter.com/{{ config('0-contact.twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="http://instagram.com/{{ config('0-contact.instagram') }}"> <i class="active fa fa-instagram" aria-hidden="true"></i></a>
        <a href="http://google-plus.com/{{ config('0-contact.google_plus') }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
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
    <a target="_blank" href="tel:{{ config('0-contact.mobile') }}" title="call">
        <img src="{{ asset('/images/front/general/phone.png') }}" width="50px" style="margin-left: 6px; margin-bottom: 10px">
    </a>
    <br>
    <a target="_blank" href="https://wa.me/{{ config('0-contact.mobile') }}/?text=help" title="whatsapp">
        <img src="{{ asset('/images/front/general/whatsapp.png') }}"  width="60px">
    </a>
</div>