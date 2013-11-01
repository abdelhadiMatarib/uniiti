<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
	require_once('../acces/droits.inc.php'); 					// Liste de définition des ACL	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
	
	if ((isset($_SESSION['SESS_MEMBER_ID'])) && ((int)$_SESSION['droits'] & ADMINISTRATEUR)) {$Connecte = true;}
	else {echo "vous ne pouvez pas accéder à cette page sans être connecté!\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
?>

    <body>
        <div class="bg_dashboard">
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_title_wrap"><h1>Bienvenue sur <span>l'interface d'administration</span> de Uniiti.com</h1></div>
            <div class="dashboard_panel">
                <div class="dashboard_cube_item dashboard_cube_item_haut dashboard_cube_item_margin_right dashboard_cube_item_c"><a href="commerce_interface.php?id_enseigne=0" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un commerce</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_margin_right dashboard_cube_item_f"><a href="objet.php?id_objet=0" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un objet</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="dashboard_ajout_avis.php" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_right dashboard_cube_item_margin_top dashboard_cube_item_f"><div class="dashboard_notif"><span id="Nbsuggnotifs_enseigne"></span></div><a href="dashboard_gestion_commerce.php" title=""><span>Gérer</span><span class="dashboard_txt_bold">les commerces</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_right dashboard_cube_item_margin_top dashboard_cube_item_c"><div class="dashboard_notif"><span id="Nbsuggnotifs_objet"></span></div><a href="dashboard_gestion_objet.php" title=""><span>Gérer</span><span class="dashboard_txt_bold">les objets</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_top dashboard_cube_item_f"><a href="dashboard_parametres.php" title="" class="dashboard_cube_item_last"><span>Paramètres</span></a></div>
                <div class="dashboard_cube_ombre"></div>
            </div>
            <div class="dashboard_content">
                <h2>Données globales</h2>
                <span>Adresse du site :</span><span class="dashboard_txt_bold"><a href="#">http://www.uniiti.com</a></span>
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
	<script>
	$.ajax({
		async : false,
		type :"POST",
		url : siteurl+'/includes/requetecomptenotifetsuggestions.php',
		data : {type : 'enseigne'},
		success: function(result){
			$('#Nbsuggnotifs_enseigne').html(result.total);
		},
		error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetecomptenotifetsuggestions.php');}
	});

	$.ajax({
		async : false,
		type :"POST",
		url : siteurl+'/includes/requetecomptenotifetsuggestions.php',
		data : {type : 'objet'},
		success: function(result){
			$('#Nbsuggnotifs_objet').html(result.total);
		},
		error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetecomptenotifetsuggestions.php');}
	});	

	
	</script>
    </body>
</html>
