@section('title')
    MeneW
@endsection
@extends('layout.razie')
@push('headscript')
    {{--      <script type="text/javascript" src="{{asset('js/jquery.lazy.min.js')}}"></script>--}}
@endpush
@section('content')
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




            @foreach($folders as $folder)
                @if($folder->items->count() > 0)
                    <div class="menucat" id="batch{{$folder->id}}">
                        <div class="foldername">{{$folder->name}}</div>
                        @foreach($folder->items as $item)
                            @php
                                $has_video = 0;
                                if(!is_null($item->images)) {
                                  $filtered = $item->images->filter(function ($value, $key) {
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
                            <section id="item{{$item->id}}"
                                     class="menuitem {{$item->image_class}} {{$item->finished_class}} {{$item->discount_class}} {{$is_ordered}}"
                                     @if(!is_null($item->discount)) data-before="{{$item->price}}"
                                     data-discount="{{$item->calculate_discount}}" @endif
                                     data-gallery="{{$item->images}}" data-itemid="{{$item->id}}"
                                     data-mediumimage="{{$item->item_medium_image}}"
                                     data-purepic="{{$item->main_image}}"
                                     data-available="{{$item->count}}" data-vote="{{$item->vote_show}}"
                                     data-desc="{{$item->description}}"
                                     data-galleryaddr="{{$item->gallery_address}}"
                                     data-type="{{$item->type}}">
                                <span class="qty">{{$order_count}}</span>

                                <div class="itemimage"
                                     style="background-image: url('{{$item->item_small_image}}');">
                                    @if($has_video)
                                        <div class="video_play_icon">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    @endif
                                </div>
                                {{--<div class="itemimage lazy"  data-src="{{$item->item_small_image}}"></div>--}}

                                <div class="itemdetails">
                                    <header class="title">{{$item->name}}</header>
                                    @if(!is_null($item->short_description))
                                        <div class="desc"><p
                                                    style="white-space: pre-line">{!! $item->short_description !!}</p>
                                        </div>
                                    @endif
                                    @if($item->type == 'shop_card' && !is_null($item->price))
                                        <div class="price">
                                            @if(is_null($item->discount))
                                                {{$item->price}} {{moneyUnit()}}
                                            @else
                                                <div class="oldprice">{{$item->price}} {{moneyUnit()}}</div>
                                                <div class="newprice">{{$item->discount}} {{moneyUnit()}}</div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="qtychange"><span class="plus"><i class="fas fa-plus"></i></span><span
                                                class="minus">@if($order_count!='1')
                                                <i class="fas fa-minus"></i>@else
                                                <div style="font-size: 20px;"><i
                                                            class="far fa-trash-alt"></i></div>@endif</span></div>
                                    @if($item->vote!='0')
                                        <div class="ratingstars">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5"
                                                       @if($item->vote_show == 10) class="selected" @endif/><label
                                                        class="full" for="star5">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star4half" name="rating" value="4 and a half"
                                                       @if($item->vote_show >= 9 && $item->vote_show < 10) class="selected" @endif /><label
                                                        class="half" for="star4half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star4" name="rating" value="4"
                                                       @if($item->vote_show >= 8 && $item->vote_show < 9) class="selected" @endif /><label
                                                        class="full" for="star4">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star3half" name="rating" value="3 and a half"
                                                       @if($item->vote_show >= 7 && $item->vote_show < 8) class="selected" @endif /><label
                                                        class="half" for="star3half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star3" name="rating" value="3"
                                                       @if($item->vote_show >= 6 && $item->vote_show < 7) class="selected" @endif /><label
                                                        class="full" for="star3">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star2half" name="rating" value="2 and a half"
                                                       @if($item->vote_show >= 5 && $item->vote_show < 6) class="selected" @endif /><label
                                                        class="half" for="star2half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star2" name="rating" value="2"
                                                       @if($item->vote_show >= 4 && $item->vote_show < 5) class="selected" @endif /><label
                                                        class="full" for="star2">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="star1half" name="rating" value="1 and a half"
                                                       @if($item->vote_show >= 3 && $item->vote_show < 4) class="selected" @endif /><label
                                                        class="half" for="star1half">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                                <input type="radio" id="star1" name="rating" value="1"
                                                       @if($item->vote_show >= 2 && $item->vote_show < 3) class="selected" @endif /><label
                                                        class="full" for="star1">
                                                    <div><i class="fas fa-star"></i></div>
                                                </label>
                                                <input type="radio" id="starhalf" name="rating" value="half"
                                                       @if($item->vote_show >= 1 && $item->vote_show < 2) class="selected" @endif /><label
                                                        class="half" for="starhalf">
                                                    <div><i class="fas fa-star-half"></i></div>
                                                </label>
                                            </fieldset>
                                            <div class="ratingcontent hidden">امتیاز {{$item->vote_show/2}} از 5</div>
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
@endsection

@push('script')
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
        })

    </script>



    @if(false)
    <script>
        socket.on('item_message', function (data) {
            item = JSON.parse(data)
            // console.log(item);
            // if (item.status == '_' || item.status == 'finished') {
            // if (item.status == 'finished') {

            //     $("section#item" + item.id).addClass("outoforder");

            // } //felan vase namojo0d kardan hichio realtime nakon
            // $("section#item" + item.id).find("title").html(item.name);
            //check if this div does n0t exist? no not neccessary
            // }
            if (item.hide == 1) {
                $('section#item' + item.id).hide()
            } else if (item.hide == 0) {
                $('section#item' + item.id).show()
            }
        })

        socket.on('item-available-count', function (data) {
            item_available = JSON.parse(data)
            $('section#item' + item_available.item_id).data('available', item_available.count)
        })

        user_id = $('.homeintro').data('userid')
        version_type = $('.homeintro').data('versiontype')
        socket.on('confirmorder-user-' + user_id, function (data) {
//        alert("umad");
            if (version_type == 'LP') {
//          alert("umadddaaa");
                url = $('#head_url').data('url')
                url = url + '/order/prefactor'
                window.location = url
            }
        })

        socket.on('user-cashpayment-' + user_id, function (data) {
            order = JSON.parse(data)
            url = $('#head_url').data('url')
            url = url + '/order/useraccess/' + order.id
            window.location = url
        })

        socket.on('reject-spamorder-user-' + user_id, function (data) {
            url = $('.container').data('fakedorderurl')
            CallAjaxFunc(url, {}, removeSessionCallBack)

        })

        socket.on('expire_for_jc_user_' + user_id, function (data) {

            is_expired = 1
            home_url = $('#head_url').data('url')
            var jc_message = $('.homeintro').data('jcmessage')
            $('.confirmBtn').attr('id', 'redirect_home')
            ShowMessage('error', jc_message, 'اخطار', 'باشه', '', true, false)

            $(body).click(function () {
                location.href = home_url
            })
            setTimeout(function () {
                location.href = home_url
            }, 5000)

        })

        $(document).on('click', '#redirect_home', function () {
            window.location = home_url
        })

        socket.on('active_ordering_message', function (data) {

            var message = $('.homeintro').data('disableconstruction')
            $('.confirmBtn').attr('id', 'reload_page')
            ShowMessage('success', message, 'اطلاع', 'باشه', '', true, false)

            $(body).click(function () {
                location.reload()
            })
            setTimeout(function () {
                location.reload()
            }, 5000)
        })

        $(document).on('click', '#reload_page', function () {
            location.reload()
        })

        socket.on('refresh_forchange_jc', function (data) {
            setTimeout(function () {
                if (is_expired == 0) {
                    location.reload()
                }
            }, 2000)
        })

    </script>
    @endif
@endpush
