var PortletDraggable= {
    init:function() {
        $("#m_sortable_portlets").sortable( {
            connectWith:".m-portlet__head", 
            items:".m-portlet", 
            opacity:.8, 
            handle:".m-portlet__head", 
            coneHelperSize:!0, 
            placeholder:"m-portlet--sortable-placeholder", 
            forcePlaceholderSize:!0, 
            tolerance:"pointer", 
            helper:"clone", 
            cancel:".m-portlet--sortable-empty", 
            revert:250, 
            axis: 'y',
            update:function(e, t) {
                // var data = $(this).sortable('toArray');
                // console.log(data);
                // t.item.prev().hasClass("m-portlet--sortable-empty")&&t.item.prev().before(t.item)
            }
        }
        )
    }
};
jQuery(document).ready(function() {
    PortletDraggable.init()
});