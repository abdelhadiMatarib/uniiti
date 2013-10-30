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
if(isset($_SESSION['SESS_MEMBER_ID'])) {
	$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $_POST['id_enseigne'] . "}";
	$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
	$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
	$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
} else {
	$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
}	
		
?>
	
<div class="presentation_action_wrapper presentation_action_commentaire_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    
    <div class="presentation_action_left">
        <div class="presentation_action_left_head">
            
               <div class="presentation_action_left_head_img_container_picto_categorie" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $_POST['posx'] . "px" . " " . $_POST['posy'] . "px"?>"></div>         <div class="presentation_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre"><?php echo tronque(stripslashes($_POST['nom_enseigne'])); ?></span>
                <span class="presentation_action_left_head_categorie" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo stripslashes($_POST['scategorie']); ?></span>
            </div>
            
            <div class="presentation_action_left_head_likes_wrap">
                <div class="presentation_action_left_head_img_container_picto_likes"></div>
                <span class="presentation_action_left_head_nombrelikes"><strong><?php echo $_POST['count_likes']; ?></strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">LIKE</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php echo AfficheEtoiles($_POST['note_arrondi'], $_POST['categorie']); ?>
                <span class="presentation_action_left_head_note_txt"><?php echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; ?> Avis</span>
            </div>
            
        </div>
        <div class="presentation_action_left_figure">
            <div class="wrapper_boutons_popin">
                <div onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" title="J'aime"<?php echo AfficheAction('aime',$_POST['categorie']); ?>></div>
                <div onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" title="Je n'aime pas"<?php echo AfficheAction('aime_pas',$_POST['categorie']); ?>></div>
                <div onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" title="Ajouter à ma Wishlist"<?php echo AfficheAction('wish',$_POST['categorie']); ?>></div>
            </div>
            <div class="box_localisation"><span><?php echo $_POST['arrondissement']; ?></span></div>
            <figure style="background:<?php echo $_POST['couleur']; ?>;">
				<?php if ($_POST['type'] == 'enseigne') { ?>
					<img onload="AfficheImage($(this));" src="<?php echo SITE_URL . "/photos/enseignes/couvertures/" . $_POST['slide1'];?>" style="display:none;margin-top:<?php echo -$_POST['y1']*735/1750 . "px"; ?>;margin-left:<?php echo -$_POST['x1']*735/1750 . "px"; ?>" width="735"/>
				<?php } else if ($_POST['type'] == 'objet') { ?>
					<img onload="AfficheImage($(this));" style="display:none;" src="<?php echo SITE_URL . "/photos/objets/couvertures/" . $_POST['slide1'];?>" style="display:none;margin-top:<?php echo -$_POST['y1']*735/1750 . "px"; ?>;margin-left:<?php echo -$_POST['x1']*735/1750 . "px"; ?>" width="735"/>
				<?php } ?>
			</figure>
        </div>
        <style>
            .presentation_action_left_body{height:auto !important;}
        </style>
        <div class="presentation_action_left_body presentation_action_commentaire_left_body">
            <span class="presentation_action_left_body_username" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action"><?php echo $action ?></span>
            <div class="presentation_action_commentaire_left_body_message">
				<?php if ($affichecommentaire) { ?>
					<span style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['note'] / 2; ?>/5 | </span>
					<span id="commentaire"><?php echo stripslashes($_POST['commentaire']); ?></span>
				<?php } ?>
            </div>
            <div class="arrow_up" style="border-bottom:5px solid <?php echo $_POST['couleur']; ?>;"></div>
        </div>
                    
		<div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $_POST['photo_contributeur'];?>" height="50" width="50"/></figure></div>
            <div class="presentation_action_left_footer_timing"><?php echo stripslashes($_POST['delai_avis']); ?></div>
            <div class="presentation_action_left_footer_picto_action" <?php echo AfficheProvenance($_POST['provenance'], $_POST['categorie']); ?>></div>
		</div>
    </div>
    
    <div class="presentation_action_right">
       
        <div class="utilisateur_interface_modifs_modifier_note">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Modifier</span><span> ma note</span></a>
            <div class="utilisateur_interface_modifs_modifier_note_inside">
                <div class="utilisateur_interface_modifs_modifier_note_inside_img_container">
				<div id="Note" class="rating"></div>
                </div>
				<div class="wrap_buttons_valider_supprimer">
					<div class="button_valider" title="Enregistrer"></div>
				</div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_commentaire">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Modifier</span><span> mon commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_commentaire_inside">
                <div class="utilisateur_interface_modifs_modifier_commentaire_inside_img_container">
                    <span>Nous vous remercions de bien vouloir indiquer les motifs de cette modification :</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_commentaire_inputs">
                    <form>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_saisie_incorrecte"/><label for="modifier_commentaire_input_saisie_incorrecte">Saisie incorrecte de mon avis</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_opinion_commercant"/><label for="modifier_commentaire_input_opinion_commercant">Mon opinion sur ce commerçant a évolué</label></div>
                    <div class="modif_input_float_left"><input checked type="radio" name="radio_modif_user" id="modifier_commentaire_input_precisions"/><label for="modifier_commentaire_input_precisions">Je souhaite préciser ou compléter certains points</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_pas_auteur"/><label for="modifier_commentaire_input_pas_auteur">Je ne suis pas l'auteur de ce texte</label></div>
                    </form>
                </div>
				<div class="wrap_buttons_valider_supprimer">
					<div class="button_valider" title="Enregistrer"></div>
				</div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_avis">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Supprimer</span><span> mon avis</span></a>
            <div class="utilisateur_interface_modifs_modifier_avis_inside">
                <div class="utilisateur_interface_modifs_modifier_avis_inside_img_container">
                    <span>Êtes-vous certain de vouloir supprimer cet avis ?</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_oui"><a href="#" title="" class="modif_avis_choice_oui"><span>OUI</span></a></div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_non"><a href="#" title="" class="modif_avis_choice_non"><span>NON</span></a></div>
            </div>
        </div>
            
        </div>
        <div class="clearfix"></div>


    </div>
     
</div>
<style>
.rating {margin-left:40px;cursor: pointer;display: block;}
.rating:after {content: '.';display: block;height: 0;width: 0;clear: both;visibility: hidden;}
.cancel, .star {float: left;width: 19px;height: 19px;overflow: hidden;text-indent: -999em;cursor: pointer;}
.cancel {margin-right:10px;}
.star-left {margin-left:3px;}
.star-left, .star-right {width: 9.5px;}

.cancel, .cancel a, .star, .star a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat 0 -152px;}
.star-left, .star-left a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat 0px -152px;}
.star-right, .star-right a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat -9.5px -152px;}

.cancel a {display: block;width: 100%;height: 100%;}
.star.star-left a {display: block;width: 100%;height: 100%;background-position: 0 -152px;}
.star.star-right a {display: block;width: 100%;height: 100%;background-position: -9.5px -152px;}

div.rating div.star-left.on a {background-position: 0 -76px;}
div.rating div.star-left.hover a, div.rating div.star-left a:hover {background-position: 0 -76px;}
div.rating div.star-right.on a {background-position: -9.5px -76px;}
div.rating div.star-right.hover a, div.rating div.star-right a:hover {background-position: -9.5px -76px;}
</style>

<script>
// Box utilisateur modifier interface modifier note

	$('#Note').rating(siteurl+'/includes/popins/utilisateur_interface_modifs.tpl.php', {cancel:true,maxvalue:5,increment:0.5,curvalue:<?php echo $_POST['note'] / 2; ?>});

	$('.utilisateur_interface_modifs_modifier_note_inside .button_valider').click(function () {
		if ($('.star.on:last a').length > 0) {note = $('.star.on:last a').attr('href').split('#')[1];}
		else {note = 0;}
		ModifierAvis('note', note, '');
	});
	
	$('.utilisateur_interface_modifs_modifier_commentaire_inside .button_valider').click(function () {
		var commentaire = $('.presentation_action_commentaire_left_body textarea').val();
		ModifierAvis('commentaire', '', commentaire);
	});
	
	$('.utilisateur_interface_modifs_modifier_avis_inside_choice_oui').click(function () {
		ModifierAvis('suppression', '', '');
	});
	
	$('.utilisateur_interface_modifs_modifier_avis_inside_choice_non').click(function () {
		$(".utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
	});
	
	// getElementById
	function $id(id) {return document.getElementById(id);}
	
	function ModifierAvis(type, note, commentaire) {
	
		var description;
		if ($id('modifier_commentaire_input_saisie_incorrecte').checked) {description = $('#modifier_commentaire_input_saisie_incorrecte').next('label').text();}
		if ($id('modifier_commentaire_input_precisions').checked) {description = $('#modifier_commentaire_input_precisions').next('label').text();}
		if ($id('modifier_commentaire_input_opinion_commercant').checked) {description = $('#modifier_commentaire_input_opinion_commercant').next('label').text();}
		if ($id('modifier_commentaire_input_pas_auteur').checked) {description = $('#modifier_commentaire_input_pas_auteur').next('label').text();}

		var data = {
						id_contributeur : '<?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];}?>',
						id_enseigne : '<?php echo $_POST['id_enseigne'];?>',
						id_avis : '<?php echo $_POST['id_avis'];?>',
						note : ''+note+'',
						type : type,
						commentaire : ''+commentaire+'',
						description : ''+description+'',
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetechangeavis.php',
			data : data,
			success: function(result){
				ActualisePopin({id_contributeur:result.result}, '/includes/popins/utilisateur_interface_modifs_valide.tpl.php', 'default_dialog');
			},
			error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetechangeavis.php');}
		});
	}
	
	function AfficheImage(img) {
		img.fadeIn(1000, function () {img.parent().css({'background':'none'});});
	}
    
	var AncienCommentaire = $('#commentaire');
    // NOTE
    $(".utilisateur_interface_modifs_modifier_note a.maintitle").click(function(e){
       e.preventDefault();       
       $(this).next().stop().slideToggle();
       
       // remplacement textarea par div
       $('#commentaire').html(AncienCommentaire.text());
	   
       if ($(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
    
    // COMMENTAIRE
    $(".utilisateur_interface_modifs_modifier_commentaire a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       // remplacement div par textarea
       $('#commentaire').html('<textarea>'+AncienCommentaire.text()+'</textarea>');
       
       if ($(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
    
    // AVIS
    $(".utilisateur_interface_modifs_modifier_avis a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       
       // remplacement textarea par div
       $('#commentaire').html(AncienCommentaire.text());
       
       if ($(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_note_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_note_inside").stop().slideUp();
       };
    });
</script>