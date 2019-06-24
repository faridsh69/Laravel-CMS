<section class="clearfix text-center" id="map-container" style="background-color: white;padding-top: 100px">
    <div class="container-fluid">
    	<div class="row text-center">
            <div class="col-12 text-center">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Map</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div id="map-widget" style="width: 100%;height: 300px"></div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaTGuyJD5pQKp9i2zkyhg5NJ76RH3vLlA&callback=myMap"></script>
<script>
function myMap() {
	var mapProp= {
	center:new google.maps.LatLng(51.508742,-0.120850),
	zoom:5,
	};
	var map = new google.maps.Map(document.getElementById("map-widget"),mapProp);
}

function initMap() {
 //   geocoder = new google.maps.Geocoder();
 //   var myOptions = {
	// 	zoom: 12,
	// 	center: new google.maps.LatLng(35.7207896, 51.3777093),
	// 	mapTypeControl: true,
	// 	mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
	// 	navigationControl: true,
	// 	mapTypeId: google.maps.MapTypeId.ROADMAP
	// };
	// map = new google.maps.Map(document.getElementById("map-widget"), myOptions);
	   
	// var marker = new google.maps.Marker({
	// 	position: map.getCenter(),
	// 	draggable: true,
	// 	map: map
	// });
			
	// google.maps.event.addListener(map, "idle", function() {
	// 	marker.setPosition(map.getCenter());
	// 	var latitude = map.getCenter().lat().toFixed(6);
	// 	var longitude = map.getCenter().lng().toFixed(6);
	// 	document.getElementById("latitude").value = latitude;
	// 	document.getElementById("longitude").value = longitude;
	// 	google.maps.event.trigger(map, "resize");
	// });
	// google.maps.event.addListener(marker, "dragend", function(mapEvent) {
	// 	console.log(1);
	// 	map.panTo(mapEvent.latLng);
	// });
}
</script>
@endpush
