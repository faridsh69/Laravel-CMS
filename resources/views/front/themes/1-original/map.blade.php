<section class="clearfix text-center" id="map-container" style="background-color: white;padding-top: 100px">
    <div class="container-fluid">
    	<div class="row text-center">
            <div class="col-12 text-center">
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
	center:new google.maps.LatLng( {{ Config::get('0-contact.latitude') }} , {{ Config::get('0-contact.longitude') }} ),
	zoom:12,
	};
	var map = new google.maps.Map(document.getElementById("map-widget"),mapProp);
}
</script>
@endpush
