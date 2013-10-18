<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';?>
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
            <span class="reservation_option_txt">Étape 3 | </span><span class="parrainage_option_txt2">Choisissez le nombre</span>
        </div>
        <div class="reservation_nombre_body">
            <div class="reservation_nombre_body_txt">
                <span>Nombre de personnes</span>
            </div>
            <div class="reservation_nombre_personnes"><a href="#" title="">1</a></div>
            <div class="reservation_nombre_personnes valid_nombre"><a href="#" title="">2</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">3</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">4</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">5</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">6</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">7</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">8</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">9</a></div>
            <div class="reservation_nombre_personnes"><a href="#" title="">10</a></div>
            
            <div class="reservation_nombre_personnes_grande_table_txt">
                <span class="reservation_nombre_personnes_grande_table_txt_bold">Une grande tablée ?</span>
                <span>Plus de 10 personnes ?</span>
            </div>
            
            <div class="reservation_nombre_personnes_grande_table_nbr">
                <div class="arrow_right"></div>
                <a class="resa_link_10plus" href="#" title="">10+</a>
            </div>
            <script>
                $(document).ready(
            $(function () {
    $('.resa_link_10plus').on('click',function () {
        var input = $('<input />', {'type': 'text','class': 'input_resa_nbr_pers','name': 'aname', 'value': $(this).html()});
        $(this).parent().append(input);
        $(this).remove();
        input.focus();
    });

    $('input').on('focus blur',function () {
        $(this).parent().append($('<span>test</span>').html($(this).val()));
        $(this).remove();
    });
    })
);
            </script>
        </div>
        <div class="reservation_step2_footer">
            <div class="reservation_step2_footer_retour_dates">
             <a href="#" title="" onclick="EtapePrecedente();">Modifier l'horaire</a>
            </div>
            <div class="reservation_step2_3_vertical_sep"></div>
            <div class="reservation_step2_footer_etape_suivante">
             <a href="#" title="" onclick="EtapeSuivante();">Étape suivante</a>   
            </div>
            
        </div>
            
    </div>
</div>
<script>
$(".reservation_nombre_personnes").click(function(e) {
	e.preventDefault(); //don't go to default URL
	e.stopPropagation();
	if (!$(this).hasClass("valid_horaire")) {
		$(".reservation_nombre_personnes").removeClass('valid_nombre');
		$(this).addClass('valid_nombre');
	}
});

function EtapePrecedente() {
    var data = {
                step : 3,
                id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
                id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
                chemin : ''
                };
            ActualisePopin(data, '/includes/popins/reservation_step2.tpl.php', 'default_dialog');
    };

function EtapeSuivante() {
    var data = {
                step : 4,
				date : '<?php if (!empty($_POST['date'])) {echo $_POST['date'];} ?>',
				heure : '<?php if (!empty($_POST['heure'])) {echo $_POST['heure'];} ?>',
				nombre : $('.reservation_nombre_personnes.valid_nombre a').text(),
                id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
                id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
                nom_enseigne :'<?php if (!empty($_POST['nom_enseigne'])) {echo $_POST['nom_enseigne'];} ?>',
				email_reservation :'<?php if (!empty($_POST['email_reservation'])) {echo $_POST['email_reservation'];} ?>',
				telephone_reservation :'<?php if (!empty($_POST['telephone_reservation'])) {echo $_POST['telephone_reservation'];} ?>',
                chemin : ''
                };
            ActualisePopin(data, '/includes/popins/reservation_step4.tpl.php', 'default_dialog');
    };
</script>
