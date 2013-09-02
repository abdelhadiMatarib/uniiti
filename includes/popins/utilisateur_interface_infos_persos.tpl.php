<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';?>

<div class="utilisateur_infospersos_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="utilisateur_infospersos_head">
        <div class="utilisateur_infospersos_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/infospersos_icon_user.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Informations personnelles</span>
    </div>   
    <div class="utilisateur_infospersos_body">
          <span>Pseudo</span><div class="utilisateur_infospersos_input_pseudo"><input type="text" /></div>
          <span>Date de naissance</span><div class="utilisateur_infospersos_input_ddn"><input type="text" /></div>
          <span>Ville</span><div class="utilisateur_infospersos_input_ville"><input type="text" /></div>
          <span>Profession</span><div class="utilisateur_infospersos_input_profession"><input type="text" /></div>
          <span>Mot de passe</span><div class="utilisateur_infospersos_input_mdp"><input type="text" /></div>
          <span>Validation mot de passe</span><div class="utilisateur_infospersos_input_confirmmdp"><input type="text" /></div>
          <span>Email</span><div class="utilisateur_infospersos_input_email"><input type="text" /></div>
          <span>Validation email</span><div class="utilisateur_infospersos_input_confirmemail"><input type="text" /></div>
          <span>Téléphone</span><div class="utilisateur_infospersos_input_tel"><input type="text" /></div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Modifier mes informations</a></div>
        
    </div>
</div>
</html>