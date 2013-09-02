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
            <div class="reservation_option1_img_container reservation_recap_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_valide.png" title="" alt="" height="13" width="19" /></div>
            <span class="reservation_option_txt">Récapitulatif</span><span class="parrainage_option_txt2"></span>
        </div>
        <div class="reservation_recap_body">
            <div class="reservation_recap_body_txt">
                <span class="reservation_recap_body_txt_bold">Une table est disponible !</span>
                <span class="reservation_recap_body_txt_normal">pour le</span>
                <span class="reservation_recap_body_txt_bleu">Vendredi 23 août 2013</span>
                <span class="reservation_recap_body_txt_normal">à</span>
                <span class="reservation_recap_body_txt_bleu">19h30</span>
                <span class="reservation_recap_body_txt_normal">,</span>
                <span class="reservation_recap_body_txt_bleu">6 personnes</span>
            </div>
        </div>
        <div class="reservation_option2">
            <div class="reservation_option2_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" title="" alt="" height="18" width="19" /></div>
            <span class="reservation_option_txt">Informations</span><span class="reservation_option_txt2"></span>
        </div>
        <div class="reservation_option2_body_centered">
            <span>Pour terminer votre réservation, veuillez remplir le formulaire ci-dessous :</span>
        </div>
        <div class="reservation_recap_formulaire">
            <input type="text" class="reservation_recap_formulaire_nom" placeholder="Nom"/>
            <input type="text" class="reservation_recap_formulaire_prenom" placeholder="Prénom"/>
            <div class="resa_recap_vertical_sep"></div>
            <input type="text" class="reservation_recap_formulaire_email" placeholder="Email"/>
            <input type="text" class="reservation_recap_formulaire_tel" placeholder="N° de téléphone"/>
            <textarea class="reservation_recap_formulaire_message" placeholder="Demande à l'attention du restaurant : Votre demande sera transmise au restaurant mais nous ne pouvons vous garantir qu’il pourra satisfaire toute les demandes."></textarea>
            <div class="reservation_recap_cgu_wrap">
                
                <div class="resa_recap_cgu_1">
                <input type="checkbox" id="resa_recap_infos"/><span><label for="resa_recap_infos">Je souhaite recevoir des informations de la part de ce restaurant</label></span>
                </div>
                <div class="resa_recap_cgu_2">
                <input type="checkbox" id="resa_recap_cgu"/><label for="resa_recap_cgu"><span>Je reconnais avoir pris connaissance et accepter les </span><a href="#" class="reservation_recap_body_txt_bleu">conditions générales d'utilisation de Uniiti.com</a></label>
                </div>
            </div>
        </div>
        <div class="reservation_step4_footer"><a href="#" title="">Terminer la réservation</a></div>
            
    </div>
</div>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
</html>
