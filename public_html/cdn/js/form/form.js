// bootstrap max length
var BootstrapMaxlength=function() {
    var e=function() {
        var inputsWithTypeText = $("#admin_form :text, textarea");
        inputsWithTypeText.each(function(){ 
            var input = $(this);
            var maxlength = input.attr('maxlength');
            if(maxlength){
                input.maxlength( {
                    threshold: maxlength, separator: " of ", preText: "You have ", postText: " chars remaining.", warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide", limitReachedClass: "m-badge m-badge--success m-badge--rounded m-badge--wide"
                })
            }
        });
    };
    return {
        init:function() {
            e()
        }
    }
}();

// bootstrap switch
var BootstrapSwitch = function() {
    var t = function() {
        $("[data-switch=true]").bootstrapSwitch()
    };
    return {
        init: function() {
            t()
        }
    }
}();

// bootstrap select
var BootstrapSelect = function() {
    var t = function() {
        $(".m_selectpicker").selectpicker()
    };
    return {
        init: function() {
            t()
        }
    }
}();

// bootstrao date picker
var BootstrapDatepicker=function() {
    var t=function() {
        $("#birth_date").datepicker( {
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayBtn:"linked", 
            clearBtn:!0, 
            todayHighlight:!0, 
            orientation:"bottom left", 
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    };
    return {
        init:function() {
            t()
        }
    }
}();

// bootstrap ckeditor
var ckeditorOptions = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    skin: 'moonocolor,skins/kama/',
    language: 'en',
};
var inputsWithTypeTextarea = $("textarea");
inputsWithTypeTextarea.each(function(){ 
    var input = $(this);
    if(input.attr('ckeditor'))
    {
        CKEDITOR.replace(input.attr('id'), ckeditorOptions);
    }
});

jQuery(document).ready(function() {
    BootstrapMaxlength.init();
    BootstrapSwitch.init();
    BootstrapDatepicker.init();
    BootstrapSelect.init();
    $("#admin_form").validate({});
    $('.lfm').filemanager('image');
});


