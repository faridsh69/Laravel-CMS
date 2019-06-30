@extends('layout.shop')
@section('content')

<!-- begin category -->
<div class="header" style="background: {{ $shop->theme_color ? $shop->theme_color : '#da315f' }}; color: black">
    <div class="headertop">
        <header class="title">
            <h1>
                {{ $shop->title }}
            </h1>
        </header>
    </div>
    <div class="categories">
        @foreach($categories as $category)
            <div class="cat" id="batch{{$category->id}}cat" style="background-image: url({{$category->meta_image}})">
                <span>
                    {{$category->title}}
                </span>
            </div>
        @endforeach
    </div>
    <div class="showmore">
        همه دسته بندی ها
        <span class="showmoreicon" style="background-image:url({{asset('images/icons/arrowdown2.svg')}});background-repeat: no-repeat;background-position: center bottom;">
        </span>
    </div>
</div>
<!-- end category -->

<!-- begin closed -->
<div class="alerts_holder" style="display: none;">
    <div class="just_content_message_div">
        <div class="just_content_message">
            ساعات عدم فعالیت {{ $shop->title_fa}}
        </div>
    </div>
</div>
<!-- end closed -->

<div class="content">

    <!-- begin loading -->
    <div class="indexloading"></div>
    <!-- end loading -->

    <!-- <div class="homeintro" data-jcmessage="{{__('messages.jc_message')}}"
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
    </div> -->
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
                            @if(false && $just_content == 0 && $fully_just_content == 0 && $is_restaurant_close == 0)
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
                                     style="background-image: url('{{ $product->logo }}');">
                                    @if($has_video)
                                        <div class="video_play_icon">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="itemdetails">
                                    <header class="title">{{$product->title}}</header>
                                    @if(!is_null($product->content))
                                        <div class="desc"><p
                                                    style="white-space: pre-line">{!! $product->content !!}</p>
                                        </div>
                                    @endif
                                    @if(!is_null($product->price))
                                        <div class="price">
                                            @if(is_null($product->discount_price))
                                                {{$product->price}} تومان
                                            @else
                                                <div class="oldprice">{{$product->price}} تومان</div>
                                                <div class="newprice">{{$product->discount_price}} تومان</div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="qtychange">
                                        <span class="plus">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="minus">    
                                            @if($order_count!='1')
                                                <i class="fas fa-minus"></i>
                                            @else
                                                <div style="font-size: 20px;">
                                                    <i class="far fa-trash-alt"></i>
                                                </div>
                                            @endif
                                        </span>
                                    </div>
                                    @if(false && $product->vote != '0' )
                                        <div class="ratingstars">
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
<!-- <div class="msgBox">
    <div class="innerbox">
        <div class="topSide">warning</div>
        <div class="bottomSide"></div>
        <div class="btns">
            <div class="btn confirmBtn">Yep</div>
            <div class="btn cancelBtn">Nope</div>
        </div>
    </div>
</div> -->

@endsection


@push('scripts')
<script>
    var headerheight = $('.waiting_orders').outerHeight() + $('.header').outerHeight();

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
                }, 100)
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


        user_id = $('.homeintro').data('userid')
        version_type = $('.homeintro').data('versiontype')
        

        $(document).on('click', '#redirect_home', function () {
            window.location = home_url
        })


        $(document).on('click', '#reload_page', function () {
            location.reload()
        })
</script>
@endpush