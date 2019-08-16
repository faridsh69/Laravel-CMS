
<!-- <meta name="application-name" content="MeneW" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<link rel="apple-touch-icon-precomposed" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
<link rel="shortcut icon" sizes="196x196" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
<link rel="shortcut icon" sizes="128x128" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
<link rel="icon" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" type="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" />
<link rel="apple-touch-icon" href="{{ asset('images/menew_icon-removebg-preview.png?v=2') }}" /> -->

<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, height=device-height, viewport-fit=cover" xw> -->






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









<script>

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });


    // version_type = $('.header').data('versiontype')

//         function preloader () {
// //          if (document.images) {
// //            var img1 = new Image()
// //            var img2 = new Image()

// //            img1.src = $('#head_url').data('url') + '/images/icons/help/arrow01.svg'
// //            img2.src = $('#head_url').data('url') + '/images/icons/shcart2.png'
// //          }
//         }

        // function addLoadEvent (func) {
        //   var oldonload = window.onload
        //   if (typeof window.onload != 'function') {
        //     window.onload = func
        //   } else {
        //     window.onload = function () {
        //       if (oldonload) {
        //         oldonload()
        //       }
        //       func()
        //     }
        //   }
        // }

        // addLoadEvent(preloader)

        // $('.menewcpright').click(function () {
        //   $('.menewcpright .menewnumber').toggleClass('open')
        // })
    if (isMobile) {

          // $('#sharewithfriends').show()

          // $('#preview_form #inout .toggle').swipe({
          //   swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
          //     if (direction == 'right' && !$('#preview_form #inout .toggle .toggle_input').is(':checked')) {
          //       $('#preview_form #inout .toggle').trigger('click')
          //     }
          //     else if (direction == 'left' && $('#preview_form #inout .toggle .toggle_input').is(':checked')) {
          //       $('#preview_form #inout .toggle').trigger('click')
          //     }
          //   },
          //   threshold: 20
          // })

          // $('.header .showmore').swipe({
          //   swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
          //     if (direction == 'down' && !$(this).hasClass('rotate')) {
          //       $('.header .showmore').trigger('click')
          //     }
          //     if (direction == 'up' && $(this).hasClass('rotate')) {
          //       $('.header .showmore').trigger('click')
          //     }
          //   },
          //   threshold: 20
          // })

          // $('body').swipe({
          //   swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
          //     if (!$(event.target).closest('label').length) {
          //       if (!$(event.target).closest('.categories').length || $(event.target).closest('.categories').length && !$('.header').hasClass('shrink')) {
          //         if (direction == 'right' && !$('.bgwrap').hasClass('show')) {
          //           $('.header .shoppingcarticon').trigger('click')
          //         }
          //         else if (direction == 'left' && !$('.bgwrap').hasClass('show')) {
          //           $('.header .navicon').trigger('click')
          //         }
          //         else if (direction == 'left' && $('.bgwrap').hasClass('show') && $('.shcart').hasClass('activated')) {
          //           $('.bgwrap').trigger('click')
          //         }
          //         else if (direction == 'right' && $('.bgwrap').hasClass('show') && $('.mainmenu').hasClass('activated')) {
          //           $('.bgwrap').trigger('click')
          //         }
          //       }
          //     }
          //   },
          //   threshold: 120,
          //   preventDefaultEvents: false
          // })

          // window.onload = function () {
          //   if (typeof history.pushState === 'function') {
          //     history.pushState('jibberish', null, null)
          //     window.onpopstate = function () {
          //       history.scrollRestoration = 'manual'
          //       history.pushState('newjibberish', null, null)
          //       if ($('.galzoom').length) {
          //         $('.galzoom').trigger('click')
          //       }
          //       else if ($('.bgwrap').hasClass('show')) {
          //         $('.bgwrap').trigger('click')
          //       }
          //       else if ($('.categories .cat').hasClass('selected')) {
          //         $('.categories .cat.cloned').trigger('click')
          //       }
          //       else if ($('.showmore').hasClass('rotate')) {
          //         $('.header .showmore.rotate').trigger('click')
          //       }
          //       else {
          //         $('.header .icon.backicon').trigger('click')
          //       }
          //     }
          //   }
          // }
    }

        // if ($('ul#cart_list li').length != 0) {
        //   $('.empty_basket').hide()
        // }

        // var headerPaddingTop = parseInt($('.header').css('padding-top'))
        /* Commented By RZIW */
//        $('.header').css('padding-top', $('.waiting_orders').outerHeight() + headerPaddingTop + 'px')
        /* Added By RZIW */
        // $('.header').css('padding-top', $('.alerts_holder').outerHeight() + headerPaddingTop + 'px')
})


      // $('.container').css({'padding-top': headerheight})

      // function getOrderItemElems () {

      //   order_item_ids = []
      //   order_item_counts = []

      //   $('ul#cart_list li').each(function () {
      //     var item_id = $(this).attr('id').substr(4)
      //     order_item_ids.push(item_id)
      //     order_item_counts.push($(this).find('.count').html())
      //   })

      // }

      // $(document).on('click', '#waiter_call_err', function () {
      //   var table_number = $('#main_table_number').val()

      //   CallAjaxFunc(laravel-route-user.alertWaiter, {
      //     'table_number': table_number,
      //   }, alertWaiterCallback)
      // })

      // function alertWaiterCallback () {
      //   $('#waiter_call_err').addClass('disabled')
      //   setTimeout(function () {
      //     $('#waiter_call_err').removeClass('disabled')
      //   }, 10000)
      //   alert('پیام به گارسون رسید')
      // }

      
//       $(document).on('click', '.waiter_call', function () {
//         if ($(this).hasClass('defined_seat')) {
//           table_number = $('.waiter_call').data('tablenumber')
//           callWaiter(table_number)
//         } else {
// //                $('.cancelBtn').attr('id', 'call_waiter_cancel');
//           $('.confirmBtn').attr('id', 'call_waiter_confirm').addClass('not_close')
//           ShowMessage('call waiter', '<div class="message_content"><label class="">لطفا شماره میز خود را وارد کنید</label><input type="number" name="table_number" id="call_waiter_table_number" required></div><div class="waitercall_validate_errors"></div>', 'Call Waiter', 'فراخوانی', 'لغو', true, false)
//         }
//       })

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

//       function callWaiter (table_number) {
//         CallAjaxFunc('laravel-route-user.waiterCall', {
//           'table_number': table_number,
//         }, hideMessageBox, callWaiterActionsFail)
//       }

//       $(document).on('click', '#call_waiter_confirm', function () {

//         $(this).text('ارسال...').addClass('disabled ')//it seems disabled not work!
// //            $('.cancelBtn').addClass('disabled');
//         table_number = $('#call_waiter_table_number').val()
//         callWaiter(table_number)
//       })

//       function hideMessageBox (status) {
//         $('.confirmBtn').removeClass('disabled').text('فراخوانی')
// //            $('.cancelBtn').removeClass('disabled');
//         if (status != 1) {
// //                var errors = JSON.parse(status);
//           var errors = ''
//           if (status.errors) {//there are server validation error
//             $.each(status.errors, function (key, value) {
//               errors += '<br>' + value
//             })
//             $('.waitercall_validate_errors').html('<h2>' + errors + '</h2>')
//           }
//         } else {
//           $('.confirmBtn').removeAttr('id')
//           $('.msgBox').removeClass('show')
//           $('.waiter_call').addClass('active defined_seat ' + table_number).data('tablenumber', table_number)
//           alert('U successfully called waiter')
//         }
//       }

//       function callWaiterActionsFail (jqXHR, textStatus, errorThrown) {

//         $('.confirmBtn').removeClass('disabled').text('فراخوانی')
//         $('.cancelBtn').removeClass('disabled')
//         console.log(errorThrown)
// //            if (textStatus === 'timeout') {
// //                ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
// //            } else {
// //                ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
// //            }
//       }

      // socket.on('remove_waiter_call', function (data) {
      //   $('.waiter_call.' + data).removeClass('active')
      // })

      //        $(document).on('click', '.cancelBtn', function () {
      //            $(".confirmBtn").removeAttr('id');
      //        });

</script>