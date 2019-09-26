@extends('layout.shop')
@section('content')
    <div class="bgwrap"></div>
    <header class="header">
        <div class="user" id="header_user_info" @if(!is_null(\Auth::user())) data-updateversion="{{\Auth::user()->updated_version}}" @endif data-updateurl="{{'update-version'}}">
            <div class="user_pic">
            </div>
            <div class="user_details">
                <div class="name">@if(\Auth::check()){{\Auth::user()->username}}@else Super Admin @endif</div>
                <div class="post">سرپرست
                </div>
                <span class="">
                    <a href="{{route('shop.index', ['shop_subdomain' => $shop_subdomain])}}" target="_blank">مشاهده منو</a>
                </span> |
                @if(!is_null(session('userid')))
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <span id="empty_super_license" data-nexturl="{{route('shop.index', ['shop_subdomain' => $shop_subdomain])}}" data-url="{{'admin.super-license'}}" style="cursor: pointer;">خروج</span>
                @endif
            </div>
        </div>

        <div class="actions">
        </div>
        <div class="emergency_call">
            <div class="inner">
                <div class="title">تماس پشتیبانی فوری</div>
                <div class="tell"><span class="thinText"></span><span class="bigbold">{{$shop->phone}} </span></div>
            </div>
            <div class="icon"></div>
        </div>
    </header>
    <div class="success_alert successfully_saved"><span style="font-size:21px; padding: 0 4px 0 0px;"><i class="fas fa-check"></i></span> {{__('new settings successfully saved')}}.</div>
    <div class="success_alert successfully_reset"><span style="font-size:21px; padding: 0 4px 0 0px;"><i class="fas fa-check"></i></span> {{__('numbering successfully reseted')}}.</div>
    <div class="success_alert successfully_printer_set"><span style="font-size:21px; padding: 0 4px 0 0px;"><i class="fas fa-check"></i></span> {{__('printer sets successfully')}}.</div>
    {{--<div class="failed_alert"><span style="font-size:21px; padding: 0 4px 0 0px;"><i class="fas fa-check"></i></span> <div class="errors">{{__('there are some errors')}} : </div></div>--}}
    <div class="container">
        <div class="settings_page">
            <div class="settings_section">
                <div class="settings_section_left">
                    <header class="settings_header">{{__('general settings')}}</header>
                    <div class="settings_icon"><i class="fas fa-wrench"></i></div>
                </div>
                <div class="settings_section_right">
                    <form class="change_admin_setting" method="post" action="{{route('shop.dashboard.changeSetting', ['shop_subdomain' => $shop_subdomain])}}">
                        @csrf
                        <div class="onesetting_wrapper">
                            <div class="onesetting currency_change">
                                <span class="setting_title">{{__('currency')}}:</span>
                                <select class="setting_content currency_select" name="money_unit">
                                    <option value="تومان" @if($shop->money_unit == 'تومان') selected @endif>تومان</option>
                                    <option value="ریال" @if($shop->money_unit == 'ریال') selected @endif>ریال</option>
                                </select>
                            </div>
                            <div class="onesetting member_name">
                                <span class="setting_title">{{__('restaurant name')}} (فارسی):</span>
                                <input class="setting_content" type="text" name="title_fa"
                                       placeholder="{{__('restaurant name')}} (فارسی)"
                                       @if(!is_null($shop->title_fa)) value="{{$shop->title_fa}}" @endif>
                            </div>
                            <div class="onesetting member_name">
                                <span class="setting_title">{{__('restaurant name')}} (انگلیسی):</span>
                                <input class="setting_content" type="text" name="title"
                                       placeholder="{{__('restaurant name')}} (انگلیسی)"
                                       @if(!is_null($shop->title)) value="{{$shop->title}}" @endif>
                            </div>
                            <div class="onesetting category_background_color">
                                <span class="setting_title">{{__('Category Background Color')}}</span>
                                <input class="setting_content write_color_input" type="text" name="category_background_color"
                                       placeholder="{{__('Category Background Color')}}"
                                       @if(!is_null($shop->category_background_color)) value="{{$shop->category_background_color}}" @endif>
                                <div class="setting_show_color"></div>
                            </div>

                            <div class="onesetting category_icon_color">
                                <span class="setting_title">{{__('Category Icon Color')}}</span>

                                <select class="setting_content icon_color_selectbox write_color_input" name="category_icon_color">
                                    <option value="black" @if($shop->category_icon_color == 'black') selected @endif>black</option>
                                    <option value="white" @if($shop->category_icon_color== 'white') selected @endif>white</option>
                                </select>
                                <div class="setting_show_color"></div>
                            </div>

                            <div class="onesetting products_background_color">
                                <span class="setting_title">{{__('Items Background Color')}}</span>
                                <input class="setting_content write_color_input" type="text" name="products_background_color"
                                       placeholder="{{__('Items Background Color')}}"
                                       @if(!is_null($shop->products_background_color)) value="{{$shop->products_background_color}}" @endif>
                                <div class="setting_show_color"></div>
                            </div>

                            <div class="onesetting just_content" @if($shop->activated == '1') data-contenttype="activated" @else data-contenttype="none" @endif>
                                <label class="setting_title" for="under_construction_input">Under Construction </label>
                                <div class="setting_content">
                                    <input type="checkbox" id="under_construction_input" name="activated" value="1" @if($shop->activated == "0") checked @endif>
                                </div>
                            </div>
                        </div>
                        <button class="btn submitbutton submit_general_form" type="submit">{{__('save')}} <i class="fas fa-check"></i></button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>


<div class="footer">
    <ul class="owl-carousel owl-theme modules_panel">
        <a href="{{route('shop.dashboard.index', ['shop_subdomain' => $shop_subdomain])}}">
            <li class="item {{ Request::is('dashboard') ? 'active' : '' }}" id="menumaker">
            منوساز</li>
        </a>
        <a href="{{route('shop.dashboard.settings.index', ['shop_subdomain' => $shop_subdomain])}}">
            <li class="item {{ Request::is('dashboard/settings*') ? 'active' : '' }}" id="settings">
                تنظیمات
            </li>
        </a>
    </ul>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 6,
            loop: false,
            nav: false,
            dots: false,
            autoplay: false,
            singleItem:true
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
        function changeFlex() {
            if( $('.owl-stage').width() < $('.owl-stage-outer').width() ) {
                $('.footer .owl-stage-outer').addClass('flex');
            }
            else {
                $('.footer .owl-stage-outer').removeClass('flex');
            }
        }
        changeFlex();
        $(document).resize(function () {
            changeFlex();
        });
    });

</script>


    <script>



        function successAlerts() {
            $(".chose_time_error").html("");
            if ($(".successfully_saved").hasClass('show')) {
                $(".successfully_saved").animate({left: '-=10px'}, 100);
                $(".successfully_saved").animate({left: '+=20px'}, 100);
                $(".successfully_saved").animate({left: '-=20px'}, 100);
                $(".successfully_saved").animate({left: '+=10px'}, 100);
            }
            else {
                $('.successfully_saved').addClass('show');
            }
        }

        function failedAlerts(errors) {

            var error_content = "There are some errors : ";
            $.each(errors, function (key, value) {
                error_content +=  value +".";
            });
            alert(error_content);
//            alert("errror");
        }

        //        function updateLogoImage(image) {
        //            alert("hi :D");
        //        }
        function resetFactorSuccessAlert() {
            if ($(".successfully_reset").hasClass('show')) {
                $(".successfully_reset").animate({left: '-=10px'}, 100);
                $(".successfully_reset").animate({left: '+=20px'}, 100);
                $(".successfully_reset").animate({left: '-=20px'}, 100);
                $(".successfully_reset").animate({left: '+=10px'}, 100);
            }
            else {
                $('.successfully_reset').addClass('show');
            }
        }

        function setPrintDataSuccessAlert() {
            if ($(".successfully_printer_set").hasClass('show')) {
                $(".successfully_printer_set").animate({left: '-=10px'}, 100);
                $(".successfully_printer_set").animate({left: '+=20px'}, 100);
                $(".successfully_printer_set").animate({left: '-=20px'}, 100);
                $(".successfully_printer_set").animate({left: '+=10px'}, 100);
            }
            else {
                $('.successfully_printer_set').addClass('show');
            }
        }

        $( ".success_alert" ).each(function() {
            $(this).click(function () {
                $(this).removeClass('show');
            });
        });
    </script>




















    <script>
                    $(document).ready(function () {

                        $('.setting_show_color').each(function () {
                            var its_color = $(this).closest('.onesetting').find('.write_color_input').val();
                            $(this).css("background", its_color);
                        });

                        $(document).on('keyup', '.write_color_input', function () {
                            var new_color = $(this).val();
                            $(this).closest('.onesetting').find('.setting_show_color').css("background", new_color);
                        })

                        $(document).on('change', '.icon_color_selectbox', function () {
                            var new_color = $(this).val();
                            $(this).closest('.onesetting').find('.setting_show_color').css("background", new_color);
                        })

                        $(document).on('click', '.submit_general_form', function (e) {
                            // $(".confirmBtn").attr('id', 'change_underconstruction');
                            // $(".cancelBtn").attr('id', 'not_change_underconstruction');

                            // var contet_type = $('.just_content').data('contenttype');

                            // if($("#under_construction_input").is(':checked')) {
                            //     $('.change_admin_setting').ajaxForm()
                            //     if(contet_type != 'under_construction') {
                            //         e.preventDefault();
                            //         under_construction_change = 'under_construction';
                            //         ShowMessage('error', "Your DigiMenu will be shut down until the very next Opening Time after you Make Under Construction Off!\n" +
                            //             "Are you sure?", 'warning', 'Yes', 'No', true, false);
                            //     }
                            // } else {
                            //     console.log('from updated');
                            //     if($('.just_content').data('contenttype') == 'under_construction') {
                            //         under_construction_change = 'none';
                            //         e.preventDefault();
                            //         ShowMessage('error', "Are you sure about disabling under construction?", 'warning', 'Yes', 'No', true, false);
                            //     } else {
                            //         $('.just_content').data('contenttype', 'none');
                            //         $('.change_admin_setting').ajaxForm()
                            //     }
                            // }
                            // console.log('from updated');
                        })
                    })

                    $(document).on('click', '#change_underconstruction', function (e) {
                        var url = $(".change_admin_setting").attr('action');
                        var data = $(".change_admin_setting").serialize();
                        CallAjax(url, data);
                        $('.msgBox').fadeOut();
                        $('.just_content').data('contenttype', under_construction_change);
                    });

                    $(document).on('click', '#not_change_underconstruction', function (e) {
                        if($("#under_construction_input").is(':checked')) {
                            $("#under_construction_input").prop('checked', 0);
                        } else {
                            $("#under_construction_input").prop('checked', 1);
                        }
                    });

                    function escapeTags (str) {
                        return String(str)
                            .replace(/&/g, '&amp;')
                            .replace(/"/g, '&quot;')
                            .replace(/'/g, '&#39;')
                            .replace(/</g, '&lt;')
                            .replace(/>/g, '&gt;')
                    }

                    window.onload = function () {
                        url = $('.member_logo').data('url')
                        var btn = document.getElementById('uploadBtn'),
//                progressBar = document.getElementById('progressBar'),
//                progressOuter = document.getElementById('progressOuter'),
                            msgBox = document.getElementById('msgBox')
//            var sizeBox = document.getElementById('sizeBox'), // container for file size info
//                progress = document.getElementById('progress'); // the element we're using for a progress bar

                        //intro
                        intro_url = $('.introduction_pic').data('url')
                        var intro_btn = document.getElementById('uploadBtn2'),
//                intro_progressBar = document.getElementById('progressBar2'),
//                intro_progressOuter = document.getElementById('progressOuter2'),
                            intro_msgBox = document.getElementById('msgBox2')
//            var intro_sizeBox = document.getElementById('sizeBox2'), // container for file size info
//                intro_progress = document.getElementById('progress2'); // the element we're using for a progress bar

//                         var uploader = new ss.SimpleUpload({
//                             button: btn,
//                             url: url,
// //                progressUrl: 'setting/upload/logo/progress',
//                             name: 'uploadfile',
//                             multipart: true,
//                             hoverClass: 'hover',
//                             focusClass: 'focus',
//                             responseType: 'json',
// //                startXHR: function () {
// //                    alert("?");
// //                    progressOuter.style.display = 'block'; // make progress bar visible
// //                    this.setProgressBar(progressBar);
// //                },
//                             onSubmit: function () {
//                                 msgBox.innerHTML = '' // empty the message box
//                                 btn.innerHTML = 'Uploading...' // change button text to "Uploading..."
// //                    this.setFileSizeBox(sizeBox); // designate this element as file size container
// //                    alert(progress);
// //                  this.setProgressBar(progress); // designate as progress bar
//                             },
//                             onProgress: function (pct) {
//                                 $('.logo_upload_percentage').html('% ' + pct)
//                             },
//                             onComplete: function (filename, response) {
//                                 btn.innerHTML = 'Choose Another File'
// //                    progressOuter.style.display = 'none'; // hide progress bar when upload is completed

//                                 if (!response) {
//                                     btn.innerHTML = 'Choose' // change button text to "Uploading..."
//                                     msgBox.innerHTML = 'Unable to upload file'
//                                     return
//                                 }

//                                 if (response.success === true) {
//                                     msgBox.innerHTML = '<strong>' + escapeTags(filename) + '</strong>' + ' successfully uploaded.'
//                                     $('.logo_upload_percentage').html('')

//                                 } else {
//                                     if (response.msg) {
//                                         msgBox.innerHTML = escapeTags(response.msg)

//                                     } else {
//                                         msgBox.innerHTML = 'An error occurred and the upload failed.'
//                                     }
//                                 }
//                             },
//                             onError: function () {
// //                    progressOuter.style.display = 'none';
//                                 msgBox.innerHTML = 'Unable to upload file'
//                             }
//                         })

//                         //intro pic upload
//                         var uploader = new ss.SimpleUpload({
//                             button: intro_btn,
//                             url: intro_url,
// //                progressUrl: 'setting/upload/logo/progress',
//                             name: 'intro_uploadfile',
//                             multipart: true,
//                             hoverClass: 'hover',
//                             focusClass: 'focus',
//                             responseType: 'json',
// //                startXHR: function () {
// ////                    alert("?");
// //                    intro_progressOuter.style.display = 'block'; // make progress bar visible
// //                    this.setProgressBar(intro_progressBar);
// //                },
//                             onSubmit: function () {
//                                 intro_msgBox.innerHTML = '' // empty the message box
//                                 intro_btn.innerHTML = 'Uploading...' // change button text to "Uploading..."
// //                    this.setFileSizeBox(intro_sizeBox); // designate this element as file size container
// //                    this.setProgressBar(intro_progress); // designate as progress bar
//                             },
//                             onProgress: function (pct) {
//                                 $('.intropic_upload_percentage').html('% ' + pct)
//                             },
//                             onComplete: function (filename, response) {
//                                 intro_btn.innerHTML = 'Choose Another File'
// //                    intro_progressOuter.style.display = 'none'; // hide progress bar when upload is completed

//                                 if (!response) {
//                                     intro_btn.innerHTML = 'Choose' // change button text to "Uploading..."
//                                     intro_msgBox.innerHTML = 'Unable to upload file'
//                                     return
//                                 }

//                                 if (response.success === true) {
//                                     intro_msgBox.innerHTML = '<strong>' + escapeTags(filename) + '</strong>' + ' successfully uploaded.'
//                                     $('.intropic_upload_percentage').html('')

//                                 } else {
//                                     if (response.msg) {
//                                         intro_msgBox.innerHTML = escapeTags(response.msg)

//                                     } else {
//                                         intro_msgBox.innerHTML = 'An error occurred and the upload failed.'
//                                     }
//                                 }
//                             },
//                             onError: function () {
// //                    intro_progressOuter.style.display = 'none';
//                                 intro_msgBox.innerHTML = 'Unable to upload file'
//                             }
//                         })
                    }
                </script>
@endpush
