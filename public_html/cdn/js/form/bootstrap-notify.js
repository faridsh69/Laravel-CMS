var BootstrapNotifyDemo = function() {
    var e = function() {
        var options = {
            "type":"success",
            "allow_dismiss":true,
            "newest_on_top":false,
            "mouse_over":false,
            "showProgressbar":false,
            "spacing":"10",
            "timer":"2000",
            "placement":{"from":"top","align":"right"},
            "offset":{"x":"30","y":"30"},
            "delay":"1000","z_index":"10000",
            "animate":{"enter":"animated bounce","exit":"animated bounce"}
        };
        var t = $.notify({"message": "Form Saved Successfully!"},options);
    };
    return {
        init: function() {
            e()
        }
    }
}();
jQuery(document).ready(function() {
    BootstrapNotifyDemo.init()
});