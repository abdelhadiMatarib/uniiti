<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
		
	$sql = "SELECT id_enseigne, logotype_enseigne, nom_enseigne, adresse1_enseigne, cp_enseigne, ville_enseigne, pays_enseigne, telephone_enseigne, descriptif, note_moyenne, satisfaction_pourcent, certification_pro, code_visible, avis_visible, nom_type_enseigne, btn_donner_avis_visible, url
			FROM enseignes AS t1
			INNER JOIN types_enseigne AS t2
				ON t1.types_enseigne_id_type_enseigne = t2.id_type_enseigne
			WHERE id_enseigne = :id_enseigne
		";

	$req = $bdd->prepare($sql);

	$id_enseigne = $_GET['id_enseigne'];

	$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);

	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
           
	$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
	$RequeteNow->execute();
	$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

	$nom_enseigne            = $result['nom_enseigne'];
	$logotype_enseigne       = $result['logotype_enseigne'];
	$adresse1_enseigne       = $result['adresse1_enseigne'];
	$code_postal             = $result['cp_enseigne'];
	$ville_enseigne          = $result['ville_enseigne'];
	$pays_enseigne           = $result['pays_enseigne'];
	$telephone_enseigne      = $result['telephone_enseigne'];
	$descriptif              = $result['descriptif'];
	$certification_pro       = $result['certification_pro'];
	$code_visible            = $result['code_visible'];
	$avis_visible            = $result['avis_visible'];
	$nom_type_enseigne       = $result['nom_type_enseigne'];
	$btn_donner_avis_visible = $result['btn_donner_avis_visible'];
	$url                     = $result['url'];
?>

    <body>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
        <div class="big_wrapper" id="test">
            <div class="liseret_orange"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2><?php echo $nom_enseigne; ?></h2></div>
                    <div class="commerce_head_desc_social"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" /><span>Partager</span></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address><?php echo $adresse1_enseigne; ?></address><span><?php echo $code_postal; ?> <?php echo $ville_enseigne; ?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Commerce > Restauration</span><span class="commerce_head_desc_ariane_lastcat">Cuisine Asiatique - Chinoise</span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity"><div class="img_container" id="commerce_head_desc_identity_button"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></a></div><div id="commerce_head_desc_identity_wrap"><span><?php if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');?></span><a href="#" title="">www.chezlesartistes.com</a></div></div>
                    <div class="commerce_head_desc_prices"><div class="img_container" id="commerce_head_desc_prices_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/price.png" title="" alt="" height="21" width="21" /></a></div><div id="commerce_head_desc_prices_wrap"><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /></div></div>
                </div>
                <div class="commerce_head_note">
                    <div class="commerce_head_note_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                    </div>
                    <div class="center_note">
                    <span class="commerce_head_note_note">8,5</span><span class="commerce_head_note_note10">/10</span>
                    </div>
                    <span class="commerce_head_note_avis">26355 Avis</span>
                    <div class="commerce_head_note_reservation">
                        <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                        <div class="commerce_head_note_reserver"><a href="#" title=""><span><strong>Réserver</strong> une table</span></a></div>
                    </div>
                </div>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Menu</span><span class="commerce_head_infos_services_text_couleur">& Tarifs</span></div></div>
                    <div class="commerce_head_infos_infos"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur">Pratiques</span></div></div>
                    <div class="commerce_head_infos_suivre"><span>Suivre</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides">
                        <div class="infosrapides1"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div><span>Généreux</span><span>Chaleureux</span><span>Convivial</span></div>
                        <div class="infosrapides2"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides2.png" alt="" title="" height="25" width="26" /></div><span>Terrasse</span><span>Piscine</span><span>Voiturier</span></div>
                        <div class="clearfix_infosrapides"></div>
                        <div class="infosrapides3"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides3.png" alt="" title="" height="30" width="30" /></div><span>Sans gluten</span><span>Bio</span><span></span></div>
                        <div class="infosrapides4"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides4.png" alt="" title="" height="23" width="32" /></div><span>Entre amis</span><span>En famille</span><span>Séminaire</span></div>
                    </div>
                    
                </div>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo">
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_reseau"><span class="commerce_head2_text1">Son</span><span class="commerce_head2_text2">Réseau</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>2</span></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Avis</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>321</span></div>
                <div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Abonnés</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span>1258</span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale1"></div>
                <div class="ligne_verticale2"></div>
                <img src="<?php echo SITE_URL; ?>/img/photos_commerces/couv.jpg" title="" alt="" />
                <div class="commerce_concept"><span>Le concept</span><p><?php echo $descriptif ?></p></div>
                <div class="commerce_gerant"><div class="gerant_title"><p>Le gérant</p></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
                
                <div class="commerce_recos"><span>Recommandations</span><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="19" height="23" title="" alt="" /><p>guide michelin</div>
                <div class="commerce_labels"><span>Labels captain</span><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="23" height="23" title="" alt="" /><p>bio</p></div>
                
                <div class="wrapper_boutons">
                <div class="boutons"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_OK.png" height="22" width="27"/></a></div>
                <div class="boutons"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_NOK.png" height="22" width="27"/></a></div>
                <div class="boutons"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/wishlist.png" height="23" width="30"/></a></div>
                </div>
            </div>
        
        <!-- FILTRE DE TRI -->
        <?php include'../includes/filters.php' ?>
        <!-- FIN FILTRE DE TRI -->
        </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content utilisateur_boxes">
        <!-- VIGNETTE TYPE -->
        <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien, je le recommande vivement ! J’y suis allé pour la première fois ...</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
                <div class="box">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="Jean-Pierre F.">Jean-Pierre F.</span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span>9/10 - 254 avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span>Jean-Pierre F.</span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> Très bon restaurant, on y mange très bien.</figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong>2 min.</strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
        
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
    </body>
</html>