
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
		<span class="maintitle">LISTE GMAP RESEAU DE COMMERCES</span>
	</div>

	<div id="map-canvas"></div>
</div>
<style>#map-canvas{width:700px;height:500px;}</style>
<!-- Google Map -->

<script>
	var geocoder = new google.maps.Geocoder();
	var map = null;
	var infowindow = new google.maps.InfoWindow();
	var overlay = null;
	var adresse_enseigne = '<?php echo $_POST['adresse_enseigne'];?>';
    var couleur = "fabe41";
    var enseigne_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + couleur,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	var couleur_metro = "33ccff";
    var metro_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + couleur_metro,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	var couleur_parking = "0000ff";
    var parking_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + couleur_parking,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
		
	function initialize() {
		geocoder.geocode( { 'address': adresse_enseigne}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var enseigne_position = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
				var mapOptions = {
					zoom: 15,
					center: enseigne_position,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				var marker = new google.maps.Marker({
					icon: enseigne_icon,
					position: enseigne_position,
					map: map});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(adresse_enseigne+'\n.');
					infowindow.open(map, this);
				});
				var request = {
					location: enseigne_position,
					radius: 1000,
					types: ['subway_station', 'parking']
				};
				var service = new google.maps.places.PlacesService(map);
				service.nearbySearch(request, callback);
			}
		});
	}
	initialize();
	
	function callback(results, status) {
		if (status == google.maps.places.PlacesServiceStatus.OK) {
			for (var i = 0; i < results.length; i++) {
				createMarker(results[i]);
			}
		}
	}

	function createMarker(place) {
		console.log(place);
		var placeLoc = place.geometry.location;
		var icon;
		if ($.inArray('parking', place.types)) {icon = parking_icon;}
		if ($.inArray('subway_station', place.types)) {icon = metro_icon;}
		
		var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location,
			icon: icon
		});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent(place.name+'\n.');
			infowindow.open(map, this);
		});
	}

/*				$.getJSON("http://www.parking-public.fr/neoparking.php?jsoncallback=?&town_pp="+ville_enseigne,
				{
					tags: "cat",
					tagmode: "any",
					format: "json"
				},
				function(data) {
					// console.log(data);
					if(data==0){
					} else {			
						var AIRPORTS='';
						if(data.AIRPORTS.responseStatus=='SUCCESS'){
							var MinDistance = -1, NomMetro = '';
							var MinDistance2 = -1, NomMetro2 = '';
							$.each(data.AIRPORTS.result, function(){
								var position = new google.maps.LatLng($(this)[0].latitude, $(this)[0].longitude);
								var Dist = Distance(enseigne_position, position);
								if (((MinDistance != -1) && (MinDistance2 == -1)) || ((MinDistance2 != -1) && (Dist > MinDistance) && (Dist < MinDistance2))) {
									MinDistance2 = Dist;
									NomMetro2 = $(this)[0].name;
								}
								if ((MinDistance == -1) || (Dist < MinDistance)) {
									MinDistance2 = MinDistance;
									NomMetro2 = NomMetro;
									MinDistance = Dist;
									NomMetro = $(this)[0].name;
								}
							});
							$('#metro1').html('<span>'+NomMetro+' <strong>'+Math.floor(MinDistance*1000)+'m</strong></span>');
							$('#metro2').html('<span>'+NomMetro2+' <strong>'+Math.floor(MinDistance2*1000)+'m</strong></span>');
						}
					}
				}); */	
	
	
</script>

