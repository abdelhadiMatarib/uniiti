<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="reservation_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="reservation_head">
        <div class="reservation_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Réservation</span>
    </div>   
    <div class="reservation_body">

        <div class="reservation_option1">
            <div class="reservation_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_why.png" title="" alt="" height="19" width="13" /></div>
            <span class="reservation_option_txt">Pourquoi réserver avec Uniiti </span><span class="parrainage_option_txt2"></span>
        </div>
        <div class="reservation_option1_body">
            <div class="reservation_option1_body_txt"><span>Réserver en ligne n'a que des avantages !</span></div>
            <div class="reservation_option1_body_txt2">
                <span>- Le service est accessible à toute heure</span>
                <span>- Vous recevez une confirmation immédiate par email et SMS</span>
                <span>- Il est donc inutile d’appeler le restaurant</span>
                <span>- C’est 100% gratuit !</span>
            </div>
        </div>
        
        <div class="reservation_option2">
            <div class="reservation_option2_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_calendar_icon.png" title="" alt="" height="20" width="17" /></div>
            <span class="reservation_option_txt">Étape 1 | </span><span class="reservation_option_txt2"> Choisissez la date</span>
        </div>
        <div class="reservation_option2_body">
            <div class="reservation_option2_body_centered body_calendrier">
                <div id="datepicker"></div>
            </div>
        </div>
        <div class="reservation_step1_footer"><a href="#" title="" onclick="EtapeSuivante();">Étape suivante</a></div>
            
    </div>
</div>
<script>
   $(function() {
jQuery(function($){
	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
                minDate: 0,
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
			'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin',
			'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
        $( "#datepicker" ).datepicker({selectable:true});
   });
});

function EtapeSuivante() {
    var data = {
                step : 2,
                id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
                id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
                chemin : ''
                };
            ActualisePopin(data, '/includes/popins/reservation_step2.tpl.php', 'default_dialog');
    };
</script>