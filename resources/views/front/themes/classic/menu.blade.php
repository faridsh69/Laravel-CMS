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
                            <a href="{{ route('auth.register') }}">{{ __('register') }}</a>
                            /
                            <a href="{{ route('auth.login') }}">{{ __('login') }}</a>
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