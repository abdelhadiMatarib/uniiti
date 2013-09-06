<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
	include_once '../config/configuration.inc.php';
	// Connection à la base
	include_once '../config/configPDO.inc.php';

	// Réception données formulaire par method post
	$email_login            = htmlspecialchars($_POST['email_login']);            // Email login
	//$pseudo                 = htmlspecialchars($_POST['pseudo']);               // Pseudo
	$prenom                 = htmlspecialchars($_POST['prenom']);                 // Nom
	$nom                    = htmlspecialchars($_POST['nom']);                    // Prénom
	$date_naissance_jour    = htmlspecialchars($_POST['date_naissance_jour']);    // Date de naissance
	$date_naissance_mois    = htmlspecialchars($_POST['date_naissance_mois']);    // Date de naissance
	$date_naissance_annee   = htmlspecialchars($_POST['date_naissance_annee']);   // Date de naissance
	// $date_naissance         = $date_naissance_jour . "/" . $date_naissance_mois . "/" . $date_naissance_annee;
	$sexe                   = (int)$_POST['sexe'];                                // Date de naissance
	$password               = sha1($_POST['mdp']);                           	  // Mot de passe, hashé grâce à la fonction sha1()
	$ville                  = htmlspecialchars($_POST['ville']);                  // Ville
	$codepostal             = htmlspecialchars($_POST['codepostal']);             // Code postal
	$pays                   = htmlspecialchars($_POST['pays']);                   // Pays
	$telephone_contributeur = htmlspecialchars($_POST['telephone_contributeur']); // Telephone

	// Newsletter
	if(!empty($_POST['newsletter'])) {$newsletter_result = 1;} else {$newsletter_result = 0;}

	// Bonus
	if(!empty($_POST['bonus'])) {$bonus_result = 1;} else {$bonus_result = 0;}

	if($sexe == 0) {$photo = 'photo_contributeur_f.jpg';}
	else if($sexe == 1) {$photo = 'photo_contributeur_h.jpg';}
	else {$photo = 'photo_contributeur_n.jpg';}

	$certification  = 0;                                            // Certification
	$groupe_permission = 1;

	// Vérification si email exist                   A FAIRE EN ETAPE 1
	$sqlCheck = "SELECT email_contributeur
				 FROM contributeurs
				 WHERE email_contributeur = :email_login
				";

	$reqCheck = $bdd->prepare($sqlCheck);
	$reqCheck->bindParam(':email_login', $email_login, PDO::PARAM_STR);
	$reqCheck->execute();
	$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

	if ($resultCheck) {
		echo 'Cet email existe déjà<br />';
		echo 'Veuillez vous inscrire à nouveau :<br />';
		echo '<a href="inscription.php">S\'inscrire</a>';
	} else {
			// Preparation requete + execution pour enregistrement dans la base
			$req = $bdd->prepare('INSERT INTO contributeurs(email_contributeur,
															photo_contributeur, 
															prenom_contributeur, 
															nom_contributeur, 
															sexe_contributeur, 
															password_contributeur, 
															cp_contributeur, 
															ville_contributeur,
															pays_contributeur,
															telephone_contributeur,
															date_naissance_jour_contributeur, 
															date_naissance_mois_contributeur, 
															date_naissance_annee_contributeur,
															certification_contributeur, 
															reception_newsletter, 
															reception_bonus, 
															groupes_permissions_id_permission
															) 
											VALUES(
															:email_contributeur, 
															:photo_contributeur,
															:prenom_contributeur,  
															:nom_contributeur, 
															:sexe_contributeur, 
															:password_contributeur, 
															:cp_contributeur, 
															:ville_contributeur,
															:pays_contributeur,
															:telephone_contributeur,
															:date_naissance_jour_contributeur, 
															:date_naissance_mois_contributeur, 
															:date_naissance_annee_contributeur, 
															:certification_contributeur, 
															:reception_newsletter, 
															:reception_bonus, 
															:groupes_permissions_id_permission
													)');

			$req->bindParam(':email_contributeur', $email_login, PDO::PARAM_STR);
			//$req->bindParam(':pseudo_contributeur', $pseudo, PDO::PARAM_STR);
			$req->bindParam(':photo_contributeur', $photo, PDO::PARAM_STR);
			$req->bindParam(':prenom_contributeur', $prenom, PDO::PARAM_STR);
			$req->bindParam(':nom_contributeur', $nom, PDO::PARAM_STR);
			$req->bindParam(':sexe_contributeur', $sexe, PDO::PARAM_INT);
			$req->bindParam(':password_contributeur', $password, PDO::PARAM_STR);
			$req->bindParam(':cp_contributeur', $codepostal, PDO::PARAM_STR);
			$req->bindParam(':ville_contributeur', $ville, PDO::PARAM_STR);
			$req->bindParam(':pays_contributeur', $pays, PDO::PARAM_STR);
			$req->bindParam(':telephone_contributeur', $telephone_contributeur, PDO::PARAM_STR);
			$req->bindParam(':date_naissance_jour_contributeur', $date_naissance_jour, PDO::PARAM_INT);
			$req->bindParam(':date_naissance_mois_contributeur', $date_naissance_mois, PDO::PARAM_INT);
			$req->bindParam(':date_naissance_annee_contributeur', $date_naissance_annee, PDO::PARAM_INT);
			$req->bindParam(':certification_contributeur', $certification, PDO::PARAM_INT);
			$req->bindParam(':reception_newsletter', $newsletter_result, PDO::PARAM_INT);
			$req->bindParam(':reception_bonus', $bonus_result, PDO::PARAM_INT);
			$req->bindParam(':groupes_permissions_id_permission', $groupe_permission, PDO::PARAM_INT);
//			$req->execute();              ON DESACTIVE POUR NE PAS POLLUER LA BASE DE PROD

			if($req) {}
			else {}				// ERREUR A GERER
			$req->closeCursor();		// Ferme la connexion du serveur
	}
	$reqCheck->closeCursor();
	$bdd = null;					// Détruit l'objet PDO
	?>		
		
    <body>
        <div class="biggymarginer">
        <div class="big_wrapper">
            <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_fields_left inscription_final_step_left">
                <div class="inscription_final_step_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user_created.png" height="197" width="190" title="" alt="" /></div>
                <div class="inscription_final_step_txt_container">
					<span class="inscription_final_step_texte_highlight1">Bravo !</span>
					<span class="inscription_final_step_texte_highlight2">Votre compte</span><span class="inscription_final_step_texte_highlight2">est créé</span>
					<span class="inscription_final_step_texte_highlight3">Vous voyez, cela n'était pas si long !</span>
                </div>
            </div>
            <div class="inscription_fields_left inscription_final_step_right"><div class="AbsoluteCenter"><a href="<?php echo SITE_URL?>"><span class="inscription_final_step_right_texte">Retour à la</span><span class="inscription_final_step_right_texte_highlight">page d'accueil</span></a></div></div>
            <div class="containing_rondou"><div class="inscription_final_step_rondou"><span>Ou</span></div></div>
            <div class="inscription_fields_left inscription_final_step_right2"><div class="AbsoluteCenter"><a href="utilisateur.php"><span class="inscription_final_step_right_texte">Accéder à</span><span class="inscription_final_step_right_texte_highlight">votre profil</span></a></div></div>
        </div><!-- FIN BIG WRAPPER -->
        </div><!-- FIN BIGGY -->
    </body>
</html>
