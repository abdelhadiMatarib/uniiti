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
            <div class="reservation_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_horaires.png" title="" alt="" height="17" width="17" /></div>
            <span class="reservation_option_txt">Étape 2 | </span><span class="parrainage_option_txt2">Choisissez l'horaire</span>
        </div>
        <div class="reservation_horaires_body">
            <div class="reservation_horaires_dejeuner_txt">
                <span>Déjeuner</span>
            </div>
            <div class="reservation_horaires_nbr_default valid_horaire"><a href="#" title="">12:00</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">12:30</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">13:00</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">13:30</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">14:00</a></div>
            
            <div class="reservation_horaires_diner_txt">
                <span>Dîner</span>
            </div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">19:00</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">19:30</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">20:00</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">20:30</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">21:00</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">21:30</a></div>
            <div class="reservation_horaires_nbr_default"><a href="#" title="">22:00</a></div>
            <div class="reservation_horaires_nbr_default"></div>
            <div class="reservation_horaires_nbr_default"></div>
            <div class="reservation_horaires_nbr_default"></div>
        </div>
        
        <div class="reservation_step2_footer">
            <div class="reservation_step2_footer_retour_dates">
             <a href="#" title="" onclick="EtapePrecedente();">Modifier la date</a>
            </div>
            <div class="reservation_step2_3_vertical_sep"></div>
            <div class="reservation_step2_footer_etape_suivante">
             <a href="#" title="" onclick="EtapeSuivante();">Étape suivante</a>   
            </div>
            
        </div>
            
    </div>
</div>
<script>
$(".reservation_horaires_nbr_default").click(function(e) {
	e.preventDefault(); //don't go to default URL
	e.stopPropagation();
	if (!$(this).hasClass("valid_horaire")) {
		$(".reservation_horaires_nbr_default").removeClass('valid_horaire');
		$(this).addClass('valid_horaire');
	}
});

function EtapePrecedente() {
    var data = {
                step : 3,
                id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
                id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
                chemin : ''
                };
            ActualisePopin(data, '/includes/popins/reservation_step1.tpl.php', 'default_dialog');
    };


function EtapeSuivante() {
    var data = {
                step : 3,
				date : '<?php if (!empty($_POST['date'])) {echo $_POST['date'];} ?>',
				heure : $('.reservation_horaires_nbr_default.valid_horaire a').text(),
                id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
                id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
                chemin : ''
                };
            ActualisePopin(data, '/includes/popins/reservation_step3.tpl.php', 'default_dialog');
    };
</script>