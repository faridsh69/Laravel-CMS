function initMap() {
   geocoder = new google.maps.Geocoder();
   var myOptions = {
		zoom: 12,
		center: new google.maps.LatLng(35.7207896, 51.3777093),
		mapTypeControl: true,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map"), myOptions);
	   
	var marker = new google.maps.Marker({
		position: map.getCenter(),
		draggable: true,
		map: map
	});
			
	google.maps.event.addListener(map, "idle", function() {
		marker.setPosition(map.getCenter());
		var latitude = map.getCenter().lat().toFixed(6);
		var longitude = map.getCenter().lng().toFixed(6);
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
		google.maps.event.trigger(map, "resize");
	});
	google.maps.event.addListener(marker, "dragend", function(mapEvent) {
		console.log(1);
		map.panTo(mapEvent.latLng);
	});
	// findAddress("New York");
}
	
function findAddress(address) {
	if ((address != '') && geocoder) {
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
					if (results && results[0]
						&& results[0].geometry && results[0].geometry.viewport)
						map.fitBounds(results[0].geometry.viewport);
				} else {
					alert("No results found");
				}
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}
}	