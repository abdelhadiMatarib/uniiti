<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
?>

    <body class="dashboard">
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
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Paramètres</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content parametres_content">
                <h2>Paramètres Uniiti.com </h2>
                <div class="input_dashboard_parametres_wrap">
                    <input id="categories" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="sous_categories" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="sous_categories2" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-SOUS CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="separation_input_parametres"></div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="villes" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE VILLE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="arrondissement" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN ARRONDISSEMENT"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="quartier" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN QUARTIER"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="recommandations" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE RECOMMANDATION"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="labelsuniiti" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN LABEL"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="motscles" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN MOT CLE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input id="moyenspaiements" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN MOYEN DE PAIEMENT"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
<!-- 
				<div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE SOUS-CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE SOUS-SOUS CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
-->
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
	<script>
	function moveToNext(field,nextFieldID){
		if(field.value.length >= field.maxLength){document.getElementById(nextFieldID).focus();}
	}
	
	$(".input_dashboard_large_container").click(function () {
		var input = $(this).prev('input');
		var valeurs = input.val();
		var table = input.attr('id');
	
		var data = {
					type : 'enregistrer',
					table : table,
					valeurs : ''+valeurs+''
				};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requeteenregistrenouveauparametre.php',
			data : data,
			success: function(result){
				alert("Nouveau paramètre enregistré sous le n°"+result.result);				
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	
	});
	
	</script>

    </body>
</html>                                