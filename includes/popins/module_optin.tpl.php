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
    <style>
        .module_reservation_left_head1_mailscol span{display:block;}
        .module_reservation_left_head1_mailscol a,.module_reservation_left_head1_smscol a{text-transform:uppercase;background-color:#f0f0f0;text-align: center;float:left;display:inline-block;height:90px;width:99px;}
        .module_reservation_left_head1_mailscol a{border-right:1px solid #e4e4e4;}
        .module_reservation_left_head1_smscol span{display:block;}
        .module_reservation_big_data{font-size:2.5em;color:#252525;font-weight:700;}
        input#resa_infos_notifs_mail{margin:2px 5px 0 0;}
        .input_optin_float{float:left;padding-left:15px;width:185px;}
        .module_optin_nombre_wrap,.module_optin_nombre_txt,.module_optin_nombre_choix_mails,.module_optin_nombre_choix_sms,.module_optin_nombre_choix_lesdeux{float:left;}
        .module_optin_nombre_wrap{position:absolute;top:0;right:0;width:90px;height:90px;background-color:#f0f0f0;text-align:center;}
        .module_optin_nombre_txt{width:90px;font-size:3em;text-align:center;}
        .module_optin_nombre_choix_mails{float:left;font-size:0.8em;}
        .module_optin_nombre_choix_sms{float:left;font-size:0.8em;}
        .module_optin_nombre_choix_lesdeux{float:left;font-size:0.8em;}
        #optin_camp_clients_part{font-size:0.7em;}
        
        .module_optin_nombre_choix_mails a{color:#252525;display:inline-block;height:18px;width:30px;padding:10px 0;background-color:#a4ebf1;}
        .module_optin_nombre_choix_sms a{color:#252525;display:inline-block;height:18px;width:30px;padding:10px 0;background-color:#a4ebf1;}
        .module_optin_nombre_choix_lesdeux a{color:#252525;display:inline-block;height:28px;width:30px;padding:5px 0;background-color:#a4ebf1;}
        
        .module_optin_nombre_choix_mails a:hover{color:white;background-color:#73d4dc;}
        .module_optin_nombre_choix_sms a:hover{color:white;background-color:#73d4dc;}
        .module_optin_nombre_choix_lesdeux a:hover{color:white;background-color:#73d4dc;}
        
        .bouton_envoyer_optin_wrap{width:300px;font-size:1.1em;text-align:center;float:left;}
        .bouton_envoyer_optin_wrap a{height:30px;color:#252525;background-color:#a4ebf1;padding-top:10px;display:inline-block;width:100%;}
        .bouton_envoyer_optin_wrap a:hover{color:white;background-color:#73d4dc;}
        
        .recap_optin_footer{float:left;width:180px;background-color:#73d4dc;height:25px;padding:5px 10px 10px 10px;}
        .recap_optin_footer_total{float:left;font-size:1.6em;color:white;font-weight:700;}
        .recap_optin_footer_total_prix{float:right;font-size:1.6em;color:#252525;}
    </style>
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
                    <style>
                        .optin_message{margin-top: 47px !important;}
                        .input_optin_float2{width:250px;}
                        textarea.module_optin_textarea_message{height:70px;width:280px;resize:none;padding:10px;}
                    </style>
                    
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