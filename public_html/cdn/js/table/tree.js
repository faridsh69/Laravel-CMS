var Treeview=function() {
    o=function() {
        $("#m_tree_6").jstree( {
            core: {
                themes: {
                    responsive: !1
                }
                , check_callback:!0, data: {
                    url:function(e) {
                        return"tree"
                    }
                    , data:function(e) {
                        return {
                            parent: e.id
                        }
                    }
                }
            }
            , types: {
                default: {
                    icon: "fa fa-folder m--font-brand"
                }
                , file: {
                    icon: "fa fa-file  m--font-brand"
                }
            }
            , state: {
                key: "demo3"
            }
            , plugins:["dnd", "state", "types"]
        }
        )
    }
    ;
    return {
        init:function() {
            o()
        }
    }
}();
jQuery(document).ready(function() {
    Treeview.init();
    $('button').on('click', function () {
        var data = $('#m_tree_6').jstree(true).get_json();
        var json = JSON.stringify(data);
        document.getElementById('categorytree').value = json;
        document.getElementById('categorytreeForm').submit();
    });
});