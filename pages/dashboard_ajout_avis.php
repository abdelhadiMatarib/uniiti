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
            <style>
                .bg_dashboard{background-color:white;height:100%;}
                .dashboard_wrap{margin:0 auto;}
                .dashboard_title_wrap{text-transform:uppercase;margin:0 auto;text-align:center;width:630px;}
                .dashboard_title_wrap h1{font-weight:300;margin:40px 0;}
                .dashboard_title_wrap h1 span{font-weight:600;}
                
                .dashboard_panel,.dashboard_content{width:694px;min-height:460px;margin:0 auto;}
                .form_content{height:940px;}
                .form_content span{display:inline-block;font-size:1.4em;font-weight:600;}
                .dashboard_cube_ariane{width:228px;height:228px;margin:0 auto;margin-top:40px;}
                .dashboard_cube_ariane a{cursor:default;}
                
                .dashboard_cube_item{position:relative;line-height:1.85em;text-align:center;float:left;}
                .dashboard_cube_item_margin_right{margin-right:5px;}
                .dashboard_cube_item_haut{z-index:2;}
                .dashboard_cube_item_bas{z-index:1;}
                .dashboard_cube_item_margin_top{margin-top:-7px;}
                
                .dashboard_cube_item_c{background:url('../img/pictos_dashboard/cube_c.png');}
                .dashboard_cube_item_f{background:url('../img/pictos_dashboard/cube_f.png');}
                .dashboard_cube_item span{display:block;font-size:1.7em;font-weight:400;text-transform:uppercase;}
                .dashboard_cube_item span.dashboard_txt_bold{font-weight:700;}
                .dashboard_cube_item a{color:white;display:inline-block;padding-top:75px;height:115px;width:228px;}
                .dashboard_cube_item a.dashboard_cube_item_last{padding-top:90px;height:100px;}
                .dashboard_cube_item a:hover{color:#acacac;}
                
                .dashboard_cube_ombre{float:left;margin:-15px -25px 0 0;width:736px;height:93px;background:url('../img/pictos_dashboard/ombre_cube.png');}
                
                .dashboard_content h2{margin-top:0;text-transform:uppercase;font-size:1.7em;font-weight:600;border-bottom:1px solid #252525;}
                .dashboard_content span{display:inline-block;font-size:1.4em;}
                .dashboard_content span.dashboard_txt_bold{font-weight:700;margin-left:20px;}
                
                .dashboard_form_wrap{float:left;height:700px;}
                .dashboard_form_txt{float:left;}
                .dashboard_form_txt span{display:inline-block;}
                .dashboard_form_input{float:left;margin-bottom:15px;}
                .dashboard_form_input_right{float:right;margin-bottom:15px;}
                .dashboard_form_input input,.dashboard_form_input_right input{height:40px;border:1px dashed #252525;font-size:1.4em;font-weight:600;color:#acacac;}
                .dashboard_form_input textarea{resize:none;height:198px;width:674px;border:1px dashed #252525;padding:10px;font-size:1.4em;font-weight:600;color:#acacac;}
                .dashboard_form_input_radio{margin-top:7px;}
                
                .dashboard_form_avis_date{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_date{width:155px;padding-left:10px;}
                .dashboard_form_avis_heure{height:33px;padding-top:7px;margin-right:20px;margin-left:60px;}
                input#dashboard_form_avis_heure{width:155px;padding-left:10px;}
                .dashboard_form_avis_commerce{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_commerce{width:570px;padding-left:10px;}
                .dashboard_form_avis_commentaire{height:33px;margin-right:20px;}
                .dashboard_form_avis_note{height:33px;padding-top:7px;margin-right:20px;}
                .dashboard_form_avis_nom{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_nom{width:520px;padding-left:10px;}
                .dashboard_form_avis_prenom{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_prenom{width:520px;padding-left:10px;}
                .dashboard_form_avis_ddn{height:33px;padding-top:7px;margin-right:20px;}
                .dashboard_form_avis_ddn_dd{text-align:center;width:155px;padding-left:10px;}
                .dashboard_form_avis_ddn_mm{text-align:center;width:155px;padding-left:10px;}
                .dashboard_form_avis_ddn_yyyy{text-align:center;width:155px;padding-left:10px;}
                
                .dashboard_form_avis_email{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_email{width:520px;padding-left:10px;}
                .dashboard_form_avis_tel{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_tel{width:520px;padding-left:10px;}
                
                .dashboard_form_note_wrap{margin:0 0 0 220px;}
                a.note_avis_etoile{background:url('../img/pictos_dashboard/etoile_avis.png');display:inline-block;margin-right:10px;height:45px;width:48px;}
                a:hover.note_avis_etoile{background-position:0 -45px;}
                
                .dashboard_form_avis_invitations{margin-right:120px;height:33px;padding-top:7px;}
                input#dashboard_form_avis_invitations{margin:0 10px;height:13px;}
                input#dashboard_form_avis_invitations_non{margin:0 10px 0 40px;height:13px;}
                .dashboard_form_avis_frequence{margin-left:85px;height:33px;padding-top:7px;margin-right:20px;}
                div#dashboard_form_avis_frequence{width:123px;height:40px;border:1px dashed #252525;text-align:center;}
                div#dashboard_form_avis_frequence select{background-color:white;list-style:none;display:block;padding:8px;font-size:1.4em;}
            
                .dashboard_form_input_submit_wrap{margin:0 auto;width:355px;}
                input.dashboard_form_input_submit{margin-top:20px;font-size:1.4em;padding:10px 40px;background-color:#a4ebf1;border:1px dashed #252525;}
            </style>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
            </div>
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
