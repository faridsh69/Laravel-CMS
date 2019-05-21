var DatatableJsonRemoteDemo=function() {
    var t=function() {
        var t=$(".m_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                	read: {
                		url: "/blog/datatable",
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
	            // {field:"url", title:"Url"},
	            {field: "short_content", title: "Short Content",
	            	template: function (row) {
						return '<small>' + row.short_content + '</small>';
					}
	        	},
	            {field:"published", title:"published"},
	            {field:"editor", title:"Editor"},
	            {field: "updated_at", title: "Updated At"},
	            {field:"Actions", 
	            	width: 90, 
	            	title: "Actions", 
	            	sortable: false, 
	            	overflow: "visible", 
	            	template:function(row) {
var output = 
'<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="' + 
row.edit_url + ' "> <i class="la la-edit"></i></a>'+
'<form action=" ' + row.delete_url + ' " id="delete-form" method="POST">'+		
'<input class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"' +
'type="submit" value="d"> <i class="la la-delete"></i></form>';
						return output;
	                }
	            }
            ]
        }
        )
        // ,
        // e=t.getDataSourceQuery();
        // $("#m_form_status").on("change", function() {
        //     t.search($(this).val(), "Status")
        // }
        // ).val(void 0!==e.Status?e.Status:""),
        // $("#m_form_type").on("change", function() {
        //     t.search($(this).val(), "Type")
        // }
        // ).val(void 0!==e.Type?e.Type:""),
        // $("#m_form_status, #m_form_type").selectpicker()
    }
    ;
    return {
        init:function() {
            t()
        }
    }
}

();
jQuery(document).ready(function() {
    DatatableJsonRemoteDemo.init()
}

);