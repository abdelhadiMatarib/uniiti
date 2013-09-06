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
		include_once 'includes/fonctions.inc.php'; ?>
    <body>
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
                        <?php include'includes/filters.php' ?>
                        <!-- FIN FILTRES DE TRI -->
                        <style>
                            .home_newsfeed{border-radius:3px;margin-bottom:10px;background-color:#a4ebf1;width:100%;height:25px;}
                            .home_newsfeed a{display:inline-block;width:100%;height:100%;}
                            .home_newsfeed_centered{padding-top:3px;margin:0 auto;width:130px;}
                            .home_newsfeed span{display:inline-block;}
                            .home_newsfeed_number{border-radius:3px;font-size:0.9em;font-weight:700;background-color:#ff4343;padding:0px 5px;color:white;}
                            .home_newsfeed_number+span{font-size:0.9em;margin-left:3px;color:#252525;}
                        </style>
                        <div class="home_newsfeed">
                            <a href="#" title="">
                            <div class="home_newsfeed_centered">
                                <span class="home_newsfeed_number">5</span><span>nouveaux éléments</span>
                            </div>
                            </a>
                        </div>
			</div>
                        
			<!-- CONTENU PRINCIPAL -->
			<div id="box_container" class="content">
				<?php include 'includes/requete.php' ?>
                            <div class="corner-stamp"></div>
			</div>
			<!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN DU BIGGY -->
		
        <!-- FOOTER -->
			<?php include 'includes/footer.php' ?>
        <!-- FIN FOOTER -->
		<?php include'includes/js.php' ?>
	</body>
</html>
