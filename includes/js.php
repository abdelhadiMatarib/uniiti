<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo SITE_URL; ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script type="text/javascript">
        var siteurl = '<?php echo SITE_URL; ?>';
        </script>
    <script src="<?php echo SITE_URL; ?>/js/main.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.infinitescroll.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.isotope.perfectmasonry.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/vendor/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>/js/jquery.easydrag.dialog.min.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
			<!-- Required -->
		<link type="text/css" href="/Slider/css/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
		<script type="text/javascript" src="/Slider/js/slider.js" charset="utf-8"></script>

		<!-- Demo only -->
		<script type="text/javascript" src="/Slider/demo/demo.js"></script>
	
	

<!-- POUR RIGOLER -->
    <script src="<?php echo SITE_URL; ?>/js/jquery.imagesloaded.min.js"></script>
    <script src="<?php echo SITE_URL; ?>/js/bigvideo.js"></script>
	<script src="<?php echo SITE_URL; ?>/js/video.js"></script>
<!-- FIN POUR RIGOLER -->
	
        <!--<script>
            $(document).ready(function() {                
               $.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    var parentWidth = this.element.parent().width();
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  $.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  $.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  $.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
  };
                
                $(function(){
                    var $container = $('#box_container');
                    $container.imagesLoaded( function(){
                    $container.isotope({
                    itemSelector : '.box',
                    masonry : {
                      columnWidth : 250
                    }
                });
                });
            });
            });
        </script>-->
	<script>
	
$Filtre = {};
function SetFiltre(data) {
	$Filtre.provenance = encodeURIComponent("\"" + data.provenance + "\"");
	$Filtre.categorie = data.categorie;
	$Filtre.scategorie = data.scategorie;
	$Filtre.sscategorie = data.sscategorie;
	$("#dialog_overlay").css({display: "block"});
	$.ajax({
		async : false,
		type:"POST",
		url : "includes/requete.php",
		data : $.extend($Filtre, {site_url: '<?php echo SITE_URL ; ?>'}),
		success: function(html){
			if (html) {
				$('#box_container').find('.box').each(function() {$('#box_container').isotope('remove', $(this));$(this).remove();});
				$('#box_container').isotope( 'insert', $(html) );
			} else {alert('Il n\'y a plus d\'enregistrements');}
		},
		error: function() {alert('Erreur sur url : ' + $url);}
	});
	CreerOverlayPush();
	$("#dialog_overlay").css({display: "none"});
}	
	
	$(window).load(function() {
		$(function(){
			/* DEBUT RIGOLER
			var BV = new $.BigVideo();
			BV.init();
			BV.show(siteurl+'/img/videos/Jump Around.flv');
			FIN RIGOLER */
			setInterval("NouveauxElements()", 1000);
			
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
				var CptScroll = 0;
				var DisableScroll = false;
								
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
					if ($(window).scrollTop() > 200) {$("#ScrollToTop").css({display: "block"});}
					else {$("#ScrollToTop").css({display: "none"});}
					if ( (CptScroll < 20)
						&&!isloading
						&& !DisableScroll
						&& ($(window).scrollTop() >= 0.5 * ($(document).height() - $(window).height()))
						)
					{
						var $idenseigne = '<?php echo $id_enseigne; ?>';
						var $idcontributeur = '<?php echo $id_contributeur; ?>';
						var $url, $data;
						if (<?php if (isset($Commerce)) {echo 1;} else {echo 0;} ?>) {
							$url = "../includes/requetecommerce.php";
							$data = {nbitems: 20, id_enseigne: encodeURIComponent($idenseigne), lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'};
						}
						else if (<?php if (isset($Contributeur)) {echo 1;} else {echo 0;} ?>) {
							$url = "../includes/requetecontributeur.php";
							$data = {nbitems: 20, id_contributeur: encodeURIComponent($idcontributeur), lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'};
						}
						else {
							$url = "includes/requete.php";
							$data = $.extend($Filtre, {nbitems: 20, lastid: encodeURIComponent("\"" + $(".box:last").attr("id") + "\""), site_url: '<?php echo SITE_URL ; ?>'});
						}
						CptScroll++;
						isloading = true;
						$(".uniiti_footer_loader").css({display : "block"});
						$.ajax({
							type:"POST",
							url : $url,
							data : $data,
							success: function(html){
								if (html) {
									$container.append( $(html)).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

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
