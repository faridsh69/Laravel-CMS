var DatatableJsonRemoteDemo=function() {
    var t=function() {
    	var datatableColumns = [ 
            {
                field: "id", 
                title: "#", 
                type: "natural",
                width: 50, 
                sortable: true, 
                textAlign: "center",
                overflow: 'visible',
            }
        ];
        columns.forEach(function(column){
        	datatableColumns.push(column);
        });
        var t=$(".m_datatable").mDatatable( {
            data: {
                type:"remote",
                source: {
                	read: {
                		url: "permission/datatable",
		                method: 'GET',
		                timeout: 30000,
                	},
                },
                pageSize:6, 
                saveState: {
                    cookie: false,
                    webstorage: true,
                },
                serverSorting: true,
            }, 
            layout: {
                theme: "default",
                class: "table m-table m-table--head-separator-primary", 
                scroll: true, 
                footer: true,
            }, 
            sortable: true, 
        	pagination: true, 
        	search: {
            	input: $("#generalSearch")
        	}, 
        	columns: datatableColumns
        })
    };
    return {
        init:function() {
            t()
        }
    }
}
();
jQuery(document).ready(function() {
	DatatableJsonRemoteDemo.init()
});