<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Infos pratiques</span>
    </div>   
    <div class="menutarifs_body">
        <div class="infospratiques_body_horaires">
            <div class="menutarifs_body_entrees_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_horaires.png" title="" alt="" height="22" width="22" /></div><span>Horaires d'ouverture</span>
            </div>
            <script>
                $('.bouton_infos_modif').click(function(){
                    if ($(this).hasClass('bouton_commerce_ferme')){
                        $(this).removeClass('bouton_commerce_ferme');
                        $(this).addClass('bouton_commerce_ouvert');
                        $(this).parent().find('input').attr('disabled','disabled').val('');
                        $(this).parent().next(':first').removeClass('horaires_commerces_ouvert');
                        $(this).parent().next(':first').addClass('horaires_commerces_ferme');
                    }
                    else if ($(this).hasClass('bouton_commerce_ouvert')){
                        $(this).removeClass('bouton_commerce_ouvert');
                        $(this).addClass('bouton_commerce_ferme');
                        $(this).parent().find('input').removeAttr('disabled');
                        $(this).parent().next(':first').removeClass('horaires_commerces_ferme');
                        $(this).parent().next(':first').addClass('horaires_commerces_ouvert');
                    }
                });
        </script>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Lh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Lh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Lh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Lh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Lh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Lh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Lh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Lh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Lh8" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh1')" />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Lundi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Mh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Mh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Mh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Mh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Mh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Mh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Mh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Mh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Mh8" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh1')" />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Mardi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="MMh1" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="MMh2" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="MMh3" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="MMh4" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="MMh5" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="MMh6" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="MMh7" type="text" maxlength=2 onkeyup="moveToNext(this,'MMh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="MMh8" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh1')" />
                </div>                
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Mercredi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Jh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Jh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Jh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Jh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Jh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Jh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Jh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Jh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Jh8" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh1')" />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Jeudi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Vh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Vh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Vh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Vh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Vh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Vh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Vh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Vh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Vh8" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh1')" />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Vendredi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Sh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Sh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Sh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Sh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Sh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Sh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Sh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Sh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Sh8" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh1')" />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Samedi</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique">
                <span>De</span>
                <div class="input_infos_horaires">
                    <input id="Dh1" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh2')"/>
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Dh2" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh3')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Dh3" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh4')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Dh4" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh5')" />
                </div>
                <span> et de </span>
                <div class="input_infos_horaires">
                    <input id="Dh5" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh6')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Dh6" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh7')" />
                </div>
                <span> à </span>
                <div class="input_infos_horaires">
                    <input id="Dh7" type="text" maxlength=2 onkeyup="moveToNext(this,'Dh8')" />
                </div>
                <span>h.</span>
                <div class="input_infos_horaires">
                    <input id="Dh8" type="text" maxlength=2 />
                </div>
                <div class="bouton_infos_modif bouton_commerce_ferme"></div>
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Dimanche</span>
            </div>
        
        </div>
        <div class="infospratiques_body_parking">
            <div class="menutarifs_body_entrees_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_parking.png" title="" alt="" height="22" width="22" /></div><span>Parking à proximité</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique"><span><input type="text" class="input_infos_horaires input_parking" placeholder="Parking 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique prix_generique_infospratiques"><input type="text" maxlength=2 class="input_infos_horaires input_parking_mini" placeholder="Prix"/><span class="span_float_left">/h.</span></div>
            
        </div>
        <div class="infospratiques_body_metro">
            <div class="menutarifs_body_plats_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_metro.png" title="" alt="" height="22" width="22" /></div><span>Métro à proximité</span>
            </div>
            
            <div class="menutarifs_body_entrees_entree_generique"><span><input type="text" class="input_infos_horaires input_parking" placeholder="Station de métro 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique prix_generique_infospratiques prix_generique_bouton_map_wrap"><span><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            
        </div>
        <div class="infospratiques_body_velib">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_velib.png" title="" alt="" height="22" width="22" /></div><span>Station vélib' à proximité</span>
            </div>
            
            <div class="menutarifs_body_entrees_entree_generique"><span><input type="text" class="input_infos_horaires input_parking" placeholder="Nom de la station 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique prix_generique_infospratiques prix_generique_bouton_map_wrap"><span><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            
        </div>
        <div class="infospratiques_body_autolib">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_autolib.png" title="" alt="" height="22" width="22" /></div><span>Station Autolib' à proximité</span>
            </div>
            
            <div class="menutarifs_body_entrees_entree_generique"><span><input type="text" class="input_infos_horaires input_parking" placeholder="Nom de la station 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique prix_generique_infospratiques prix_generique_bouton_map_wrap"><span><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_map.png" title="" alt="" height="18" width="18" /></a></span></div>
            
        </div>
        <div class="infospratiques_body_paiements">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_paiements.png" title="" alt="" height="22" width="22" /></div><span>Paiements acceptés</span>
            </div>
            <div class="menutarifs_body_entrees_prix_generique paiement_generique1"><span class="img_container_payment_options img_container_payment_options1"></span></div>
            <div class="menutarifs_body_entrees_prix_generique paiement_generique2"><span class="img_container_payment_options img_container_payment_options2"></span></div>
            <div class="menutarifs_body_entrees_prix_generique paiement_generique3"><span class="img_container_payment_options img_container_payment_options3"></span></div>
            <div class="menutarifs_body_entrees_prix_generique paiement_generique4"><span class="img_container_payment_options img_container_payment_options4"></span></div>
            <div class="menutarifs_body_entrees_prix_generique paiement_generique5"><span class="img_container_payment_options img_container_payment_options5"></span></div>
        </div>
        <div class="infospratiques_body_voiturier">
            <div class="menutarifs_body_desserts_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_voiturier.png" title="" alt="" height="22" width="22" /></div><span>Service de voiturier</span>
            </div>
            <div class="infospratiques_body_voiturier">
                <div class="infospratiques_body_voiturier_inside">
                <input type="button" class="button_voiturier_choix" value="Oui"/>
                <input type="button" class="button_voiturier_choix" value="Non"/>
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
<script>
        function moveToNext(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
</script>
</html>
