<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <?php
        include_once '../config/configuration.inc.php';
		
		function CompresserImage ($image, $ImageRecalibree, $Width, $Height) {
			$couv = $ImageRecalibree;
			list($imagewidth, $imageheight, $imageType) = getimagesize($image);
			$newImage = imagecreatetruecolor($Width, $Height);
			$imageType = image_type_to_mime_type($imageType);
			switch($imageType) {
				case "image/gif":
					$source=imagecreatefromgif($image); 
					break;
				case "image/pjpeg":
				case "image/jpeg":
				case "image/jpg":
					$source=imagecreatefromjpeg($image); 
					break;
				case "image/png":
				case "image/x-png":
					$source=imagecreatefrompng($image); 
					break;
			}
			imagecopyresampled($newImage, $source, 0, 0, 0, 0, $Width, $Height, $imagewidth, $imageheight);
			imagejpeg($newImage, $couv, 70);		
		}		
		if (!empty($_POST['ImageTemp'])) {
			CompresserImage($_POST['ImageTemp'], $_SERVER["DOCUMENT_ROOT"] . "/projects/uniiti/img/tmp/avatar1.jpg", 120, 120);
			$_POST['ImageTemp'] = $_SERVER["DOCUMENT_ROOT"] . "/projects/uniiti/img/tmp/avatar1.jpg";
		}
		
		?>
    <body>
        <div class="biggymarginer">
        <div class="big_wrapper">
          <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3 inscription_current_step_texte_head"><h3>Vos centres d'intérêts</h3></div>
            </div>
			<form id="FormInscription" onsubmit="return EtapeSuivante();" action="<?php echo SITE_URL; ?>/pages/inscription3b.php" method="post"  autocomplete="off">
			
				<?php foreach ($_POST as $Key => $Value) {?>
				<input type="hidden" id="<?php echo $Key; ?>" name="<?php echo $Key; ?>" value="<?php echo $Value; ?>" />
				<?php } ?>
				<input type="hidden" id="aime1" name="aime1"/>
				<input type="hidden" id="aime2" name="aime2"/>
				<input type="hidden" id="aime3" name="aime3"/>
				<input type="hidden" id="aime4" name="aime4"/>
				<input type="hidden" id="aime5" name="aime5"/>
			
				<div class="inscription_centres_interets_big_wrap">
					<div class="inscription_centres_interets_aime_texte"><h3>Bien, maintenant dites-nous </h3><h3 class="inscription_centres_interets_aime_texte_highlight"> 5 choses </h3><h3> que </h3><h3 class="inscription_centres_interets_aime_texte_highlight"> vous aimez</h3></div>
					<div class="inscription_centres_interets_aime_wrap">

						<?php include'../includes/requeteinscription.php'; ?>
	   
					</div>
				</div><!-- FIN CENTRES INTERETS BIG WRAP -->
				 <div class="inscription_centres_interets_aime_wrap2">
					 <span id="NbChoix" class="inscription_centres_interets_choix_texte">5 choix</span>
					 <span class="inscription_centres_interets_choix_texte_highlight">restants</span>
					 <ul>
						<li><img id="pouce1" src="<?php echo SITE_URL; ?>/img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
						<li><img id="pouce2" src="<?php echo SITE_URL; ?>/img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
						<li><img id="pouce3" src="<?php echo SITE_URL; ?>/img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
						<li><img id="pouce4" src="<?php echo SITE_URL; ?>/img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
						<li><img id="pouce5" src="<?php echo SITE_URL; ?>/img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
					 </ul>
				 </div>
				
				<div class="inscription_wrap_next_step2">
					<div class="inscription_next_step2">
						<div class="inscription_current_step"><span class="inscription_current_step_number">3</span><span class="inscription_current_step_etape_texte">étape</span></div>
						<button class="inscription_next_step_button2" id="submitbutton" type="submit" role="button" class="css3button" >Suivant</button>
					</div>
				</div>
			</form>
        </div><!-- FIN BIG WRAPPER -->
        </div><!-- FIN BIGGY -->
			
		<script type="text/javascript">
			var CompteurSelection = 0;
			$(".inscription_box").click(function() {
				if ($(this).hasClass('is_valid')) {
					$(this).removeClass('is_valid');
					CompteurSelection--;
				}
				else if (CompteurSelection < 5) {
					$(this).addClass('is_valid');
					CompteurSelection++;
					$("pouce"+CompteurSelection).css("color", "#a4ebf1");   // il faut changer l'aspect des pouces
				}
				$("#NbChoix").html(5-CompteurSelection+' choix');
			});

			// getElementById
			function $id(id) {return document.getElementById(id);}
			
			function EtapeSuivante() {
				if (CompteurSelection == 5) {
					var Compteur = 0;
					$(".inscription_box").each(function(index) {
						if ($(this).hasClass('is_valid')) {
							Compteur++;
							$id("aime"+Compteur).value = $(this).attr('id');
						}
					});
					var data = {
							'email_login' : $id("email_login").value,
							prenom : $id("prenom").value,
							nom : $id("nom").value,
							'date_naissance_jour' : $id("date_naissance_jour").value,
							'date_naissance_mois' : $id("date_naissance_mois").value,
							'date_naissance_annee' : $id("date_naissance_annee").value,
							sexe : $id("sexe").value,
							mdp : $id("mdp").value,
							ville : $id("ville").value,
							codepostal : $id("codepostal").value,
							pays : $id("pays").value,
							telephone_contributeur : $id("telephone_contributeur").value,
							ImageTemp : $id("ImageTemp").value,
							aime1 : $id("aime1").value,
							aime2 : $id("aime2").value,
							aime3 : $id("aime3").value,
							aime4 : $id("aime4").value,
							aime5 : $id("aime5").value
					};
					ActualisePopin(data, '/pages/inscription3b.php', 'default_dialog_inscription');
				} else {alert("vous n'avez pas encore choisi les 5 choses que vous aimez");}
				return false; // si false l action du form ne sera pas appelé
			};
		</script>
	</body>
</html>
