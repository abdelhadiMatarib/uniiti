<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo SITE_URL; ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script type="text/javascript"> var siteurl = '<?php echo SITE_URL; ?>'; </script>
    <script src="<?php echo SITE_URL; ?>/js/main.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.infinitescroll.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.isotope.perfectmasonry.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/vendor/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.easydrag.dialog.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.slides.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.couv_slides.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.flippy.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.rating.js"></script>

	<script>
	var DisableScroll = false;
	var CptScroll = 0;
	var $container = $('#box_container');
	$container.isotope({itemSelector : '.box'});
	
	$Filtre = {};
	function SetFiltre(data, li) {
		DisableScroll = false;
		CptScroll = 0;
		
		$('.leflux_wrapper a span').text($(li).attr('filtre'));
		var $Page = '<?php if (isset($PAGE)) {echo $PAGE;} else {echo "";} ?>';
		var $idenseigne = '<?php if (isset($id_enseigne)) {echo $id_enseigne;} else {echo '0';} ?>';
		var $idcontributeur = '<?php if (isset($id_contributeur)) {echo $id_contributeur;} else {echo '0';} ?>';
		
		$Filtre.provenance = encodeURIComponent("\"" + data.provenance + "\"");
		$Filtre.type = data.type;
		$Filtre.categorie = data.categorie;
		$Filtre.scategorie = data.scategorie;
		$Filtre.sscategorie = data.sscategorie;
		$Filtre.id_ville = data.id_ville;
		$Filtre.id_budget = data.id_budget;
		$Filtre.quoi = data.quoi;
		$Filtre.lieu = data.lieu;
		console.log($Filtre);
		
		$("#dialog_overlay").css({display: "block"});
		
		switch ($Page) {
			case "Commerce" :
				$url = "/includes/requetecommerce.php";
				$data = {id_enseigne: encodeURIComponent($idenseigne)};
			break;
			case "Utilisateur" :
				$url = "/includes/requetecontributeur.php";
				$data = {id_contributeur: encodeURIComponent($idcontributeur)};
			break;
			case "Timeline" :
				$url = "/includes/requete.php";
				$data = {};
			break;
		}
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl + $url,
			data : $.extend({}, $Filtre, $data, {site_url: '<?php echo SITE_URL ; ?>'}),
			success : function(html){
				if (html) {console.log(html);
					$('#box_container .box').remove();
					$container.append( $(html)).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
					$('#box_container .box').css({overflow : 'visible'});
					if ($Page == "Commerce") {InitFollowContributeur();}
					CreerOverlayPush();
				} else {alert('Il n\'y a plus d\'enregistrements');}
			},
			error: function() {alert('Erreur sur url : ' + $url);}
		});
		CreerOverlayPush();
		$("#dialog_overlay").css({display: "none"});
	}

	$(window).load(function() {
		$(function(){
			var $Page = '<?php if (isset($PAGE)) {echo $PAGE;} else {echo "";} ?>';
			if ($Page == "Timeline") {setInterval("NouveauxElements()", 100000);}
			// pour tester ...
/*			if ($("#loading_page").length > 0) {
				var Hasard = Math.random();
				if (Hasard < 0.5) {$("#loading_page").animate({ left: $("body").width()},2000, function() {$("#loading_page").hide();});}
				else {$("#loading_page").animate({ right: $("body").width()},2000, function() {$("#loading_page").hide();});}
//				else {$("#loading_page").animate({ top: -$("#loading_page").height()},2000, function() {$("#loading_page").hide();});}
//				else {$("#loading_page").animate({ bottom: $("body").height()},2000, function() {$("#loading_page").hide();});}
			//$("#loading_page").fadeOut(3000);
			} 
			else {$("body").fadeIn(3000);} */
			// fin pour tester
			
			CreerOverlayPush();
  
			var $container = $('#box_container'), $body = $('body'), colW = 250, columns = null;
			
			$container.imagesLoaded(function(){
				$container.isotope({
					// disable window resizing
					resizable: false,
					masonry: {
						itemSelector : '.box',
						columnWidth: colW,
						resizable: false
					}
				});
								
				var isloading = false;
								
				$('#container').isotope({
					itemSelector: '.item',
					masonry: {
					  columnWidth: 120,
					  cornerStampSelector: '.corner-stamp'
					}
				});

				$(window).scroll(function() {

					$("#default_dialog_large").dialog( "option", "position", { my: "center", at: "center", of: window });
					$("#default_dialog").dialog( "option", "position", { my: "center", at: "center", of: window });
					$("#default_dialog_inscription").dialog( "option", "position", { my: "center", at: "center", of: window });
					$("#dialog_confirmation").dialog( "option", "position", { my: "center", at: "center", of: window });
					if ($(window).scrollTop() > 200) {$("#ScrollToTop").css({display: "block"});}
					else {$("#ScrollToTop").css({display: "none"});}
					if ( (CptScroll < 20)
						&& !isloading
						&& !DisableScroll
						&& ($(window).scrollTop() >= 0.5 * ($(document).height() - $(window).height()))
						&& ($Page != "")
						)
					{
						var $idenseigne = '<?php if (isset($id_enseigne)) {echo $id_enseigne;} else {echo '0';} ?>';
						var $idcontributeur = '<?php if (isset($id_contributeur)) {echo $id_contributeur;} else {echo '0';} ?>';
						var $url, $data;
						
						switch ($Page) {
							case "Commerce" :
								$url = "../includes/requetecommerce.php";
								$data = $.extend({}, $Filtre, {nbitems: 20, id_enseigne: encodeURIComponent($idenseigne), lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'});
							break;
							case "Utilisateur" :
								$url = "../includes/requetecontributeur.php";
								$data = $.extend({}, $Filtre, {nbitems: 20, id_contributeur: encodeURIComponent($idcontributeur), lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'});
							break;
							case "Timeline" :
								$url = "includes/requete.php";
								$data = $.extend({}, $Filtre, {nbitems: 20, lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'});
							break;
						}

						CptScroll++;
						isloading = true;
						$(".uniiti_footer_loader").css({display : "block"});
						console.log($data);
						$.ajax({
							type:"POST",
							url : $url,
							data : $data,
							success: function(html){
								if (html) {
									$container.append( $(html)).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
									if ($Page == "Commerce") {InitFollowContributeur();}

								} else {alert('Il n\'y a plus d\'enregistrements');}
								if (html.search('box') == -1) {DisableScroll = true;}
								$(".uniiti_footer_loader").css({display : "none"});
								isloading = false;
								CreerOverlayPush();
							},
							error: function() {alert('Erreur sur url : ' + $url);}
						});
					}
				});
			
 				$(window).smartresize(function(){
					$("#default_dialog_large").dialog( "option", "position", { my: "center", at: "center", of: window });
					$("#default_dialog").dialog( "option", "position", { my: "center", at: "center", of: window });
					$("#default_dialog_inscription").dialog( "option", "position", { my: "center", at: "center", of: window });
					// check if columns has changed
					var currentColumns = Math.floor( ( $body.width() - 10 ) / colW );
					if ( currentColumns !== columns ) {
						// set new column count
						columns = currentColumns;
						// apply width to container manually, then trigger relayout
						$container.width( columns * colW ).isotope('reLayout');
					}
					resizeboxContainer();
				}).smartresize(); // trigger resize to set container width
			});
		});
	});

    </script>

	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

<!-- FIN JS -->
