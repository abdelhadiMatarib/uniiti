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
	<form id="FormModifieUtilisateur" onsubmit="return Enregistrer();" action="<?php echo SITE_URL; ?>/includes/requetemodifieutilisateur.php" method="post" autocomplete="off">
		<div class="utilisateur_infospersos_body">
			<input name="id_contributeur" id="id_contributeur" type="hidden" value="<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];}?>"/>
			<span>Nom</span><div class="utilisateur_infospersos_input_nom"><input name="nom" id="nom" type="text" value="<?php if (!empty($_POST['nom_contributeur'])) {echo $_POST['nom_contributeur'];}?>"/></div>
			<span>Prénom</span><div class="utilisateur_infospersos_input_prenom"><input name="prenom" id="prenom" type="text" value="<?php if (!empty($_POST['prenom_contributeur'])) {echo $_POST['prenom_contributeur'];}?>"/></div>
			<span>Sexe</span><div class="utilisateur_infospersos_input_sexe"><input name="sexe" id="sexe" type="text" value="<?php if (!empty($_POST['sexe_contributeur'])) {echo $_POST['sexe_contributeur'];}?>"/></div>
			<span>Pseudo</span><div class="utilisateur_infospersos_input_pseudo"><input name="pseudo" id="pseudo" type="text" value="<?php if (!empty($_POST['pseudo_contributeur'])) {echo $_POST['pseudo_contributeur'];}?>"/></div>
			<span>Date de naissance</span><div class="utilisateur_infospersos_input_ddn"><input type="text" value="$DDN"/></div>
			<span>Code postal</span><div class="utilisateur_infospersos_input_code_postal"><input name="codepostal" id="codepostal" type="text" value="<?php if (!empty($_POST['cp_contributeur'])) {echo $_POST['cp_contributeur'];}?>"/></div>
			<span>Ville</span><div class="utilisateur_infospersos_input_ville"><input name="ville" id="ville" type="text" value="<?php if (!empty($_POST['ville_contributeur'])) {echo $_POST['ville_contributeur'];}?>"/></div>
			<span>Profession</span><div class="utilisateur_infospersos_input_profession"><input name="profession_contributeur" id="profession_contributeur" type="text" value="<?php if (!empty($_POST['profession_contributeur'])) {echo $_POST['profession_contributeur'];}?>"/></div>
			<span>Email</span><div class="utilisateur_infospersos_input_email"><input name="email_login" id="email_login" type="text" value="<?php if (!empty($_POST['email_login'])) {echo $_POST['email_login'];}?>"/></div>
			<span>Validation email</span><div class="utilisateur_infospersos_input_confirmemail"><input  name="email_login2" id="email_login2" type="text" value="<?php if (!empty($_POST['email_login'])) {echo $_POST['email_login'];}?>"/></div>
			<span>Mot de passe</span><div class="utilisateur_infospersos_input_mdp"><input name="mdp" id="mdp" type="password" value="<?php if (!empty($_POST['mdp'])) {echo $_POST['mdp'];}?>"/></div>
			<span>Validation mot de passe</span><div class="utilisateur_infospersos_input_confirmmdp"><input name="mdp2" id="mdp2" type="password" value="<?php if (!empty($_POST['mdp'])) {echo $_POST['mdp'];}?>"/></div>
			<span>Téléphone</span><div class="utilisateur_infospersos_input_tel"><input name="telephone_contributeur" id="telephone_contributeur" type="text" value="<?php if (!empty($_POST['telephone_contributeur'])) {echo $_POST['telephone_contributeur'];}?>"/></div>
		</div>
		<div class="suggestioncommerce_footer">
			<button type="submit" class="suggestioncommerce_valider_wrap"><a href="#">Modifier mes informations</a></button>
		</div>
	</form>
</div>
</html>

<script>
	// getElementById
	function $id(id) {return document.getElementById(id);}

	function Enregistrer () {

		var data = {
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
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieutilisateur.php',
			data : data,
			success: function(html){
				window.location.reload();
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
		return false;
	}	

</script>