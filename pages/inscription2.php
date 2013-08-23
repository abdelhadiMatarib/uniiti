<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <?php
        include_once '../config/configuration.inc.php';
        include'../includes/head.php'; ?>
    <body>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
        <div class="big_wrapper">
            <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="../img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2 inscription_current_step_texte_head"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3"><h3>Vos centres d'intérêts</h3></div>
            </div>
            <div class="inscription_fields_left">
                <div class="inscription_upload_image_texte"><span>Glissez-déposez une image dans le cadre</span></div>
            <div class="inscription_separation_ou"><span>Ou</span></div>
            </div>
            <div class="inscription_fields_right">
                <div class="inscription_choisir_image_texte"><span>Choisissez-en une dans la Uniiti galerie</span></div>
            </div>
            <div class="inscription_fields_left">
                <div class="inscription_upload_image_container"><span>Ou cliquez pour en choisir une sur votre ordinateur</span><button class="inscription_upload_button"><input id="inscription_upload" type="file" /></button></div>
            </div>
            <div class="inscription_fields_right">
                <div class="inscription_choisir_image_container">Slider</div>
            </div>
            <div class="inscription_wrap_next_step2">
            <div class="inscription_next_step2">
                <div class="inscription_current_step"><span class="inscription_current_step_number">2</span><span class="inscription_current_step_etape_texte">étape</span></div>
                <div class="inscription_next_step_button2"><a href="inscription3.php" title="">Suivant</a></div>
            </div>
                <div class="inscription_avatar_selected"><div class="inscription_avatar_selected_texte"><span>Votre avatar</span></div><div class="draggable"><img src="../img/avatars/6.png" height="120" width="120" title="" alt="" /></div></div>
            </div>
            
        </div><!-- FIN BIG WRAPPER -->
        </div><!-- FIN BIGGY -->
 <?php include'../includes/js.php' ?>
	<script>
			$(function() {
				$( ".draggable" ).draggable();
				$( ".inscription_upload_image_container" ).droppable({
				drop: function( event, ui ) {alert("coucou");
					$( this )
					.addClass( "ui-state-highlight" )
					.find( "p" )
					.html( "Dropped!" );
				}
				});
			});	
	</script>
    </body>
</html>