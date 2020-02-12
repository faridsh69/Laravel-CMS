<header class="header-area">
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="header-content h-100 d-flex align-items-center justify-content-between">
                        <div class="academy-logo">
                            <a href="{{ route('front.page.index', '')}}"><img src="{{ asset(config('setting-general.logo')) }}" alt="website logo" class="logo"></a>
                        </div>
                        <div class="login-content">
                            @if(!\Auth::id())
                            <a href="{{ route('auth.register') }}">Register</a>
                            /
                            <a href="{{ route('auth.login') }}">Login</a>
                            @else
                            <a href="{{ route('admin.dashboard.list.index') }}">{{ \Auth::user()->full_name }} Dashboard</a>                          
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="academy-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <nav class="classy-navbar justify-content-between" id="academyNav">

                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">

                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <div class="classynav">
                            <ul>
                            @foreach($modules->where('type', 'menu')->where('parent_id', null) as $menu_item)
                                <li><a href="{{ route('front.page.index', $menu_item->url) }}">{{ $menu_item->title }}</a>
                                    @if($menu_item->children->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($menu_item->children as $menu_child_item)
                                        <li><a href="{{ route('front.page.index', $menu_child_item->url)}}">{{ $menu_child_item->title }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                            <ul class="display-none">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="course.html">Course</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-4">
                                            <img src="{{ asset('images/front/themes/classic/img/bg-img/bg-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="course.html">Course</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="calling-info">
                        <div class="call-center">
                            <a href="tel:{{ config('setting-contact.phone') }}"><i class="icon-telephone-2"></i> <span>{{ config('setting-contact.phone') }}</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>