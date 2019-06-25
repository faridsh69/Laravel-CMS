<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">

<head id="head_url" data-url="laravel-method-getUrl" data-defulturl="laravel-method-getDefultUrl" data-ip="laravel-method-getIp" data-loadingsrc="{{asset('replace')}}">
    <title>{{ $shop->title }} &bull; MeneW</title>
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
    @if(isset($categories))
        <div class="categories">
            @foreach($categories as $category)
                @if($category->products->count() > 0)
                    <div class="cat" id="batch{{$category->id}}cat"
                         style="background-image: url({{$category->meta_image}})"><span>{{$category->title}}</span></div>
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

    <div class="indexloading"></div>
    <div class="homeintro" data-jcmessage="{{__('messages.jc_message')}}"
         data-activeorderingmsg="{{__('messages.activate_ordering_message')}}"
         data-disableconstruction="{{__('messages.disable_under_construction')}}"
         style="background-image: url( {{ asset( '/images/intro/logo01.png') }} ); display: none;" data-userid="laravel-method-getUserId"
         data-versiontype="laravel-data-version_type">
        <div class="homeintro-overlay">
            <div class="intrologo" style="background-image: url(laravel-method-LogoImg);"></div>
            <div class="gotomenu">
                <img class="menewlogo" src=""/>
                <button class="menewlink">مشاهده مِ نیو</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="menushow">
            


<div class="detailsbox wrapclose">
    <div class="gotobottom">
        <div class="icon"><i class="fas fa-angle-double-down"></i></div>
    </div>
    <div class="dboxwrapper" id="dboxwrapper" data-scrollbar>
        <div class="close"></div>
        <div class="itemmedia">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    {{--<div class="swiper-slide"><img id="mainimage_slider" src=""/></div>--}}
                    {{--@foreach($item->images as $gallery)--}}
                    {{--@if(strpos($gallery->image, '.mp4') == 0 and strpos($gallery->image, '.webm') == 0)--}}
                    {{--<div class='swiper-slide'><img src=''/></div>--}}
                    {{--@else--}}
                    {{--<div class="swiper-slide video-content">--}}
                    {{--<video>--}}
                    {{--<source src="{{asset($gallery->image)}}" type="video/webm"/>--}}
                    {{--<source src="{{asset($gallery->image)}}" type="video/mp4"/>--}}
                    {{--</video>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="itemcontent">
            <form class="addto_shopping_basket" id="ordering_item_form"
                  method="post">
                <input type="hidden" name="order_count" value="1">
                <header class="title" id="home_itemdetail_name"></header>
                <input type="hidden" id="home_itemdetail_id" name="item_id">
                <input type="hidden" id="item_order_count" name="count">
                <input type="hidden" id="home_order_state" name="state">
                <div class="ratingstars">
                    <fieldset class="rating" id="home_vote_show"></fieldset>
                </div>
                <div class="shortdescription_header">مــحـتــویات</div>
                <div class="description" id="home_item_short_description"></div>
                {{--<div class="description_header">تـــوضـیـحـات</div>--}}
                {{--<div id="home_item_description"></div>--}}
                {{--<ul class="comments">--}}
                {{--<header>نظرات</header>--}}
                {{--<li class="comment">--}}
                {{--<div class="author">آرمین</div>--}}
                {{--<div class="comment_content">بد نبود ولی کیفیت گوشتش کمی پایین بود...</div>--}}
                {{--</li>--}}
                {{--<li class="comment">--}}
                {{--<div class="author">اشکان</div>--}}
                {{--<div class="comment_content">حرف نداشت. ممنون از شما</div>--}}
                {{--</li>--}}

                {{--</ul>--}}
                @if($just_content == 0 && $fully_just_content == 0 && $is_restaurant_close == 0)
                    <div class="addingcount">
                        <button type="button" class="btn btn_2 plus">+</button>
                        <div class="count" id="home_itemdetail_ordercount">12</div>
                        <button type="button" class="btn btn_2 minus">-</button>
                    </div>
                    <button type="submit" class="addtocart btn btn_1"><i class="fas fa-cart-plus"></i>افزودن به سبد خرید
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>




            @foreach($categories as $category)
                @if($category->products->count() > 0)
                    <div class="menucat" id="batch{{$category->id}}">
                        <div class="foldername">{{$category->title}}</div>
                        @foreach($category->products as $product)
                            @php
                                $has_video = 0;
                                if(!is_null($product->images)) {
                                  $filtered = $product->images->filter(function ($value, $key) {
                                      return (strpos($value, "mp4") >= 0 || strpos($value, "webm") >= 0);
                                  });
                                  if($filtered->count() > 0) {
                                    $has_video = 1;
                                  }
                                }

                                $ordered_item = 0;
                                if($ordered_item) {
                                $order_count = $ordered_item->count;
                                $is_ordered = "ordered";
                                } else {
                                $order_count = 1;
                                $is_ordered = "";
                                }
                            @endphp
                            <section id="item{{$product->id}}"
                                     class="menuitem {{$product->image_class}} {{$product->finished_class}} {{$product->discount_class}} {{$is_ordered}}"
                                     @if(!is_null($product->discount)) data-before="{{$product->price}}"
                                     data-discount="{{$product->calculate_discount}}" @endif
                                     data-gallery="{{$product->images}}" data-itemid="{{$product->id}}"
                                     data-mediumimage="{{$product->item_medium_image}}"
                                     data-purepic="{{$product->main_image}}"
                                     data-available="{{$product->count}}" data-vote="{{$product->vote_show}}"
                                     data-desc="{{$product->description}}"
                                     data-galleryaddr="{{$product->gallery_address}}"
                                     data-type="{{$product->type}}">
                                <span class="qty">{{$order_count}}</span>

                                <div class="itemimage"
                                     style="background-image: url('{{$product->item_small_image}}');">
                                    @if($has_video)
                                        <div class="video_play_icon">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    @endif
                                </div>
                                {{--<div class="itemimage lazy"  data-src="{{$product->item_small_image}}"></div>--}}

                                <div class="itemdetails">
                                    <header class="title">{{$product->title}}</header>
                                    @if(!is_null($product->description))
                                        <div class="desc"><p
                                                    style="white-space: pre-line">{!! $product->description !!}</p>
                                        </div>
                                    @endif
                                    @if($product->type == 'shop_card' && !is_null($product->price))
                                        <div class="price">
                                            @if(is_null($product->discount_price))
                                                {{$product->price}} {{moneyUnit()}}
                                            @else
                                                <div class="oldprice">{{$product->price}} {{moneyUnit()}}</div>
                                                <div class="newprice">{{$product->discount_price}} {{moneyUnit()}}</div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="qtychange"><span class="plus"><i class="fas fa-plus"></i></span><span
                                                class="minus">@if($order_count!='1')
                                                <i class="fas fa-minus"></i>@else
                                                <div style="font-size: 20px;"><i
                                                            class="far fa-trash-alt"></i></div>@endif</span></div>
                                    @if($product->vote!='0')
                                        <div class="ratingstars">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5"
                                                       @if($product->vote_show == 10) class="selected" @endif/><label
                                                        class="full" for="star5">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star4half" name="rating" value="4 and a half"
                                                       @if($product->vote_show >= 9 && $product->vote_show < 10) class="selected" @endif /><label
                                                        class="half" for="star4half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star4" name="rating" value="4"
                                                       @if($product->vote_show >= 8 && $product->vote_show < 9) class="selected" @endif /><label
                                                        class="full" for="star4">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star3half" name="rating" value="3 and a half"
                                                       @if($product->vote_show >= 7 && $product->vote_show < 8) class="selected" @endif /><label
                                                        class="half" for="star3half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star3" name="rating" value="3"
                                                       @if($product->vote_show >= 6 && $product->vote_show < 7) class="selected" @endif /><label
                                                        class="full" for="star3">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star2half" name="rating" value="2 and a half"
                                                       @if($product->vote_show >= 5 && $product->vote_show < 6) class="selected" @endif /><label
                                                        class="half" for="star2half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star2" name="rating" value="2"
                                                       @if($product->vote_show >= 4 && $product->vote_show < 5) class="selected" @endif /><label
                                                        class="full" for="star2">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star1half" name="rating" value="1 and a half"
                                                       @if($product->vote_show >= 3 && $product->vote_show < 4) class="selected" @endif /><label
                                                        class="half" for="star1half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star1" name="rating" value="1"
                                                       @if($product->vote_show >= 2 && $product->vote_show < 3) class="selected" @endif /><label
                                                        class="full" for="star1">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="starhalf" name="rating" value="half"
                                                       @if($product->vote_show >= 1 && $product->vote_show < 2) class="selected" @endif /><label
                                                        class="half" for="starhalf">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                            </fieldset>
                                            <div class="ratingcontent hidden">امتیاز {{$product->vote_show/2}} از 5</div>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>









    
</div>
<div class="msgBox">
    <div class="innerbox">
        <!-- <div class="exit"></div> -->
        <div class="topSide">warning</div>
        <div class="bottomSide"></div>
        <div class="btns">
            <div class="btn confirmBtn">Yep</div>
            <div class="btn cancelBtn">Nope</div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>


    <script>
        is_expired = 0

        var mySwiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 60,
                stretch: 20,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
            },
        })

        setTimeout(function () {
            $('.indexloading').addClass('hide')
        }, 6000)

        $(document).ready(function () {

            $(window).load(function () {
                setTimeout(function () {
                    $('.indexloading').addClass('hide')
                }, 2000)
            })

            if (isMobile && isApple) {
                //$('.menuitem .itemdetails .desc').addClass('apple');
            }


            setTimeout(function () {
                $('.homeintro-overlay .intrologo').addClass('show')
            }, 600)
            setTimeout(function () {
                $('.homeintro-overlay .gotomenu').addClass('show')
            }, 1500)

            //disableScroll();

            $('.homeintro').click(function () {
                bodyScrollLock.clearAllBodyScrollLocks()
                $(this).fadeOut()
            })

            $('.detailsbox .gotobottom').click(function () {
                elem = document.getElementById('dboxwrapper')
                var scrollbar = Scrollbar.init(elem)
                scrollbar.scrollTo(0, 5000, 0, function (scrollbar) {
                })
                $(this).fadeOut()
            })

            /*
            $(document).on('click', '.msgBox', function (e) {
                if ($(this).hasClass('exit') && $(e.target).closest(".confirmBtn").length) {
                    window.close();
                }
            });
            */

            $('.menuitem').each(function () {
                if ($(this).attr('data-mediumimage').length < 1 && $(this).attr('data-discount')) {
                    $(this).find('.price').css('margin-right', '55px')
                }
            })

//            @if(\Session::has('order_session_error'))
            //            ShowMessage('error', 'سفارش قبلی شما منقضی شده و سفارش جدیدی برای شما درنظر گرفته خواهد شد.', 'منقضی شدن سفارش قبلی', 'باشه', '', true, false);
            //            @endif



            function shcartNew() {
            if ($('.shcart .a-persons-cart li').length > 0) {
                $('.header .shoppingcarticon').addClass('notempty')
                $('.header .shoppingcarticon').html('<span>' + $('.shcart .a-persons-cart li').length + '</span>')
            } else {
                $('.header .shoppingcarticon').removeClass('notempty')
                $('.header .shoppingcarticon').html('')
            }
        }

        /* Categories Only Show 6 Items at first */
        if ($('.header .categories').outerHeight() > $(window).height() * 2 / 3)
            var catfullheight = $(window).height() * 2 / 3
        else
            var catfullheight = $('.header .categories').outerHeight()
        var catheight = $('.categories .cat').outerHeight()

        function setHeaderHeight() {
            var catheight = $('.categories .cat').outerHeight()
            $('.header .categories').css({'max-height': catheight + 10 + 'px'})
        }

        setHeaderHeight()

        window.addEventListener('orientationchange', function () {
            setTimeout(setHeaderHeight, 500)
        }, false)

        function showMoreButton() {
            if ($(window).width() > 478) {
                if ($('.categories .cat').length > 6)
                    $('.header .showmore').show()
                else
                    $('.header .showmore').hide()
            } else {
                if ($('.categories .cat').length > 3)
                    $('.header .showmore').show()
                else
                    $('.header .showmore').hide()
            }
        }

        showMoreButton()
        window.addEventListener('orientationchange', function () {
            setTimeout(showMoreButton, 500)
        }, false)

        $('.header .showmore').click(function () {
            $(this).toggleClass('rotate')
            $('.container').toggleClass('blur')
            if ($(this).hasClass('rotate')) {
                $('.content').addClass('smoreback')
                $('.header .categories').css({'max-height': catfullheight + 'px'})
                const targetElement = document.querySelector('.header .categories')
                bodyScrollLock.disableBodyScroll(targetElement)
                $('.header .categories').addClass('overflowch')
            } else {
                $('.content').removeClass('smoreback')
                setHeaderHeight()
                bodyScrollLock.clearAllBodyScrollLocks()
                $('.categories').animate({scrollTop: 0}, 0)
                $('.header .categories').removeClass('overflowch')
            }
        })

        $('.content').click(function () {
            if ($('.header .showmore').hasClass('rotate')) {
                $('.header .showmore').trigger('click')
            }
        })

        /* Add space before Container */
        function setSpaceBeforeHeader() {
            var headerheight = $('.waiting_orders').outerHeight() + $('.header').outerHeight()
            $('.container').css({'padding-top': headerheight})
        }

        setSpaceBeforeHeader()
        var width = $(window).width()
        $(window).on('resize', function () {
            if ($(this).width() != width) {
                width = $(this).width()
                setSpaceBeforeHeader()
            }
        })
        /* Sync Scroll position with Menu Category */
        var i = 0
        var j = 0
        var ifselected = 0
        var fired = 0
        var mcatoff = new Array()
        var mcatid = new Array()
        var scrollLeft = new Array()
        $('.menucat').each(function () {
            mcatoff[i] = $(this).position().top - headerheight
            mcatid[i] = $(this).attr('id')
            mcatid[i] = mcatid[i] + 'cat'
            i++
        })
        var shrinked = 0
        var catchanged = 0
        var oldcat = 0
        $(window).scroll(function () {
            if (ifselected == 0) {
                if ($(document).scrollTop() > 20 && shrinked == 0) {
                    $('.header').addClass('shrink')
                    $('.categories .cat').addClass('opac')
                    shrinked = 1
                } else if ($(document).scrollTop() > 20 && shrinked == 1) {
                    for (j = 0; j < i; j++)
                        if ($(document).scrollTop() < mcatoff[j])
                            break
                    if (j != oldcat) {
                        $('.categories .cat').removeClass('selected')
                        $('.categories .cat#' + mcatid[j - 1]).addClass('selected')
                        $('.categories').animate({scrollLeft: 0}, 0)
                        var thisCatPos = $('.categories .cat#' + mcatid[j - 1]).offset().left - $(window).width() / 2 + $('.categories .cat#' + mcatid[j - 1]).width() / 2
                        $('.categories').animate({scrollLeft: thisCatPos}, 0)
                        oldcat = j
                    }
                } else if ($(document).scrollTop() <= 20 && shrinked == 1) {
                    $('.header').removeClass('shrink')
                    $('.categories .cat').removeClass('selected')
                    $('.categories .cat').removeClass('opac')
                    shrinked = 0
                    oldcat = 0
                }
            }

            if ($(document).scrollTop() > 20) {
                $('.header').addClass('shrink')
                $('.categories .cat').addClass('opac')
            } else {
                $('.header').removeClass('shrink')
            }
        })

        /* Menu Category Click Functions */
        $('.categories .cat').click(function () {
            $('.categories').animate({scrollTop: 0}, 0)
            $('.header .categories').removeClass('overflowch')
            $('body').removeClass('blur')
            $('.content').removeClass('smoreback')
            $('.header .showmore').removeClass('rotate')
            $('.container').removeClass('blur')
            bodyScrollLock.clearAllBodyScrollLocks()
            $('html, body').animate({scrollTop: 0}, 0)
            if ($('.header .showmore').is(':visible')) {
                setHeaderHeight()
            }

            // if the category has selected style
            if ($(this).hasClass('selected')) {
                if (ifselected == 1) {
                    $('.menushow .menucat').show()
                    $('.categories .selected').show()
                    $('.categories .cloned').remove()
                    $('.categories .cat').removeClass('opac')
                    $('.categories .cat').removeClass('selected')
                    ifselected = 0
                } else {
                    var catselname = $(this).attr('id')
                    catselname = catselname.replace('cat', '')
                    $('.menushow .menucat').hide()
                    $('.menushow .menucat#' + catselname).show()
                    $('.categories .cat').addClass('opac')
                    $(this).addClass('selected')
                    $(this).clone(true).addClass('cloned').prependTo($(this).parent())
                    $(this).hide()
                    ifselected = 1
                }
            }
            // if the category has scrolled to
            else if ($(this).hasClass('opac')) {
                var catselname = $(this).attr('id')
                catselname = catselname.replace('cat', '')
                $('.menushow .menucat').hide()
                $('.menushow .menucat#' + catselname).show()

                $('.categories .cloned').remove()

                $('.categories .selected').show()

                $('.categories .cat').removeClass('selected')

                $(this).addClass('selected')
                $(this).clone(true).addClass('cloned').prependTo($(this).parent())
                $(this).hide()
                ifselected = 1
            }
            // if the category not scrolled to nor selected
            else {
                var catselname = $(this).attr('id')
                catselname = catselname.replace('cat', '')
                $('.menushow .menucat').hide()
                $('.menushow .menucat#' + catselname).show()
                $('.categories .cat').addClass('opac')
                $(this).addClass('selected')
                $(this).clone(true).addClass('cloned').prependTo($(this).parent())
                $(this).hide()
                ifselected = 1
            }
        })
        changedTotal = 0//when quantity is more than available the changed total will store here
        {{--function checkDecreaseQuantity (available_count, theTotal, integer_item_id, action) {--}}
        {{--if (available_count < theTotal && available_count != -1) {--}}
        {{--changedTotal = available_count--}}
        {{--lowhasBeenClicked = false--}}
        {{--// changedTotal = available_count;--}}
        {{--CallAjaxFunc('{{url(route('order.update'))}}' + '/' + integer_item_id, {--}}
        {{--'count': available_count,--}}
        {{--'state': 1--}}
        {{--}, automaticDecreaseQuantity)--}}
        {{--ShowMessage('error', 'امکان سفارش بیش از این تعداد امکانپذیر نمی باشد.', 'حداکثر موجودی: ' + available_count, 'باشه', '', true, false)--}}
        {{--}--}}
        {{--if (available_count == theTotal && action == 'plus') {--}}
        {{--ShowMessage('error', 'امکان سفارش بیش از این تعداد امکانپذیر نمی باشد.', 'حداکثر موجودی: ' + available_count, 'باشه', '', true, false)--}}
        {{--}--}}
        {{--}--}}

        function automaticDecreaseQuantity(data) {
            elem.find('.qty').text(changedTotal)
            $('#cart_list').find('li#item' + integer_item_id).find('.count').html(changedTotal)
        }

        /* Menu Item Click Function */
        $('.menuitem').on('click', function (e) {

            orderable = 1 //for checking if according to current quantity can it be ordarable or no
            var dboxCount = $(this).attr('id')
            item_type = $(this).data('type')
            dboxCount = '#' + dboxCount + '-dbox'
            dboxId = $(this).attr('id') + '-dbox'
            $('.detailsbox').attr('id', dboxId)
            theTotal = $(this).find('.qty').html()
            integer_item_id = $(this).attr('id').substr(4)
            elem = $(this)
            item_medium_image = elem.data('mediumimage')
            item_pure_mediumimage_name = elem.data('purepic')
            item_gallery = elem.data('gallery')
            item_vote_html = elem.find('.rating').html()
            available_count = elem.data('available')
            $('#home_itemdetail_id').val(elem.data('itemid'))

            if (elem.find('.desc').length == 0) {
                $('.shortdescription_header').hide()
                $('#home_item_short_description').html('')
            } else {
                $('.shortdescription_header').show()
                $('#home_item_short_description').html(elem.find('.desc').html())
            }
            $('#home_item_description').html(elem.data('desc'))
            if (elem.data('desc') == '')
                $('.description_header').hide()
            else
                $('.description_header').show()
            $('#home_itemdetail_name').html(elem.find('.title').html())
            if (parseInt(available_count) != -1 && parseInt(theTotal) >= parseInt(available_count)) {
                orderable = 0
            }
            if (item_vote_html != undefined)
                $('#home_vote_show').html(item_vote_html)
            else
                $('#home_vote_show').html('')
            if (item_medium_image == '' && item_gallery == '') {
                $('.itemmedia').hide()
                $('.itemcontent').css('padding-top', '60px')
            } else {
                $('.itemmedia').show()
                $('.itemcontent').css('padding-top', '10px')
            }
            $('.swiper-wrapper').html('')
            /* if ( item_medium_image != "" ) {
                $(".swiper-wrapper").append("<div class='swiper-slide'><img src='" + item_medium_image + "'/></div>");
            } */
            var gallery_address = $(this).data('galleryaddr') + '//'

            if (item_type == 'show_card') {
                $('.addtocart').hide()
            } else {
                $('.addtocart').show()
            }

            $.each(item_gallery, function (key, value) {

                var galleryfile_name = 'large_' + value.file

                if (galleryfile_name.indexOf('.mp4') == -1 && galleryfile_name.indexOf('.webm') == -1) {
//                    if(galleryfile_name.substring(galleryfile_name.indexOf('/')+1) != item_pure_mediumimage_name) {
                    if (galleryfile_name.indexOf('.gif') != -1) {
                        galleryfile_name = value.file
                    }
                    $('.swiper-wrapper').append('<div class=\'swiper-slide preload_file\'><img src=\'' + gallery_address + galleryfile_name + '\'></div>')
//                    }
                } else {
                    var galleryfile_name = value.file
                    $('.swiper-wrapper').append('<div class=\'swiper-slide video-content preload_file\'><video controls><source src=\'' + gallery_address + galleryfile_name + '\' type=\'video/' + galleryfile_name.substring(galleryfile_name.lastIndexOf('.') + 1) + '\'/></video></div>')
                }
            })
            if ($(this).hasClass('outoforder')) {
                $('.detailsbox').removeClass('ordered')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').removeClass('decrease increase remove').addClass('equal')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').text('ناموجود')
            } else if ($(this).hasClass('ordered')) {
                $('.detailsbox').addClass('ordered')
                $('#home_order_state').val(1)
                        {{--$('#ordering_item_form').attr('action', '{{url(route('order.update'))}}' + '/' + integer_item_id)--}}
                var theTotal = $(this).find('.qty').html()
                $('#home_itemdetail_ordercount').html(theTotal)
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').removeClass('decrease increase remove').addClass('equal')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').text('موجود در سبد خرید')
            } else {
                $('.detailsbox').removeClass('ordered')
                {{--$('#ordering_item_form').attr('action', '{{url(route('order.store'))}}')--}}
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').removeClass('decrease increase equal remove')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.addtocart').text('افزودن به سبد خرید')
            }

            if (!$(this).hasClass('ordered') || $(e.target).closest('.itemimage').length) {
                window.oldTotal = $(this).find('.qty').html()
                var theTotal = $(this).find('.qty').html()
                bodyScrollLock.disableBodyScroll()
                $('.bgwrap').addClass('show')
                $('.wrapclose').show()
                $('.detailsbox#' + $(this).attr('id') + '-dbox').addClass('activated')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.count').text(theTotal)
                mySwiper.update()
                mySwiper.slideTo(0)
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.plus').removeClass('disabled')
                $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.minus').removeClass('disabled')
                if (theTotal == parseInt(available_count)) {
                    $('.detailsbox#' + $(this).attr('id') + '-dbox').find('.plus').addClass('disabled')
                }
                elem = document.getElementById('dboxwrapper')
                var scrollbar = Scrollbar.init(elem)
                scrollbar.setPosition(0, 0)
                if ($(window).height() * 95 / 100 < $('.dboxwrapper .scroll-content').height() - 50) {
                    $('.detailsbox .gotobottom').fadeIn()
                    scrollbar.addListener(function (status) {
                        if (status.offset.y > status.limit.y - 50)
                            $('.detailsbox .gotobottom').fadeOut()
                    })
                } else {
                    $('.detailsbox .gotobottom').hide()
                }
            } else {
                $(this).find('.qty').not('.rippler').addClass('rippler').delay(1000).queue(function () {
                    $(this).removeClass('rippler').dequeue()
                })
                lowhasBeenClicked = false
                var itemincart = $(this).attr('id')
                itemincart = '.a-persons-cart #' + itemincart

//          comment for not having ordering
                {{--if ($(e.target).closest('.minus').length) {--}}
                {{--lowhasBeenClicked = true--}}
                {{--checkDecreaseQuantity(available_count, theTotal, integer_item_id, 'minus')--}}
                {{--$(this).find('.minus').remove('atten')--}}
                {{--$(this).find('.minus').not('.atten').addClass('atten').delay(500).queue(function () {--}}
                {{--$(this).removeClass('atten').dequeue()--}}
                {{--})--}}
                {{--} else {--}}
                {{--if (orderable) {--}}
                {{--CallAjaxFunc('{{url(route('order.update'))}}' + '/' + integer_item_id, {--}}
                {{--'count': 'plus',--}}
                {{--'state': 1--}}
                {{--}, plusErrorCheck)--}}
                {{--$(this).find('.plus').not('.atten').addClass('atten').delay(500).queue(function () {--}}
                {{--$(this).removeClass('atten').dequeue()--}}
                {{--})--}}
                {{--} else {--}}
                {{--checkDecreaseQuantity(available_count, theTotal, integer_item_id, 'plus')--}}
                {{--}--}}
                {{--}--}}

                {{--if (lowhasBeenClicked && Number(theTotal) > 1) {--}}
                {{--//                        alert("ine");--}}
                {{--CallAjaxFunc('{{url(route('order.update'))}}' + '/' + integer_item_id, {--}}
                {{--'count': 'minus',--}}
                {{--'state': 1--}}
                {{--}, minusErrorCheck)--}}
                {{--minusElderTotal = Number(theTotal)--}}
                {{--theTotal = Number(theTotal) - 1--}}
                {{--$(this).find('.qty').text(theTotal)--}}
                {{--$(dboxCount).find('.count').text(theTotal)--}}
                {{--$(itemincart + ' .count').text(theTotal)--}}
                {{--if (Number(theTotal) == 1) {--}}
                {{--$(this).find('.minus').html('<div style=\'font-size: 20px;\'><i class=\'far fa-trash-alt\'></i></div>')--}}
                {{--}--}}
                {{--}--}}
                {{--else if (lowhasBeenClicked && Number(theTotal) == 1) {--}}
                {{--if ($('ul#cart_list li').length == 1) {--}}
                {{--$('.empty_basket').show()--}}
                {{--$('.shcart').find('.button1').prop('disabled', true).addClass('disabled')--}}
                {{--}--}}
                {{--CallAjaxFunc('{{url(route('order.destroy.orderitem'))}}' + '/' + integer_item_id, {'state': 1}, rmErrorCheck)--}}
                {{--$(this).removeClass('ordered')--}}
                {{--$(dboxCount).removeClass('ordered')--}}
                {{--$(itemincart).remove()--}}
                {{--shcartNew()--}}

                {{--}--}}
                {{--else {--}}
                {{--if (orderable) {--}}
                {{--plusElderTotal = Number(theTotal)--}}
                {{--theTotal = Number(theTotal) + 1--}}
                {{--$(this).find('.qty').text(theTotal)--}}
                {{--$(dboxCount).find('.count').text(theTotal)--}}
                {{--$(itemincart + ' .count').text(theTotal)--}}
                {{--$(this).find('.minus').html('<i class=\'fas fa-minus\'></i>')--}}
                {{--}--}}
                {{--}--}}

                {{--function minusErrorCheck (result) {--}}
                {{--if (result == 0) {--}}
                {{--elem.find('.qty').text(minusElderTotal)--}}
                {{--$(itemincart + ' .count').text(minusElderTotal)--}}
                {{--}--}}
                {{--}--}}

                {{--function plusErrorCheck (result) {--}}
                {{--if (result == 0) {--}}
                {{--elem.find('.qty').html(plusElderTotal)--}}
                {{--$(itemincart + ' .count').text(plusElderTotal)--}}
                {{--}--}}
                {{--}--}}

                {{--function rmErrorCheck (result) {--}}
                {{--if (result == 0) {--}}
                {{--alert('something is wrong to remove ordering this item')--}}
                {{--//                                elem.addClass('ordered');--}}
                {{--//                                $(itemincart).show();--}}
                {{--}--}}
                {{--}--}}

                {{--lowhasBeenClicked = false--}}
                //          comment for not having ordering

            }
        })

        //            $(document).on('click', '.plus', function () {
        ////                alert("e");
        //                var totalOrdered = $(this).find(".count").html();
        //                alert(totalOrdered);
        //            });
        /* Menu Item Add to Cart Click Function */
        $(document).on('click', '.detailsbox', function (e) {
            var item_id = $(this).attr('id').split('-')[0]
            var itemincart = '.a-persons-cart #' + item_id
            if (!$(this).hasClass('ordered')) {
                if ($(e.target).closest('.addtocart').length) {
                    bodyScrollLock.clearAllBodyScrollLocks()
                    $('.bgwrap').removeClass('show')
                    $('.swiper-slide video').trigger('pause')
                    $('.wrapclose').removeClass('activated')
                    $(this).parent().find('#' + item_id).addClass('ordered')
                    $(this).parent().find('#' + item_id + ' .minus').html('<div style=\'font-size: 20px;\'><i class=\'far fa-trash-alt\'></i></div>')
                    $('#' + item_id + ' .qty').text('1')
                    $('#' + item_id + '-dbox').addClass('ordered')
                    $('.shcart').find('.button1').prop('disabled', false).removeClass('disabled')
                    $('.empty_basket').hide()
                    var item_name = $(this).find('.title').text()
                    if ($(this).find('.swiper-slide').first().find('img').length) {
                        var item_image = $(this).find('.swiper-slide').first().find('img').attr('src')
                        imgstr = '<div class=\'itemimage\' style=\'background-image: url(' + item_image + ');\'></div>'
                    } else {
                        imgstr = ''
                    }
                    $('#cart_list').append('<li id=\'' + item_id + '\'>' + imgstr + '<header>' + item_name + '</header><div class=\'count\'>1</div></li>')
                    shcartNew()

                    function showitemadded() {
                        $('<div class=\'itemadded\'><div style=\'padding: 3px 0 0 3px; display: inline-block;\'><i class=\'fas fa-plus-circle\'></i></div> ' + item_name + ' اضافه شد.<div class=\'popover-arrow\'></div></div>').appendTo('.shoppingcarticon').fadeIn().addClass('slidedown').delay(2000).queue(function () {
                            $(this).removeClass('slidedown').dequeue()
                        })
                    }

                    setTimeout(showitemadded, 200)
                }
            } else if ($(this).hasClass('ordered')) {
                var tempTotal = $(this).find('.count').html()
                mainTotal = tempTotal
                if ($(e.target).closest('.plus').length) {
                    if (parseInt(available_count) == -1 || mainTotal < parseInt(available_count)) {
                        $(this).find('.minus').removeClass('disabled')
                        tempTotal = Number(tempTotal) + 1
                        $('#item_order_count').val(tempTotal)
                        $(this).find('.count').text(tempTotal)
                        if (tempTotal == parseInt(available_count)) {
                            $(this).find('.plus').addClass('disabled')
                        }
                    } else {
                        ShowMessage('error', 'امکان سفارش بیش از این تعداد امکانپذیر نمی باشد.', 'حداکثر موجودی: ' + available_count, 'باشه', '', true, false)
                    }
                } else if ($(e.target).closest('.minus').length && Number(tempTotal) > 0) {
                    tempTotal = Number(tempTotal) - 1
                    $('#item_order_count').val(tempTotal)
                    $(this).find('.count').text(tempTotal)
                    if (Number(tempTotal) == 0) {
                        $(this).find('.minus').addClass('disabled')
                    }
                    $(this).find('.plus').removeClass('disabled')
                } else if ($(e.target).closest('.addtocart').length) {
                    bodyScrollLock.clearAllBodyScrollLocks()
                    $('.bgwrap').removeClass('show')
                    $('.swiper-slide video').trigger('pause')
                    $('.wrapclose').removeClass('activated')
                    $('#' + item_id + ' .qty').text(tempTotal)
                    $(itemincart).find('.count').text(tempTotal)
                    if (Number(tempTotal) == 0) {
                        $(this).find('.addtocart').removeClass('increase decrease remove')
                        $(this).parent().find('#' + item_id).removeClass('ordered')
                        if ($('ul#cart_list li').length == 1) {
                            $('.empty_basket').show()
                            $('.shcart').find('.button1').prop('disabled', true).addClass('disabled')
                        }
                        $(itemincart).remove()
                        $(this).removeClass('ordered')
                    } else if (Number(tempTotal) == 1) {
                        $('#' + item_id + ' .minus').html('<div style=\'font-size: 20px;\'><i class=\'far fa-trash-alt\'></i></div>')
                    } else {
                        $('#' + item_id + ' .minus').html('<i class=\'fas fa-minus\'></i>')
                    }
                }
                if (!$(e.target).closest('.addtocart').length) {
                    if (Number(oldTotal) == Number(tempTotal)) {
                        $(this).find('.addtocart').text('موجود در سبد خرید')
                        $(this).find('.addtocart').removeClass('decrease increase remove').addClass('equal')
                    } else if (Number(oldTotal) < Number(tempTotal)) {
                        $(this).find('.addtocart').text('تغییر تعداد')
                        $(this).find('.addtocart').removeClass('equal decrease remove').addClass('increase')
                    } else if (Number(oldTotal) > Number(tempTotal)) {
                        $(this).find('.addtocart').text('تغییر تعداد')
                        $(this).find('.addtocart').removeClass('equal increase remove').addClass('decrease')
                    }
                    if (Number(tempTotal) == 0) {
                        $(this).find('.addtocart').text('حذف سفارش')
                        $(this).find('.addtocart').removeClass('equal increase decrease').addClass('remove')
                    }
                }
                shcartNew()
            }
        })

        $(document).on('click', '.addtocart', function () {
            //sharte aval chexk mikone age ke avalin baare dare ino sefaresh mideo kamo ziad nis
            if (typeof mainTotal == 'undefined' || !$('this').hasClass('disabled')) {
                //post ajax form
                $('.addto_shopping_basket').ajaxForm()
            } else {
                ShowMessage('error', 'امکان سفارش بیش از این تعداد امکانپذیر نمی باشد.', 'حداکثر موجودی: ' + available_count, 'باشه', '', true, false)
                return false
            }
        })

        /* Set Discount Percentage Into css Pseudo-element */
        {
            setdiscval = function (elm) {
                $(elm).attr('data-before', $(elm).attr('data-discount'))
            }
            $('[data-discount]').each(
                function () {
                    setdiscval(this)
                }
            )
        }

        function GoInFullscreen(element) {
            if (element.requestFullscreen)
                element.requestFullscreen()
            else if (element.mozRequestFullScreen)
                element.mozRequestFullScreen()
            else if (element.webkitRequestFullscreen)
                element.webkitRequestFullscreen()
            else if (element.msRequestFullscreen)
                element.msRequestFullscreen()
        }

        function GoOutFullscreen() {
            if (document.exitFullscreen)
                document.exitFullscreen()
            else if (document.mozCancelFullScreen)
                document.mozCancelFullScreen()
            else if (document.webkitExitFullscreen)
                document.webkitExitFullscreen()
            else if (document.msExitFullscreen)
                document.msExitFullscreen()
        }

        function IsFullScreenCurrently() {
            var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null

            if (full_screen_element === null)
                return false
            else
                return true
        }

        $(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function () {
            if (!IsFullScreenCurrently()) {
                $('.swiper-slide-active video').attr('controls', false)
            }
        })

        mySwiper.on('slideChangeTransitionStart', function () {
            $('.swiper-slide video').trigger('pause')
            $('.swiper-slide-active video').trigger('play')
        })

        /* Zoom-in When clicked on Gallery's Images & Videos */
        $(document).on('click', '.swiper-slide-active img', function () {
            $galimgsrc = $(this).attr('src')
            $('.container').append('<div class="galzoom"><img src="' + $galimgsrc + '" /></div>')
        })
        $(document).on('click', '.swiper-slide-active.video-content', function (e) {
            $('.swiper-slide-active video').trigger('pause')
            var galvideosrc = $(this).find('video source').attr('src')
            $('.container').append('<div class=\'galzoom\'><video controls autoplay><source src=\'' + galvideosrc + '\' type=\'video/mp4\'></video><div class=\'close\'><i class=\'fas fa-times\'></i></div></div>')
        })
        $(document).on('click', '.galzoom', function () {
            $(this).remove()
        })
        $(document).on('click', '.shcart .cartcontent ul li', function () {
            var varone = $(this).attr('id')

            function One() {
                $('.shcart .close').trigger('click')
                $('html, body').animate({scrollTop: $('.menucat #' + varone).offset().top - $('.header').height() - 40}, 700, Two)
            }

            function Two() {
                $('.menucat #' + varone + ' .itemimage').trigger('click')
            }

            One()
        })
        });

    </script>

    <script>


        user_id = $('.homeintro').data('userid')
        version_type = $('.homeintro').data('versiontype')
        

        $(document).on('click', '#redirect_home', function () {
            window.location = home_url
        })


        $(document).on('click', '#reload_page', function () {
            location.reload()
        })


    </script>


</body>
</html>

