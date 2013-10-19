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
	</body>
</html>
<script>
<?php if (!empty($_POST['filtre_avance'])) {
	$data = "{provenance:'all'";
	foreach ($_POST as $key => $value) {$data .= ", " . $key . " : '" . $value . "'";}
	$data .= "}";
	echo "SetFiltre(" . $data . ");";
} ?>
</script>
