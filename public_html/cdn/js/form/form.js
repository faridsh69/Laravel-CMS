// bootstrap max length
var BootstrapMaxlength=function() {
    var e=function() {
        var inputsWithTypeText = $("#admin_form :text, textarea");
        inputsWithTypeText.each(function(){ 
            var input = $(this);
            input.maxlength( {
                threshold: input.attr('maxlength'), separator: " of ", preText: "You have ", postText: " chars remaining.", warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide", limitReachedClass: "m-badge m-badge--success m-badge--rounded m-badge--wide"
            })
        });
    };
    return {
        init:function() {
            e()
        }
    }
}
();
jQuery(document).ready(function() {
    BootstrapMaxlength.init()
}
);

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
jQuery(document).ready(function() {
    BootstrapSwitch.init()
});

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
jQuery(document).ready(function() {
    BootstrapSelect.init()
});

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

// CKEDITOR.replace('keywords', ckeditorOptions);

// validation
jQuery(document).ready(function() {
    $("#admin_form").validate({});
});