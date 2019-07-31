@section('title')
    MenuMaker
@endsection
@extends('admin.templates.homepage')
@push('headscript')

@endpush
@section('content')
    @php isset($set->name) ? $set_id = $set->id: $set_id = null @endphp
    <div class="container fullpage">
        <div class="address_bar">
            @if(isset($set->name))
                {{--<a href="" class="address">superstar resturant</a>--}}
                {{--<span class="separator"></span>--}}
                <a href="{{route('admin.set.index')}}" class="address">Sets</a>
                <a class="address current_page">{{$set->name}}</a>
            @endif
        </div>
        <div class="cards">
            <div class="cardsinner">
                @if(isset($folders))
                    @foreach($folders as $folder)
                        <div class="swiper-slide">
                            <ul class="card swiper-no-swiping" id="{{$folder->id}}">
                                <div class="cardheader">
                                    <div class="leftsec">
                                        <div class="card_name">{{$folder->name}}</div>
                                        <div class="batchicon edit_card" data-id="batch_{{$folder->id}}" title="{{__('edit batch')}}"></div>
                                        <div class="batchicon card_archive" data-id="{{$folder->id}}" title="{{__('archive batch')}}"></div>
                                    </div>
                                    <div class="rightsec">
                                        <div class="card_icon" data-iconname="{{$folder->image}}">
                                            <img height="100%" width="100%" src="{{$folder->folder_image}}"/>
                                        </div>
                                        {{--<label class="card_select">--}}
                                        {{--<input class="select_input" type="checkbox"--}}
                                        {{--id="batch_{{$folder->id}}">--}}
                                        {{--<span class="
                                        "></span>--}}
                                        {{--</label>--}}
                                    </div>
                                </div>
                                <div class="items">
                                    <ul class="items_list">
                                        @foreach($folder->products()->orderby('order')->get() as $item)
                                            <li class="item {{$item->status}} {{$item->hide_class}} {{$item->discount_enabled}}"
                                                id="item{{$item->id}}"
                                                data-url="{{route('admin.showItem', $item->id)}}"
                                                data-itemgalleryresize="{{$item->gallery_resize}}"
                                                data-galleryaddr="{{$item->gallery_address}}">

                                                <img class="li_item_image @if(is_null($item->item_image)) hidden @endif"
                                                     src="{{$item->item_small_image}}" alt=""/>
                                                <div class="name">
                                                    <span class="inner_item_name">{{$item->name}}</span>
                                                    {{--<span class="count">@if($item->count!= -1 && $item->type == 'shop_card') ({{$item->count}}) @endif</span>--}}
                                                </div>
                                                <div class="discounticon"><i class="fas fa-percent"></i></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <form name="" class="add_item_form"
                                          data-action="{{route('admin.item.store')}}"
                                          method="post">
                                        <input type="text" name="name" class="add_item add_item_input"
                                               placeholder="{{__('add new item')}} ..." autocomplete="off"/>
                                        <input type="hidden" name="folder_id" class="folder_id"
                                               value="{{$folder->id}}">
                                        <input type="submit" value="{{__('add item')}}" class="add_item_btn">
                                    </form>
                                </div>
                            </ul>
                        </div>
                    @endforeach
                @endif
                <span class="swiper-slide add_card_sw">
                    <form action="{{route('admin.batch.store', ['parent_id'=> $set_id])}}" method="post"
                          name="add_card_form" id="add_card_form" class="add_card">
                        <input type="text" name="name" class="add_card_input" placeholder="{{__('new batch')}}"
                               autocomplete="off"/>
                        {{--<div class="danger hidden" id="duplicate_batch">This name is duplicated. please select another name</div>--}}
                        <input type="submit" value="{{__('add batch')}}" class="add_card_btn">
                    </form>
                </span>
            </div>
        </div>
    </div>
    @include('admin.menumaker.sections.item-properties')
@endsection

@push('script')
    <script>
        $(function () {
            var curDown = false,
                curYPos = 0,
                curXPos = 0;

            $('.cards').mousemove(function (m) {
                if (curDown === true) {
                    $('.cards').scrollLeft(curElemPos + (curXPos - m.pageX));
                }
            });

            $('.cards').mousedown(function (m) {
                if ($(m.target).closest(".swiper-slide").length == 0) {
                    $('body').css('overflow', 'hidden');
                    curDown = true;
                    curXPos = m.pageX;
                    curElemPos = $('.cards').scrollLeft();
                }
            });

            $(window).mouseup(function () {
                curDown = false;
                $('body').css('overflow', 'auto');
            });
        })


        function enableCreateBatchButton() {
            setTimeout(function () {
                $('.add_card_btn').prop('disabled', 0);
            }, 1000);
        }

        function selectMainPicOfGallery() {
            $('.pic_item img').on('click', function () {
                var gallery_src = $(this).attr('src');
                // var main_pic_src = $(".previewPic").attr('src');
                var small_prefix_posision = gallery_src.indexOf("small_");
                var removed_small_prefix = gallery_src.substring(small_prefix_posision+5);
                //                swapGalleryAndMainPic(main_pic_src);
                $("#main_pic_from_gallery").val(removed_small_prefix);
                $('.previewPic').attr('src', gallery_src);
            });
        }

        //        function swapGalleryAndMainPic(main_pic_src) {
        //
        //            last_slash_pos = main_pic_src.lastIndexOf("/") + 1;
        //            var main_pic_pure_name = main_pic_src.substring(last_slash_pos);
        ////                alert(image_src);
        //            if($('.dynamic_gallery').find('.pic_item img[src*="'+main_pic_pure_name+'"]').length == 0) {
        //
        //                content = imageGalleryPreview(main_pic_src, '', 0);
        //
        //
        //                $("#add_gallery_label").before(content);
        //                var str1 = $("#gallery_files").val();
        //
        //                if(str1 == '') {
        //                    $("#gallery_files").val(main_pic_pure_name);
        //                } else {
        //
        //                    var str2 = ","+main_pic_pure_name;
        //                    var res = str1.concat(str2);
        //                    $("#gallery_files").val(res);
        //                }
        //            }
        //        }

        function deleteMainPicResult() {
            $('.previewPic').attr('src', '');
            $("#item"+main_item_id).find('img.li_item_image').attr("src", "").addClass("hidden");
        }

        function deleteMainPicFail() {

        }

        $(document).ready(function () {
            openNextItem = 1;

            $('.main_pic .pic_frame .del').on('click', function () {
//                var main_pic_src = $('.main_pic .pic_frame img').attr('src');
//                swapGalleryAndMainPic(main_pic_src);
                main_item_id = item_id.substr(4);
                CallAjaxFunc('{{url(route('admin.deleteMainPic'))}}', {'item_id': main_item_id}, deleteMainPicResult, deleteMainPicFail);//10min timeout for gallery
            });
            //item drag & drop
            ItemsdragDrop();

            //batch drag & drop
            $(function () {
                $(".cardsinner").sortable({
                    axis: "x",
                    handle: ".cardheader",
                    stop: function (event, ui) {
                        k = 0;
                        cards = [];
                        sorts = [];
                        var listItems = $(ui.item[0].offsetParent).find('.swiper-slide');
                        listItems.each(function (idx, li) {
                            cards.push($(li).find('ul').attr('id'));
                            sorts.push(k);
                            k++;
                        });
                        CallAjax("{{route('admin.changeCardSortInBatchPage')}}", {'cards': cards, 'sorts': sorts});
                    }
                }).disableSelection();
            });

            /*            //swip slider
                        mySwiper = new Swiper('.swiper-container', {
                            effect: 'slide',
                            speed: 800,
                            grabCursor: true,
                            slidesPerView: 'auto',
                            freeMode: true,
                            observer: true,
                            freeModeMomentum: true,
                            freeModeMomentumRatio: 1,
                            freeModeSticky: false,
                            scrollbar: {
                                el: '.swiper-scrollbar',
                                draggable: true
                            }
                        });
            */

            $(".add_card_input").focus(function () {
                $(this).siblings('.add_card_btn').css('display', 'block');
            });

            $(".add_card_input").blur(function () {
                $(this).siblings('.add_card_btn').hide();
            });

            $('#add_card_form').ajaxForm();

            //batch form and triggers

            $('.add_card_btn').on('mousedown', function () {
                $('#add_card_form').submit();
            });
            $('#add_card_form').submit(function (data) {
//                console.log(data);
                $(".add_card_btn").prop('disabled', 1);
            });
            //create item
            $(document).on('mousedown', '.add_item_btn', function () {
                createItem($(this).parent());
            });

            $(document).on('submit', '.add_item_form', function (e) {
                createItem($(this));
                e.preventDefault();
            });

            function createItem(elem) {
                $('.add_item_btn').prop('disabled', 1);
                var formData = elem.serialize();
                var url = elem.data('action');
                var elemid = '#' + elem.parent().attr('id');
                $(elemid).css('top', $(elemid).height() + 'px');
                CallAjaxFunc(url, formData, createItemCallback, createItemFailure);
            }

            function createItemCallback(data) {
                setTimeout(function () {
                    $('.add_item_btn').prop('disabled', 0);
                }, 1000);
            }

            function createItemFailure(jqXHR, textStatus, errorThrown) {
                $('.add_item_btn').prop('disabled', 0);
                console.log(errorThrown);
//                if (textStatus === 'timeout') {
//                    ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//                } else {
//                    ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//                }
            }

            //end create item

            $(document).on('click', '.card .items .item', function () {
                item_id = $(this).attr("id");
                $("#gallery_files").val("");
                item_image_src = $(this).children().first().attr('src');
                item_image_elem = $(this).children().first();
                $(".gallery_error").html("");

//                if(openNextItem) {
                emptyItemDetail();
                showItemDetail();
                CallAjaxFunc('{{url(route('admin.showItem'))}}' + '/' + item_id.substr(4), {}, fillItemDetail);
//                } else {
//                    console.log("ex process is not saving yet")
//                }
            });

            $(document).on('click', '#update_item', function (e) {
                $("#add_gallery_input").val('');//cause we don't need it anymore and everything we need is uploaded
                formData = new FormData($("#edit_item")[0]);
                $("#update_item").val("Loading ... ").removeAttr('id').prop('disabled', true);
                openNextItem = 0;

                //rah baz kon!
                CallAjaxFunc('{{route('admin.test')}}', {
                    'fake': 1
                }, testOpenCallback);

                CallAjaxImageFunc('{{url(route('admin.updateItem'))}}' + '/' + item_id.substr(4), formData, updateItemDetail, updateItemDetailFail, 300000);//5min timeout
                e.preventDefault();
            });

            function testOpenCallback(data) {
                console.log(data);
            }

            function updateItemDetail(status) {
              $(".update_item_input").val("Save").attr('id', 'update_item').prop('disabled', false);
              openNextItem = 1;
              if (status.errors) {//there are server validation error
                $.each(status.errors, function (key, value) {
                  $(".item_detail_errors").html("<h2>" + value + "</h2>");
                });
              } else if (status.length > 30) {//what does it mean?
                $(".item_detail_errors").html("<h2>" + status + "</h2>");
              } else {//there were no error
                var elder_class_attr = $("#" + item_id).attr('class');
                if (elder_class_attr.indexOf("hide") != -1) {
                  status = status + " hide";
                }
                $('#' + item_id).attr('class', 'item ' + status)
                hideItemDetail()
                if ($('#quantity_input').val() && $('.item_type_btn').attr('id') == 'shop_card')
                  var current_count = ' (' + $('#quantity_input').val() + ')'
                else
                  var current_count = ''

                var main_pic_img_src = $('.previewPic').attr('src')
                $('#' + item_id).find('.name').find('.inner_item_name').html($('#item_name').val())
                $('#' + item_id).find('.name').find('.count').html(current_count)
                if (main_pic_img_src != '') {
                  $('#' + item_id).children().first().removeClass('hidden').attr('src', main_pic_img_src)
                }
              }
            }

            function updateItemDetailFail(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                console.log(textStatus);

                $(".update_item_input").val("Save").attr('id', 'update_item').prop('disabled', false);
                openNextItem = 1;
//                if (textStatus === 'timeout') {
//                    ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//                } else {
//                    ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//                }
            }

            function emptyItemDetail() {
                $("#item_name").val('');
                $("span.item_name").text('');
                $("span.item_parent_name").text('');
                $("#price_input").val('');
                $("#item_short_description").val('');
                $("#item_description").val('');
                $('.previewPic').attr('src', '');
                $("#quantity_input").val('');
                $("#main_pic").val("");
                $(".item_detail_errors").html("");
                hideOrShowBtn(0);
                fillDiscountParts(null);
                fillTagsPart(null);
                alterExtantCheckbox(0);
                $(".dynamic_gallery").html("");
            }

            function fillItemDetail(data) {
                // showItemDetail();
                mainData = JSON.parse(data);
                setGalleryItems(mainData);
                $("#item_name").val(mainData.name);
                $("#item_type").val(mainData.type);
                showPricePartsOrNoAccordingtoType(mainData.type);
                $("span.item_name").text(mainData.name);
                $("span.item_parent_name").text(mainData.folder.name);
                $("#price_input").val(mainData.price);
                $("#item_short_description").val(mainData.short_description);
                $("#item_description").val(mainData.description);
                $('.previewPic').attr('src', item_image_src);
                $("#quantity_input").val(mainData.count);
                $("#main_pic").val("");
                $(".item_detail_errors").html("");
                $("#main_pic_from_gallery").val("");
                $(".item_type_btn").attr('id', mainData.type);
                hideOrShowBtn(mainData.hide);
                fillDiscountParts(mainData.discount);
                fillTagsPart(mainData.tag);
                alterExtantCheckbox(mainData.count);
                selectMainPicOfGallery();
            }

            function hideOrShowBtn(hide) {
                if (hide == 1) {
                    $(".show_hide_btn").attr('class', 'show_hide_btn hide_btn');
                } else {
                    $(".show_hide_btn").attr('class', 'show_hide_btn show_btn');
                }
            }

            function fillDiscountParts(discount) {
                if (discount != null) {
                    $(".discount_price").val(discount);
                    enableDiscount();
                    $('.discpercent_input').val(calculateDiscount());
                } else {
                    $(".discount_price").val('');
                    disableDiscount();
                    $('.discpercent_input').val('');
                }
                discountMaxValidation();
            }

            function fillTagsPart(tag) {
                current_tags = [];
                if (tag != null) {
                    fillItemTags(tag);
                } else {
                    $(".appended_tags").html("");
                }
            }

            function setGalleryItems(mainData) {

              var gallery_address = $('#item' + mainData.id).data('galleryaddr')
              $('.dynamic_gallery').html('')
              gallery_file_name = '_'
              $.each(mainData.images, function (key, value) {
                var image_name = value.file;
                if (image_name.indexOf('.mp4') == -1 && image_name.indexOf('.webm') == -1) {
                  if(image_name.indexOf('.gif') == -1) {
                    image_name = 'small_'+image_name;
                  }
                  content = imageGalleryPreview(gallery_address + '/' + image_name, '', value.id)
                } else {
                  content = videoGalleryPreview(gallery_address + '/' + image_name, '', value.id)
                    }
                    $(".dynamic_gallery").append(content);
                });
                $(".dynamic_gallery").append("<label for='add_gallery_input' id='add_gallery_label'></label><input type='file' name='gallery[]' id='add_gallery_input' multiple  accept='video/mp4, video/webm, image/jpeg, image/png, image/jpg, image/gif, image/svg'/>");
            }

            //discount part
            $(".discount_price").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            function discountMaxValidation() {
                $(".discount_price").attr({
                    "max": $('#price_input').val()
                });
            }

            function enableDiscount() {
                $(".price_discount .discount_price").css('opacity', 1);
                $('.discpercent_input').prop('checked', true);
                $('.discount_label_indicator').addClass('checked');
            }

            function disableDiscount() {
                $(".price_discount .discount_price").css('opacity', 0.5);
                $('.discpercent_input').prop('checked', false);
                $('.discount_label_indicator').removeClass('checked');
            }

            function calculateDiscount() {
                var x = $(".price_discount .discount_price").val();
                var y = $("#price_input").val();
                var temp = x / y * 100;
                return parseInt(100 - temp);
            }

            function calculateDiscountPrice() {
                var x = $(".price_discount .discpercent_input").val();
                var y = $("#price_input").val();
                var temp = y * x / 100;
                return parseInt(y - temp);
            }

            $('.discount_price').on('input', function () {
                if (parseInt($(this).val()) < parseInt($('#price_input').val())) {
                    $('.discpercent_input').val(calculateDiscount());
                } else {
                    $('.discpercent_input').val('');
                }
                if ($(this).val().length > 0) {
                    enableDiscount();
                }
                else {
                    disableDiscount();
                }
            });

            $('.discpercent_input').on('input', function () {
                var newPrice = calculateDiscountPrice();
                if (newPrice < parseInt($('#price_input').val())) {
                    $('.discount_price').val(newPrice);
                } else {
                    $('.discount_price').val('');
                }
                if ($(this).val().length > 0) {
                    enableDiscount();
                }
                else {
                    disableDiscount();
                }
            });

            //finish discount part

            function alterExtantCheckbox(count) {
                if (count != 0) {

                    $("#quantity_input").css('opacity', 1).removeAttr('disabled').removeClass('disabled_input');
                    $('#chkaany').prop('checked', true);
                    if (count != -1) {
                        $(".infinite_limited").attr('id', 'limited');
                    } else {
                        $("#quantity_input").val("").css('opacity', 0.4);
                        $(".infinite_limited").attr('id', 'infinite');
                    }

                } else {
                    $('#chkaany').prop('checked', false);
                    $("#quantity_input").val(0).css('opacity', 0.4).attr('disabled', 'disabled').addClass('disabled_input');
                    $(".infinite_limited").attr('id', 'limited');
                }
            }

            function fillItemTags(tag) {

                var tags = tag.split(",");
                $(".appended_tags").html("");
                $.each(tags, function (key, tag) {
                    addDynamicTag(tag);
                });
            }

            //pop DOWN :D item detail
            $(".item_info").click(function (e) {
                if (e.target === this) {
                    hideItemDetail();
                }
            });

            function showItemDetail() {
                enableArchievIcon();
                $(".item_info .inner .head").show();
                $(".item_info .inner .item_body").show();
                $(".item_info").css('left', '0px');
                $(".bgwrap").addClass('show');
            }

            $(".item_info .close").click(function () {
                hideItemDetail();
            });


        });

        function ItemsdragDrop() {

            $(".items_list").sortable({
                connectWith: ".items_list",
                cancel: "form",
                stop: function (event, ui) {
                    j = 0;
                    var main_item_id = $(ui.item).attr('id').substr(4);
                    var folder_id = $(ui.item[0].offsetParent).attr('id');
                    items = [];
                    sorts = [];
                    var listItems = $(ui.item[0].offsetParent).find('ul.items_list').children();
                    listItems.each(function (idx, li) {
                        items.push($(li).attr('id').substr(4));
                        sorts.push(j);
                        j++;
                    });

                    CallAjax("{{route('admin.changeItemSort')}}", {
                        'items': items,
                        'sorts': sorts,
                        'folder_id': folder_id,
                        'main_item_id': main_item_id
                    });
                }
            }).disableSelection();
        }

        {{--function readURL(input) {--}}
        {{--//boro vas upload--}}
        {{--if (input.files && input.files[0]) {--}}
        {{--var reader = new FileReader();--}}
        {{--console.log(input.files[0]);--}}
        {{--var formData = new FormData();--}}
        {{--formData.append('main_image', input.files[0]);--}}
        {{--//                reader.onload = function (e) {--}}
        {{--//                    $('.previewPic').attr('src', e.target.result);--}}
        {{--//                };--}}
        {{--CallAjaxImageFunc('{{url(route('admin.uploadMainPic'))}}' + '/' + item_id.substr(4), formData, swithMainPicResult, swithMainPicFail, 600000);//10min timeout for gallery--}}

        {{--//                reader.readAsDataURL(input.files[0]);--}}
        {{--}--}}

        {{--}--}}

        //        function swithMainPicResult(data) {
        //            alert(data);
        //            $('.previewPic').attr('src', data);
        //        }
        //
        //        function swithMainPicFail() {
        //            alert('errrror');
        //        }

        //upload gallery
        $(document).on('change', '#add_gallery_input', function (event) {
            $(".dynamic_added_image").removeAttr('id');
            $(".gallery_error").html('');

            gallery_files = [];
            temporary_ids = [];

            var files = event.target.files; //FileList object
            var formData = new FormData();

            for (i = 0; i < files.length; i++) {
                var file = files[i];
                type = file.type;
                if(file.size > 80000000) {
                    alert("file must not be more than 80 mg");
                } else {

                    content = "<div class='pic_item dynamic_select_gallery galitemparent" + i + "'><img id='galitem" + i + "' class='dynamic_added_image' style = 'opacity:0.4;' src='{{asset('images/Loading_icon.gif')}}' ></div>";
                    $("#add_gallery_label").before(content);
                    selectMainPicOfGallery();
                    temporary_ids.push(i);
                    formData.append('gallery[]', file);
                    formData.append('temporary_id[]', i);
                }
            }

            CallAjaxImageFunc('{{url(route('admin.uploadGallery'))}}' + '/' + item_id.substr(4), formData, addGalleryFiles, addGalleryFilesFail, 600000);//10min timeout for gallery
        });


        function addGalleryFiles(data) {
            gallery_response = JSON.parse(data);
            if ($("#gallery_files").val() != '') {
                gallery_files.push($("#gallery_files").val());//if it's filled before
            }
            $.each(gallery_response, function (key, value) {
//                console.log(value);
                value = JSON.parse(value);
                file_type = value.type;
                if (value.error == 'none') {
                    if (file_type == 'image' || file_type == 'gif_image') {
                        $("#galitem" + value.temporary_id).attr('src', '{{url('/')}}' + "/" + value.file).css('opacity', 1).after("<span data-fileid='0' class='del rm_gallery_file'>-</span>");
                    } else {
                        $(".galitemparent" + value.temporary_id).html("<video id='galitem" + value.temporary_id + "' class='dynamic_added_image' width='100%' height='100%' controls><source class='gallery_video_src' src='{{url('/')}}/" + value.file + "' type='video/" + value.file.substr(value.file.lastIndexOf('.') + 1) + "'></video>").after("<span data-fileid='0' class='del rm_gallery_file'>-</span>");
                    }
                    gallery_files.push(value.pure_filename);
                    $("#gallery_files").val(gallery_files);

                } else {
                    $(".gallery_error").append(value.pure_filename + " : " + value.error);
                    $("#galitem" + value.temporary_id).parent().remove();
                }
            });
        }

        function addGalleryFilesFail(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            console.log(textStatus);
//            $("#gallery_files").val('');
            $.each(temporary_ids, function (key, value) {
                $("#galitem" + value).parent().remove();
            });
//            if (textStatus === 'timeout') {
//                ShowMessage('error', "لطفا بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//            } else {
//                ShowMessage('error', "اینترنت خود را بررسی نموده و بعدا امتحان کنید.", 'warning', 'باشه', '', true, false);
//            }
        }

        function imageGalleryPreview(file, divClass, file_id) {
            return "<div class='pic_item " + divClass + "'><img src=" + file + "><span data-fileid='" + file_id + "' class='del rm_gallery_file'>-</span></div>";
        }

        function videoGalleryPreview(file, divClass, file_id) {
            return "<div class='pic_item " + divClass + "'><video width='100%' height='100%' controls><source src=" + file + " type='video/mp4'></video><span data-fileid='" + file_id + "' class='del rm_gallery_file'>-</span></div>";
        }

        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                hideItemDetail();
            }
        });

      $(document).on('click', '.rm_gallery_file', function () {
        var file_id = $(this).data('fileid')
        galleryElem = $(this).closest('.pic_item')

        var main_pic_src = $('img.previewPic').attr('src')
        var current_gallery_src = $(this).parent().find('img').attr('src')
        if (main_pic_src == current_gallery_src) {
          is_mainpic = 1
        } else {
          is_mainpic = 0
        }
        if (file_id != 0) {
          CallAjaxFunc('{{url(route('admin.removeItemGalleryFile'))}}' + '/' + file_id, {'is_mainpic': is_mainpic}, galleryRmResult)
        } else {
          deleteMainpicIfNeed()
          galleryElem.remove()
        }
      })

      function galleryRmResult (data) {
        if (data == 1) {
          galleryElem.remove()
        }
        deleteMainpicIfNeed()
      }

      function deleteMainpicIfNeed () {
        if (is_mainpic == 1) {
          $('img.previewPic').attr('src', '')
          item_image_elem.attr('src', '').addClass('hidden')
          is_mainpic.delete
          item_image_elem.delete
        }
      }

      $('.item_info').click(function (e) {
        if (e.target === this && e.keyCode != 13) {
          hideItemDetail()
        }
      })

        $(".item_info .close").click(function () {
            hideItemDetail();
        });

        function hideItemDetail() {
            if (openNextItem) {
                $(".item_info .inner .head").hide();
                $(".item_info .inner .item_body").hide();
                $(".item_info").css('left', '-100%');
                $(".bgwrap").removeClass('show');
            }
        }

        $(document).on('click', '#limited', function () {
            if ($("#chkaany").is(':checked') == true) {
                $("#quantity_input").css('opacity', 0.4).val("");
                $(this).attr('id', 'infinite');
            }
        });

        $(document).on('click', '#quantity_input', function () {
            enableQuantity();
        });

        $(document).on('change', '#chkaany', function () {
            if ($(this).is(':checked') == false) {
                $("#quantity_input").val(0).css('opacity', 0.4).attr('disabled', 'disabled').addClass('disabled_input');
                $(".infinite_limited").attr('id', 'limited');
            } else {
                $("#quantity_input").val("").removeAttr('disabled').removeClass('disabled_input');
                $(".infinite_limited").attr('id', 'infinite');
            }
        });
        //check if quantity_input become empty
        $(document).on('keyup', '#quantity_input', function () {
            if ($(this).val() == '') {
                disableQuantity();
            } else {
                enableQuantity();
            }
        });

        function disableQuantity() {
            $("#quantity_input").css('opacity', 0.4);
            $(".infinite_limited").attr('id', 'infinite');
        }

        function enableQuantity() {
            $("#quantity_input").css('opacity', 1);
            $(".infinite_limited").attr('id', 'limited');
        }

        //check if this input is empty and leave to other plae convert to infinite again
        $(document).on('blur', '#quantity_input', function () {
            if ($(this).val() == '') {
                disableQuantity();
            }
        });

        //archieve and delete item
        $(document).on('click', '#item_archive', function () {
            $(".confirmBtn").attr('id', 'archieve_or_delete_item_confirm');
            item_status = 'archive';
            archive_or_delete_callback = archiveItem;
            ShowMessage('error', "{{__('are you sure about archiving this item?')}}", "{{__('warning')}}", "{{__('yes')}}", "{{__('no')}}", true, false);
        });

        $(document).on('click', '#archieve_or_delete_item_confirm', function () {
            $(".confirmBtn").removeAttr('id');
            CallAjaxFunc('{{url(route('admin.changeStatus'))}}', {
                status: item_status,
                id: item_id.substr(4)
            }, archive_or_delete_callback);
        });

        $(document).on('click', '#item_delete', function () {
            $(".confirmBtn").attr('id', 'archieve_or_delete_item_confirm');
            item_status = 'deleted';
            archive_or_delete_callback = deleteItem;
            ShowMessage('error', "{{__('are you sure about deleting this item?')}}", "{{__('warning')}}", "{{__('yes')}}", "{{__('no')}}", true, false);
        });

        function archiveItem(status) {
            $(".msgBox").hide();
            enableDeleteIcon();
            $("#" + item_id).hide();
//            hideItemDetail();
        }

        function deleteItem() {
            $(".msgBox").hide();
            hideItemDetail();
        }

        function enableArchievIcon() {
            $("#item_delete").hide().removeClass('displayed');
            $("#item_archive").show().addClass('displayed');
        }

        function enableDeleteIcon() {
            $("#item_archive").hide().removeClass('displayed');
            $("#item_delete").addClass('displayed');
        }

        //add tags
        $(".add_gi").on('keyup', function (e) {
            if (e.keyCode == 13) {
                var tag = $(this).val().replace(/\s+/g, '');
                var dupicate_tag = current_tags.indexOf(tag);
                if (dupicate_tag == -1 && tag != '') {
                    addDynamicTag(tag);
                    $("#item_tag").val(current_tags);
                }
                $(this).val("");
            }
        });

        function addDynamicTag(tag) {
            $(".appended_tags").prepend("<div class='gp_item'>" + tag + "<span class='gp_tag_rm'></span></div>");
            current_tags.push(tag);
        }

        $(document).on('click', '.gp_tag_rm', function () {
            var elem = $(this).parent();
            var removeItem = elem.text();
            current_tags.splice($.inArray(removeItem, current_tags), 1);
            remaind_tags = current_tags + "";
            $("#item_tag").val(remaind_tags);
            CallAjax('{{url(route('admin.removeItemTag'))}}' + '/' + item_id.substr(4), {'tag': remaind_tags});
            elem.remove();
        });

        //check batches
        $(document).on('click', '.select_input', function () {
            if ($(this).is(':checked') == true) {
                $(this).parent().parent().css('margin-right', '20px');
            } else {
                $(this).parent().parent().css('margin-right', '0px');
            }
            if ($('.card_select input:checked').length > 0) {
                $('.header .actions .to_cat').fadeIn();
            } else {
                $('.header .actions .to_cat').fadeOut();
            }
        });

        //set batches
        $(".action.to_cat").click(function () {
            left_batches = []
            $('.card_select>.select_input:not(:checked)').each(function () {
                left_batches.push($(this).attr('id').substr(6));
            });

            selected_batches = [];
            $('.card_select>.select_input:checked').each(function () {
                selected_batches.push($(this).attr('id').substr(6));
            });
            checkSelectAnyBatch();
        });

        function checkSelectAnyBatch() {
            if (selected_batches.length == 0) {
                ShowMessage('error', "No batch has been selected,Please select any batch", '', 'Ok', 'Cancel', true, false);
            } else {
                $(".btn.confirmBtn").attr('id', 'categorize_set_add');
                ShowMessage('success', "<div class='form-group'><lable for='create_set_name'><input type='text' name='name' id='create_set_input' placeholder='Enter Set Name'></div><div class='danger hidden' id='empty_set_name'>This field is required</div><div class='danger hidden' id='dublicate_set'>This set name is duplicated.please select an other name</div>", 'Categorize', 'Ok', 'Cancel', true, false);
            }
        }

        $(document).on('click', '#categorize_set_add', function () {
            $('#categorize_set_add').addClass('disabled_input');
            var set_name = $("#create_set_input").val();
            var set_id = '{{$set_id}}';
            if (set_name != '') {
                CallAjaxFunc('{{url(route('admin.set.store'))}}', {
                    selected_batches: selected_batches,
                    left_batches: left_batches,
                    name: set_name,
                    set_id: set_id
                }, redirectSets);
            } else {
                $('#categorize_set_add').removeClass('disabled_input');
                $("#empty_set_name").fadeIn();
            }
        });

        function redirectSets(result) {
            // $('#categorize_set_add').prop('disabled', false);
            $('#categorize_set_add').removeClass('disabled_input');

            if (result == 0) {
                $("#dublicate_set").fadeIn();
            } else {
                $(".confirmBtn").removeAttr('id');
                window.location.href = '{{route('admin.menumaker.index')}}';
            }
        }

        function imageGalleryPreview (file, divClass, file_id) {
          return '<div class=\'pic_item ' + divClass + '\'><img src=' + file + '><span data-fileid=\'' + file_id + '\' class=\'del rm_gallery_file\'>-</span></div>'
        }
        //start edit card and it's icon
        $(document).on('click', '.edit_card', function () {
            delete icon_name;
            var card_name = $(this).parent().find('.card_name').text();
            var simple_icon_name = $(this).parent().next().find('.card_icon').data('iconname');
            if (simple_icon_name != 'default') {
                simple_icon_name = simple_icon_name.substring(0, simple_icon_name.length - 4);
            }


            checked_icon = '.choose_card_icon #' + simple_icon_name + '_icon_input';
            batch_id = $(this).closest('.card').attr('id');
            $(".confirmBtn").attr('id', 'update_card_btn');
            ShowMessage('edit', '<div class="form-group"> <label for="">{{__('category name')}}</label><input type="text" id="current_card" name="" value="' + card_name + '" /> </div> <div class="form-group"> <label for="">{{__('icon select')}}</label> <div class="danger hidden" id="icon_select_error">please select any icon</div> <div class="icons_box"> <div class="form-group choose_card_icon" data-icon="steak.svg"> <input type="radio" name="gp_icon" id="steak_icon_input"> <label class="icon_input_label" for="steak_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/steak.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="soup.svg"> <input type="radio" name="gp_icon" id="soup_icon_input"> <label class="icon_input_label" for="soup_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/soup.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="vegetarian-food.svg"> <input type="radio" name="gp_icon" id="vegetarian-food_icon_input"> <label class="icon_input_label" for="vegetarian-food_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/vegetarian-food.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="shrimp.svg"> <input type="radio" name="gp_icon" id="shrimp_icon_input"> <label class="icon_input_label" for="shrimp_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/shrimp.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="sos.svg"> <input type="radio" name="gp_icon" id="sos_icon_input"> <label class="icon_input_label" for="sos_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/sos.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="sausages.svg"> <input type="radio" name="gp_icon" id="sausages_icon_input"> <label class="icon_input_label" for="sausages_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/sausages.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="salver.svg"> <input type="radio" name="gp_icon" id="salver_icon_input"> <label class="icon_input_label" for="salver_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/salver.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="salmon.svg"> <input type="radio" name="gp_icon" id="salmon_icon_input"> <label class="icon_input_label" for="salmon_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/salmon.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="pot.svg"> <input type="radio" name="gp_icon" id="pot_icon_input"> <label class="icon_input_label" for="pot_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/pot.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="pasta.svg"> <input type="radio" name="gp_icon" id="pasta_icon_input"> <label class="icon_input_label" for="pasta_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/pasta.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="noodles.svg"> <input type="radio" name="gp_icon" id="noodles_icon_input"> <label class="icon_input_label" for="noodles_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/noodles.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="lobster.svg"> <input type="radio" name="gp_icon" id="lobster_icon_input"> <label class="icon_input_label" for="lobster_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/lobster.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="ice-cream.svg"> <input type="radio" name="gp_icon" id="ice-cream_icon_input"> <label class="icon_input_label" for="ice-cream_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/ice-cream.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="hamburger.svg"> <input type="radio" name="gp_icon" id="hamburger_icon_input"> <label class="icon_input_label" for="hamburger_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/hamburger.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="fruit.svg"> <input type="radio" name="gp_icon" id="fruit_icon_input"> <label class="icon_input_label" for="fruit_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/fruit.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="cocktail.svg"> <input type="radio" name="gp_icon" id="cocktail_icon_input"> <label class="icon_input_label" for="cocktail_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/cocktail.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="chicken.svg"> <input type="radio" name="gp_icon" id="chicken_icon_input"> <label class="icon_input_label" for="chicken_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/chicken.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="carrot.svg"> <input type="radio" name="gp_icon" id="carrot_icon_input"> <label class="icon_input_label" for="carrot_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/carrot.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="cake.svg"> <input type="radio" name="gp_icon" id="cake_icon_input"> <label class="icon_input_label" for="cake_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/cake.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="pizza.svg"> <input type="radio" name="gp_icon" id="pizza_icon_input"> <label class="icon_input_label" for="pizza_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/pizza.svg') }})"></label> </div> <div class="form-group choose_card_icon" data-icon="barbecue.svg"> <input type="radio" name="gp_icon" id="barbecue_icon_input"> <label class="icon_input_label" for="barbecue_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/barbecue.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="beer.svg"> <input type="radio" name="gp_icon" id="beer_icon_input"> <label class="icon_input_label" for="beer_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/beer.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="breakfast.svg"> <input type="radio" name="gp_icon" id="breakfast_icon_input"> <label class="icon_input_label" for="breakfast_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/breakfast.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="chicken.svg"> <input type="radio" name="gp_icon" id="chicken_icon_input"> <label class="icon_input_label" for="chicken_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/chicken.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="coffee-cup.svg"> <input type="radio" name="gp_icon" id="coffee-cup_icon_input"> <label class="icon_input_label" for="coffee-cup_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/coffee-cup.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="croissant.svg"> <input type="radio" name="gp_icon" id="croissant_icon_input"> <label class="icon_input_label" for="croissant_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/croissant.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="cupcake.svg"> <input type="radio" name="gp_icon" id="cupcake_icon_input"> <label class="icon_input_label" for="cupcake_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/cupcake.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="cutlery.svg"> <input type="radio" name="gp_icon" id="cutlery_icon_input"> <label class="icon_input_label" for="cutlery_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/cutlery.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="dish.svg"> <input type="radio" name="gp_icon" id="dish_icon_input"> <label class="icon_input_label" for="dish_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/dish.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="fast-food.svg"> <input type="radio" name="gp_icon" id="fast-food_icon_input"> <label class="icon_input_label" for="fast-food_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/fast-food.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="fish.svg"> <input type="radio" name="gp_icon" id="fish_icon_input"> <label class="icon_input_label" for="fish_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/fish.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="spicy-food.svg"> <input type="radio" name="gp_icon" id="spicy-food_icon_input"> <label class="spicy-food_input_label" for="cake_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/spicy-food.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="vegan.svg"> <input type="radio" name="gp_icon" id="vegan_icon_input"> <label class="icon_input_label" for="vegan_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/vegan.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="vegetarian-food.svg"> <input type="radio" name="gp_icon" id="vegetarian-food_icon_input"> <label class="icon_input_label" for="vegetarian-food_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/vegetarian-food.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="wine.svg"> <input type="radio" name="gp_icon" id="wine_icon_input"> <label class="icon_input_label" for="wine_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/wine.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="milkshake.svg"> <input type="radio" name="gp_icon" id="milkshake_icon_input"> <label class="icon_input_label" for="milkshake_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/milkshake.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="salad.svg"> <input type="radio" name="gp_icon" id="salad_icon_input"> <label class="icon_input_label" for="salad_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/salad.svg') }})"></label> </div><div class="form-group choose_card_icon" data-icon="sandwich.svg"> <input type="radio" name="gp_icon" id="sandwich_icon_input"> <label class="icon_input_label" for="sandwich_icon_input" style="background-image: url({{ asset('images/icons/restaurant_pack/sandwich.svg') }})"></label> </div> </div> </div>', "{{__('editing')}}", "{{__('save')}}", "{{__('cancel')}}", true, false);

            if (simple_icon_name != '' && simple_icon_name != 'default') {
                icon_name = simple_icon_name + '.svg';
                $(checked_icon).prop('checked', true);
            } else {
              icon_name = '';
            }

        });

        $(document).on('click', '.choose_card_icon', function () {
            icon_name = $(this).data('icon');
        });

        $(document).on('click', '#update_card_btn', function () {
            new_card_name = $("#current_card").val();
            if (icon_name == '') {
              $("#icon_select_error").removeClass('hidden');
            } else {
                CallAjaxFunc('{{url(route('admin.updateCard'))}}' + '/' + batch_id, {
                    'image': icon_name,
                    'name': new_card_name
                }, changeBatchDetailDynamic);
            }
        });

        function changeBatchDetailDynamic() {
            $(".confirmBtn").removeAttr('id');
            $(".msgBox").fadeOut();
            $("#" + batch_id).find('.card_name').text(new_card_name);
            $("#" + batch_id).find('.card_icon').data('iconname', icon_name);
            $("#" + batch_id).find('.card_icon').children().first().attr('src', '{{asset('images/icons/restaurant_pack/')}}/' + icon_name);
        }

        //end edit batch

        //hide or show item
        $('.show_hide_btn').click(function () {
            item_show_hide_elem = $(this);
            CallAjaxFunc('{{url(route('admin.hideItem'))}}', {id: item_id.substr(4)}, changeClass);
        });

        function changeClass(data) {

            item_show_hide_elem.toggleClass('show_btn');
            item_show_hide_elem.toggleClass('hide_btn');

            var elder_item_class = $("#" + item_id).attr("class");
            if (elder_item_class.indexOf("finished") != -1) {
                status = "finished";
            } else if (elder_item_class.indexOf("incomplete") != -1) {
                status = "incomplete";
            } else {
                status = '';
            }
            if (data == 'true') {
                $("#" + item_id).attr('class', 'item hide ' + status);
            } else {
                $("#" + item_id).attr('class', 'item _ ' + status);//in : _ chi myge in vasat?
            }
        }

        //change show card or shop card
        $(document).on('click', '.item_type_btn', function () {

            var current_type = $(this).attr('id');
            if(current_type == 'shop_card') {
                var type = 'show_card';
                hideNotRelatedtoType();
            } else {
                var type = 'shop_card';
                showRelatedtoType();
            }
            $(this).attr('id', type);
            $("#item_type").val(type);
        });

        function showPricePartsOrNoAccordingtoType(item_type) {
            if(item_type == 'show_card') {
                hideNotRelatedtoType();
            } else if(item_type == 'shop_card') {
                showRelatedtoType();
            }
        }

        function hideNotRelatedtoType() {
            $(".price_sec").hide();
            $(".discount_sec").hide();
            $(".extand_and_quantity").hide();
        }

        function showRelatedtoType() {
            $(".price_sec").show();
            $(".discount_sec").show();
            $(".extand_and_quantity").show();
        }
        //        function changeItemTypeResult(data) {
        //            item_type_elem.attr('id', data);
        //            //tu controller statusesham check kono baresh gardo0n
        //        }

        //archive card
        $(document).on('click', '.card_archive', function () {
            $(".confirmBtn").attr('id', 'archieve_or_delete_card_confirm');
            batch_status = 'archive';
            batch_id = $(this).data('id');
            ShowMessage('error', "{{__('are you sure about archiving this batch?')}}", "{{__('warning')}}", "{{__('yes')}}", "{{__('no')}}", true, false);
//            archive_or_delete_callback = cardArchive;
        });


        $(document).on('click', '#archieve_or_delete_card_confirm', function () {
            $(".confirmBtn").removeAttr('id');
            CallAjaxFunc('{{url(route('admin.changeBatchStatus'))}}', {
                status: batch_status,
                id: batch_id
            }, cardArchive);
        });

        function cardArchive() {
            $(".msgBox").hide();
            enableDeleteIcon();
            $("ul#" + batch_id).closest('.swiper-slide').remove();
        }
    </script>

@endpush
