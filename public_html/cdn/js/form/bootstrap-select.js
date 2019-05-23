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