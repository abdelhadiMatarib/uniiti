<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

        <?php 
		header("Cache-Control: no-cache");
        include_once 'config/configuration.inc.php';
        include 'includes/head.php';
		include_once 'config/configPDO.inc.php';
		include_once 'includes/fonctions.inc.php'; ?>
    <body>
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
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
				<div class="index_overlay_button"><a href="#" title="">Visite guidée</a></div>
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
                        <?php include'includes/filters.php' ?>
                        <!-- FIN FILTRES DE TRI -->
			</div>
			<!-- CONTENU PRINCIPAL -->
			<div id="box_container" class="content">
				<?php include 'includes/requete.php' ?>
			</div>
			<!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN DU BIGGY -->
		
        <!-- FOOTER -->
			<?php include 'includes/footer.php' ?>
        <!-- FIN FOOTER -->
		<?php include'includes/js.php' ?>
	</body>
</html>
