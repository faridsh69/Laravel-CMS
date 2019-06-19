var DatatableJsonRemoteDemo=function() {
    var t=function() {
    	var datatableColumns = [ 
            {
                field: "id", 
                title: "#", 
                type: "natural",
                width: 150, 
                sortable: true, 
                textAlign: "center",
                overflow: 'visible',
            }
        ];
        columns.forEach(function(column){
        	datatableColumns.push(column);
        });
        // datatableColumns.push(
        //     {field:"users", title:"User", 
        //         template: function (row) {
        //             return row.user;
        //         },
        //     });
        datatableColumns.push(
            {field:"type", title:"Type", 
                template: function (row) {
                    return 'Email';
                },
            });
            datatableColumns.push(
            {
                field:"Actions", 
                width: 100, 
                title: "Actions", 
                sortable: false, 
                overflow: "visible", 
                template:function(row) {
var output = 
'<a class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill"' + 
'href="' + row.show_url + '"> <i class="la la-eye"></i></a>';
                    return output;
                }
            });

        var t=$(".m_datatable").mDatatable( {
            data: {
                type:"remote",
                source: {
                	read: {
                		url: "datatable",
		                method: 'GET',
		                timeout: 30000,
                	},
                },
                pageSize:20, 
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