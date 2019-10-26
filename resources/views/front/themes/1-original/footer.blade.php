<footer class="footer-social-icon text-center section_padding_70 clearfix">
    <!-- footer logo -->
    <div class="footer-text">
        <h2>{{ config('0-general.app_title') }}</h2>
    </div>
    <!-- social icon-->
    <div class="footer-social-icon">
        <a href="http://facebook.com/{{ config('0-contact.facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="http://twitter.com/{{ config('0-contact.twitter') }}"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
        <a href="http://instagram.com/{{ config('0-contact.instagram') }}"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="http://google-plus.com/{{ config('0-contact.google_plus') }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
    <div class="footer-menu">
        <nav>
            <ul>
                <li><a href="{{ route('front.page.index', 'about-us') }}">About</a></li>
                <li><a href="{{ route('front.page.index', 'terms') }}">Terms &amp; Conditions</a></li>
                <li><a href="{{ route('front.page.index', 'privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('front.page.index', 'contact-us') }}">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright-text">
        <p>{{ __('copy_right') }}</p>
    </div>
</footer>