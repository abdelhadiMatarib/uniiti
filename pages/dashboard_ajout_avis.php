<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
?>

    <body>
        <div class="bg_dashboard">
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content form_content">
                <h2>Saisir un avis</h2>
                    <div class="dashboard_form_wrap">
                        <form>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_date"><label for="dashboard_form_avis_date">Date</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <input type="text" id="dashboard_form_avis_date"/>
                            </div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_heure"><label for="dashboard_form_avis_heure">Heure</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <input type="text" id="dashboard_form_avis_heure"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_commerce"><label for="dashboard_form_avis_commerce">Commerce</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <input type="text" id="dashboard_form_avis_commerce"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_commentaire"><label for="dashboard_form_avis_commentaire">Commentaire</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <textarea id="dashboard_form_avis_commentaire"></textarea>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_note"><label for="dashboard_form_avis_note">Note</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <div class="dashboard_form_note_wrap" id="dashboard_form_avis_note">
                                    <a class="note_avis_etoile" href="#" title=""></a>
                                    <a class="note_avis_etoile" href="#" title=""></a>
                                    <a class="note_avis_etoile" href="#" title=""></a>
                                    <a class="note_avis_etoile" href="#" title=""></a>
                                    <a class="note_avis_etoile" href="#" title=""></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_nom"><label for="dashboard_form_avis_nom">Nom</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_nom"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_prenom"><label for="dashboard_form_avis_prenom">Prénom</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_prenom"/>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_ddn"><label for="dashboard_form_avis_ddn">Date de naissance</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" class="dashboard_form_avis_ddn_dd" id="dashboard_form_avis_ddn" maxlength=2 onkeyup="moveToNext(this,'mm')"/>
                                <input type="text" class="dashboard_form_avis_ddn_mm" id="mm" maxlength=2 onkeyup="moveToNext(this,'yyyy')"/>
                                <input type="text" class="dashboard_form_avis_ddn_yyyy" id="yyyy" maxlength=4 />
                            </div>
                           
                            <div class="clearfix"></div>
                            
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_email"><label for="dashboard_form_avis_email">Email</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_email"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_tel"><label for="dashboard_form_avis_tel">N° Tél.</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_tel"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_invitations"><label for="dashboard_form_avis_invitations">Invitations</label></span>
                            </div>
                            <div class="dashboard_form_input dashboard_form_input_radio">
                                <input type="radio" name="dashboard_invitation_choix" id="dashboard_form_avis_invitations" value="Oui"/><span><label for="dashboard_form_avis_invitations">Oui</label></span>
                                <input type="radio" name="dashboard_invitation_choix" id="dashboard_form_avis_invitations_non" value="Non"/><span><label for="dashboard_form_avis_invitations_non">Non</label></span>
                            </div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_frequence"><label for="dashboard_form_avis_frequence">Fréquence</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <div id="dashboard_form_avis_frequence">
                                    <select>
                                        <option>1x / mois</option>
                                        <option>2x / mois</option>
                                        <option>3x+ / mois</option>
                                    </select>
                                </div>
                            </div>
                            <div class="dashboard_form_input_submit_wrap">
                                <input type="submit" class="dashboard_form_input_submit" value="Envoyer le commentaire sur le flux" />
                            </div>
                        </form>
                    </div>
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
        <script>
        function moveToNext(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
</script>

    </body>
</html>
