<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';

		if (!empty($_POST['id_enseigne'])) {
			$id_enseigne_ou_objet = $_POST['id_enseigne'];
			    $sql = "SELECT t1.id_enseignes_prestations, t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM enseignes_prestations AS t1
						INNER JOIN enseignes_prestations_contenus AS t2
						ON t1.id_enseignes_prestations = t2.id_prestation 
						WHERE t1.enseignes_id_enseigne=:id_enseigne_ou_objet";	
		} else if (!empty($_POST['id_objet'])) {
			$id_enseigne_ou_objet = $_POST['id_objet'];
			$sql = "SELECT t1.prestation, t2.contenu, t2.prix FROM objets_prestations AS t1
						INNER JOIN objets_prestations_contenus AS t2
						ON t1.objets_id_objet = t2.objets_id_objet AND t1.id_type_info = t2.id_type_info
						WHERE t1.objets_id_objet=:id_enseigne_ou_objet";		
		} else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		$req = $bdd->prepare($sql);
		$req->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
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
		<?php } else {
            echo "<BR/><BR/><CENTER><img src='../img/pictos_commerces/noncommuniquees.png'></img></CENTER>";?>
            <script>
                $('.menutarifs_body').css('height','230px').css('overflow-y','hidden').css('background-color','rgb(235, 235, 235)');
            </script>
        <?php } ?>
	</div>
</div>
</html>