        <?php
        include_once '../config/configuration.inc.php';?>
    <body>
            <div class="inscription_head"><div class="liseret_bleu"></div><h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3 inscription_current_step_texte_head"><h3>Vos centres d'intérêts</h3></div>
            </div>
			<form id="FormInscription" onsubmit="return EtapeSuivante();" action="<?php echo SITE_URL; ?>/pages/inscription4.php" method="post"  autocomplete="off">
			
				<?php foreach ($_POST as $Key => $Value) {?>
				<input type="hidden" id="<?php echo $Key; ?>" name="<?php echo $Key; ?>" value="<?php echo $Value; ?>" />
				<?php } ?>
				<input type="hidden" id="aimepas1" name="aimepas1"/>
				<input type="hidden" id="aimepas2" name="aimepas2"/>
				<input type="hidden" id="aimepas3" name="aimepas3"/>
				<input type="hidden" id="aimepas4" name="aimepas4"/>
				<input type="hidden" id="aimepas5" name="aimepas5"/>
				
				<div class="inscription_centres_interets_big_wrap">
					<div class="inscription_centres_interets_aimepas_texte"><h3>C'est noté, pour finir dites-nous </h3><h3 class="inscription_centres_interets_aimepas_texte_highlight"> 5 choses </h3><h3> que </h3><h3 class="inscription_centres_interets_aimepas_texte_highlight"> vous n'aimez pas</h3></div>
					<div class="inscription_centres_interets_aimepas_wrap">
						<?php include'../includes/requeteinscription.php'; ?>                
					</div>
				</div><!-- FIN CENTRES INTERETS BIG WRAP -->
				 <div class="inscription_centres_interets_aimepas_wrap2">
					 <span class="inscription_centres_interets_choix_texte">X choix</span>
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
							$id("aimepas"+Compteur).value = $(this).attr('id');
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
							aime5 : $id("aime5").value,
							aimepas1 : $id("aimepas1").value,
							aimepas2 : $id("aimepas2").value,
							aimepas3 : $id("aimepas3").value,
							aimepas4 : $id("aimepas4").value,
							aimepas5 : $id("aimepas5").value
					};
					ActualisePopin(data, '/pages/inscription4.php', 'default_dialog_inscription');
				} else {alert("vous n'avez pas encore choisi les 5 choses que vous aimez");}
				return false; // si false l action du form ne sera pas appelé
			};
		</script>
		</script>