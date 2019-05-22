function changeStatus(id){
	$.ajax({
		url: "change-status/" + id
	}).done(function() {
		// $(this).addClass( "done" );
	});
}
