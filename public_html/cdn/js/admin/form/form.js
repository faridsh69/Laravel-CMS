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
        $("#datepicker").datepicker( {
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

var BootstrapTimepicker=function() {
    var e=function() {
        $("#timepicker").timepicker()
    };
    return {
        init:function() {
            e()
        }
    }
}();

// input mask
var Inputmask = function() {
    var a = function() {
        $(".phone-mask").inputmask("mask", {
            mask: "(999) 999-9999"
        })
    };
    return {
        init: function() {
            a()
        }
    }
}();

// triger all functions
jQuery(document).ready(function() {
    BootstrapMaxlength.init();
    BootstrapSwitch.init();
    BootstrapDatepicker.init();
    BootstrapTimepicker.init();
    BootstrapSelect.init();
    // Inputmask.init();
    $("#admin_form").validate({});
    $('.laravel-file-manager').filemanager('file');
    $('.laravel-image-manager').filemanager('image');
    $('.laravel-video-manager').filemanager('video');
    $('.laravel-audio-manager').filemanager('audio');
    $('.laravel-text-manager').filemanager('text');
    // $('.laravel-image-manager').filemanager('image', {prefix: ""});
    // lfm('lfm', 'image', {prefix: route_prefix});
});

// bootstrap ckeditor
var ckeditorOptions = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
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

function emptyImageInput(inputId) {
    $('#' + inputId).removeAttr('value');
};

function removeFile(src){
    $.ajax({url: '/admin/file/remove-by-src?src=' + src}).then(function(){location.reload()});
}
