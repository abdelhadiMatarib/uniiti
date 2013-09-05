<?php include'../config/configuration.inc.php';
include'../includes/head.php';
include'../includes/js.php';?>
<h1>BOX NORMALE v</h1>
<!-- VIGNETTE TYPE -->
                        <div class="box" id="">

                                <header>
                                        <div class="box_icon"><img src="../img/pictos_commerces/restaurant.png" title="" alt="" /></div>
<!--					<div class="box_desc" onclick="location.href='.html';">
                                                <div class="box_desc" onclick="location.href='/.html';">
-->					<div class="box_desc" onclick="location.href=''">
                                                        <span class="box_title" title=""></span>
                                                        <span class="box_subtitle">Restauration</span>
                                        </div>
                                </header>

                                <figure>
                                        <div class="box_mark">
                                                <div class="box_stars">
                                                        
                                                </div>
                                                <div class="box_headratings"><span> avis</span></div>
                                        </div>

                                        <div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
                                        <div class="box_push_et_img">
                                        <img src="../img/photos_commerces/1.jpg" title="" alt="" />
                                        <div class="box_push"></div>
                                        </div>
                                        <div class="overlay_push">
                                            <div class="push_buttons_wrapper">
                                                    <div onclick="OuvrePopin({}, '/includes/popins/like_step1.tpl.php', 'default_dialog');" class="push_buttons_like"><a href="#" title=""></a></div>
                                                    <div onclick="OuvrePopin({}, '/includes/popins/dislike_step1.tpl.php', 'default_dialog');" class="push_buttons_dislike"><a href="#" title=""></a></div>
                                                    <div onclick="OuvrePopin({}, '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');" class="push_buttons_wishlist"><a href="#" title=""></a></div>
                                            </div>
                                        </div>
                                </figure>


                                <section onclick="OuvrePopin({},'/includes/popins/presentation_action_commentaire.tpl.php', 'default_dialog_large');">
                                        <div class="box_useraction"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>"><span></span></a> a noté</div>
                                        <div class="box_usertext"><figcaption><span>4/5 |</span></figcaption></div>
                                <div class="arrow_up"></div>
                                </section>

                                <footer>

                                        <div class="box_foot">
                                                <div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                                                <div class="box_posttime"><time>Il y a <strong></strong></time></div>
                                                <div class="box_posttype"><img src="../img/pictos_actions/notation.png" title="" alt="" /></div>
                                        </div>
                                </footer>

                        </div>
                        <!-- FIN VIGNETTE TYPE -->
<h1>BOX RECOMMANDATIONS v</h1>
<!-- VIGNETTE TYPE -->
                        <div class="box" id="">

                                <header>
                                        <div class="box_icon"><img src="../img/pictos_commerces/restaurant.png" title="" alt="" /></div>
<!--					<div class="box_desc" onclick="location.href='.html';">
                                                <div class="box_desc" onclick="location.href='/.html';">
-->					<div class="box_desc" onclick="location.href=''">
                                                        <span class="box_title" title=""></span>
                                                        <span class="box_subtitle">Restauration</span>
                                        </div>
                                </header>

                                <figure>
                                        <div class="box_mark">
                                                <div class="box_stars">
                                                        
                                                </div>
                                                <div class="box_headratings"><span> avis</span></div>
                                        </div>

                                        <div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
                                        <div class="box_push_et_img">
                                        <img src="../img/photos_commerces/1.jpg" title="" alt="" />
                                        <div class="box_push"></div>
                                        </div>
                                        <div class="overlay_push">
                                            <div class="push_buttons_wrapper">
                                                    <div onclick="OuvrePopin({}, '/includes/popins/like_step1.tpl.php', 'default_dialog');" class="push_buttons_like"><a href="#" title=""></a></div>
                                                    <div onclick="OuvrePopin({}, '/includes/popins/dislike_step1.tpl.php', 'default_dialog');" class="push_buttons_dislike"><a href="#" title=""></a></div>
                                                    <div onclick="OuvrePopin({}, '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');" class="push_buttons_wishlist"><a href="#" title=""></a></div>
                                            </div>
                                        </div>
                                </figure>


                                <section onclick="OuvrePopin({},'/includes/popins/utilisateur_interface_recommandations.tpl.php', 'default_dialog_large');">
                                    <div class="box_useraction_recommandations"><span>Recommandé pour vous</span><span class="reco_txt_normal">car vous avez noté le</span><span>Restaurant Positano</span></div>
                                        <div class="box_usertext"><figcaption><span></span></figcaption></div>
                                <div class="arrow_up"></div>
                                </section>
                            
                            <style>
                                .box_useraction_recommandations span{display:block;}
                                .box_useraction_recommandations span.reco_txt_normal{color:#252525;font-weight:normal;}
                                .box_useraction_recommandations{text-align:center;}
                                .box_posttime_new{padding:15px 0 0 26px;float: left;width: 84px;vertical-align: middle; text-align:center;color:#252525;height: 35px;}
                                .box_new_item{padding:0px 7px 2px 7px;background-color:#ff4343;font-size:12px;color:white;font-weight:400;border-radius:3px;}
                                .box_avis_attente_commercant_wrap{padding:10px 0;text-align:center;}
                                .box_avis_attente_commercant_wrap span{display:block;}
                            </style>

                                <footer>

                                        <div class="box_foot">
                                                <div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                                                <div class="box_posttime_new"><span class="box_new_item">nouveau</span></div>
                                                <div class="box_posttype"><img src="../img/pictos_actions/notation.png" title="" alt="" /></div>
                                        </div>
                                </footer>

                        </div>
                        <!-- FIN VIGNETTE TYPE -->
<h1>BOX AVIS EN ATTENTE COMMERCANT v</h1>
<!-- VIGNETTE TYPE -->
        <div class="box" id="">
            
            <header>
                <div class="box_icon"><img src="../img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc" onclick="location.href=''">
                    <span class="box_title" title=""></span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="../img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
						
					</div>
                    <div class="box_headratings"><span> avis</span></div>
                </div>
            </figure>
            
            <section onclick="OuvrePopin({},'/includes/popins/avisenattente.tpl.php', 'default_dialog_large');">
                <div class="box_useraction"><a href=""><span></span></a> a noté</div>
                <div class="box_usertext"><figcaption><span> 4/5 |</span></figcaption></div>
                <div class="box_avis_attente_commercant_wrap">
                    <span>Vous avez la possibilité de le</span>
                    <span>signaler, publier ou </span>
                    <span>commenter !</span>
                </div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href=""><img src="../img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong></strong></time></div>
                    <div class="box_posttype"><img src="../img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
	<!-- FIN VIGNETTE TYPE -->
<h1>BOX AVIS EN ATTENTE UTILISATEUR v</h1>
<!-- VIGNETTE TYPE -->
        <div class="box" id="">
            
            <header>
                <div class="box_icon"><img src="../img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc" onclick="location.href=''">
                    <span class="box_title" title=""></span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="../img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
						
					</div>
                    <div class="box_headratings"><span> avis</span></div>
                </div>
            </figure>
            
            <section onclick="OuvrePopin({},'/includes/popins/avisenattente.tpl.php', 'default_dialog_large');">
                <div class="box_useraction"><a href=""><span>Vous</span></a> avez noté</div>
                <div class="box_usertext"><figcaption><span> 4/5 |</span></figcaption></div>
                <div class="box_avis_attente_commercant_wrap">
                    <span>Vous avez la possibilité de le</span>
                    <span>le modifier</span>
                </div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href=""><img src="../img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong></strong></time></div>
                    <div class="box_posttype"><img src="../img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
	<!-- FIN VIGNETTE TYPE -->