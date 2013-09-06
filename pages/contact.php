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

	if (!empty($_GET['id_contributeur'])) {$id_contributeur = $_GET['id_contributeur'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		
	$sql = "SELECT * FROM contributeurs WHERE id_contributeur = " . $id_contributeur;

	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
 
	$photo_contributeur     = $result['photo_contributeur'];
	$prenom_contributeur    = $result['prenom_contributeur'];
	$nom_contributeur       = $result['nom_contributeur'];
	$sexe_contributeur 		= $result['sexe_contributeur'];
	$cp_contributeur 		= $result['cp_contributeur'];
	$date_naissance_jour_contributeur 		= $result['date_naissance_jour_contributeur'];
	$date_naissance_mois_contributeur 		= $result['date_naissance_mois_contributeur'];
	$date_naissance_annee_contributeur 		= $result['date_naissance_annee_contributeur'];
	$email_contributeur 	= $result['email_contributeur'];

	$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
	$RequeteNow->execute();
	$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

	$age = Age($Maintenant[0]['Maintenant'], $date_naissance_jour_contributeur, $date_naissance_mois_contributeur, $date_naissance_annee_contributeur);

	$sql = "SELECT COUNT(avis_id_avis) AS count_avis FROM contributeurs_donnent_avis WHERE contributeurs_id_contributeur = " . $id_contributeur;

	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	$count_avis_contributeur = $result['count_avis'];
	
?>
<body>    
    <div id="default_dialog_large"></div>
    <div id="default_dialog"></div>
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
        <div class="big_wrapper">
            
            <div class="liseret_gris"></div>
            <div class="objet_head">
                <div class="objet_head_desc">
                    <div class="utilisateur_head_desc_title"><h2>Uniiti - Captain Opinion<?php /*echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); */?></h2></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="utilisateur_head_desc_avatar"><div class="img_container"><img src="../img/avatars/3.jpg" title="" alt="" height="120" width="120"/></div></div>
                    <div class="utilisateur_head_desc_desc"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address>24, Boulevard Poissonière<?php /*echo $adresse1_enseigne;*/ ?></address><span>75009 PARIS<?php /*echo $code_postal;*/ ?> <?php /*echo $ville_enseigne;*/ ?></span></div></div>
                    <div class="utilisateur_head_desc_desc2"><div class="img_container"><img src="../img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><span>01.41.75.29.17</span><span class="utilisateur_head_desc_desc2_lastcat">infos@uniiti.com</span></div>
                    </div>
                <div class="objet_head_note">
                    
                </div>
                <div class="objet_head_infos">
                    <div class="separateur"></div>
                    <div class="contact_bandeau_confiance"></div>
                </div>
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_right">
                <div class="utilisateur_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Avis</span></div><div class="img_container"><img src="../img/pictos_commerces/star_0.png" alt="" title="" height="18" width="21" /></div><div class="commerce_head2_text3_end"><span><?php /*echo $count_avis_contributeur; */?></span></div>
                <div class="utilisateur_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Abonnés</span></div><div class="img_container"><img src="../img/pictos_commerces/abonnes.png" alt="" title="" height="18" width="21" /></div><div class="commerce_head2_text3_end"><span>23</span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div id="map-canvas"></div>
            </div>
	</div>
    
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <style>
            .hidden_boxes{position:relative;z-index:-100;}
            .contact_wrap{position:relative;z-index:99;margin:14px 0;}
            .contact_head{border-radius:3px 3px 0 0;float:left;background-color:white;width:1249px;padding:10px;height:20px;}
            .contact_head span{font-size:1.2em;}
            .contact_body{float:left;}
            .contact_txt_items,.contact_input_items,.contact_textarea_items{float:left;background-color:#f0f0f0;}
            .contact_input_items{width:1018px;height:50px;border-top:1px solid #e4e4e4;}
            .contact_textarea_items{border-top:1px solid #e4e4e4;}
            .contact_txt_items{border-top:1px solid #e4e4e4;border-right:1px solid #e4e4e4;width:230px;height:30px;text-align:center;padding:10px;}
            .contact_txt_items span{font-size:1.2em;text-transform:uppercase;}
            .contact_input_items input{padding:10px;background-color:#f0f0f0;width:998px;height:29px;}
            .contact_textarea_items textarea{padding:10px;background-color:#f0f0f0;width:998px;resize:none;height:230px;}
            #contact_form_message{height:230px;}
            .contact_footer{width:1269px;}
        </style>
        
        <div class="contact_wrap">
            <div class="contact_head"><span>Contacter l'équipe Uniiti</span></div>
            <form>
            <div class="contact_body">
                <div class="contact_txt_items"><span>Nom*</span></div>
                <div class="contact_input_items"><input type="text" required /></div>
                <div class="contact_txt_items"><span>Prénom*</span></div>
                <div class="contact_input_items"><input type="text" required /></div>
                <div class="contact_txt_items"><span>Adresse mail*</span></div>
                <div class="contact_input_items"><input type="text" required /></div>
                <div class="contact_txt_items"><span>Sujet*</span></div>
                <div class="contact_input_items"><input type="text" required /></div>
                <div class="contact_txt_items" id="contact_form_message" ><span>Message*</span></div>
                <div class="contact_textarea_items"><textarea></textarea></div>
                <div class="contact_txt_items"><span>Captcha*</span></div>
                <div class="contact_input_items"></div>
            </div>
            <div class="contact_footer">
                <div class="bouton_envoyer_contact_wrap"><a href="#"><input type="submit" value="Envoyer"/></a></div>
            </div>
            </form>
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
    </div><!-- FIN BIGGY -->
        <!-- FOOTER -->
			<?php include '../includes/footer.php' ?>
        <!-- FIN FOOTER -->
        <?php include'../includes/js.php' ?>
        <!-- Google Map -->
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(48.871323, 2.344978),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <style>#map-canvas{width:100%;height:100%;}</style>
    </body>
</html>