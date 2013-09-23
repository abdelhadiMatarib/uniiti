<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_optin.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Gestion de vos campagnes Opt-in</span>
    </div>
    <div class="module_reservation_body">
        <div class="module_reservation_left">
            <div class="module_reservation_left_head1">
                <span>Données client de votre commerce</span>
            </div>
            <div class="module_reservation_left_head1_mailscol">
                <a href="#" title=""><span class="module_reservation_big_data">23</span><span><strong>mails</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head1_smscol">
                <a href="#" title=""><span class="module_reservation_big_data">56</span><span><strong>sms</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head2">
                <span>Données client des partenaires</span>
            </div>
             <div class="module_reservation_left_head1_mailscol">
                <a href="#" title=""><span class="module_reservation_big_data">156</span><span><strong>mails</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head1_smscol">
                <a href="#" title=""><span class="module_reservation_big_data">250</span><span><strong>sms</strong></span><span>collectés</span></a>
            </div>
        </div>
        <div class="module_reservation_right">
            
            <div class="module_reservation_right_head1">
                <span>Choisissez le nombre et une option</span>
            </div>
            <div class="module_reservation_right_content">
                <form>
                    <div class="input_optin_float"><input type="radio" id="resa_infos_affichage" name="module_resa_radio_choice"/><label for="resa_infos_affichage"><span>Campagne auprès de mes clients</span></label></div>
                    
                    <div class="input_optin_float"><input type="radio" id="resa_infos_notifs_mail" name="module_resa_radio_choice"/><label for="resa_infos_notifs_mail"><span id="optin_camp_clients_part">Auprès des clients de mes partenaires</span></label></div>
                    
                    <div class="module_optin_nombre_wrap">
                        
                        <div class="module_optin_nombre_txt">79</div>
                        <div class="module_optin_nombre_choix_mails"><a href="#" title="">MAILS</a></div>
                        <div class="module_optin_nombre_choix_sms"><a href="#" title="">SMS</a></div>
                        <div class="module_optin_nombre_choix_lesdeux"><a href="#" title="">LES DEUX</a></div>
                        
                    </div>
                    
                    <div class="module_reservation_right_head1 optin_message">
                        <span>Message</span>
                    </div>
                    
                    <textarea class="module_optin_textarea_message"></textarea>
                </form>
            </div>
            
        </div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="bouton_envoyer_optin_wrap"><a href="#">Lancer ma campagne</a></div>
        <div class="recap_optin_footer"><span class="recap_optin_footer_total">TOTAL</span><span class="recap_optin_footer_total_prix">253 €</span></div>
    </div>
</div>
</html>