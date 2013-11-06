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

	$sql1 = "SELECT * FROM villes";
	$req1 = $bdd->prepare($sql1);
	$req1->execute();	
	$result1 = $req1->fetchAll(PDO::FETCH_ASSOC);

	$sql2 = "SELECT * FROM recommandations";
	$req2 = $bdd->prepare($sql2);
	$req2->execute();	
	$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);

	$sql3 = "SELECT * FROM labelsuniiti";
	$req3 = $bdd->prepare($sql3);
	$req3->execute();	
	$result3 = $req3->fetchAll(PDO::FETCH_ASSOC);

	$sql4 = "SELECT * FROM motscles";
	$req4 = $bdd->prepare($sql4);
	$req4->execute();	
	$result4 = $req4->fetchAll(PDO::FETCH_ASSOC);

	$sql5 = "SELECT * FROM moyenspaiements";
	$req5 = $bdd->prepare($sql5);
	$req5->execute();	
	$result5 = $req5->fetchAll(PDO::FETCH_ASSOC);

	$sql6 = "SELECT * FROM categories";
	$req6 = $bdd->prepare($sql6);
	$req6->execute();	
	$result6 = $req6->fetchAll(PDO::FETCH_ASSOC);

	$sql7 = "SELECT * FROM sous_categories";
	$req7 = $bdd->prepare($sql7);
	$req7->execute();	
	$result7 = $req7->fetchAll(PDO::FETCH_ASSOC);	

	$sql8 = "SELECT * FROM sous_categories2";
	$req8 = $bdd->prepare($sql8);
	$req8->execute();	
	$result8 = $req8->fetchAll(PDO::FETCH_ASSOC);	

	$sql9 = "SELECT * FROM arrondissement";
	$req9 = $bdd->prepare($sql9);
	$req9->execute();	
	$result9 = $req9->fetchAll(PDO::FETCH_ASSOC);	

	$sql10 = "SELECT * FROM quartier";
	$req10 = $bdd->prepare($sql10);
	$req10->execute();	
	$result10 = $req10->fetchAll(PDO::FETCH_ASSOC);		
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
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result6 as $row) { ?>
						<option value="<?php echo $row['categorie_principale']; ?>"><?php echo $row['categorie_principale']; ?></option>
						<?php } ?>
					</select>
                    <input id="categories" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result7 as $row) { ?>
						<option value="<?php echo $row['sous_categorie']; ?>"><?php echo $row['sous_categorie']; ?></option>
						<?php } ?>
					</select>
                    <input id="sous_categories" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result8 as $row) { ?>
						<option value="<?php echo $row['sous_categorie2']; ?>"><?php echo $row['sous_categorie2']; ?></option>
						<?php } ?>
					</select>
                    <input id="sous_categories2" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-SOUS CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="separation_input_parametres"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result1 as $row) { ?>
						<option value="<?php echo $row['nom_ville']; ?>"><?php echo $row['nom_ville']; ?></option>
						<?php } ?>
					</select>
                    <input id="villes" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE VILLE"/>
					<div class="input_dashboard_large_container">
                        <img class="modifier" title="modifier" width="30px" src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png"/>
						<img class="supprimer" title="supprimer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
						<img class="enregistrer" title="enregistrer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result9 as $row) { ?>
						<option value="<?php echo $row['arrondissement']; ?>"><?php echo $row['arrondissement']; ?></option>
						<?php } ?>
					</select>
                    <input id="arrondissement" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN ARRONDISSEMENT"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result10 as $row) { ?>
						<option value="<?php echo $row['quartier']; ?>"><?php echo $row['quartier']; ?></option>
						<?php } ?>
					</select>
                    <input id="quartier" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN QUARTIER"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result2 as $row) { ?>
						<option value="<?php echo $row['recommandation']; ?>"><?php echo $row['recommandation']; ?></option>
						<?php } ?>
					</select>
                    <input id="recommandations" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE RECOMMANDATION"/>
                    <div class="input_dashboard_large_container">
                        <img class="modifier" title="modifier" width="30px" src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png"/>
						<img class="supprimer" title="supprimer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
						<img class="enregistrer" title="enregistrer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result3 as $row) { ?>
						<option value="<?php echo $row['label']; ?>"><?php echo $row['label']; ?></option>
						<?php } ?>
					</select>
                    <input id="labelsuniiti" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN LABEL"/>
                    <div class="input_dashboard_large_container">
                        <img class="modifier" title="modifier" width="30px" src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png"/>
						<img class="supprimer" title="supprimer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
						<img class="enregistrer" title="enregistrer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result4 as $row) { ?>
						<option value="<?php echo $row['motcle']; ?>"><?php echo $row['motcle']; ?></option>
						<?php } ?>
					</select>
                    <input id="motscles" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN MOT CLE"/>
                    <div class="input_dashboard_large_container">
                        <img class="modifier" title="modifier" width="30px" src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png"/>
						<img class="supprimer" title="supprimer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
						<img class="enregistrer" title="enregistrer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="input_dashboard_parametres_wrap">
					<select disabled="disabled" class="input_dashboard_large_parametres">
						<?php foreach ($result5 as $row) { ?>
						<option value="<?php echo $row['moyenpaiement']; ?>"><?php echo $row['moyenpaiement']; ?></option>
						<?php } ?>
					</select>
                    <input id="moyenspaiements" class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UN MOYEN DE PAIEMENT"/>
                    <div class="input_dashboard_large_container">
                        <img class="modifier" title="modifier" width="30px" src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png"/>
						<img class="supprimer" title="supprimer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
						<img class="enregistrer" title="enregistrer" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
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
	
	$(".enregistrer").click(function () {
		var input = $(this).parent().prev('input');
		var placeholder = input.attr('placeholder');
		var select = $(this).parent().prev().prev();
		if ((placeholder.lastIndexOf("MODIFIER") != -1) || ((placeholder.lastIndexOf("SUPPRIMER") != -1))){
			select.attr('disabled','disabled');
			input.removeAttr('disabled');
			input.val('');
			placeholder = placeholder.replace("MODIFIER","AJOUTER");
			placeholder = placeholder.replace("SUPPRIMER","AJOUTER");
			input.attr('placeholder',placeholder);
			return false;
		}
		var valeurs = input.val();
		var table = input.attr('id');
		if (valeurs == '') {alert('paramètre vide !\nMerci d\'entrer un paramètre.');return false;}
		
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
			success: function(result){console.log(result);
				if (result.result == -1) {
					alert("Ce paramètre existe déjà sous le n°"+result.id);
				} else {
					alert("Nouveau paramètre enregistré sous le n°"+result.result);
				}
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	
	});
	
	$(".modifier").click(function () {
		var input = $(this).parent().prev('input');
		var placeholder = input.attr('placeholder');
		var select = $(this).parent().prev().prev();
		if ((placeholder.lastIndexOf("AJOUTER") != -1) || ((placeholder.lastIndexOf("SUPPRIMER") != -1))){
			select.removeAttr('disabled');
			input.removeAttr('disabled');
			input.val('');
			placeholder = placeholder.replace("AJOUTER","MODIFIER");
			placeholder = placeholder.replace("SUPPRIMER","MODIFIER");
			input.attr('placeholder',placeholder);
			return false;
		}
		var valeurs = select.val();
		var modif = input.val();
		var table = input.attr('id');
		if (modif == '') {alert('paramètre vide !\nMerci d\'entrer un paramètre.');return false;}
		
		var data = {
					type : 'modifier',
					table : table,
					valeurs : ''+valeurs+'',
					modif : ''+modif+''
				};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requeteenregistrenouveauparametre.php',
			data : data,
			success: function(result){
				if (result.result == -1) {
					alert(valeurs+" n'existe pas dans "+table);
				} else if (result.result == 1) {
					alert(valeurs+" modifié en "+modif+" dans "+table);
				} else {
					alert(valeurs+" supprimé.");
				}
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	});
	
	$(".supprimer").click(function () {
		var input = $(this).parent().prev('input');
		var placeholder = input.attr('placeholder');
		var select = $(this).parent().prev().prev();
		if ((placeholder.lastIndexOf("MODIFIER") != -1) || ((placeholder.lastIndexOf("AJOUTER") != -1))){
			select.removeAttr('disabled');
			input.attr('disabled','disabled');
			input.val('');
			placeholder = placeholder.replace("MODIFIER","SUPPRIMER");
			placeholder = placeholder.replace("AJOUTER","SUPPRIMER");
			input.attr('placeholder',placeholder);
			return false;
		}
		var valeurs = select.val();
		var table = input.attr('id');
		if (valeurs == '') {alert('paramètre vide !\nMerci d\'entrer un paramètre.');return false;}
		
		var data = {
					type : 'supprimer',
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
				if (result.result == -1) {
					alert(valeurs+" n'existe pas dans "+table);
				} else if (result.result == 0) {
					var liste = '';
					for (k in result.id) {
						liste += '\n'+result.id[k];
					}
					alert("Pour pouvoir supprimer "+valeurs+" dans "+table+"\nIl faut d'abord modifier :"+liste);
				} else {
					alert(valeurs+" supprimé.");
				}
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	
	});	
	
	</script>

    </body>
</html>                                