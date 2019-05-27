// bootstrap max length
var BootstrapMaxlength=function() {
    var e=function() {
        $("#url").maxlength( {
            threshold: 80, separator: " of ", preText: "You have ", postText: " chars remaining.", warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide", limitReachedClass: "m-badge m-badge--success m-badge--rounded m-badge--wide"
        }),
        $("#title").maxlength( {
            threshold: 60, separator: " of ", preText: "You have ", postText: " chars remaining.", warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide", limitReachedClass: "m-badge m-badge--success m-badge--rounded m-badge--wide"
        }),
        $("#meta_description").maxlength( {
            threshold: 191, separator: " of ", preText: "You have ", postText: " chars remaining.", warningClass: "m-badge m-badge--brand m-badge--rounded m-badge--wide", limitReachedClass: "m-badge m-badge--success m-badge--rounded m-badge--wide"
        })
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
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    skin: 'moonocolor,skins/kama/',
    language: 'en',
};
// CKEDITOR.replace('meta_description5', options);
// CKEDITOR.replace('keywords6', options);

// validation
jQuery(document).ready(function() {
    $("#admin_form").validate({});
});