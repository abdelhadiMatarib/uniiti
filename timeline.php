<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

        <?php
		include_once 'acces/auth.inc.php';                 // Gestion accès à la page - incluant la session		
		header("Cache-Control: no-cache");
        include_once 'config/configuration.inc.php';
        include 'includes/head.php';
		include_once 'config/configPDO.inc.php';
		include_once 'includes/fonctions.inc.php'; 
		
		$PAGE = "Timeline"; ?>
		
    <body>
<!--		<div id="loading_page" style="z-index:1000;background-image:url('img/pictos_splash/splash_img2.jpg');"></div> -->
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="default_dialog_inscription"></div>
        <div id="dialog_overlay">
            <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                <div class="dialog_footer_loader">
                    <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                </div>
            </div>
        </div>
		<?php
			if (empty($_COOKIE["UNIITI"])) {
			setcookie("UNIITI", "Premierefois");
		?>
        <div id="total_overlay">
			<div class="close_button" id="close_button_home"><a href="#"></a></div>
			<div class="index_overlay"></div>
			<div class="index_overlay_wrap_content">
				<div class="index_overlay_logo"><img src="img/logo_L.png" height="81" width="283" title="" alt="" /></div>
				<div class="index_overlay_texte_wrap"><span class="index_overlay_texte">Bienvenue ! C'est votre première visite ?</span><span class="index_overlay_texte"> Laissez-vous guider...</span></div>
				<div class="index_overlay_button"><a href="http://www.ultimedia.com/deliver/musique/iframe/mdtk/01497444/article/3klms/zone/" title="">Visite guidée</a></div>
			</div>
        </div>
		<?php
		} // FIN DU IF
		?>
		
        <?php include 'includes/header.php'; ?>
        
		<!-- END OF WRAPPER -->
        
		<div class="biggymarginer">
			<div class="big_wrapper">   
                        <!-- FILTRES DE TRI -->
                        <?php $PAGE = "Timeline"; include'includes/filters.php' ?>
                        <!-- FIN FILTRES DE TRI -->
                        <div class="home_newsfeed">
                            <a href="#" title="">
                            <div class="home_newsfeed_centered">
                                <span class="home_newsfeed_number">0</span><span>nouveaux éléments</span>
                            </div>
                            </a>
                        </div>
			</div>

			<!-- CONTENU PRINCIPAL -->
			<div id="box_container" class="content">
				<?php if (!isset($_POST['filtre_avance'])) {include 'includes/requete.php';} ?>
				<div class="corner-stamp"></div>
			</div>
			<!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN DU BIGGY -->
		
        <!-- FOOTER -->
		<?php include 'includes/footer.php' ?>
        <!-- FIN FOOTER -->
		<?php include 'includes/js.php' ?>

<script src="//maps.googleapis.com/maps/api/js?sensor=false&amp;key=AIzaSyAIPMi9wXX7j6Wzer4QdNGLq4MPO4ykUQw"></script>

<script>
<?php if (!empty($_POST['filtre_avance'])) {
	$data = "{provenance:'all'";
	foreach ($_POST as $key => $value) {$data .= ", " . $key . " : '" . $value . "'";}
	$data .= "}";
	echo "SetFiltre(" . $data . ");";
} ?>

var geocoder = null;
var user_position = false;

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

function SelectionneVille(position) {
	user_position = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	var MinDistance = -1;
	var Compteur = 0;
	$('#suggestionList5 li').each(function () {
		var id = $(this).attr("id");
		geocoder.geocode( { 'address': $(this).text()}, function(results, status) {
			/* Si l'adresse a pu être géolocalisée */
			if (status == google.maps.GeocoderStatus.OK) {
			 /* Récupération de sa latitude et de sa longitude */
				var position = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
				var Dist = Distance(user_position, position);
				Compteur++;
//				console.log(Dist+' '+id);
				if ((MinDistance == -1) || (Dist < MinDistance)) {
					MinDistance = Dist;
					$('#suggestionList5').children().removeClass("active");
					$('#'+id).addClass("active");
					if (Compteur == $('#suggestionList5 > li').length) {$('#'+id).click();}
				}
			 }
		});
	});
}

$(document).ready(function() {
    if (!navigator.geolocation) return true; // Fx 3.5+ only
	
	geocoder = new google.maps.Geocoder();
	navigator.geolocation.getCurrentPosition(function(position) {SelectionneVille(position);}
											, function(error) {alert('Nous n\'avons pas pu vous géolocaliser.');});

    $('.header_button_ville').click(function() {
	navigator.geolocation.getCurrentPosition(function(position) {SelectionneVille(position);}
											, function(error) {alert('Nous n\'avons pas pu vous géolocaliser.');});
    });

});

</script>
	</body>
</html>
