<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_module_resa.png" title="" alt="" height="34" width="35" />
        </div><span class="maintitle">Réservation - RDV en ligne</span>
    </div>
    <div class="module_reservation_body">
        <div class="module_reservation_left">
            <div class="module_reservation_left_head1">
                <span>Souhaitez-vous activer ce module</span>
            </div>
            <div class="module_reservation_left_head1_oui">
                <a href="#" title="">OUI</a>
            </div>
            <div class="module_reservation_left_head1_non">
                <a href="#" title="">NON</a>
            </div>
            <div class="module_reservation_left_head2">
                <span>Veuillez sélectionner une option</span>
            </div>
            <div class="module_reservation_left_head2_rdv">
                <a href="#" title="">Prise de RDV</a>
            </div>
            <div class="module_reservation_left_head2_reservation">
                <a href="#" title="">Réservation en ligne</a>
            </div>
        </div>
        <div class="module_reservation_right">
            
            <div class="module_reservation_right_head1">
                <span>Comment voulez-vous être informé ?</span>
            </div>
            <div class="module_reservation_right_content">
                <form>
                    <div class="input_resa_float"><input type="radio" id="resa_infos_affichage" name="module_resa_radio_choice"/><label for="resa_infos_affichage"><span>Affichage sur ma page commerce Uniiti.com</span></label></div>
                    
                    <div class="input_resa_float"><input type="radio" id="resa_infos_notifs_mail" name="module_resa_radio_choice"/><label for="resa_infos_notifs_mail" class="infos_resa_espacement"><span>Notification par email</span><span>Merci d'indiquer votre email</span></label></div>
                    <input type="text" id="resa_get_notifs_mail" placeholder="Votre email"/>
                    
                    <div class="input_resa_float"><input type="radio" id="resa_infos_notifs_sms" name="module_resa_radio_choice"/><label for="resa_infos_notifs_sms" class="infos_resa_espacement"><span>Notification par sms</span><span>Merci d'indiquer votre numéro de téléphone</span></label></div>
                    <input type="text" id="resa_get_notifs_sms" placeholder="Votre numéro de téléphone"/>
                
                </form>
            </div>
            
        </div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>