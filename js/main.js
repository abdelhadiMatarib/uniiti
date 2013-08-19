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
            
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',122);
            $('.commerce_head_desc').css('width',545);
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',200);
        
    }
        
        if ($('.big_wrapper').width() == 986){
            
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',92);
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('font-size','85%');
            $('.commerce_head_desc').css('width',418);
            $('.commerce_head_desc_address,.commerce_head_desc_ariane,.commerce_head_desc_identity,.commerce_head_desc_prices').css('font-size','80%');
            $('.commerce_head_desc_address,.commerce_head_desc_ariane,.commerce_head_desc_identity,.commerce_head_desc_prices').css('width','195');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',142);
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding',15);
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding-top',22);
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','0.9em');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top',22);
            $('.commerce_head_infos_infosrapides .img_container').css('width',35);
    }
        
        if ($('.big_wrapper').width() == 736){
            
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('display','none');
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
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',88).css('margin-top','25px');
            $('.commerce_head_infos_suivre').css('width',70).css('height',100).css('margin-top','25px');
            $('.commerce_head_infos_suivre span').css('margin-bottom',20).css('margin-top',22);
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('text-align','center').css('margin','0');
            $('.commerce_head_infos_infos .img_container').css('padding-bottom',10).css('width',45).css('text-align','center').css('padding-top',15);
            $('.commerce_head_infos_services .img_container').css('padding-bottom',10).css('width',45).css('text-align','center').css('padding-top',15);
            $('.commerce_head_infos .separateur').css('display','none');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','90%').css('width',90);
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('height',100);
            $('.commerce_head2_text1').css('margin-left',15);
            $('.commerce_head2_text2').css('margin-left',15);
            $('.commerce_head2_text3').css('margin-right',15);
            $('.commerce_head2_text3_end').css('margin-right',15);
            $('.commerce_recos').css('width','140px');
            $('.commerce_labels').css('width','140px').css('right','160px');
            $('.commerce_recos span').css('font-size','85%');
            $('.commerce_labels span').css('font-size','85%');
            $('.commerce_concept').css('width','272px').css('font-size','80%').css('line-height','12px');
            $('.commerce_gerant').css('left','292px');
            $('.gerant_photo').css('width','75px');
            $('.gerant_title').css('font-size','75%').css('height','15px');
            $('.wrapper_boutons .boutons').addClass('boutons_ipad');
            $('.wrapper_boutons').css('top','18px');
    }    
            // Boutons choix sexe formulaire d'inscription
        $('#commerce_head_desc_ariane_button').click(function() {

        });
  
    }
     $(window).load(function(){resizeboxContainer()});
     $(window).resize(function(){clearTimeout(this.id);
    this.id = setTimeout(resizeboxContainer, 200);});
     
});