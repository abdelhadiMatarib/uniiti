<?php include_once '../config/configuration.inc.php'; ?>

		<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
            <div class="inscription_head">
            	<div class="liseret_bleu"></div>
            	<h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span>
            	</h2>
            </div>
            
            <div class="inscription_fb_wrap">
                <div class="inscription_fb_plus"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/plus_fb.png" height="48" width="48" title="" alt=""/></a></div>
                <a class="fb_connect_pourquoi" href="#" title="Pourquoi se connecter avec Facebook ?">Pourquoi ?</a>
                <div class="fb_connect_button">
                    <div class="fb_connect_button_wrap_text">
                    <span class="fb_connect_button_text">Inscription avec</span>
                    <span class="fb_connect_button_highlight"> Facebook</span>
                    </div>
                </div>
            </div>
                <div class="inscription_fb_why_wrap">
                    <div class="inscription_fb_why_left">
                        <span class="inscription_fb_why_txt_normal">Le moyen le plus simple pour</span>
                        <span class="inscription_fb_why_txt_bold">profiter rapidement de Uniiti</span>
                    </div>
                    <div class="inscription_fb_why_right">
                        <ul>
                            <li><span class="inscription_fb_why_txt_normal">Un </span><span class="inscription_fb_why_txt_bold">Mot de passe en moins</span><span class="inscription_fb_why_txt_normal"> à retenir</span></li>
                            <li><span class="inscription_fb_why_txt_bold">Accès en un clic</span><span class="inscription_fb_why_txt_normal"> une fois connecté à Facebook</span></li>
                            <li><span class="inscription_fb_why_txt_normal">Profitez de Uniiti </span><span class="inscription_fb_why_txt_bold">sans avoir à vous inscrire</span></li>
                        </ul>
                    </div>
                </div>
            <div class="inscription_head2">
                <div class="inscription_step1 inscription_current_step_texte_head"><h3>Informations générales</h3></div>
                <div class="inscription_step2"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3"><h3>Vos centres d'intérêts</h3></div>
            </div>
			<form id="FormInscription" onsubmit="return VerifieEtErg();" action="<?php echo SITE_URL; ?>/pages/inscription2.php" method="post"  autocomplete="on">
				<div class="inscription_fields_left">
					<div class="inscription_field_sexe inscription_border_bottomright">Sexe *</div>
					<input type="hidden" name="sexe" id="sexe" value="2"/>
					<button class="inscription_field_sexe_button inscription_field_sexe_button_h" id="button_homme">Homme</button><button class="inscription_field_sexe_button inscription_field_sexe_button_f" id="button_femme">Femme</button>
					<div class="clearfix"></div>
					<div class="inscription_field_nom inscription_border_bottomright">Nom *</div>
					<input name="nom" id="nom" class="inscription_field_input_text" required="required" type="text" placeholder="Votre nom"/>
					<div class="clearfix"></div>
					<div class="inscription_field_prenom inscription_border_bottomright">Prénom *</div>
					<input name="prenom" id="prenom" class="inscription_field_input_text" required="required" type="text" placeholder="Votre prénom"/>
					<div class="clearfix"></div>

					<div class="inscription_field_prenom inscription_border_bottomright">Date de naissance *</div>
					<select name="date-naissance-jour" id="date_naissance_jour" class="inscription_field_input_chiffre" required="required">
                        <option>Jour...</option>
                        <?php 
                        for ($jour = 1; $jour < 32; $jour++) {
                            echo '<option value="'. $jour .'">'. $jour .'</option>';
                        } 
                        ?>
                    </select>
                    <select name="date-naissance-mois" id="date_naissance_mois" class="inscription_field_input_chiffre" required="required">
                        <option>Mois...</option>
                        <?php 
                        for ($mois = 1; $mois < 13; $mois++) {
                            echo '<option value="'. $mois .'">'. $mois .'</option>';
                        } 
                        ?>
                    </select>
                    <select name="date_naissance_annee" id="date_naissance_annee" class="inscription_field_input_chiffre" required="required">
                        <option>Année...</option>
                        <?php
                        for ($annee = date('Y') ; $annee >= (date('Y')-120); $annee--) {
                            echo '<option value="'. $annee .'">'. $annee .'</option>';
                        } 
                        ?>
                    </select>
					<div class="clearfix"></div>				
					<div class="inscription_field_cp inscription_border_bottomright">Code postal *</div>
					<input name="codepostal" id="codepostal" class="inscription_field_input_text" required="required" type="text" placeholder="Votre code postal"/>
					<div class="clearfix"></div>
					
				</div>
				<div class="inscription_fields_right">
					<div class="inscription_field_parrain inscription_border_bottomright">Téléphone</div>
					<input type="text" name="telephone_contributeur" id="telephone_contributeur" class="inscription_field_input_text .inscription_border_bottomright" placeholder="Votre numéro de téléphone"/>
					<div class="clearfix"></div>
					<div class="inscription_field_mail inscription_border_bottomright">Adresse mail *</div>
					<input name="email-login" id="email_login" class="inscription_field_input_text" required="required" type="mail" placeholder="Votre email"/>
					<div class="clearfix"></div>
					<div class="inscription_field_confirmmail inscription_border_bottomright">Confirmation *</div>
					<input name="email-login2" id="email_login2" class="inscription_field_input_text" required="required" type="mail" placeholder="Confirmer votre email"/>
					<div class="clearfix"></div>					
					<div class="inscription_field_mdp inscription_border_bottomright">Mot de passe *</div>
					<input name="mdp" id="mdp" class="inscription_field_input_text" required="required" type="password" placeholder="Votre mot de passe"/>
					<div class="clearfix"></div>
					<div class="inscription_field_confirmmdp inscription_border_bottomright">Confirmation *</div>
					<input name="mdp2" id="mdp2" class="inscription_field_input_text" required="required" type="password" placeholder="Confirmer votre mot de passe"/>
					<div class="clearfix"></div>
					
<!--				<div class="inscription_field_pseudo inscription_border_bottomright">Pseudo *</div>		-->
					<input type="hidden" name ="pseudo" id="pseudo" class="inscription_field_input_text"/>	
<!--				<div class="clearfix"></div>	-->
<!--					<div class="inscription_field_parrain inscription_border_bottomright">Parrain</div>	-->
					<input type="hidden" name="parrain" id="parrain" class="inscription_field_input_text"/>
<!--					<div class="clearfix"></div>	-->
					<input type="hidden" name="ville" id="ville" placeholder="Saisir votre ville" value="Paris"/>
                    <input type="hidden" name="pays" id="pays" placeholder="Saisir votre code postal" value="France"/>
                    <input type="hidden" name="newsletter" id="newsletter" value="0">
                    <input type="hidden" name="bonus" id="bonus" value="0">
					
				</div>

				<div class="inscription_charte">
					<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/charte.png" height="64" width="56" title="" alt=""/></div>
					<div class="inscription_charte_texte">
						<p><strong>CHARTE DE CONFIDENTIALITÉ & CONDITIONS D’UTILISATION</strong></p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
					</div>

				</div>
				<div class="inscription_next_step">
					<div class="inscription_current_step"><span class="inscription_current_step_number">1</span><span class="inscription_current_step_etape_texte">étape</span></div>
				</div>
				<div class="inscription_footer">
					<h4 class="inscription_footer_highlight">Nous nous engageons à protéger votre vie privée et votre adresse e-mail ne sera jamais vendue ni louée.</h4> 
					<h4 class="inscription_footer_text">En cliquant sur suivant, vous indiquez que vous acceptez notre Charte de confidentialité et nos Conditions d'utilisation.</h4>
					<button class="inscription_next_step_button" id="submitbutton" type="submit" role="button" class="css3button" >Suivant</button>
				</div>
			</form>
	<script>
		// Boutons choix sexe formulaire d'inscription
	$('#button_homme').click(function() {
		$('.inscription_field_sexe_button_f').removeClass('inscription_field_sexe_bg');
		$('.inscription_field_sexe_button_h').toggleClass('inscription_field_sexe_bg');
		$('#sexe').val(1);
	});
	$('#button_femme').click(function() {
		$('.inscription_field_sexe_button_h').removeClass('inscription_field_sexe_bg');
		$('.inscription_field_sexe_button_f').toggleClass('inscription_field_sexe_bg');
		$('#sexe').val(0);
	});
	
        // Bandeau "Inscription avec FB"
        $('.fb_connect_pourquoi').click(function(){
           $('.inscription_fb_why_wrap').stop().slideToggle();
        });
        
	function VerifEmail(email) {
		var place = email.indexOf("@",1);
		var point = email.indexOf(".",place+1);
		if ((place > -1)&&(email.length >2)&&(point > 1))	{return true;}
		else {return false;}
	}
	
	
	// getElementById
	function $id(id) {return document.getElementById(id);}
	
	function VerifieEtErg() {

		if ($id("mdp").value != $id("mdp2").value) {alert("les deux mots de passe ne correspondent pas");return false;}
		if ($id("email_login").value != $id("email_login2").value) {alert("les deux emails ne correspondent pas");return false;}
		if (!VerifEmail($id("email_login").value)) {alert("format de l'email invalide");return false;}
		
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetecheckemail.php',
			data : {email : ''+$id("email_login").value+''},
			success: function(result){
				if (result.result == 1) {
					alert("Cet email existe déjà.");						
				}
				else {
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
							telephone_contributeur : $id("telephone_contributeur").value
					};
					ActualisePopin(data, '/pages/inscription2.php', 'default_dialog_inscription');
					/* Initilisation du mini slider de choix d'avatar */
					$(function() {$('#slides').slidesjs({width: 240,height: 240,pagination: {active: false,},effect: {fade: {speed: 400}}});});	
				}

			},
			error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetecheckemail.php');}
		});		
		return false; // si false l action du form ne sera pas appelé
	};	
</script>
