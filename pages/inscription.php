<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <?php
        include_once '../config/configuration.inc.php';
        include'../includes/head.php'; ?>
    <body>
        <?php include'../includes/header.php'; ?>
        <div class="big_wrapper">
            
            <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="../img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_fb_wrap">
                <div class="inscription_fb_plus"><a href="#" title=""><img src="../img/pictos_inscription/plus_fb.png" height="48" width="48" title="" alt=""/></a></div>
                <a class="fb_connect_pourquoi" href="#" title="Pourquoi se connecter avec Facebook ?">Pourquoi ?</a>
                <div class="fb_connect_button">
                    <div class="fb_connect_button_wrap_text">
                    <span class="fb_connect_button_text">Inscription avec</span>
                    <span class="fb_connect_button_highlight"> Facebook</span>
                    </div>
                </div>
            </div>
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3"><h3>Vos centres d'intérêts</h3></div>
            </div>
            <div class="inscription_fields_left">
                <div class="inscription_field_sexe inscription_border_bottomright">Sexe *</div>
                <button class="inscription_field_sexe_button inscription_field_sexe_button_h" id="button_homme">Homme</button><button class="inscription_field_sexe_button inscription_field_sexe_button_f" id="button_femme">Femme</button>
                <div class="clearfix"></div>
                <div class="inscription_field_nom inscription_border_bottomright">Nom *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_prenom inscription_border_bottomright">Prénom *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_mail inscription_border_bottomright">Adresse mail *</div>
                <input class="inscription_field_input_text" type="mail"/>
                <div class="clearfix"></div>
                <div class="inscription_field_confirmmail inscription_border_bottomright">Confirmation *</div>
                <input class="inscription_field_input_text" type="mail"/>
                <div class="clearfix"></div>
            </div>
            <div class="inscription_fields_right">
                <div class="inscription_field_pseudo inscription_border_bottomright">Pseudo *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_parrain inscription_border_bottomright">Parrain</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_cp inscription_border_bottomright">Code postal *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_mdp inscription_border_bottomright">Mot de passe *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
                <div class="inscription_field_confirmmdp inscription_border_bottomright">Confirmation *</div>
                <input class="inscription_field_input_text" type="text"/>
                <div class="clearfix"></div>
            </div>
            <div class="inscription_charte">
                <div class="img_container"><img src="../img/pictos_inscription/charte.png" height="64" width="56" title="" alt=""/></div>
                <div class="inscription_charte_texte">
                    <p><strong>CHARTE DE CONFIDENTIALITÉ & CONDITIONS D’UTILISATION</strong></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet lorem pretium, blandit eros in, cursus nisl. Donec pharetra nisi massa. Nunc vitae leo sagittis, laoreet eros at, porttitor nibh. Mauris eleifend commodo lorem. Sed a pretium diam, ut volutpat mauris. Quisque adipiscing dui sit amet neque aliquet congue. Phasellus non mi lectus. Sed sit amet quam ac leo sodales ultrices.</p>
                </div>

            </div>
            <div class="inscription_next_step">
                <div class="inscription_current_step"><span class="inscription_current_step_number">1</span><span class="inscription_current_step_etape_texte">étape</span></div>
            </div>
            <div class="inscription_footer">
                <h4 class="inscription_footer_highlight">Nous nous engageons à protéger votre vie privée et votre adresse e-mail ne sera jamais vendue ni louée.</h4> 
                <h4 class="inscription_footer_text">En cliquant sur suivant, vous indiquez que vous acceptez notre Charte de confidentialité et nos Conditions d'utilisation.</h4>
                <div class="inscription_next_step_button"><a href="#" title="">Suivant</a></div>
            </div>
        </div><!-- FIN BIG WRAPPER --><div class="inscription_fields_right">
                
            </div>

 <?php include'../includes/js.php' ?>
    </body>
</html>