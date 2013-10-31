<?php

include_once '../../config/configuration.inc.php';
include_once '../fonctions.inc.php';
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session

if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
$provenance = $_POST['provenance'];
switch ($provenance) {
	case "avis":
		$action = "a noté";
		$affichecommentaire = true;
		break;
	case "aime":
		$note = "''";
		$commentaire = "''";
		$action = "a aimé";
		$affichecommentaire = false;
		break;
	case "aime_pas":
		$note = "''";
		$commentaire = "''";
		$action = "n'a pas aimé";
		$affichecommentaire = false;
		break;
	case "wish":
		$note = "''";
		$commentaire = "''";
		$action = "a ajouté à sa wishlist";
		$affichecommentaire = false;
		break;
	default :
		$note = "''";
		$commentaire = "''";
		$action = "";
		$affichecommentaire = false;
		break;
}

$reponse = explode("<BR><b>Réponse du commerçant :</b> ", $_POST['commentaire']);
$time_avis = strtotime($_POST['date_avis']);
$dateplussept = mktime(date("H", $time_avis), date("i", $time_avis), date("s", $time_avis), date("m", $time_avis)  , date("d", $time_avis)+7, date("Y", $time_avis));
$dateplussept = date('Y-m-d H:i:s', $dateplussept);
$secondes = strtotime($dateplussept) - strtotime(date('Y-m-d H:i:s'));
$jours = number_format($secondes / (60*60*24),0);

if(isset($_SESSION['SESS_MEMBER_ID'])) {
	$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $_POST['id_enseigne'] . "}";
	$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
	$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
	$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
	$signaler = "Notifier();";
} else {
	$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
}	
		
?>
	
<div class="presentation_action_wrapper presentation_action_commentaire_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    
    <div class="presentation_action_left">
        <div class="presentation_action_left_head left_head_avisenattente">
            
            <div class="presentation_action_left_head_img_container_picto_categorie" title="<?php echo stripslashes($_POST['scategorie']); ?>" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $_POST['posx'] . "px" . " " . $_POST['posy'] . "px"?>"></div>
            <div class="presentation_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre user_txt_avisenattente"><?php /*echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); */?></span>
                <span class="presentation_action_left_head_categorie">355/3000 - Confirmé</span>
            </div>
            
            <div class="presentation_action_left_head_likes_wrap">
                <span class="presentation_action_left_head_nombrelikes"><strong>15756</strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">ABONNÉS</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php echo AfficheEtoiles($_POST['note_arrondi'], $_POST['categorie']); ?>
                <span class="presentation_action_left_head_note_txt"><?php echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; ?> Avis</span>
            </div>
            
        </div>
        <style>
            .presentation_action_left_body{height:auto !important;}
        </style>
        <div class="presentation_action_left_body presentation_action_commentaire_left_body">
			<?php if (($provenance == 'avis') && ($_POST['commentaire'] != "pas de commentaire")) { ?>
				<div title="Signaler cet avis" class="presentation_action_signalement_flag"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_signalement_flag.png"/></div>
			<?php } ?>
            <span class="presentation_action_left_body_username" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action">a laissé un nouveau commentaire</span>
            <div class="presentation_action_commentaire_left_body_message">
				<?php if ($affichecommentaire) { ?>
					<span style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['note'] / 2; ?>/5 | </span>
					<span id="commentaire"><?php if (isset($reponse[1])) {echo $reponse[0];} else {echo stripslashes($_POST['commentaire']);} ?></span>
				<?php } ?>
            </div>
			<div class="presentation_action_signalement_body utilisateur_interface_modifs_modifier_commentaire_inputs">
				<span class="presentation_action_signalement_txt">Nous vous remercions de bien vouloir justifier ce signalement</span>
					<form>
						<div class="input_float_left"><input checked type="radio" name="radio_modif_user" id="modifier_commentaire_input_saisie_incorrecte"/><label for="modifier_commentaire_input_saisie_incorrecte">Avis à caractère diffamatoire ou injurieux</label></div>
						<br/>
						<div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_opinion_commercant"/><label for="modifier_commentaire_input_opinion_commercant">Avis incohérent ou sans intérêt</label></div>
						<br/>
						<div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_precisions"/><label for="modifier_commentaire_input_precisions">Spam</label></div>
						<br/>
						<div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_preciser_motif"/><label for="modifier_commentaire_input_preciser_motif">Autre motif</label></div>
						<br/>
						<div class="input_float_left"><input type="text" class="input_avisenattente_precisezmotif input_signalement_motif" placeholder="Précisez le motif"/></div>
						<div onclick="<?php echo $signaler;?>" class="input_float_right bouton_signaler"><a href="#" title=""><span>Signaler</span></a></div>
					</form>
			</div>
            <div class="arrow_up"></div>
        </div>
                    
		<div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $_POST['photo_contributeur'];?>" height="50" width="50"/></figure></div>
            <div class="presentation_action_left_footer_timing"><?php echo stripslashes($_POST['delai_avis']); ?></div>
            <div class="presentation_action_left_footer_picto_action" <?php echo AfficheProvenance($_POST['provenance'], $_POST['categorie']); ?>></div>
        </div>
    </div>

    <div class="presentation_action_right">
        <div class="utilisateur_interface_avisenattente_haut">
            <a href="#" title="" class="maintitle"><span>Voici un nouveau commentaire. Il sera publié dans</span><span class="interface_avisenattente_txt_colored" style="color:<?php echo $_POST['couleur']; ?>;"> <strong><?php echo $jours; ?></strong> </span><span>jours</span></a>
        </div>
       
        <div class="utilisateur_interface_modifs_modifier_commentaire">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration" style="color:<?php echo $_POST['couleur']; ?>;">Signaler</span><span> le commentaire</span></a>
        </div>
        <div class="utilisateur_interface_modifs_modifier_note">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration" style="color:<?php echo $_POST['couleur']; ?>;">Répondre</span><span> à ce commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_note_inside">
                <textarea id="reponse" placeholder="Ajouter un commentaire"><?php if (isset($reponse[1])) {echo $reponse[1];} ?></textarea>
            <div class="wrap_buttons_valider_supprimer">
                <div class="button_valider" onclick="ReponseAvis('reponse');"></div>
            </div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_avis">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration" style="color:<?php echo $_POST['couleur']; ?>;">Publier</span><span> le commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_avis_inside">
                <div class="utilisateur_interface_modifs_modifier_avis_inside_img_container">
                    <span>Êtes-vous certain de vouloir publier cet avis ?</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_oui"><a href="#" title="" class="modif_avis_choice_oui"><span>OUI</span></a></div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_non"><a href="#" title="" class="modif_avis_choice_non"><span>NON</span></a></div>
            </div>
        </div>
            
        </div>
        <div class="clearfix"></div>

    </div>
    
</div>
<script>
// Box utilisateur modifier interface modifier note

    // NOTE
    $(".utilisateur_interface_modifs_modifier_note a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       }
	   if (active == true) {
            $('.presentation_action_signalement_flag').toggleClass('signalement_button_background');
            $('.presentation_action_commentaire_left_body_message').stop().slideToggle();
            $('.presentation_action_commentaire_left_body').stop().animate({height: heighttemp}, {duration: 800,specialEasing: {width: "linear",height: "easeOutBounce"}})
            $('.presentation_action_signalement_body').stop().slideToggle();
            active = false;
            console.log(active);
        }
    });
    
    // COMMENTAIRE
    $(".utilisateur_interface_modifs_modifier_commentaire a.maintitle").click(function(e){
       e.preventDefault();
	   $('.presentation_action_signalement_flag').click();
       if ($(".utilisateur_interface_modifs_modifier_avis_inside,.utilisateur_interface_modifs_modifier_note_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_avis_inside,.utilisateur_interface_modifs_modifier_note_inside").stop().slideUp();
       };       
    });
    
    // AVIS
    $(".utilisateur_interface_modifs_modifier_avis a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_note_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_note_inside").stop().slideUp();
       }
	   if (active == true) {
            $('.presentation_action_signalement_flag').toggleClass('signalement_button_background');
            $('.presentation_action_commentaire_left_body_message').stop().slideToggle();
            $('.presentation_action_commentaire_left_body').stop().animate({height: heighttemp}, {duration: 800,specialEasing: {width: "linear",height: "easeOutBounce"}})
            $('.presentation_action_signalement_body').stop().slideToggle();
            active = false;
            console.log(active);
        }
    });
	
    // SIGNALEMENT COMMENTAIRE + PRECISION MOTIF
    $('#modifier_commentaire_input_saisie_incorrecte,#modifier_commentaire_input_opinion_commercant,#modifier_commentaire_input_precisions,#modifier_commentaire_input_preciser_motif').click(function(){
        if($('.input_avisenattente_precisezmotif').is(':visible'))
            {$('.input_avisenattente_precisezmotif').stop().slideUp()}
            else{return;}
    });
    $('#modifier_commentaire_input_preciser_motif').click(function(){
        $('.input_avisenattente_precisezmotif').stop().slideToggle();
    });
    var active = false;
    var heighttemp = 0;
    $('.presentation_action_signalement_flag').click(function(){
        if (active == false){
            heighttemp = $('.presentation_action_commentaire_left_body').height();
            $('.presentation_action_commentaire_left_body').stop().animate({height: "175px"}, {duration: 800,specialEasing: {width: "linear",height: "easeOutBounce"}});
            $(this).delay(2000).toggleClass('signalement_button_background');
            $('.presentation_action_commentaire_left_body_message').stop().slideToggle();
            $('.presentation_action_signalement_body').stop().slideToggle();
            active = true;
            console.log(heighttemp);
        }
        else if (active == true) {
            $(this).toggleClass('signalement_button_background');
            $('.presentation_action_commentaire_left_body_message').stop().slideToggle();
            $('.presentation_action_commentaire_left_body').stop().animate({height: heighttemp}, {duration: 800,specialEasing: {width: "linear",height: "easeOutBounce"}})
            $('.presentation_action_signalement_body').stop().slideToggle();
            active = false;
            console.log(active);
        }
    });

	$('.utilisateur_interface_modifs_modifier_avis_inside_choice_oui').click(function () {
		PublierAvis('publication', '', '');
	});
	
	$('.utilisateur_interface_modifs_modifier_avis_inside_choice_non').click(function () {
		$(".utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
	});	

	function ReponseAvis(type) {
		var id_enseigne = '<?php echo $_POST['id_enseigne'];?>';
		var data = {
						id_contributeur : '<?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];}?>',
						id_enseigne : id_enseigne,
						id_avis : '<?php echo $_POST['id_avis'];?>',
						type : type,
						commentaire : ''+$('#commentaire').html()+'',
						reponse : ''+$('#reponse').val()+'',
						note : ''
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetechangeavis.php',
			data : data,
			success: function(result){
				window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+id_enseigne);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}
	
	function PublierAvis(type, note, commentaire) {
		var id_enseigne = '<?php echo $_POST['id_enseigne'];?>';
		var data = {
						id_contributeur : '<?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];}?>',
						id_enseigne : id_enseigne,
						id_avis : '<?php echo $_POST['id_avis'];?>',
						type : type,
						commentaire : '',
						note : ''
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetechangeavis.php',
			data : data,
			success: function(result){
				window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+id_enseigne);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}
	
	function Notifier() {
	
		var description;
		if ($id('modifier_commentaire_input_saisie_incorrecte').checked) {description = $('#modifier_commentaire_input_saisie_incorrecte').next('label').text();}
		if ($id('modifier_commentaire_input_precisions').checked) {description = $('#modifier_commentaire_input_precisions').next('label').text();}
		if ($id('modifier_commentaire_input_opinion_commercant').checked) {description = $('#modifier_commentaire_input_opinion_commercant').next('label').text();}
		if ($id('modifier_commentaire_input_preciser_motif').checked) {description = $('.input_avisenattente_precisezmotif').val();}

		var data = {
						id_contributeur : '<?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];}?>',
						id_enseigne_ou_objet : '<?php echo $_POST['id_enseigne'];?>',
						id_avis : '<?php echo $_POST['id_avis'];?>',
						type_notification : 'enseigne',
						id_action : 2,
						description : ''+description+'',
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requeteenregistrenotification.php',
			data : data,
			success: function(result){
				ActualisePopin({id_contributeur:result.result}, '/includes/popins/avisenattente_signalement.tpl.php', 'default_dialog');
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}	
	
	
</script>