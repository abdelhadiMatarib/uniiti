<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		$sql = "SELECT t1.prestation, t2.contenu, t2.prix FROM enseignes_prestations AS t1
					INNER JOIN enseignes_prestations_contenus AS t2
					ON t1.enseignes_id_enseigne = t2.enseignes_id_enseigne AND t1.id_type_info = t2.id_type_info 
					WHERE t1.enseignes_id_enseigne=:id_enseigne";
		$req = $bdd->prepare($sql);
		$req->bindParam(':id_enseigne', $_POST['id_enseigne'], PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Prestation[$row['prestation']][$row['contenu']] = $row['prix'];
		}
?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_menutarifs.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Prestation & Tarifs</span>
    </div>   
    <div class="menutarifs_body">
		<?php if (isset($Prestation)) { ?>
		<?php foreach ($Prestation as $prestation => $value) { ?>
		<div class="menutarifs_body_entrees">
			<div class="menutarifs_body_entrees_head">
				<span><?php echo $prestation; ?></span>
			</div>
			<?php foreach ($Prestation[$prestation] as $contenu => $prix) { ?>
            <div class="menutarifs_body_entrees_entree_generique"><span><?php echo $contenu; ?></span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span><?php echo $prix; ?>€</span></div>			
			<?php } ?>
		</div>
		<?php } ?>
		<?php } else {echo "<BR/><BR/><CENTER><b>Prestations non communiquées à ce jour.</b></CENTER>";}?>
<!--        <div class="menutarifs_body_entrees">
            <div class="menutarifs_body_entrees_head">
                <span>Suggestions d'entrées</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
        </div>
        <div class="menutarifs_body_plats">
            <div class="menutarifs_body_plats_head">
                <span>Suggestions de plats principaux</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
        </div>
        <div class="menutarifs_body_desserts">
            <div class="menutarifs_body_desserts_head">
                <span>Suggestions de desserts</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
            <div class="menutarifs_body_entrees_entree_generique"><span>En-K de caviar 15g accompagné de sa flûte de Champagne</span></div>
            <div class="menutarifs_body_entrees_prix_generique"><span>50€</span></div>
        </div>    -->
       
    </div>
</div>
</html>