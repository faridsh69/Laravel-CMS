if(query)
{	
	var items = $('.inline-flex');
	var newQuery = '';
	var sortIndex = query.search("sort");
	var orderIndex = query.search("order");
	if( query.slice(orderIndex, 999).search('asc') > -1 )
	{
		var order = 'desc';
	}else
	{
		var order = 'asc';
	}
	items.each(function(key,element){
		sort = element.getAttribute('sort');
		if(sortIndex > 0)
		{
			if( query.slice(sortIndex, 999).search(sort) > -1 )
			{
				if(order == 'asc')
				{
					element.innerHTML += ' <i class="fa fa-arrow-up"></i> ';
				}
				else
				{
					element.innerHTML += ' <i class="fa fa-arrow-down"></i> ';
				}
			}
			newQuery = query.slice(0, sortIndex) + 'sort=' + sort + '&order=' + order;
		}else
		{
			newQuery = query + '&sort=' + sort + '&order=asc';
		}
		element.setAttribute('href', newQuery);
	});
}else
{
}

// function statusChanged(element, id, type)
// {
// 	var status = element.value;
// 	$.ajax({
// 		type: "POST",
// 		beforeSend: function(request) {
// 		request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content') );
// 		},
// 		url: "/admin/change-status",
// 		data: {
//         	type: type,
// 			id: id,
//         	status: status
// 		},
// 		success: function(message) {
// 			console.log(message);
// 			// $("#message").css();
// 		}
// 	});
// }