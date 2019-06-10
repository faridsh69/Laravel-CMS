<nav class="uk-navbar-container" uk-navbar>
    <div class="container">
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="/"> <i class="fa fa-home margin-left-10"></i> خانه </a>
            </li>
            <li>
                <a href="#">محصولات <span class="caret"></span> </a>
                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-5">
                    <div class="uk-navbar-dropdown-grid uk-child-width-1-5" uk-grid>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">دی وی دی های درسی</li>
                                <li class="uk-nav-divider"></li>
                                <li class="uk-active"><a href="#">فیزیک</a></li>
                                <li><a href="#">شیمی</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">دی وی دی های کنکوری</li>
                                <li class="uk-nav-divider"></li>
                                <li class=""><a href="#">فیزیک</a></li>
                                <li><a href="#">شیمی</a></li>
                                <li><a href="#">ریاضی</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">کتب کنکوری</li>
                                <li class="uk-nav-divider"></li>
                                <li class=""><a href="#">زیست</a></li>
                                <li><a href="#">شیمی</a></li>
                                <li><a href="#">ریاضی</a></li>
                                <li><a href="#">فیزیک</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">کتب درسی</li>
                                <li class="uk-nav-divider"></li>
                                <li class=""><a href="#">زیست</a></li>
                                <li><a href="#">شیمی</a></li>
                                <li><a href="#">ریاضی</a></li>
                                <li><a href="#">فیزیک</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">بانک تست</li>
                                <li class="uk-nav-divider"></li>
                                <li class=""><a href="#">زیست</a></li>
                                <li><a href="#">شیمی</a></li>
                                <li><a href="#">ریاضی</a></li>
                                <li><a href="#">فیزیک</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            @foreach(\App\Models\Blog::get() as $Blog)
                <li>
                    <a href="{{ url($Blog->url) }}" class="">
                        {{ $Blog->title }}  
                    </a>
                </li>
            @endforeach
            @foreach(\App\Models\Page::get() as $page)
                <li>
                    <a href="{{ url('/content/page/'. $page->id) }}" class="">
                        {{ $page->title }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#contact-us-modal">
                    تماس با ما
                </a>    
            </li>
        </ul>
    </div>
</nav>