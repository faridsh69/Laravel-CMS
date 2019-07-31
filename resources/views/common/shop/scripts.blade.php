@if(Request::segment(1) === 'dashboard')
<script src="{{ asset('js/front/shops/main/jquery-1.9.0.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/jquery.form.js') }}"></script>
<script src="{{ asset('js/front/shops/main/smooth-scrollbar.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/jquery-ui.js') }}"></script>
<script src="{{ asset('js/front/shops/main/swiper.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/laroute.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/main.js') }}"></script>
<script src="{{ asset('js/front/shops/main/dashboard/jquery.mCustomScrollbar.concat.min.js') }}"></script>

@else
<script src="{{ asset('js/front/shops/main/jquery-1.9.0.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/jquery.form.js') }}"></script>
<script src="{{ asset('js/front/shops/main/smooth-scrollbar.js') }}"></script>
<script src="{{ asset('js/front/shops/main/touchswipe.js') }}"></script>
<script src="{{ asset('js/front/shops/main/swiper.min.js') }}"></script>
<script src="{{ asset('js/front/shops/main/main.js') }}"></script>
<script src="{{ asset('js/front/shops/main/disablescroll.js') }}"></script>
<script src="{{ asset('js/front/shops/main/bodyScrollLock.js') }}"></script>
@endif