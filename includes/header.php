<!--[if lt IE 9]>
    <p class="chromeframe">Vous <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<?php
	$sql = "SELECT * FROM villes ORDER BY id_ville ASC";
	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
		
	if(!isset($_SESSION['SESS_MEMBER_ID'])) {$Connecte = false;}
	else {$Connecte = true;}
	if ($Connecte) {

		$sql_header_contrib = "SELECT photo_contributeur, prenom_contributeur, nom_contributeur
							   FROM contributeurs
							   WHERE id_contributeur = :id_contributeur
							  ";

		$req_header_contrib = $bdd->prepare($sql_header_contrib);

		$id_contributeurActif = $_SESSION['SESS_MEMBER_ID'];
		$req_header_contrib->bindParam(':id_contributeur', $id_contributeurActif, PDO::PARAM_INT);

		$req_header_contrib->execute();
		$result_header_contrib = $req_header_contrib->fetch(PDO::FETCH_ASSOC);
		
		$photo_contributeurActif  = $result_header_contrib['photo_contributeur'];
		$prenom_contributeurActif = $result_header_contrib['prenom_contributeur'];
		$nom_contributeurActif = $result_header_contrib['nom_contributeur'];
		
		$req_header_contrib->closeCursor();    // Ferme la connexion du serveur
		
		if ((int)$_SESSION['droits'] & PROFESSIONNEL) {
			$sqlenseigne = "SELECT id_enseigne, nom_enseigne FROM enseignes WHERE professionnels_id_pro = :id_contributeur";
			$reqenseigne = $bdd->prepare($sqlenseigne);
			$reqenseigne->bindParam(':id_contributeur', $id_contributeurActif, PDO::PARAM_INT);
			$reqenseigne->execute();
			$resultenseigne = $reqenseigne->fetchAll(PDO::FETCH_ASSOC);
			$reqenseigne->closeCursor();    // Ferme la connexion du serveur
		}
	}
?>


<!-- DEBUT DU HEADER -->
<div class="overlay"></div>
<div class="header">
    <div class="big_wrapper">
    <header>
   		<form id="FormRechercheAvancee" action="<?php echo SITE_URL; ?>/timeline.php" method="post"  autocomplete="off">
			<div class="header_leftnav">

				<div class="header_button_menu">
					<button type="button"></button>
					<div id="header_menu_left" class="header_infos_menulist">
						<ul>
							<li><a href="#">Comment ça marche ?</a></li>
							<li><a href="#">Uniiti c'est quoi ?</a></li>
							<li><a href="#">Uniiti pour les pros</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				
				</div>
				<div class="header_searchbar1">
					<input id="inputSearch1" type="text" value="" placeholder="Restaurant, boulangerie"/>
					<input id="inputSearch1Hidden" type="hidden" value=""/>
					<div class="suggestionsContainer display-none" id="suggestionsContainer1"><ul class="suggestionList" id="suggestionList1"><li>&nbsp;</li></ul></div>
				</div>
				<div class="header_searchbar2">
					<input id="inputSearch2" type="text" value="" placeholder="Paris 15ème, Tour Eiffel"/>
					<input id="inputSearch2Hidden" type="hidden" value=""/>
					<div class="suggestionsContainer display-none" id="suggestionsContainer2"><ul class="suggestionList" id="suggestionList2"><li>&nbsp;</li></ul></div>
				</div>
				<div class="header_button_plus" id="recherche_avancee_button"><button title="Champ de recherche avancée" type="button">+</button></div>
				<input type="hidden" name="filtre_avance" id="filtre_avance" value="1" />
				<input type="hidden" name="quoi" id="quoi" value="" />
				<input type="hidden" name="lieu" id="lieu" value="" />
				<div id="ButtonFiltre" class="header_button_search"><button type="submit"></button></div>
			</div>
		</form>

        <div class="header_logo">
            <a href="<?php echo SITE_URL . "/timeline.php"; ?>"></a>
        </div>

        <div class="header_rightnav">

            <div class="header_yourcity">
                <div class="header_button_ville"><button type="button"></button></div>
				<div id="header_choixvilles2" style="float:left;">
					<aside>Votre ville</aside>
					<div class="header_choixvilles">
						<a href="#" id="inputSearch5">Paris</a>
						<input id="inputSearch5Hidden" type="hidden" value=""/>
					</div>
					<div class="header_flechebas"></div>
				</div>
				<div class="suggestionsContainer display-none" id="suggestionsContainer5">	
					<ul class="suggestionList" id="suggestionList5">
					<?php foreach ($result as $row) {
						echo '<li id="ville' . $row['id_ville'] . '" value="' . $row['id_ville'] . '">' . $row['nom_ville'] . '</li>';
					} ?>
					</ul>
				</div>
            </div>

            <div class="header_user">
                <?php if ($Connecte) { ?><div class="header_img_container"><img src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $photo_contributeurActif;?>" title="" alt="" height="30" width="30"/></div><?php } ?>
                <div class="header_usermenu">
					<a id="header_usermenu" href="#" <?php if (!$Connecte) { ?>onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');"<?php } ?>>
						<?php if ($Connecte) {echo $prenom_contributeurActif . " " . $nom_contributeurActif;} else {echo "Inscription | Connexion";}?>
					</a>
				</div>
				<?php if ($Connecte) { ?>
                <div id="header_flechebas_usermenu" class="header_flechebas"><a id="header_usermenu2" href="#"></a></div>
				<?php } ?>
            </div>
				<?php if ($Connecte) { ?>
            <div id="header_menu" class="header_user_menulist">
            <div id="fleche_haut"></div>
                <ul>
                    <li><a href="<?php echo SITE_URL . "/pages/utilisateur_interface.php?id_contributeur=" . $_SESSION['SESS_MEMBER_ID'];?>" title="">Mon profil perso</a></li>
					<?php if (((int)$_SESSION['droits'] & $_SESSION['ADMINISTRATEUR']) && (($_SESSION['SESS_MEMBER_ID'] == 2825) || ($_SESSION['SESS_MEMBER_ID'] == 4866))) { ?>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_index.php"; ?>" title="">Dashboard</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=2">Passer Professionnel</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=1">Passer Contributeur</a></li>
					<?php } ?>
					<?php if (((int)$_SESSION['droits'] & $_SESSION['PROFESSIONNEL']) && (($_SESSION['SESS_MEMBER_ID'] == 2825) || ($_SESSION['SESS_MEMBER_ID'] == 4866))) { ?>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_index.php"; ?>" title="">Dashboard</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=8">Passer Administrateur</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=1">Passer Contributeur</a></li>
					<?php } ?>
					<?php if (((int)$_SESSION['droits'] & $_SESSION['CONTRIBUTEUR']) && (($_SESSION['SESS_MEMBER_ID'] == 2825) || ($_SESSION['SESS_MEMBER_ID'] == 4866))) { ?>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_index.php"; ?>" title="">Dashboard</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=8">Passer Administrateur</a></li>
						<li><a href="<?php echo SITE_URL;?>/acces/ChangeDroit.php?droit=2">Passer Professionnel</a></li>
					<?php } ?>
					<?php if ((int)$_SESSION['droits'] & $_SESSION['ADMINISTRATEUR']) { ?>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_gestion_commerce.php"; ?>" title="">Gérer les commerces</a></li>
						<li><a href="<?php echo SITE_URL . "/pages/commerce_interface.php?id_enseigne=0"; ?>">Créer un commerce</a></li>
						<li><a href="<?php echo SITE_URL . "/pages/utilisateur_interface.php?id_contributeur=0"; ?>">Créer un contributeur</a></li>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_ajout_avis.php"; ?>">Ajouter un avis</a></li>
						<li><a href="<?php echo SITE_URL . "/pages/dashboard_parametres.php"; ?>" title="">Paramètres</a></li>
					<?php } ?>
					<?php if (isset($resultenseigne)) {
						foreach ($resultenseigne as $row) { ?>
                    <li><a href="<?php echo SITE_URL . "/pages/commerce_interface.php?id_enseigne=" . $row['id_enseigne']; ?>" title=""><?php echo $row['nom_enseigne']; ?></a></li>
					<?php }} ?>
                    <li><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/suggestion_commerce.tpl.php', 'default_dialog');">Suggérer un commerce</a></li>
                    <li><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/suggestion_objet.tpl.php', 'default_dialog');">Suggérer un objet</a></li>
                 	<hr />
                    <li><a href="<?php echo SITE_URL . "/acces/logout.php" ?>" title="">Déconnexion</a></li>
                </ul>
            </div>
				<?php } ?>
        </div>
        
    </header>
    </div>
</div>
<div class="recherche_avancee_wrapper"></div>

<!-- FIN DU HEADER -->
