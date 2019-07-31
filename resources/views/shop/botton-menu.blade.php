<div class="item_info">
    <div class="inner">
        <div class="head">
            <div class="title">
                <h3 class="name">{{__('edit item')}}: <span class="item_name"></span></h3>
                <div class="parent">{{__('parent')}}: <span class="item_parent_name"></span></div>
            </div>
            <div class="btns">
                <div class="show_hide_btn show_btn"></div>
                <div class="pin_btn" style="display: none;"></div>
                {{--<div class="item_type_btn" id="" data-url="{{route('admin.changeItemType')}}"></div>--}}
            </div>
        </div>
        <div class="item_body">
            <form id="edit_item" enctype="multipart/form-data">
                <div class="nonFixed mcs-vertical-body">
                    <input type="text" name="name" id="item_name" placeholder="{{__('item name')}}" />
                    <input type="hidden" name="_method" value="POST" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{-- esme axa faghat to0sh negah dashte miShe --}}
                    <input type="hidden" name="gallery_files" id="gallery_files" />
                    <input type="hidden" name="main_pic_from_gallery" id="main_pic_from_gallery" />
                    <input type="hidden" name="type" id="item_type" />

                    <textarea name="short_description" id="item_short_description" cols="30" rows="2"
                              placeholder="{{__('short description')}} ..."></textarea>
                    <h2 class="danger gallery_error"></h2>
                    <h2 class="info gallery_progress_percentage"></h2>
                    <div class="gallery_box">
                        <div class="main_pic">
                            <div class="pic_frame">
                                <label for="main_pic" class="uploadPic"></label>
                                <img src="" alt="" class="previewPic">
                                <span class="del">-</span>
                                {{--<input type="file" name="main_image" id="main_pic"--}}
                                {{--accept="image/jpeg, image/png"/>--}}
                            </div>
                        </div>
                        <div class="gallery_pics">
							<span class="pic_frame mcs-horizontal-gallery">
								<div class="dynamic_gallery">
										<label id="add_gallery_lablel" for="add_gallery_input"></label>
										<input type="file" name="gallery" id="add_gallery_input" multiple
                                               accept="video/mp4, video/webm, image/jpeg, image/png, image/jpg, image/gif, image/svg"/>
								</div>
							</span>
                        </div>
                    </div>
                    <div class="price_discount">
                        <div class="price_sec">
                            <input type="text" name="price" id="price_input" value="" placeholder="{{__('price')}}" />
                            <span class="mprice">تومان</span>
                        </div>
                        {{--<div class="discount_sec">--}}
                        {{--<div class="discount_sec_content">--}}
                        {{--<input type="text" class="discpercent_input" name="discount_enable" />--}}
                        {{--<label class="discount_label">--}}
                        {{--<input type="checkbox" class="discount_label_control" />--}}
                        {{--<span class="discount_label_indicator"></span>--}}
                        {{--</label>--}}
                        {{--<input type="number" min="0" class="discount_price" name="discount" value="" placeholder="discounted Price"/>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="group-form extand_and_quantity">
                        {{--<div class="typeUseSwitch">--}}
                            {{--<label class="switch">--}}
                                {{--<input type="checkbox" id="chkaany" name="available"/>--}}
                                {{--<div class="slider round"></div>--}}
                            {{--</label>--}}
                            {{--<label for="switch" id="switchInfo">Extant</label>--}}
                        {{--</div>--}}
                        {{--@if($fully_just_content == 0)--}}
                            {{--<input type="text" name="count" id="quantity_input" value="" placeholder="Quantity"/>--}}
                            {{--<div class="infinite_limited" id="infinite"></div>--}}
                        {{--@endif--}}
                    </div>
                    {{--<textarea name="description" id="item_description" cols="30" rows="5"--}}
                    {{--placeholder="Description ..."></textarea>--}}
                    {{--<div class="groups">--}}
                    {{--<input type="hidden" name="tag" id="item_tag">--}}
                    {{--<div class="title" class="item_title_lable">Tags</div>--}}
                    {{--<input type="text" class="add_gi" name="" id=""/>--}}
                    {{--<div class="appended_tags">--}}

                    {{--<div class="gp_item">pizza</div>--}}
                    {{--<div class="gp_item">chicken</div>--}}
                    {{--<div class="gp_item">delicious</div>--}}
                    {{--<div class="gp_item">pizza</div>--}}
                    {{--<div class="gp_item">chicken</div>--}}
                    {{--<div class="gp_item">delicious</div>--}}
                    {{--<div class="gp_item">pizza</div>--}}
                    {{--<div class="gp_item">chicken</div>--}}
                    {{--<div class="gp_item">delicious</div>--}}
                    {{--<input type="text" class="add_gi" name="" id=""/>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="groups">--}}
                    {{--<div class="title">Groups</div>--}}
                    {{--<div class="gp_item">special</div>--}}
                    {{--<input type="text" class="add_gi" name="" id=""/>--}}
                    {{--</div>--}}
                </div>
                <div class="fixedBottom">
                    {{--@if($fully_just_content == 0)--}}
                    {{--<div class="comments">Comments</div>--}}
                    {{--@endif--}}
                    <div class="btns">
                        <div class="item_detail_errors errors danger"></div>
                        <br>
                        <div class="archive" id="item_archive"></div>
                        <div class="delete" id="item_delete"></div>
                        <button type="submit" id="update_item" class="update_item_input">{{__('save')}}</button>
                        <div class="close"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>


      $(document).ready(function () {

        function setDetailsBodyHg() {
          var nonfixheight = $(window).height() - $('.item_info .head').height() - $('.item_info .fixedBottom').height() - 80;
          $('.item_info .item_body .nonFixed').css('max-height', nonfixheight + 'px');
          $('#mCSB_2').css('max-height', nonfixheight + 'px');
        }

        setDetailsBodyHg();
        $(window).resize(function () {
          setDetailsBodyHg();
        });
      });

      //        $('.show_hide_btn').click(function () {
      //            $(this).toggleClass('show_btn');
      //            $(this).toggleClass('hide_btn');
      //        });


      (function ($) {
        $(window).on("load", function () {
          $(".mcs-horizontal-gallery").mCustomScrollbar({
            axis: "x",
            theme: "dark-2",
            alwaysShowScrollbar: 1,
            advanced: {
              autoExpandHorizontalScroll: true
            }
          });
        });
      })(jQuery);

      (function ($) {
        $(window).on("load", function () {
          $(".mcs-vertical-body").mCustomScrollbar({
            axis: "y",
            theme: "dark-2",
            advanced: {
              autoExpandHorizontalScroll: true
            }
          });
        });
      })(jQuery);
    </script>
@endpush