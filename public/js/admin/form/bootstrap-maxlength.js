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