<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="parrainage_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="parrainage_head">
        <div class="parrainage_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Parrainez vos amis</span>
    </div>   
    <div class="parrainage_body">
        
        <div class="parrainage_bouton_envoyer">
            <div class="parrainage_bouton_envoyer_txt"><div class="fleche_parrainage"></div>Envoyer</div>
            <a href="#" title="">
                <img src="<?php echo SITE_URL; ?>/img/pictos_popins/enveloppe_envoyer.png" title="" alt="" height="22" width="29" />
            </a>
        </div>
        <div class="parrainage_option1">
            <div class="parrainage_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/arobase_blanc.png" title="" alt="" height="17" width="16" /></div>
            <span class="parrainage_option_txt">Option 1 | </span><span class="parrainage_option_txt2"> Inviter vos amis par email</span>
        </div>
        <div class="parrainage_option1_body">
            <div class="parrainage_option1_body_left">
                <div class="parrainage_destinataires_txt"><span>À*</span></div><input class="parrainage_input_destinataires" type="text" placeholder="Email 1, email 2, email 3..."/>
                <div class="parrainage_objet_txt"><span>Objet*</span></div><input class="parrainage_input_objet" type="text" placeholder="David souhaite vous faire découvrir Uniiti.com"/>
            </div>
            <div class="parrainage_option1_body_right">
            <div class="parrainage_message_txt"><span>Message *</span></div><textarea class="parrainage_input_message" placeholder="Bonjour, Rejoins-moi sur Uniiti.com, le premier site d’avis en France. Grâce à Uniiti.com, j'ai accès à des milliers d’avis sur les commerces, objets et films ! Alors, rejoins-moi ? A tout de suite sur Uniiti.com ! David B."></textarea>
            </div>
        </div>
        
        <div class="parrainage_option2">
            <div class="parrainage_option2_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon_reseau.png" title="" alt="" height="20" width="26" /></div>
            <span class="parrainage_option_txt">Option 2 | </span><span class="parrainage_option_txt2"> Diffuser sur votre réseau</span>
        </div>
        <div class="parrainage_option2_body">
            <div class="parrainage_option2_body_centered">
                <span>Postez une invitation sur votre réseau en partageant un message sur votre profil !</span>
            </div>
            <div class="parrainage_option2_body_socials">
                <div class="parrainage_fb_img_container"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon_fb.png" title="" alt="" height="45" width="54" /></a></div><div class="parrainage_option2_body_socials_fb"><a href="#" title="">Poster sur Facebook</a></div>
                <div class="parrainage_tw_img_container"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon_tw.png" title="" alt="" height="45" width="54" /></a></div><div class="parrainage_option2_body_socials_tw"><a href="#" title="">Tweeter l'invitation</a></div>
                <div class="parrainage_gplus_img_container"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon_gplus.png" title="" alt="" height="45" width="54" /></a></div><div class="parrainage_option2_body_socials_gplus"><a href="#" title="">Poster sur Google+</a></div>
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
</html>
