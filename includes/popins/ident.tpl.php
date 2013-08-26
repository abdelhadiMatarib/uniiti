<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/ident_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Identification</span><div class="ident_mdp_oublie_wrapper"><span class="subtitle oublimdp_link">Identifiants oubliés ?</span></div>
    </div>   
    <div class="ident_body">
            
        <div class="ident_explications">
            
            <span class="ident_big_data">3</span>
            <span class="ident_explications_txt"><strong><span>Créer un compte</span></strong><span>en seulement</span><strong><span>3 étapes</span></strong></span>
        
        </div>
        <div class="ident_inputs">
            <input class="ident_input_username" type="text" /><input class="ident_input_password" type="password" />
        </div> 
            
    </div>
    <div class="ident_footer">
        
        <div class="ident_inscription_wrap"><a href="#">Inscription</a></div>
        <div class="ident_connexion_wrap"><a href="#">Connexion</a></div>
        
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