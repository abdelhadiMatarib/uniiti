<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';?>

<div class="utilisateur_infospersos_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="utilisateur_infospersos_head">
        <div class="utilisateur_infospersos_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/infospersos_icon_user.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Informations personnelles</span>
    </div>
	<form id="FormModifieUtilisateur" onsubmit="return VerifieEtErg();" action="<?php echo SITE_URL; ?>/includes/requetemodifieutilisateur.php" method="post" autocomplete="off">
		<div class="utilisateur_infospersos_body">
			<input type="hidden" name="changemdp" value="0" />
			<input name="id_contributeur" id="id_contributeur" type="hidden" value="<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];}?>"/>
			<span>Nom *</span><div class="utilisateur_infospersos_input_nom"><input required="required" name="nom" id="nom" type="text" value="<?php if (!empty($_POST['nom_contributeur'])) {echo $_POST['nom_contributeur'];}?>"/></div>
			<span>Prénom *</span><div class="utilisateur_infospersos_input_prenom"><input required="required" name="prenom" id="prenom" type="text" value="<?php if (!empty($_POST['prenom_contributeur'])) {echo $_POST['prenom_contributeur'];}?>"/></div>
			<span>Sexe</span><div class="utilisateur_infospersos_input_sexe">
				<input type="hidden" name="sexe" id="sexe" value="<?php if (!empty($_POST['sexe_contributeur'])) {echo $_POST['sexe_contributeur'];}?>"/>
				<div class="utilisateur_infospersos_sexe_button inscription_field_sexe_button_h" id="button_homme">Homme</div>
				<div class="utilisateur_infospersos_sexe_button inscription_field_sexe_button_f" id="button_femme">Femme</div>
			</div>
                        
			<span>Pseudo</span><div class="utilisateur_infospersos_input_pseudo"><input name="pseudo" id="pseudo" type="text" value="<?php if (!empty($_POST['pseudo_contributeur'])) {echo $_POST['pseudo_contributeur'];}?>"/></div>
			<span>Date de naissance *</span><div class="utilisateur_infospersos_input_ddn">
				<select required="required" name="date_naissance_jour" id="date_naissance_jour" class="utilisateur_infospersos_input_date" required="required">
					<option>Jour...</option>
					<?php 
					for ($jour = 1; $jour < 32; $jour++) {
						if ($jour == $_POST['date_naissance_jour']) {echo '<option selected="selected" value="'. $jour .'">'. $jour .'</option>';}
						else {echo '<option value="'. $jour .'">'. $jour .'</option>';}
					} 
					?>
				</select>
				<select required="required" name="date_naissance_mois" id="date_naissance_mois" class="utilisateur_infospersos_input_date" required="required">
					<option>Mois...</option>
					<?php 
					for ($mois = 1; $mois < 13; $mois++) {
						if ($mois == $_POST['date_naissance_mois']) {echo '<option selected="selected" value="'. $mois .'">'. $mois .'</option>';}
						else {echo '<option value="'. $mois .'">'. $mois .'</option>';}
					} 
					?>
				</select>
				<select required="required" name="date_naissance_annee" id="date_naissance_annee" class="utilisateur_infospersos_input_date" required="required">
					<option>Année...</option>
					<?php
					for ($annee = date('Y') ; $annee >= (date('Y')-120); $annee--) {
						if ($annee == $_POST['date_naissance_annee']) {echo '<option selected="selected" value="'. $annee .'">'. $annee .'</option>';}
						else {echo '<option value="'. $annee .'">'. $annee .'</option>';}
					} 
					?>
				</select>
			</div>
			<span>Code postal *</span><div class="utilisateur_infospersos_input_code_postal"><input required="required" name="codepostal" id="codepostal" type="text" value="<?php if (!empty($_POST['cp_contributeur'])) {echo $_POST['cp_contributeur'];}?>"/></div>
			<span>Ville</span><div class="utilisateur_infospersos_input_ville"><input name="ville" id="ville" type="text" value="<?php if (!empty($_POST['ville_contributeur'])) {echo $_POST['ville_contributeur'];}?>"/></div>
			<span>Profession</span><div class="utilisateur_infospersos_input_profession"><input name="profession_contributeur" id="profession_contributeur" type="text" value="<?php if (!empty($_POST['profession_contributeur'])) {echo $_POST['profession_contributeur'];}?>"/></div>
			<span>Email *</span><div class="utilisateur_infospersos_input_email"><input required="required" name="email_login" id="email_login" type="text" value="<?php if (!empty($_POST['email_login'])) {echo $_POST['email_login'];}?>"/></div>
			<span>Validation email *</span><div class="utilisateur_infospersos_input_confirmemail"><input required="required" name="email_login2" id="email_login2" type="text" value="<?php if (!empty($_POST['email_login'])) {echo $_POST['email_login'];}?>"/></div>
			<span>Mot de passe</span>
			<div class="utilisateur_infospersos_input_mdp">
				<input name="mdpvisible" id="mdpvisible" type="password" placeholder="**********" value=""/>
				<input type="hidden" name="mdp" id="mdp" value="<?php if (!empty($_POST['mdp'])) {echo $_POST['mdp'];}?>"/>
			</div>
			<span>Validation mot de passe</span>
			<div class="utilisateur_infospersos_input_confirmmdp">
				<input name="mdp2visible" id="mdp2visible" type="password" placeholder="**********" value=""/>
				<input type="hidden" name="mdp2" id="mdp2" value="<?php if (!empty($_POST['mdp'])) {echo $_POST['mdp'];}?>"/>
			</div>
			<span>Téléphone</span><div class="utilisateur_infospersos_input_tel"><input name="telephone_contributeur" id="telephone_contributeur" type="text" value="<?php if (!empty($_POST['telephone_contributeur'])) {echo $_POST['telephone_contributeur'];}?>"/></div>
		</div>
		<div class="suggestioncommerce_footer">
			<button role="button" type="submit" class="suggestioncommerce_valider_wrap">Modifier mes informations</button>
		</div>
	</form>
</div>

<script>
	// Boutons choix sexe formulaire d'inscription
	var sexe = <?php if (isset($_POST['sexe_contributeur'])) {echo $_POST['sexe_contributeur'];}?>;
	if (sexe == 1) {$('#sexe').val(1);$('.inscription_field_sexe_button_h').toggleClass('inscription_field_sexe_bg');}
	else if (sexe == 0) {$('#sexe').val(0);{$('.inscription_field_sexe_button_f').toggleClass('inscription_field_sexe_bg');}}
	else {$('#sexe').val(2);}
	$('#button_homme').click(function() {
		$('.inscription_field_sexe_button_f').removeClass('inscription_field_sexe_bg');
		$('.inscription_field_sexe_button_h').toggleClass('inscription_field_sexe_bg');
		if ($('#sexe').val() == 1) {$('#sexe').val(2);}
		else {$('#sexe').val(1);}
	});
	$('#button_femme').click(function() {
		$('.inscription_field_sexe_button_h').removeClass('inscription_field_sexe_bg');
		$('.inscription_field_sexe_button_f').toggleClass('inscription_field_sexe_bg');
		if ($('#sexe').val() == 0) {$('#sexe').val(2);}
		else {$('#sexe').val(0);}
	});
	
	// getElementById
	function $id(id) {return document.getElementById(id);}

	function VerifEmail(email) {
		var place = email.indexOf("@",1);
		var point = email.indexOf(".",place+1);
		if ((place > -1)&&(email.length >2)&&(point > 1))	{return true;}
		else {return false;}
	}

	function VerifieEtErg() {
		var changemdp = 0;
		var email = '<?php echo $_POST['email_login']; ?>';
		var emailexiste = -1;
		if ($id("mdpvisible").value != '') {changemdp = 1;$id("mdp").value = $id("mdpvisible").value;}
		if ($id("mdp2visible").value != '') {changemdp = 1;$id("mdp2").value = $id("mdp2visible").value;}
		if ($id("mdp").value != $id("mdp2").value) {alert("les deux mots de passe ne correspondent pas");return false;}
		if ($id("email_login").value != $id("email_login2").value) {alert("les deux emails ne correspondent pas");return false;}
		if (!VerifEmail($id("email_login").value)) {alert("format de l'email invalide");return false;}
		
		if ($id("email_login").value != email) {
			$.ajax({
				async : false,
				type :"POST",
				url : siteurl+'/includes/requetecheckemail.php',
				data : {email : ''+$id("email_login").value+''},
				success: function(result){
					if (result.result == 1) {
						alert("Cet email existe déjà.");
						emailexiste = 1;						
					}
				},
				error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetecheckemail.php');}
			});
		}
		if (emailexiste == -1) {
			var data = {
							'changemdp' : changemdp,
							id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
							nom : $id("nom").value,
							prenom : $id("prenom").value,
							sexe : $id("sexe").value,
							pseudo : $id("pseudo").value,
							'date_naissance_jour' : $id("date_naissance_jour").value,
							'date_naissance_mois' : $id("date_naissance_mois").value,
							'date_naissance_annee' : $id("date_naissance_annee").value,
							codepostal : $id("codepostal").value,
							ville : $id("ville").value,
							profession_contributeur : $id("profession_contributeur").value,
							'email_login' : $id("email_login").value,
							mdp : $id("mdp").value,
							telephone_contributeur : $id("telephone_contributeur").value,
						};
			$.ajax({
				async : false,
				type :"POST",
				url : siteurl+'/includes/requetemodifieutilisateur.php',
				data : data,
				success: function(result){
					ActualisePopin({id_contributeur:result.result}, '/includes/popins/utilisateur_interface_infos_persos_valide.tpl.php', 'default_dialog');
				},
				error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetemodifieutilisateur.php');}
			});
		}
		return false;
	}	

</script>