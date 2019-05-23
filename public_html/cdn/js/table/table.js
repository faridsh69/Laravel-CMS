var DatatableJsonRemoteDemo=function() {
    var t=function() {
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
                pageSize:5, 
                saveState: {
                    cookie: true,
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
        	columns:[ 
	            {
	                field: "id", 
	                title: "#", 
	                type: "natural",
	                width: 50, 
	                sortable: true, 
	                textAlign: "center",
	                overflow: 'visible',
	                // responsive: {
						// visible: 'lg', // lg
						// hidden: '' // sm
					// },
					// template: function (row) {
					// 	return parseInt(row.id);
					// }
	            }, 
	            {field: "title", title: "Title"}, 
	            {field: "short_content", title: "Short Content",
	            	template: function (row) {
						return '<small>' + row.short_content + '</small>';
					}
	        	},
	            {field:"editor", title:"Editor"},
	            {field: "updated_at", title: "Updated At"},
	            {field:"published", title:"published", 
	            	template: function (row) {
var output = 
'<span class="m-switch m-switch--outline m-switch--icon m-switch--brand m-switch--sm"><label>' +
'<input type="checkbox" onclick="changeStatus(' + row.id + ')"';
if(row.published == 1){
	output += 'checked="true"' 
} 
output += '/><span></span></label></span>';
	            		return output;
	            	},
	        	},
	            {field:"Actions", 
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
	            }
            ]
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