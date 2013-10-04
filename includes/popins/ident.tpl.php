<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/ident_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Identification</span><div class="ident_mdp_oublie_wrapper" onclick="OuvrePopinMotDePasseOublie({});"><span class="subtitle oublimdp_link">Mot de passe oublié ?</span></div>
    </div>   
    <div class="ident_body">
        <div class="ident_explications">
            
            <span class="ident_big_data">3</span>
            <span class="ident_explications_txt"><strong><span>Créer un compte</span></strong><span>en seulement</span><strong><span>3 étapes</span></strong></span>
        
        </div>
        <div class="ident_inputs">
			<form action="<?php echo SITE_URL; ?>/acces/login_access.php" method="post" autocomplete="off">
                <input class="ident_input_username" type="text" name="email-login" id="email-login" placeholder="Votre login *" required/>
                <input class="ident_input_password" type="password" name="password" id="password" placeholder="Votre mot de passe *" required/>
                <input type="hidden" name="urlTo" readonly value="<?php echo $urlTo; ?>" />
                <button id="submitbutton" type="submit" role="button" class="ident_connexion_wrap">Connexion</button>
            </form>
        </div> 
            
    </div>
    <div class="ident_footer">
        
        <div class="ident_inscription_wrap" onclick="OuvrePopinInscription(<?php echo $data; ?>);">Inscription</div>
        
    </div>
</div>