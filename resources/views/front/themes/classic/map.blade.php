<div class="map-area wow fadeInUp" data-wow-delay="300ms">
    <div id="googleMap"></div>
</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('setting-general.google_map_code') }}"></script>
<script>
	var latitude = {{ config('setting-contact.latitude') }};
	var longitude = {{ config('setting-contact.longitude') }};
</script>
<script src="{{ asset('js/front/themes/classic/js/google-map/map-active.js') }}"></script>
@endpush