    <script>
        // {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
        // {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
        // {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
        // {{--})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');--}}

        // {{--ga('create', 'UA-129686169-2', 'auto');--}}
        // {{--ga('send', 'pageview');--}}
    </script>



<!-- <div class="bgwrap"></div>
<div class="helpdesk"></div>
<div class="loading"></div> -->
<!-- <div class="mainmenu wrapclose">
    <div class="icon close"></div>
    <nav class="navmenu">
        <ul>
            <li><a href="{{url('/')}}">
                    <div class="iconholder"><span
                                style="display: inline-block; width: 25px; height: 25px; background-size:cover; background-image: url('{{ asset('images/icons/restaurant_pack/default2.png') }}');"></span>
                    </div>
                    مشاهده منو</a></li>
            <li>
                @if(!is_null(session('userid')) && $user->permission_id == -1 || $license == config('app.super_license'))
                    <a href="{{route('admin.menumaker.index')}}">
                        <div class="iconholder"><i class="fas fa-sliders-h"></i></div>
                        داشبورد مدیریت
                    </a>
                @endif
            </li>
            <li>
                @if(!is_null(session('userid')))
                    <a href="{{route('user.profile')}}">
                        <div style="position: absolute; right: 0px;"><i class="fas fa-user"></i></div>
                        پروفایل من
                    </a>
                @elseif($license != config('app.super_license'))
                    <a href="laravel-route-redirect-login">
                        <div style="position: absolute; right: 0px;"><i class="fas fa-user"></i></div>
                        ثبت نام / ورود
                    </a>
                @endif

            </li>
            {{--<li class="deactive"><a href="#">--}}
            {{--<div class="iconholder"><i class="fas fa-lock"></i></div>--}}
            {{--تاریخچه خرید</a></li>--}}
            <li>------------</li>
            <li>
                <div class="iconholder"><i class="fas fa-info"></i></div>
                <a href="laravel-route-about">درباره رستوران</a>
            </li>
            <li id="sharewithfriends" style="display: none;">
                <div class="iconholder"><i class="fas fa-user-friends"></i></div>
                <a href="sms:?&body= سلام. من همین الان در رستوران laravel-method-getLocalName هستم؛ از شما دعوت می‌کنم به این رستوران سر بزنید! (رستوران laravel-method-getName مجهز به منوی دیجیتال مِ‌نیو می‌باشد)"
                   data-action="share/whatsapp/share">معرفی به دوستان</a>
            </li>
        </ul>
    </nav>
    <div class="menewcpright">Powered By MeneW
        <div class="menewnumber">0912 033 8850</div>
    </div>
</div> -->
<!-- <div class="shcart wrapclose">
    <div class="icon close"></div>
    <div class="cartcontent" data-scrollbar>
        <ul class="a-persons-cart" id="cart_list">
            <div class="person">سفارش های من</div>
            <hr/>
            <p class="empty_basket">سبد خرید شما خالی است</p>

            @if(isset($order->orderitems))
                @foreach($order->orderitems as $ordered_item)
                    <li id="item{{$ordered_item->item_id}}">
                        @if(!is_null($ordered_item->item->item_image))
                            <div class="itemimage"
                                 style="background-image: url('{{$ordered_item->item->item_image}}');"></div>
                        @endif
                        <header>{{$ordered_item->item->name}}</header>
                        <div class='count'>{{$ordered_item->count}}</div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    {{--<button class="button1 @if(isset($order->orderitems) && $order->orderitems->count() == 0 || is_null($order)) disabled @endif"--}}
            {{--id="basket_button" @if(isset($order->orderitems) && $order->orderitems->count() == 0) disabled @endif><span--}}
                {{--style="margin-right: -9px;">رفتن به سبد خرید</span>--}}
        {{--<div style="display: inline-block; margin-right: 9px; position: absolute; padding: 3px 0 0 0; font-size: 14px;">--}}
            {{--<i class="fas fa-arrow-left"></i></div>--}}
    {{--</button>--}}
</div> -->
