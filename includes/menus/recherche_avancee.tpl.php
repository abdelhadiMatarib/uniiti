        <?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';

		$sql = "SELECT * FROM villes";
		$req = $bdd->prepare($sql);
		$req->execute();
		$resultville = $req->fetchAll(PDO::FETCH_ASSOC);
		
		$sql = "SELECT * FROM categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien1Categories[$row['id_categorie']] = $row['categorie_principale'];
			$PosCategoriesx[$row['id_categorie']] = $row['posx'];
			$PosCategoriesy[$row['id_categorie']] = $row['posy'];
		}
		$sql = "SELECT * FROM sous_categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien2Categories[$row['id_categorie']][$row['id_sous_categorie']] = $row['sous_categorie'];
			$PosSousCategoriesx[$row['id_sous_categorie']] = $row['posx'];
			$PosSousCategoriesy[$row['id_sous_categorie']] = $row['posy'];
		}
		$sql = "SELECT * FROM sous_categories2";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien3Categories[$row['id_categorie']][$row['id_sous_categorie']][$row['id_sous_categorie2']] = $row['sous_categorie2'];
			$PosSousCategories2x[$row['id_sous_categorie2']] = $row['posx'];
			$PosSousCategories2y[$row['id_sous_categorie2']] = $row['posy'];
		}

		$sql = "SELECT * FROM budget ORDER BY id_budget ASC";
		$req = $bdd->prepare($sql);
		$req->execute();
		$resultbudget = $req->fetchAll(PDO::FETCH_ASSOC);		
		
		
		?>
    <div class="recherche_avancee_left">
        
            <span class="recherche_avancee_1">Je recherche un 
                <ul>
                    <div class="recherche_text_val"><span>Près de ?</span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_commerce" href="#" title="">Commerce ou objet</a></li>
                    
                    <div class="recherche_avancee_menu recherche_type">
                        <li class="recherche_avancee_item">
                            <a class="recherche_mot_inactif" href="#" title="" val="commerce">Commerce</a>
                            <div class="recherche_picto_container"></div>
                        </li>
                        <li class="recherche_avancee_item">
                            <a class="recherche_mot_inactif" href="#" title="" val="objet">Objet</a>
                            <div class="recherche_picto_container"></div>
                        </li>
                    </div>
                </ul>
            </span>

            <span class="recherche_avancee_2">près de 
                <ul>
                    <div class="recherche_text_val"><span>Catégorie ?</span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_lieu" href="#" title="">Lieu</a></li>
                    
                    <div class="recherche_avancee_menu recherche_lieu">
						<?php foreach ($resultville as $row) { ?>
							<li class="recherche_avancee_item"><a val="<?php echo $row['id_ville']; ?>" class="recherche_mot_inactif" href="#" title=""><?php echo $row['nom_ville']; ?></a><div class="recherche_picto_container"></div></li>
						<?php } ?>
                    </div>
                </ul>
            </span>
        
            <span class="recherche_avancee_3">dans la catégorie 
                <ul>
                    <div class="recherche_text_val"><span>Sous-catégorie ?</span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_categorie" href="#" title="">Catégorie</a></li>
					
					<div class="recherche_avancee_menu recherche_categorie">
					<?php foreach ($Lien1Categories as $Key => $Categorie) { ?>
					<li class="recherche_avancee_item cat<?php echo $Key ?>"><a val="<?php echo $Key ?>" class="recherche_mot_inactif" href="#" title=""><?php echo $Categorie ?></a><div class="recherche_picto_container" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $PosCategoriesx[$Key] . "px" . " " . $PosCategoriesy[$Key] . "px"?>"></div></li>
					<?php } ?>
					</div>
                </ul>       
            </span>
            <span class="recherche_avancee_4">et la sous-catégorie 
                <ul>
                    <div class="recherche_text_val"><span>+ Précisément ?</span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_sous_categorie" href="#" title="">Sous catégorie</a></li>
                    
                    <div class="recherche_avancee_menu recherche_sous_categorie">
					<?php foreach ($Lien2Categories as $Key => $Categorie) { 
							foreach ($Lien2Categories[$Key] as $Key2 => $SousCategorie) { ?>
					<li class="recherche_avancee_item cat<?php echo $Key ?> sscat<?php echo $Key2 ?>"><a val="<?php echo $Key2 ?>" class="recherche_mot_inactif" href="#" title=""><?php echo $SousCategorie ?></a><div class="recherche_picto_container" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $PosSousCategoriesx[$Key2] . "px" . " " . $PosSousCategoriesy[$Key2] . "px"?>"></div></li>
					<?php   }
						  }	?>
                    </div>
                </ul>
            </span>
            <span class="recherche_avancee_5">et plus précisement
                <ul>
                    <div class="recherche_text_val"><span>Prix ?</span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_sous_sous_categorie" href="#" title="">Plus précisément</a></li>
                    
                    <div class="recherche_avancee_menu recherche_sous_sous_categorie">
					<?php foreach ($Lien3Categories as $Key => $Categorie) {
							foreach ($Lien3Categories[$Key] as $Key2 => $SousCategorie) {
								foreach ($Lien3Categories[$Key][$Key2] as $Key3 => $SousCategorie2) { ?>
					<li class="recherche_avancee_item cat<?php echo $Key ?> sscat<?php echo $Key2 ?>"><a val="<?php echo $Key3 ?>" class="recherche_mot_inactif" href="#" title=""><?php echo $SousCategorie2 ?></a><div class="recherche_picto_container" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $PosSousCategories2x[$Key3] . "px" . " " . $PosSousCategories2y[$Key3] . "px"?>"></div></li>
					<?php		}
							}
						  }	?>
                    </div>
                </ul>        
            </span>
            <span class="recherche_avancee_6">pour un prix 
                <ul>
                    <div class="recherche_text_val"><span></span></div>
                    <li><a class="recherche_mot_actif recherche_avancee_prix" href="#" title="">de niveau</a></li>
                    
                    <div class="recherche_avancee_menu recherche_prix">
						<?php foreach ($resultbudget as $row) { ?>
							<li class="recherche_avancee_item"><a val="<?php echo $row['id_budget']; ?>" class="recherche_mot_inactif" href="#" title=""><?php echo $row['budget_enseigne']; ?></a><div class="recherche_picto_container"></div></li>
						<?php } ?>
                    </div>
                </ul>
            </span>


    </div>
    
<div class="recherche_avancee_position_wrap">
    <div class="recherche_avancee_current_txt"><span>Recherche ?</span></div>
    <div class="recherche_avancee_position_guidelines"></div>
    <div class="recherche_overlay_current_status"></div>
	<form id="FormRechercheAvancee" onsubmit="return AfficheChoix();" action="<?php echo SITE_URL; ?>/timeline.php" method="post"  autocomplete="off">
		<input type="hidden" name="filtre_avance" id="filtre_avance" value="1" />
		<input type="hidden" name="type" id="type" value="" />
		<input type="hidden" name="id_ville" id="id_ville" value="" />
		<input type="hidden" name="categorie" id="categorie" value="" />
		<input type="hidden" name="scategorie" id="scategorie" value="" />
		<input type="hidden" name="sscategorie" id="sscategorie" value="" />
		<input type="hidden" name="id_budget" id="id_budget" value="" />
		<button type="submit" class="recherche_avancee_search_button" filtre="recherche avancée"></button>
	</form>
    <div class="cursor_recherche"></div>
    <div class="recherche_avancee_right_cliquez_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/cliquezici.png" title="" alt="" height="41" width="115"/></div>

</div>
<div class="close_button_cdr"></div>
<script>

	var MotsActifs = new Array;
	var Compteur = 1;
	$('.recherche_mot_actif').each(function () {
		MotsActifs[Compteur++] = $(this).text();
	});

	function AfficheChoix() {
		var data = {provenance : 'all'};
		$('.recherche_mot_actif').each(function () {
			if ($(this).parent().parent().find('.text_selected').length > 0) {
				var valeur = $(this).attr('val');
				var classe = $(this).parent().parent().parent().attr('class');
				switch (classe) {
					case 'recherche_avancee_1' :
					data = $.extend(data, {type : valeur});
					$('#type').val(valeur);
					break;
					case 'recherche_avancee_2' :
					data = $.extend(data, {id_ville : valeur});
					$('#id_ville').val(valeur);
					break;
					case 'recherche_avancee_3' :
					data = $.extend(data, {categorie : valeur});
					$('#categorie').val(valeur);
					break;
					case 'recherche_avancee_4' :
					data = $.extend(data, {scategorie : valeur});
					$('#scategorie').val(valeur);
					break;
					case 'recherche_avancee_5' :
					data = $.extend(data, {sscategorie : valeur});
					$('#sscategorie').val(valeur);
					break;
					case 'recherche_avancee_6' :
					data = $.extend(data, {id_budget : valeur});
					$('#id_budget').val(valeur);
					break;					
				}
			}
		});
		console.log(data);
		$('.close_button_cdr').click();
		var $Page = window.location.pathname;
		$Page = $Page.substring($Page.lastIndexOf("/")+1, $Page.length);
		if ($Page == "timeline.php") {
			SetFiltre(data, $('.recherche_avancee_search_button'));
			return false;
		}
		else {return true;}
	}
	
	function filterAdvanced(){
		$('.recherche_categorie li').click(function(){
			$('.recherche_sous_categorie li').hide();
		   $('.recherche_sous_categorie li.'+$(this).attr('class').split(' ')[1]).show('slideUp');
		});
		$('.recherche_sous_categorie li').click(function(){
			$('.recherche_sous_sous_categorie li').hide();
		   $('.recherche_sous_sous_categorie li.'+$(this).attr('class').split(' ')[1]+'.'+$(this).attr('class').split(' ')[2]).show('slideUp');
		});
	}
	filterAdvanced();



	$('.close_button_cdr').click(function(){
			$('.recherche_avancee_wrapper').slideUp(300);
			$('.overlay').fadeOut();
	});
	$('.overlay').click(function(){
		$('.recherche_avancee_wrapper').slideUp(300);
			$(this).fadeOut();
		
	});
	// CLICS MENU DÉROULANT RECHERCHE AVANCÉE

	// désaffichage de la phrase au début
	$('span.recherche_avancee_2,span.recherche_avancee_3,span.recherche_avancee_4,span.recherche_avancee_5,span.recherche_avancee_6,.recherche_avancee_right').css('display','none');

	// au clic sur l'élément choisit dans la phrase
	$('.recherche_mot_actif').click(function(e){
		e.preventDefault();
		$(this).parent().parent().parent().parent().find('.recherche_avancee_menu').removeClass('menu_selected').slideUp();
		$(this).parent().next().addClass('menu_selected').slideDown();
		//$(this).parent().parent().parent().find('.recherche_avancee_menu').slideUp();
	});

	// au clic sur un des éléments dans la liste
	$('.recherche_mot_inactif').click(function(){
		var choix = $(this).text();
		var currentTxt = $(this).parent().parent().parent().find('.recherche_text_val').text();
		$('.recherche_avancee_current_txt span').text(currentTxt);
		$(this).parent().parent().find('.recherche_picto_container').removeClass('picto_selected');
		$(this).parent().parent().find('.recherche_mot_inactif').removeClass('text_selected');
		$(this).next().addClass('picto_selected');
		$(this).addClass('text_selected');
		$(this).parent().parent().parent().find('.recherche_mot_actif').text(choix);
		$(this).parent().parent().parent().find('.recherche_mot_actif').attr('val', $(this).attr('val'));
		$(this).parent().parent().slideUp();

		$(this).parent().parent().parent().parent().next('span:first').slideDown();
		var affiche = initnext = true;
		var actuel = $(this).parent().parent().parent().parent().next('span:first');
		var compte = 1;
		$('.recherche_text_val').parent().parent().each(function () {
			if ($(this).attr('class') == actuel.attr('class')) {affiche = false;}
			if (!affiche) {
				if (!initnext) {$(this).slideUp();}
				else {initnext = false;}
				$(this).find('.recherche_mot_actif').text(MotsActifs[compte]);
				$(this).find('.recherche_mot_actif').attr('val', '');
				$(this).find('.recherche_picto_container').removeClass('picto_selected');
				$(this).find('.recherche_mot_inactif').removeClass('text_selected');
			}
			compte++;
		});
	});

	// déplacement du curseur + overlay bleu au choix lié
	$('.recherche_type a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "82px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "101px"}, 500)
	});
	$('.recherche_lieu a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "152px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "172px"}, 500)
	});
	$('.recherche_categorie a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "222px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "243px"}, 500)
	});
	$('.recherche_sous_categorie a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "294px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "314px"}, 500)
	});
	$('.recherche_sous_sous_categorie a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "365px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "385px"}, 500)
	});
	$('.recherche_prix a.recherche_mot_inactif').click(function(){
		$('.cursor_recherche').animate({left: "365px"}, 500);
		$('.recherche_overlay_current_status').animate({width: "415px"}, 500)
	});

	// Affichage du 'cliquez ici' à la fin
	/*$('.recherche_prix li a').click(function(e){
		e.preventDefault();
		$('.recherche_avancee_right_cliquez_wrap').slideDown();
	});*/

	// CHAMPS DE RECHERCHE AVANCÉE
	/* 3 */if ($('.big_wrapper').width() == 736){

	//RECHERCHE AVANCÉE
	$('.recherche_avancee_wrapper').css('background-color',"white").css('background-image','none');
	$('.recherche_avancee_left').css('line-height','2.2em').css('width','500px').css('margin','20px auto');
	$('.recherche_avancee_right').css('top','10px');
	$('.recherche_avancee_left span').css('font-size','1.1em');
	$('.recherche_avancee_left a.recherche_mot_actif').css('height','24px');
	$('.recherche_avancee_left a.recherche_mot_inactif').css('font-size','0.8em');
	$('.recherche_avancee_img_container').css('height','60px');
	$('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
	}
	/* 4 */if ($('.big_wrapper').width() == 986){

	//RECHERCHE AVANCÉE
	$('.recherche_avancee_wrapper').css('background-color',"white").css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1100.png')");
	$('.recherche_avancee_left').css('line-height','2.5em').css('width','600px').css('margin','20px auto');
	$('.recherche_avancee_right').css('top','10px');
	$('.recherche_avancee_left span').css('font-size','1.3em');
	$('.recherche_avancee_left a.recherche_mot_actif').css('height','26px');
	$('.recherche_avancee_img_container').css('height','60px');
	$('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
	}
	/* 5 */else if ($('.big_wrapper').width() == 1236){

	//RECHERCHE AVANCÉE
	$('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");
	$('.recherche_avancee_left').css('line-height','2.5em').css('width','700px').css('margin','20px auto');
	$('.recherche_avancee_right').css('top','10px');
	$('.recherche_avancee_left span').css('font-size','1.5em');
	$('.recherche_avancee_left a.recherche_mot_actif').css('height','29px');
	$('.recherche_avancee_img_container').css('height','96px');
	$('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
	}
	/* 6 */else if ($('.big_wrapper').width() == 1486){

	//RECHERCHE AVANCÉE
	$('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");;
	$('.recherche_avancee_left').css('line-height','2.8em').css('width','800px').css('margin','20px auto');
	$('.recherche_avancee_right').css('top','10px');
	$('.recherche_avancee_left span').css('font-size','1.6em');
	$('.recherche_avancee_left a.recherche_mot_actif').css('height','33px');
	$('.recherche_avancee_img_container').css('height','96px');
	$('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
	}
	/* 7 */else if ($('.big_wrapper').width() == 1736){

	//RECHERCHE AVANCÉE
	$('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");;
	$('.recherche_avancee_left').css('line-height','3em').css('width','900px').css('margin','20px auto');
	$('.recherche_avancee_right').css('top','10px');
	$('.recherche_avancee_left span').css('font-size','1.7em');
	$('.recherche_avancee_left a.recherche_mot_actif').css('height','36px');
	$('.recherche_avancee_img_container').css('height','96px');
	$('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
	}
</script>



























