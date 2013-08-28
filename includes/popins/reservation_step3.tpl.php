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
            <span class="reservation_option_txt">Étape 3 | </span><span class="parrainage_option_txt2">Choisissez le nombre</span>
        </div>
        <div class="reservation_nombre_body">
            <div class="reservation_nombre_body_txt">
                <span>Nombre de personnes</span>
            </div>
            <div class="reservation_nombre_personnes_1"><a href="#" title="">1</a></div>
            <div class="reservation_nombre_personnes_2"><a href="#" title="">2</a></div>
            <div class="reservation_nombre_personnes_3"><a href="#" title="">3</a></div>
            <div class="reservation_nombre_personnes_4"><a href="#" title="">4</a></div>
            <div class="reservation_nombre_personnes_5"><a href="#" title="">5</a></div>
            <div class="reservation_nombre_personnes_6"><a href="#" title="">6</a></div>
            <div class="reservation_nombre_personnes_7"><a href="#" title="">7</a></div>
            <div class="reservation_nombre_personnes_8"><a href="#" title="">8</a></div>
            <div class="reservation_nombre_personnes_9"><a href="#" title="">9</a></div>
            <div class="reservation_nombre_personnes_10"><a href="#" title="">10</a></div>
            
            <div class="reservation_nombre_personnes_grande_table_txt">
                <span class="reservation_nombre_personnes_grande_table_txt_bold">Une grande tablée ?</span>
                <span>Plus de 10 personnes ?</span>
            </div>
            
            <div class="reservation_nombre_personnes_grande_table_nbr">
                <div class="arrow_right"></div>
                <a href="#" title="">10+</a>
            </div>
            
        </div>
        
        <div class="reservation_step2_footer">
            <div class="reservation_step2_footer_retour_dates">
             <a href="#" title="">Modifier l'horaire</a>
            </div>
            <div class="reservation_step2_3_vertical_sep"></div>
            <div class="reservation_step2_footer_etape_suivante">
             <a href="#" title="">Étape suivante</a>   
            </div>
            
        </div>
            
    </div>
</div>
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });
</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
</html>