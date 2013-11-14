<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';

		if (!empty($_POST['id_enseigne'])) {
			$id_enseigne_ou_objet = $_POST['id_enseigne'];
			$sql = "SELECT t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM enseignes_prestations AS t1
						INNER JOIN enseignes_prestations_contenus AS t2
						ON t1.enseignes_id_enseigne = t2.enseignes_id_enseigne AND t1.id_type_info = t2.id_type_info
						WHERE t1.enseignes_id_enseigne=:id_enseigne_ou_objet";		
		} else if (!empty($_POST['id_objet'])) {
			$id_enseigne_ou_objet = $_POST['id_objet'];
			$sql = "SELECT t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM objets_prestations AS t1
						INNER JOIN objets_prestations_contenus AS t2
						ON t1.objets_id_objet = t2.objets_id_objet AND t1.id_type_info = t2.id_type_info
						WHERE t1.objets_id_objet=:id_enseigne_ou_objet";		
		} else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		$req = $bdd->prepare($sql);
		$req->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$NomPrestation[$row['id_type_info']] = $row['prestation'];
			$Prestation[$row['id_type_info']][$row['id_contenu']] = $row['contenu'];
			$Prix[$row['id_type_info']][$row['id_contenu']] = $row['prix'];
		}
?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_menutarifs.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Prestations & Tarifs</span>
    </div>   
    <div class="menutarifs_body">
        <div class="menutarifs_body_entrees">
            <div class="menutarifs_body_entrees_head">
                <span><input id="prestation1" type="text" class="input_menustarifs" placeholder="Titre prestation 1" value="<?php if (isset($NomPrestation[7])) {echo $NomPrestation[7];} ?>"/></span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation11" type="text" class="input_menustarifs" placeholder="Contenu n°1" value="<?php if (isset($Prestation[7][1])) {echo $Prestation[7][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix11" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[7][1])) {echo $Prix[7][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation12" type="text" class="input_menustarifs" placeholder="Contenu n°2" value="<?php if (isset($Prestation[7][2])) {echo $Prestation[7][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix12" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[7][2])) {echo $Prix[7][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation13" type="text" class="input_menustarifs" placeholder="Contenu n°3" value="<?php if (isset($Prestation[7][3])) {echo $Prestation[7][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix13" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[7][3])) {echo $Prix[7][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation14" type="text" class="input_menustarifs" placeholder="Contenu n°4" value="<?php if (isset($Prestation[7][4])) {echo $Prestation[7][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix14" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[7][4])) {echo $Prix[7][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation15" type="text" class="input_menustarifs" placeholder="Contenu n°5" value="<?php if (isset($Prestation[7][5])) {echo $Prestation[7][5];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix15" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[7][5])) {echo $Prix[7][5];} ?>"/></span></div>
        </div>
        <div class="menutarifs_body_plats">
            <div class="menutarifs_body_plats_head">
                <span><input id="prestation2" type="text" class="input_menustarifs" placeholder="Titre prestation 2" value="<?php if (isset($NomPrestation[8])) {echo $NomPrestation[8];} ?>"/></span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation21" type="text" class="input_menustarifs" placeholder="Contenu n°1" value="<?php if (isset($Prestation[8][1])) {echo $Prestation[8][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix21" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[8][1])) {echo $Prix[8][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation22" type="text" class="input_menustarifs" placeholder="Contenu n°2" value="<?php if (isset($Prestation[8][2])) {echo $Prestation[8][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix22" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[8][2])) {echo $Prix[8][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation23" type="text" class="input_menustarifs" placeholder="Contenu n°3" value="<?php if (isset($Prestation[8][3])) {echo $Prestation[8][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix23" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[8][3])) {echo $Prix[8][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation24" type="text" class="input_menustarifs" placeholder="Contenu n°4" value="<?php if (isset($Prestation[8][4])) {echo $Prestation[8][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix24" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[8][4])) {echo $Prix[8][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation25" type="text" class="input_menustarifs" placeholder="Contenu n°5" value="<?php if (isset($Prestation[8][5])) {echo $Prestation[8][5];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix25" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[8][5])) {echo $Prix[8][5];} ?>"/></span></div>
        </div>
        <div class="menutarifs_body_desserts">
            <div class="menutarifs_body_desserts_head">
                <span><input id="prestation3" type="text" class="input_menustarifs" placeholder="Titre prestation 3" value="<?php if (isset($NomPrestation[9])) {echo $NomPrestation[9];} ?>"/></span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation31" type="text" class="input_menustarifs" placeholder="Contenu n°1" value="<?php if (isset($Prestation[9][1])) {echo $Prestation[9][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix31" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[9][1])) {echo $Prix[9][1];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation32" type="text" class="input_menustarifs" placeholder="Contenu n°2" value="<?php if (isset($Prestation[9][2])) {echo $Prestation[9][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix32" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[9][2])) {echo $Prix[9][2];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation33" type="text" class="input_menustarifs" placeholder="Contenu n°3" value="<?php if (isset($Prestation[9][3])) {echo $Prestation[9][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix33" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[9][3])) {echo $Prix[9][3];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation34" type="text" class="input_menustarifs" placeholder="Contenu n°4" value="<?php if (isset($Prestation[9][4])) {echo $Prestation[9][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix34" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[9][4])) {echo $Prix[9][4];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input id="prestation35" type="text" class="input_menustarifs" placeholder="Contenu n°5" value="<?php if (isset($Prestation[9][5])) {echo $Prestation[9][5];} ?>"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix35" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" placeholder="Prix" value="<?php if (isset($Prix[9][5])) {echo $Prix[9][5];} ?>"/></span></div>
        </div>
       
    </div>
    <div class="suggestioncommerce_footer">
        <div onclick="Enregistrer();" class="valider_dialog_large"><a href="#">Enregistrer</a></div>
    </div>
</div>
<script>
        function moveToNext(field,nextFieldID){
			if (field.value.length >= field.maxLength){document.getElementById(nextFieldID).focus();}
		}

	// getElementById
	function $id(id) {return document.getElementById(id);}
	
	function Enregistrer () {

		var id_enseigne = '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>';
		var id_objet = '<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];} ?>';
		var $type = '';
		if (id_enseigne != '') {$type = 'enseigne';}
		else if (id_objet != '') {$type = 'objet';}
		
		var dataprestations = {
						step : 'Prestations',
						id_enseigne : id_enseigne,
						id_objet : id_objet,
						prestation1 : $id('prestation1').value,
						prestation11 : $id('prestation11').value,prix11 : $id('prix11').value,
						prestation12 : $id('prestation12').value,prix12 : $id('prix12').value,
						prestation13 : $id('prestation13').value,prix13 : $id('prix13').value,
						prestation14 : $id('prestation14').value,prix14 : $id('prix14').value,
						prestation15 : $id('prestation15').value,prix15 : $id('prix15').value,
						prestation2 : $id('prestation2').value,
						prestation21 : $id('prestation21').value,prix21 : $id('prix21').value,
						prestation22 : $id('prestation22').value,prix22 : $id('prix22').value,
						prestation23 : $id('prestation23').value,prix23 : $id('prix23').value,
						prestation24 : $id('prestation24').value,prix24 : $id('prix24').value,
						prestation25 : $id('prestation25').value,prix25 : $id('prix25').value,
						prestation3 : $id('prestation3').value,
						prestation31 : $id('prestation31').value,prix31 : $id('prix31').value,
						prestation32 : $id('prestation32').value,prix32 : $id('prix32').value,
						prestation33 : $id('prestation33').value,prix33 : $id('prix33').value,
						prestation34 : $id('prestation34').value,prix34 : $id('prix34').value,
						prestation35 : $id('prestation35').value,prix35 : $id('prix35').value
					};
		console.log(dataprestations);
		var url = '';
		if ($type == 'enseigne') {url = siteurl+'/includes/requetemodifieenseigne.php';}
		else {url = siteurl+'/includes/requetemodifieobjet.php';}
		$.ajax({
			async : false,
			type :"POST",
			url : url,
			data : dataprestations,
			success: function(result){window.location.reload();},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}

</script>