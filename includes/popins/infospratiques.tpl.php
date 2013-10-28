<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../includes/fonctions.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}
		
		$sql = "SELECT * FROM moyenspaiements";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		
		$sqlcheck = "SELECT * FROM enseignes_moyenspaiements WHERE enseignes_id_enseigne=:id_enseigne";
		$reqcheck = $bdd->prepare($sqlcheck);
		$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqcheck->execute();
		$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultcheck as $row) {
			$existe[$row['id_moyenpaiement']] = 1;
		}
		
		$sql2 = "SELECT voiturier FROM enseignes WHERE id_enseigne=:id_enseigne";
		$req2 = $bdd->prepare($sql2);
		$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$req2->execute();
		$result2 = $req2->fetch(PDO::FETCH_ASSOC);
		$voiturier = $result2['voiturier'];
		
		$sql3 = "SELECT * FROM enseignes_horaires WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=5";
		$req3 = $bdd->prepare($sql3);
		$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$req3->execute();		
		$result3 = $req3->fetch(PDO::FETCH_ASSOC);
		if ($result3) {
			$datahoraires = "{Lundi : '" . $result3['lundi'] . "', "
							. "Mardi : '" . $result3['mardi'] . "', "
							. "Mercredi : '" . $result3['mercredi'] . "', "
							. "Jeudi : '" . $result3['jeudi'] . "', "
							. "Vendredi : '" . $result3['vendredi'] . "', "
							. "Samedi : '" . $result3['samedi'] . "', "
							. "Dimanche : '" . $result3['dimanche'] . "'}";
		} else {$datahoraires = '""';}
?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Infos pratiques</span>
    </div>
		<style>
		
			#map-canvas{
				float:left;
				width:700px;
				height:300px;
				text-align: center;
				vertical-align: middle;
				white-space: nowrap;				
			}
		
			#infowindow {
				 font-size: 10px;
				 border-top-width: 0px;
				 border-right-width: 0px;
				 border-bottom-width: 0px;
				 border-left-width: 0px;
				 border-top-style: none;
				 border-right-style: none;
				 border-bottom-style: none;
				 border-left-style: none;
				 letter-spacing: normal;
				 text-align: center;
				 vertical-align: middle;
				 word-spacing: normal;
			}

			#legend {
				text-align: left;
				background: #FFF;
				padding: 10px;
				margin: 5px;
				font-size: 12px;
				font-family: Arial, sans-serif;
			}
			
		</style>
		<div class="infospratiques_body_horaires">
			<div class="localisation_head">
				<div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="22" width="22" /></div><span>Localisation</span>
			</div>
			<div id="map-canvas"></div>  
		</div>	
    <div class="menutarifs_body">
	

        <div class="infospratiques_body_horaires">
            <div class="menutarifs_body_entrees_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_horaires.png" title="" alt="" height="22" width="22" /></div><span>Horaires d'ouverture</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert"><span>Lundi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert"><span>Mardi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert"><span>Mercredi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert"><span>Jeudi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert"><span>Vendredi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ferme"><span>Samedi</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ferme"><span>Dimanche</span></div>
        
        </div>
        <div class="infospratiques_body_parking">
            <div class="menutarifs_body_entrees_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_parking.png" title="" alt="" height="22" width="22" /></div><span>Parking à proximité</span>
            </div>
            <div id="parking1" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            <div id="parking2" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
        
        </div>
        <div class="infospratiques_body_metro">
            <div class="menutarifs_body_plats_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_metro.png" title="" alt="" height="22" width="22" /></div><span>Métro à proximité</span>
            </div>
            <div id="metro1" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            <div id="metro2" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
        </div>
        <div class="infospratiques_body_velib">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_velib.png" title="" alt="" height="22" width="22" /></div><span>Station vélib' à proximité</span>
            </div>
            <div id="velib1" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            <div id="velib2" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
        </div>
        <div class="infospratiques_body_autolib">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_autolib.png" title="" alt="" height="22" width="22" /></div><span>Station Autolib' à proximité</span>
            </div>
            <div id="autolib1" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            <div id="autolib2" class="menutarifs_body_entrees_entree_generique"><span>Recherche en cours ...</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><a href="#map-canvas" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
		</div>
		<?php if ($resultcheck) { ?>
        <div class="infospratiques_body_paiements">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_paiements.png" title="" alt="" height="22" width="22" /></div><span>Paiements acceptés</span>
            </div>
			<?php foreach ($result as $row) {
					$selected = false;
					if (isset($existe[$row['id_moyenpaiement']])) { ?>
					<div class="menutarifs_body_entrees_prix_generique paiement_generique<?php echo $row['id_moyenpaiement'];?>">
						<img id_paiement="<?php echo $row['id_moyenpaiement'];?>" class="img_container_payment_options img_container_payment_options<?php echo $row['id_moyenpaiement'];?> moyenspaiements<?php echo " valid_paiement";?>" title="<?php echo $row['moyenpaiement'];?>"></img>
					</div>

			<?php }} ?>        
		</div>
		<?php } ?>
		<?php if ($voiturier == 1) { ?>
        <div class="infospratiques_body_voiturier">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_voiturier.png" title="" alt="" height="22" width="22" /></div><span>Service de voiturier</span>
            </div>
            <div class="infospratiques_body_voiturier2">
                <div class="infospratiques_body_voiturier_inside">
                <span class="infospratiques_textebleu">Ce restaurant bénéficie d'un service de voiturier</span>
                <span><?php if (!empty($_POST['telephone_enseigne'])) echo 'Pour plus de renseignements, merci de contacter le commerce au ';echo chunk_split($_POST['telephone_enseigne'],2,'.');?></span>
                </div>
            </div>
        </div>
		<?php } ?>
    </div>


<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });

	var inithoraires = <?php echo $datahoraires; ?>;
	var init = true;
	$('.infospratiques_body_horaires')
		.find('.menutarifs_body_entrees_entree_generique')
			.each(function() {
				if (inithoraires != '') {InitHoraires($(this));}
				else {
					if (init) {init = false;$(this).html('<span>Informations non communiquées</span>');$(this).next().html('<span>Pas d\'information</span>')}
					else {$(this).hide();$(this).next().hide();}
				}
			});

	function InitHoraires(div) {
		var id = div.next().find('span').text();
		var span = '';
		if (typeof(inithoraires[id]) != 'undefined') {
			if (inithoraires[id] != "Fermé") {
				if (inithoraires[id] == '') {span = "Pas d'information";}
				else {
					var sel = inithoraires[id].replace(/:/g, 'h').split(',');
					if (sel[1] == sel[2]) {span = "De "+sel[0]+" à "+sel[3]+" sans interruption";}
					else {span = "De "+sel[0]+" à "+sel[1]+" et de "+sel[2]+" à "+sel[3];}
				}
			} else {span = "Fermé";}
		}
		if (span == "Fermé") {
			div.next(':first').removeClass('horaires_commerces_ouvert');
			div.next(':first').addClass('horaires_commerces_ferme');
		}
		var html = '<span>\n';
		html += span;
		html += '</span>\n'
		div.html(html);
	}
	
	var enseigne_position = false;
	var nom_enseigne = '<?php echo addslashes($_POST['nom_enseigne']);?>';
	var adresse1_enseigne = '<?php echo addslashes($_POST['adresse1_enseigne']);?>';
	var code_postal = '<?php echo $_POST['code_postal'];?>';
	var ville_enseigne = '<?php echo addslashes($_POST['ville_enseigne']);?>';
	var adresse_enseigne = '<?php echo addslashes($_POST['adresse1_enseigne']);?>';
	adresse_enseigne += ','+code_postal+','+ville_enseigne;	
	
	var geocoder = null;
	var map = null;
	var infowindow = new google.maps.InfoWindow();
	var infowindow2 = new google.maps.InfoWindow();
    var couleur = '<?php echo $_POST['couleur'];?>';
	couleur = couleur.replace('\#', '');
    var enseigne_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_spin&chld=1|0|" + couleur + '|8|b|' + nom_enseigne.substring(0,Math.min(nom_enseigne.length,8)));
	var couleur_metro = "0000ff";
    var metro_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_xpin_letter&chld=pin|M|" + couleur_metro + '|ffffff',
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	var couleur_parking = "0000ff";
    var parking_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_xpin_letter&chld=pin|P|" + couleur_parking + '|ffffff',
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	var couleur_velib = "00ff00";
    var velib_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_xpin_letter&chld=pin|V|" + couleur_velib + '|000000',
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
	var couleur_autolib = "00ff00";
    var autolib_icon = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_xpin_letter&chld=pin|A|" + couleur_autolib + '|000000',
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));		

	$(document).ready(function() {
		if (!navigator.geolocation) return true; // Fx 3.5+ only
		
		geocoder = new google.maps.Geocoder();

		geocoder.geocode( { 'address': adresse_enseigne}, function(results, status) {
			/* Si l'adresse a pu être géolocalisée */
			if (status == google.maps.GeocoderStatus.OK) {
			 /* Récupération de sa latitude et de sa longitude */
				enseigne_position = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
		
				switch (ville_enseigne) {
					case 'Paris' :
						ChercheVelibAutolib('velib', $('#velib1'), $('#velib2'), velib_icon);
						ChercheVelibAutolib('autolib', $('#autolib1'), $('#autolib2'), autolib_icon);					
					break;
					case 'Marseille' :
						ChercheVelibAutolib('levelompm', $('#velib1'), $('#velib2'), velib_icon);
						$('.infospratiques_body_autolib').hide();
					break;
					case 'Toulouse' :
						ChercheVelibAutolib('velotoulouse', $('#velib1'), $('#velib2'), velib_icon);
						$('.infospratiques_body_autolib').hide();
					break;
					default :
						$('.infospratiques_body_velib').hide();
						$('.infospratiques_body_autolib').hide();
					break;
				}

				var mapOptions = {
					zoom: 15,
					center: enseigne_position,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				
				var legend = document.createElement('div');
				legend.id = 'legend';
				var content = [];
				content.push('<h3>Légende</h3>');
				content.push('<p><img src="'+parking_icon.url+'"></img> Parking</p>');
				content.push('<p><img src="'+metro_icon.url+'"></img> Métro</p>');
				content.push('<p><img src="'+autolib_icon.url+'"></img> Autolib</p>');
				content.push('<p><img src="'+velib_icon.url+'"></img> Velib</p>');
				legend.innerHTML = content.join('');
				legend.index = 1;
				map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

				var marker = new google.maps.Marker({
					icon: enseigne_icon,
					position: enseigne_position,
					map: map,
					animation: google.maps.Animation.DROP});
				infowindow.setContent('<html><div id="infowindow"><strong>'+nom_enseigne+'</strong><BR/>'+adresse1_enseigne+', '+code_postal+' - '+ville_enseigne+'</div></html>');
				infowindow.open(map, marker);
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent('<html><div id="infowindow"><strong>'+nom_enseigne+'</strong><BR/>'+adresse1_enseigne+'<BR/>'+code_postal+'<BR/>'+ville_enseigne+'</div></html>');
					infowindow.open(map, this);
				});
				
				ChercheGoogleMap('subway_station', $('#metro1'), $('#metro2'), metro_icon);
				ChercheGoogleMap('parking', $('#parking1'), $('#parking2'), parking_icon);
			}
		});
		
	});

	function ChercheVelibAutolib(type, div1, div2, icon) {
		var url = 'http://open-api.madebymonsieur.com/'+type+'/closest?lon='+enseigne_position.lng()+'&lat='+enseigne_position.lat()+'&accept=application/json&limit=5';
		$.getJSON("http://query.yahooapis.com/v1/public/yql?"+
				"q=select%20*%20from%20html%20where%20url%3D%22"+
				encodeURIComponent(url)+
				"%22&format=xml'&callback=?",
		function(data){
			if(data.results[0]){
				var data = filterData(data.results[0]);
				data = JSON.parse(data);
				div1.html('<span>'+data[0].address+' <strong>à '+data[0].dist+'m</strong></span>');
				div2.html('<span>'+data[1].address+' <strong>à '+data[1].dist+'m</strong></span>');
				for (var i = 0; i < data.length; i++) {
					var pos = new google.maps.LatLng(data[i].loc.lat, data[i].loc.lon);
					createMarkerVelibAutolib(type+', '+data[i].address, pos, data[i].dist, icon);
				}
			} else {
				div1.html('<span>Pas de résultat</span>');
				div2.hide();div2.next().hide();
			}
		});	
	}
	
	function ChercheGoogleMap(type, div1, div2, icon) {
		var request = {
			location: enseigne_position,
			radius: 1000,
			types: [type]
		};
		var service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, function (results, status) {
			var MinDistance = -1, Nom = '', place = null;
			var MinDistance2 = -1, Nom2 = '', place2 = null;
			if (status == google.maps.places.PlacesServiceStatus.OK) {
				for (var i = 0; i < results.length; i++) {
					var position = results[i].geometry.location;
					var Dist = Distance(enseigne_position, position);
					createMarker(results[i], Math.floor(Dist*1000), icon);
					if (((MinDistance != -1) && (MinDistance2 == -1)) || ((MinDistance2 != -1) && (Dist > MinDistance) && (Dist < MinDistance2))) {
						MinDistance2 = Dist;
						place2 = results[i];
					}
					if ((MinDistance == -1) || (Dist < MinDistance)) {
						MinDistance2 = MinDistance;
						place2 = place;
						MinDistance = Dist;
						place = results[i];
					}
				}
			}
			if ((place != null) || (place2 != null)) {
				if (place != null) {div1.html('<span>'+place.name+' <strong>à '+Math.floor(MinDistance*1000)+'m</strong></span>');}
				if (place2 != null) {div2.html('<span>'+place2.name+' <strong>à '+Math.floor(MinDistance2*1000)+'m</strong></span>');}
			} else {
				div1.html('<span>Pas de résultat</span>');
				div2.hide();div2.next().hide();
			}
		});	
	}

	function createMarkerVelibAutolib(nom, position, distance, icon) {
		var marker = new google.maps.Marker({
			map: map,
			position: position,
			icon: icon,
			animation: google.maps.Animation.DROP
		});
		google.maps.event.addListener(marker, 'mouseover', function() {
			infowindow2.setContent('<html><div id="infowindow">'+nom+' <strong>à '+distance+'m</strong></div></html>');
			infowindow2.open(map, this);
		});
	}
	
	function createMarker(place, distance, icon) {
		var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location,
			icon: icon,
			animation: google.maps.Animation.DROP
		});
		google.maps.event.addListener(marker, 'mouseover', function() {
			infowindow2.setContent('<html><div id="infowindow">'+place.name+' <strong>à '+distance+'m</strong></div></html>');
			infowindow2.open(map, this);
		});
	}
	
	function filterData(data){
		// filter all the nasties out
		// no body tags
		data = data.replace("<body>",'');
		data = data.replace("</body>",'');
		data = data.replace("<p>",'');
		data = data.replace("</p>",'');
		return data;
	}
	
	function Distance(LatLng, newLatLng) {
	   // setup our variables
	   var lat1 = LatLng.lat();
	   var radianLat1 = lat1 * ( Math.PI  / 180 );
	   var lng1 = LatLng.lng();
	   var radianLng1 = lng1 * ( Math.PI  / 180 );
	   var lat2 = newLatLng.lat();
	   var radianLat2 = lat2 * ( Math.PI  / 180 );
	   var lng2 = newLatLng.lng();
	   var radianLng2 = lng2 * ( Math.PI  / 180 );
	   // sort out the radius, MILES or KM?
	   var earth_radius = 6378.1; // (km = 6378.1) OR (miles = 3959) - radius of the earth
	 
	   // sort our the differences
	   var diffLat =  ( radianLat1 - radianLat2 );
	   var diffLng =  ( radianLng1 - radianLng2 );
	   // put on a wave (hey the earth is round after all)
	   var sinLat = Math.sin( diffLat / 2  );
	   var sinLng = Math.sin( diffLng / 2  ); 
	 
	   // maths - borrowed from http://www.opensourceconnections.com/wp-content/uploads/2009/02/clientsidehaversinecalculation.html
	   var a = Math.pow(sinLat, 2.0) + Math.cos(radianLat1) * Math.cos(radianLat2) * Math.pow(sinLng, 2.0);
	 
	   // work out the distance
	   var distance = earth_radius * 2 * Math.asin(Math.min(1, Math.sqrt(a)));
	 
	   // return the distance
	   return distance;
	}
	
</script>
</div>
