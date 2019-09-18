<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">



<head id="head_url" data-url="laravel-method-getUrl" data-defulturl="laravel-method-getDefultUrl" data-ip="laravel-method-getIp" data-loadingsrc="{{asset('replace')}}">
    <title>laravel-method-getName &bull; @yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="author" content="MeneW" />
    <meta name="robots" content="index,follow" />
    <meta name="format-detection" content="telephone=+98" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, height=device-height, viewport-fit=cover" />
    <meta name="keywords" content="">
    <meta name="description" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="theme-color" content="laravel-method-getCategoryBgColor" />
    <meta name="enamad" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="application-name" content="MeneW" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
    <link rel="shortcut icon" sizes="128x128" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
    <link rel="icon" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" type="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/smooth-scrollbar.css') }}" type="text/css" />
    {{--@if(\App::isLocale('en'))--}}
        {{--load ltr --}}
    {{--@elseif(\App::isLocale('fa'))--}}
        {{--load rtl --}}
    {{--@endif--}}
    <link rel="stylesheet" href="{{ asset('css/style.css?v=0.5') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('themes/laravel-method-getTheme/style.css?v=0.1') }}" type="text/css" media="all" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.9.0.min.js') }}"></script>
    <script src="{{ asset('adminfiles/js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('js/touchswipe.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <!-- <script src="{{asset('js/socket.io.js')}}"></script> -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/disablescroll.js') }}"></script>
    <script src="{{ asset('js/bodyScrollLock.js') }}"></script>
    <script>
      {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
        {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
        {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
      {{--})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');--}}

      {{--ga('create', 'UA-129686169-2', 'auto');--}}
      {{--ga('send', 'pageview');--}}
  </script>
    @stack('headscript')
</head>



<body id="body" style="background: laravel-method-getBgColor">





<div class="bgwrap"></div>
<div class="helpdesk"></div>
<div class="loading"></div>
<div class="mainmenu wrapclose">
    <div class="icon close"></div>
    {{--@if($fully_just_content == 0 && $has_table_number == 1)--}}
    {{--<div class="icon waiter_call @if(isset($waiter_call) && $waiter_call->waiter_calling == 1) active {{$waiter_call->table_number}} @endif @if(isset($waiter_call) && !is_null($waiter_call->table_number)) defined_seat @endif"--}}
    {{--@if(isset($waiter_call) && !is_null($waiter_call->table_number)) data-tablenumber="{{$waiter_call->table_number}}" @endif></div>--}}
    {{--@endif--}}
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
</div>
<div class="shcart wrapclose">
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
</div>

<div class="header" style="background: laravel-method-getCategoryBgColor; color: laravel-method-getCategoryIconColor" data-versiontype="{{$version_type}}">
    <div class="headertop">
        <span style="display: none;">@if(!is_null(\Auth::user()))<h3>{{\Auth::user()->name}}
                خوش آمدید </h3>@endif</span>
        <header class="title"><a id="main_logo_userside" style="color: laravel-method-getCategoryIconColor" href="{{url('/')}}">laravel-method-getName</a></header>
        {{--<div class="icon navicon"></div>--}}
{{--        @if($just_content == 0 && $fully_just_content == 0 && $is_restaurant_close == 0)--}}
{{--            @if (Route::current()->getName() == 'home' && $first_time_open_menu == 1) { ?>--}}
{{--            <div class="icon helpicon"><i class="fas fa-question-circle"></i></div>--}}
{{--            @endif--}}
{{--        @endif--}}
        <div class="icon backicon" data-elderpageurl=""></div>

        @if($just_content == 0 && $fully_just_content == 0 && $is_restaurant_close == 0)
            <div class="icon shoppingcarticon @if(isset($order->orderitems) && $order->orderitems->count() > 0) notempty @endif">
                @if(isset($order->orderitems) && $order->orderitems->count() > 0)
                    <span>{{$order->orderitems->count()}}</span> @endif
            </div>
        @endif
    </div>
    @if(isset($folders))
        <div class="categories">
            @foreach($folders as $folder)
                @if($folder->items->count() > 0)
                    <div class="cat" id="batch{{$folder->id}}cat"
                         style="background-image: url({{$folder->folder_image}})"><span>{{$folder->name}}</span></div>
                @endif
            @endforeach
        </div>
        <div class="showmore">همه دسته بندی ها<span class="showmoreicon" style="@if('laravel-method-getCategoryIconColor' == '#f0f0f0') background-image:url({{asset('images/icons/arrowdown.svg')}}); @else background-image:url({{asset('images/icons/arrowdown2.svg')}});@endif background-repeat: no-repeat;background-position: center bottom;"></span></div>
    @endif
</div>
</div>
@php
    $show_waiting_orders = 1;
    if($version_type == 'LP') {
    if(Route::current()->getName() == 'order.prefactor') {
    $show_waiting_orders = 0;
    }
    } elseif ($version_type == 'FP') {
    if(Route::current()->getName() == 'order.show') {
    $show_waiting_orders = 0;
    }
    }
@endphp
@if($is_restaurant_close == 1)
    <div class="alerts_holder">
        <div class="just_content_message_div">
            <div class="just_content_message">
                ساعات عدم فعالیت رستوران laravel-method-getName
            </div>
        </div>
    </div>
@endif
{{--<div class="alerts_holder">--}}
    {{--@if(($waiting_orders->count() > 0 && $show_waiting_orders) || ($just_content == 1))--}}
        {{--@if($waiting_orders->count() > 0 && $show_waiting_orders)--}}
            {{--<div class="waiting_orders">--}}
                {{--@foreach($waiting_orders as $order)--}}
                    {{--<a href="@if($version_type == 'FP'){{route('order.show', ['id' => $order[0]->id])}}@elseif($version_type == 'LP') {{route('order.chose-page', ['id' => $order[0]->id])}} @endif">--}}
                        {{--<div class="waiting_order">--}}
                            {{--@if($version_type == 'FP')--}}
                                {{--شماره فاکتور {{$order[0]->factor_number}} فعال <br/>--}}
                            {{--@elseif($version_type == 'LP')--}}
                                {{--شماره میز {{$order[0]->table_number}} فعال <br/>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--@if($just_content == 1 && $under_construction == 0 && $is_restaurant_close == 0)--}}
            {{--<div class="just_content_message_div">--}}
                {{--<div class="just_content_message">--}}
                    {{--در حال حاضر سفارشات این رستوران بصورت حضوری دریافت می‌شود<br/>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
{{--@endif--}}
{{--</div>--}}
@push('script')
    <script>
      $(document).ready(function () {
        version_type = $('.header').data('versiontype')

        function preloader () {
//          if (document.images) {
//            var img1 = new Image()
//            var img2 = new Image()

//            img1.src = $('#head_url').data('url') + '/images/icons/help/arrow01.svg'
//            img2.src = $('#head_url').data('url') + '/images/icons/shcart2.png'
//          }
        }

        function addLoadEvent (func) {
          var oldonload = window.onload
          if (typeof window.onload != 'function') {
            window.onload = func
          } else {
            window.onload = function () {
              if (oldonload) {
                oldonload()
              }
              func()
            }
          }
        }

        addLoadEvent(preloader)

        $('.menewcpright').click(function () {
          $('.menewcpright .menewnumber').toggleClass('open')
        })

        if (isMobile) {

//          if (!isApple) {
          $('#sharewithfriends').show()
//          }

          $('#preview_form #inout .toggle').swipe({
            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
              if (direction == 'right' && !$('#preview_form #inout .toggle .toggle_input').is(':checked')) {
                $('#preview_form #inout .toggle').trigger('click')
              }
              else if (direction == 'left' && $('#preview_form #inout .toggle .toggle_input').is(':checked')) {
                $('#preview_form #inout .toggle').trigger('click')
              }
            },
            threshold: 20
          })

          $('.header .showmore').swipe({
            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
              if (direction == 'down' && !$(this).hasClass('rotate')) {
                $('.header .showmore').trigger('click')
              }
              if (direction == 'up' && $(this).hasClass('rotate')) {
                $('.header .showmore').trigger('click')
              }
            },
            threshold: 20
          })

          $('body').swipe({
            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
              if (!$(event.target).closest('label').length) {
                if (!$(event.target).closest('.categories').length || $(event.target).closest('.categories').length && !$('.header').hasClass('shrink')) {
                  if (direction == 'right' && !$('.bgwrap').hasClass('show')) {
                    $('.header .shoppingcarticon').trigger('click')
                  }
                  else if (direction == 'left' && !$('.bgwrap').hasClass('show')) {
                    $('.header .navicon').trigger('click')
                  }
                  else if (direction == 'left' && $('.bgwrap').hasClass('show') && $('.shcart').hasClass('activated')) {
                    $('.bgwrap').trigger('click')
                  }
                  else if (direction == 'right' && $('.bgwrap').hasClass('show') && $('.mainmenu').hasClass('activated')) {
                    $('.bgwrap').trigger('click')
                  }
                }
              }
            },
            threshold: 120,
            preventDefaultEvents: false
          })

          window.onload = function () {
            if (typeof history.pushState === 'function') {
              history.pushState('jibberish', null, null)
              window.onpopstate = function () {
                history.scrollRestoration = 'manual'
                history.pushState('newjibberish', null, null)
                if ($('.galzoom').length) {
                  $('.galzoom').trigger('click')
                }
                else if ($('.bgwrap').hasClass('show')) {
                  $('.bgwrap').trigger('click')
                }
                else if ($('.categories .cat').hasClass('selected')) {
                  $('.categories .cat.cloned').trigger('click')
                }
                else if ($('.showmore').hasClass('rotate')) {
                  $('.header .showmore.rotate').trigger('click')
                }
                else {
                  $('.header .icon.backicon').trigger('click')
                }
              }
            }
          }
        }

        if ($('ul#cart_list li').length != 0) {
          $('.empty_basket').hide()
        }

        var headerPaddingTop = parseInt($('.header').css('padding-top'))
        /* Commented By RZIW */
//        $('.header').css('padding-top', $('.waiting_orders').outerHeight() + headerPaddingTop + 'px')
        /* Added By RZIW */
        $('.header').css('padding-top', $('.alerts_holder').outerHeight() + headerPaddingTop + 'px')
      })

      var headerheight = $('.waiting_orders').outerHeight() + $('.header').outerHeight()

      $('.container').css({'padding-top': headerheight})

      {{--function FPCartActions (elem) {--}}

        {{--showLoading($(elem), 0, 'رفتن به سبد خرید <div style=\'display: inline-block; margin-right: 9px; position: absolute; padding: 3px 0 0 0; font-size: 14px;\'><i class=\'fas fa-ellipsis-h\'></i></div>')--}}
        {{--getOrderItemElems()--}}

        {{--CallAjaxFunc('{{route('order.updateOrderCount')}}', {--}}
          {{--'order_item_ids': order_item_ids,--}}
          {{--'order_item_counts': order_item_counts,--}}
          {{--'order_status': 2,--}}
          {{--'basket_button': 1--}}
        {{--}, redirect, failRedirect)--}}
      {{--}--}}

      {{--function LPCartActions (elem) {--}}

        {{--getOrderItemElems()--}}
        {{--CallAjaxFunc('{{route('order.checkTableNumber')}}', {--}}
          {{--'order_item_ids': order_item_ids,--}}
          {{--'order_item_counts': order_item_counts,--}}
          {{--'order_status': 2,--}}
          {{--'basket_button': 1--}}
        {{--}, redirect, failRedirect)--}}

      {{--}--}}

      function getOrderItemElems () {

        order_item_ids = []
        order_item_counts = []

        $('ul#cart_list li').each(function () {
          var item_id = $(this).attr('id').substr(4)
          order_item_ids.push(item_id)
          order_item_counts.push($(this).find('.count').html())
        })

      }

      {{--$(document).on('click', '#basket_button', function () {--}}

        {{--if (version_type == 'FP') {--}}
          {{--FPCartActions(this)--}}
        {{--} else if (version_type == 'LP') {--}}
          {{--LPCartActions(this)--}}
        {{--}--}}

      {{--})--}}

      {{--$(document).on('click', '#enter_tb_number', function () {--}}

        {{--getOrderItemElems()--}}
        {{--table_number = $('#main_table_number').val()--}}

        {{--CallAjaxFunc('{{route('order.addTableNumber')}}', {--}}
          {{--'order_item_ids': order_item_ids,--}}
          {{--'order_item_counts': order_item_counts,--}}
          {{--'order_status': 2,--}}
          {{--'basket_button': 1,--}}
          {{--'table_number': table_number--}}
        {{--}, redirect, failRedirect)--}}

      {{--})--}}

      {{--function redirect (data) {--}}
        {{--if (version_type == 'LP') {--}}
          {{--redirectInLp(data)--}}
        {{--} else if (version_type == 'FP') {--}}
          {{--window.location.href = '{{route('order.preview')}}'--}}
        {{--}--}}
      {{--}--}}

      {{--function failRedirect () {--}}
        {{--$('#basket_button').html('<span\n' +--}}
          {{--'                style="margin-right: -9px;">رفتن به سبد خرید</span>')--}}
      {{--}--}}

      $(document).on('click', '#waiter_call_err', function () {
        var table_number = $('#main_table_number').val()

        CallAjaxFunc(laravel-route-user.alertWaiter, {
          'table_number': table_number,
        }, alertWaiterCallback)
      })

      function alertWaiterCallback () {
        $('#waiter_call_err').addClass('disabled')
        setTimeout(function () {
          $('#waiter_call_err').removeClass('disabled')
        }, 10000)
        alert('پیام به گارسون رسید')
      }

      {{--function redirectInLp (data) {--}}
        {{--if (data == 0) {--}}
          {{--window.location.href = '{{route('order.preview')}}'--}}
        {{--} else if (data == -1) {--}}
          {{--location.reload()--}}
        {{--}--}}
        {{--else {--}}
          {{--$('#tb_fill_error').html('')--}}
          {{--if (data == 'get_tb_number') {--}}
            {{--$('.confirmBtn').attr('id', 'enter_tb_number').addClass('not_close')--}}
            {{--ShowMessage('Table Number', '<div class="message_content"><label class="">لطفا شماره میز خود را وارد کنید</label><input type="number" name="table_number" id="main_table_number" required><div id="tb_fill_error"></div></div><div class="waitercall_validate_errors"></div>', 'Table Number', 'ثبت', 'لغو', true, false)--}}
          {{--} else if (data == 'just_content_message') {--}}

          {{--} else {--}}
            {{--var errors = data--}}
            {{--$.each(errors, function (first_key, error) {--}}
              {{--$.each(error, function (key, err) {--}}
                {{--if (first_key == 'self_made') {--}}
                  {{--$('#tb_fill_error').append('<p class=\'danger alert-danger\'>' + err + '</p><div class=\'icon waiter_call\' id=\'waiter_call_err\'></div>')--}}
                {{--} else {--}}
                  {{--$('#tb_fill_error').append('<p class=\'danger alert-danger\'>' + err + '</p>')--}}
                {{--}--}}
              {{--})--}}
            {{--})--}}
          {{--}--}}
        {{--}--}}
      {{--}--}}

      $(document).on('click', '.waiter_call', function () {
        if ($(this).hasClass('defined_seat')) {
          table_number = $('.waiter_call').data('tablenumber')
          callWaiter(table_number)
        } else {
//                $('.cancelBtn').attr('id', 'call_waiter_cancel');
          $('.confirmBtn').attr('id', 'call_waiter_confirm').addClass('not_close')
          ShowMessage('call waiter', '<div class="message_content"><label class="">لطفا شماره میز خود را وارد کنید</label><input type="number" name="table_number" id="call_waiter_table_number" required></div><div class="waitercall_validate_errors"></div>', 'Call Waiter', 'فراخوانی', 'لغو', true, false)
        }
      })

      //        function activeWaiterCallReactionFail(jqXHR, textStatus, errorThrown) {
      //            console.log(errorThrown);
      //            if (textStatus === 'timeout') {
      //                ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
      //            } else {
      //                ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
      //            }
      //        }
      //
      //        function activeWaiterCallReaction(data) {
      ////            alert(data);
      //            $('.cancelBtn').attr('id', 'call_waiter_cancel');
      //            $('.confirmBtn').attr('id', 'call_waiter_confirm');
      //            if(data == 'null' ) {
      //                ShowMessage('call waiter', '<div class="message_content"><label class="">شماره میز خود را وارد کنید</label><input type="text" name="table_number" id="call_waiter_table_number" required></div>', 'Call Waiter', 'فراخوانی', '', true, false);
      //            } else {
      //                table_number = $(".waiter_call").data('tablenumber')
      //                callWaiter(table_number);
      //            }
      //        }

      function callWaiter (table_number) {
        CallAjaxFunc('laravel-route-user.waiterCall', {
          'table_number': table_number,
        }, hideMessageBox, callWaiterActionsFail)
      }

      $(document).on('click', '#call_waiter_confirm', function () {

        $(this).text('ارسال...').addClass('disabled ')//it seems disabled not work!
//            $('.cancelBtn').addClass('disabled');
        table_number = $('#call_waiter_table_number').val()
        callWaiter(table_number)
      })

      function hideMessageBox (status) {
        $('.confirmBtn').removeClass('disabled').text('فراخوانی')
//            $('.cancelBtn').removeClass('disabled');
        if (status != 1) {
//                var errors = JSON.parse(status);
          var errors = ''
          if (status.errors) {//there are server validation error
            $.each(status.errors, function (key, value) {
              errors += '<br>' + value
            })
            $('.waitercall_validate_errors').html('<h2>' + errors + '</h2>')
          }
        } else {
          $('.confirmBtn').removeAttr('id')
          $('.msgBox').removeClass('show')
          $('.waiter_call').addClass('active defined_seat ' + table_number).data('tablenumber', table_number)
          alert('U successfully called waiter')
        }
      }

      function callWaiterActionsFail (jqXHR, textStatus, errorThrown) {

        $('.confirmBtn').removeClass('disabled').text('فراخوانی')
        $('.cancelBtn').removeClass('disabled')
        console.log(errorThrown)
//            if (textStatus === 'timeout') {
//                ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//            } else {
//                ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//            }
      }

      // socket.on('remove_waiter_call', function (data) {
      //   $('.waiter_call.' + data).removeClass('active')
      // })

      //        $(document).on('click', '.cancelBtn', function () {
      //            $(".confirmBtn").removeAttr('id');
      //        });

    </script>
@endpush











<div class="content">







