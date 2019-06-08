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
        datatableColumns.push(
            {field:"users", title:"Users", 
                template: function (row) {
                    return row.users;
                },
            });
        datatableColumns.push(
            {field:"permissions", title:"Permissions", 
                template: function (row) {
                    return row.permissions;
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
'href="' + row.show_url + '"> <i class="la la-eye"></i></a>' +

'<a class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"' + 
'href="' + row.edit_url + '"> <i class="la la-edit"></i></a>' +

'<form action="' + row.delete_url + '" method="POST" style="display:inline-block">' + 
'<input type="hidden" name="_method" value="DELETE">' +
'<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
'<button class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill">' +
'<i class="la la-trash"></i> </button> </form>';
                    return output;
                }
            });

        var t=$(".m_datatable").mDatatable( {
            data: {
                type:"remote",
                source: {
                	read: {
                		url: "role/datatable",
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