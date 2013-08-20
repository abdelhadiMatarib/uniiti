$(document).ready(function() {
    
    // Boutons choix sexe formulaire d'inscription
$('#button_homme').click(function() {
$('.inscription_field_sexe_button_f').removeClass('inscription_field_sexe_bg');
$('.inscription_field_sexe_button_h').toggleClass('inscription_field_sexe_bg');
  });
$('#button_femme').click(function() {
$('.inscription_field_sexe_button_h').removeClass('inscription_field_sexe_bg');
$('.inscription_field_sexe_button_f').toggleClass('inscription_field_sexe_bg');
  });
  
    // Overlay bandeau accueil
$('#close_button_home').click(function() {
  $('#total_overlay').hide('fast');
    });
    
    // Menu déroulant header
    $('#header_usermenu,#header_usermenu2').click(function(){
       $('#header_menu').slideToggle(150);
    });
    
     $(window).load(function(){resizeboxContainer()});
     $(window).resize(function(){
        clearTimeout(this.id);
        this.id = setTimeout(resizeboxContainer, 200);
    });
});
        // Respond
        
    function resizeboxContainer(){
        
        var boxcontainersize = $('#box_container').width();
        if (boxcontainersize == 2000){$('.big_wrapper').css('width',1986);}
        if (boxcontainersize == 1750){$('.big_wrapper').css('width',1736);}
        if (boxcontainersize == 1500){$('.big_wrapper').css('width',1486);}
        if (boxcontainersize == 1250){$('.big_wrapper').css('width',1236);$('.commerce_couv').css('height',353);}
        if (boxcontainersize == 1000){$('.big_wrapper').css('width',986);$('.commerce_couv').css('height',282);}
        if (boxcontainersize == 750){$('.big_wrapper').css('width',736);}
        if (boxcontainersize == 500){$('.big_wrapper').css('width',486);}
        if (boxcontainersize == 250){$('.big_wrapper').css('width',236);}
        
        if ($('.big_wrapper').width() == 1236){
            
            // PAGE COMMERCE
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',122);
            $('.commerce_head_desc').css('width',545);
            $('.commerce_head_desc_address').css('width','250px');
            $('.commerce_head_desc_ariane').css('width','270px');
            $('.commerce_head_desc_identity').css('width','250px');
            $('.commerce_head_desc_prices').css('width','270px');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',200);
        
            //PAGE OBJET
            $('.objet_head_desc').css('width',545);
            $('.objet_head_infos_services,.objet_head_infos_infos').css('width',200);
            $('.objet_head_infos_suivre').css('width',95);
            $('.objet_head_desc_ouacheter').css('width','160px');
            $('.objet_head_desc_ariane').css('width','200px');
            $('.objet_head_desc_infosrapides').css('width','150px');
            $('.wrapper_boutons_objet').css('top','90px');
            
            //PAGE UTILISATEUR
            $('.utilisateur_head_desc_desc').css('width','180px');
    }
        
        if ($('.big_wrapper').width() == 986){
            
            // PAGE COMMERCE
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',92);
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('font-size','85%');
            $('.commerce_head_desc').css('width',418);
            $('.commerce_head_desc_ariane').css('font-size','80%');
            $('.commerce_head_desc_address,.commerce_head_desc_ariane,.commerce_head_desc_identity,.commerce_head_desc_prices').css('width','195');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',142);
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding',15);
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding-top',22);
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','0.9em');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top',22);
            $('.commerce_head_infos_infosrapides .img_container').css('width',35);
            $('.gerant_photo').css('width','96px');
            
            // PAGE OBJET
            $('.objet_head_infos_services,.objet_head_infos_infos').css('width',150);
            $('.objet_head_infos_suivre').css('width',70);
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','22px').css('margin-left','0').css('margin-right','0').css('font-size','95%');
            //$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css("font-size","0.8em");
            $('.objet_head_infos_services .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','5px').css('padding-top','12px');
            $('.objet_head_infos_services_classement').css('margin-top','2px').css("display","inline-block").css("font-size","1.1em");
            //$('.objet_head_infos_services_text_couleur').css('font-size','0.9em');
            
            $('.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','5px').css('padding-top','12px');
            $('.objet_head_infos_infos_classement').css('margin-top','2px').css('display','inline-block').css("font-size","1.1em");
            //$('.objet_head_infos_infos_text_couleur').css('font-size','0.9em');
            
            $('.objet_head_desc').css('width','420px');
            $('.objet_head_desc_ouacheter').css('width','130px');
            $('.objet_head_desc_ariane').css('width','160px');
            $('.objet_head_desc_infosrapides').css('width','100px');
            
            //$('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','28px').css('height','30px');
            
            //PAGE UTILISATEUR
            $('.utilisateur_head_desc_desc').css('width','120px').css('padding-left','150px');
            $('.utilisateur_head_desc_desc2').css('width','140px');
            $('.objet_head_infos .separateur').css('width','416px');
}
        
        if ($('.big_wrapper').width() == 736){
            
            // PAGE COMMERCE
            $('.infosrapides3,.infosrapides4').css('display','none');
            $('.infosrapides1,.infosrapides2').css('margin-top','10px');
            $('.infosrapides1').css('margin-right','20px');
            $('.commerce_head_desc_ariane').css('width','40px');
            $('#commerce_head_desc_ariane_wrap').css('display','none');
            $('#commerce_head_desc_ariane_button').css('float','right');
            $('.commerce_head_desc_prices').css('width','40px');
            $('#commerce_head_desc_prices_wrap').css('display','none');
            $('#commerce_head_desc_prices_button').css('float','right');
            $('.commerce_head_desc_social').addClass('ipad_portrait_social');
            $('.commerce_head_desc_social span').css('display','block');
            $('.commerce_head_desc_social img').css('display','none');
            $('.commerce_head_desc_title').css('font-size','80%');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',88);
            $('.commerce_head_infos_suivre').css('width',70).css('height',88);
            $('.commerce_head_infos_suivre span').css('margin-bottom',15).css('margin-top',15);
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('text-align','center').css('margin','0');
            $('.commerce_head_infos_infos .img_container').css('padding-bottom',5).css('width',45).css('text-align','center').css('padding-top',10);
            $('.commerce_head_infos_services .img_container').css('padding-bottom',5).css('width',45).css('text-align','center').css('padding-top',10);
            $('.commerce_head_infos .separateur').css('display','none');
            $('.commerce_head_infos_infosrapides').css('margin-left','18px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','90%').css('width',90);
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('height',88);
            $('.commerce_head2_text1').css('margin-left',15);
            $('.commerce_head2_text2').css('margin-left',15);
            $('.commerce_head2_text3').css('margin-right',15);
            $('.commerce_head2_text3_end').css('margin-right',15);
            $('.commerce_recos').css('width','140px').css('height','55px');
            $('.commerce_labels').css('width','140px').css('right','160px').css('height','55px');
            $('.commerce_recos span').css('font-size','85%');
            $('.commerce_labels span').css('font-size','85%');
            $('.commerce_concept').css('width','272px').css('font-size','11px').css('line-height','12px').css('height','55px');
            $('.commerce_gerant').css('left','292px');
            $('.gerant_photo').css('width','75px');
            $('.gerant_title').css('font-size','75%').css('height','15px');
            $('.wrapper_boutons .boutons').addClass('boutons_ipad');
            $('.wrapper_boutons').css('top','18px');
            $('.commerce_head_note_reserver').css('font-size','1.1em')
            
            //PAGE OBJET
            $('.objet_head_desc_social').addClass('ipad_portrait_social');
            $('.objet_head_desc_social span').css('display','block');
            $('.objet_head_desc_social img').css('display','none');
            
            $('.objet_head_desc').css('width','295px');
            $('.objet_head_desc_ouacheter').css('width','120px').css("font-size","85%");
            $('.objet_head_desc_ariane').css('width','150px').css("font-size","85%");
            $('.objet_head_desc_infosrapides').css('display','none');
            $('.objet_head_desc_title').css('font-size','80%');
            //$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css('display','none');

            $('.objet_head_infos_services,.objet_head_infos_infos').css('width',90);
            $('.objet_head_infos_suivre').css('width',65);
            
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','0');
            $('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','45px').css('padding-top','5px').css('padding-bottom','2px').css('text-align','center');
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','85%').css('width','90px').css('text-align','center');
            $('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('display','inline-block').css('font-size','95%').css('font-weight','bold').css('width','90px');
            $('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','28px').css('height','30px');
            $('.objet_head_infos_suivre').css('font-size','0.8em');
            $('.objet_head_infos_suivre_lastcat').css('margin-bottom','9px');
            $('.wrapper_boutons_objet').css('top','30px');
            
            //PAGE UTILISATEUR
            $('.objet_head_infos .separateur').css('width','291px');
            $('.utilisateur_head_desc_avatar .img_container img').css('height','80px').css('width','80px');
            $('.utilisateur_head_desc_desc').css('padding-left','100px').css('width','75px').css('font-size','80%');
            $('.utilisateur_head_desc_desc2').css('width','110px').css('font-size','80%');
    }
    
            // Boutons choix sexe formulaire d'inscription
        $('#commerce_head_desc_ariane_button').click(function() {

        });
  
    }
     