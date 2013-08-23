$(document).ready(function() {
    $('#recherche_avancee_button').click(function(){
        if(
        $('.overlay').is(':visible'))
        {
            $('.overlay').css('display','none');
        }
        else{$('.overlay').css('display','block');}
    $('.recherche_avancee_wrapper').load("includes/menus/recherche_avancee.tpl.php").stop().slideToggle(300);
    $('.header').css('z-index','1000');
    $('.recherche_avancee_wrapper').css('z-index','1001');
    });
    // GESTION DES POP-INS
    // initialize dialog
    /*var defaultdialog = $("#default_dialog").dialog({ 
        autoOpen: false,
        modal:true,
        draggable:false,
        resizable:false,
        width: 560
    });
    // call dialogs
    $('.not_signedin').click(function(e){console.log('youhou1');
        e.preventDefault(); //don't go to default URL
        // load content and open dialog
        defaultdialog.load('../includes/popins/ident.tpl.php').dialog('open');
    });
    $('.oublimdp_link').click(function(e){console.log('youhou2');
        e.preventDefault(); //don't go to default URL
        defaultdialog.load('../includes/popins/oublimdp.tpl.php').dialog('open');
    });
    $('.popin_close_button').click(function(e){
        e.preventDefault(); //don't go to default URL
        defaultdialog.dialog('close');
    });*/
    
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
       $('#header_menu').stop().slideToggle(150);
    });
    
     $(window).load(function(){resizeboxContainer()});
     $(window).resize(function(){
        clearTimeout(this.id);
        this.id = setTimeout(resizeboxContainer, 200);
        $("#default_dialog").dialog("option", "position", "center");
    });
});
        // Respond
        
    function resizeboxContainer(){
        
        // RESIZING THE WRAPPER DEPENDING ON BOXES CONTAINER
        
        var boxcontainersize = $('#box_container').width();
        
        if (boxcontainersize == 250){$('.big_wrapper').css('width',236);}
        if (boxcontainersize == 500){$('.big_wrapper').css('width',486);}
        if (boxcontainersize == 750){$('.big_wrapper').css('width',736);$('.commerce_couv').css('height',210);}
        if (boxcontainersize == 1000){$('.big_wrapper').css('width',986);$('.commerce_couv').css('height',282);}
        if (boxcontainersize == 1250){$('.big_wrapper').css('width',1236);$('.commerce_couv').css('height',353);}
        if (boxcontainersize == 1500){$('.big_wrapper').css('width',1486);$('.commerce_couv').css('height',425);}
        if (boxcontainersize == 1750){$('.big_wrapper').css('width',1736);$('.commerce_couv').css('height',496);}
        if (boxcontainersize == 2000){$('.big_wrapper').css('width',1986);}
        
        // RESIZING CONTENT DEPENDING ON SIZES
        
        /* 3 */if ($('.big_wrapper').width() == 736){
            
            // HEADER
            
            $('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','none');
            $('.header_button_menu').css('display','block');
            $('.header_rightnav').css('display','none');
            $('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
            $('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');
            
            // PAGE COMMERCE
            
            $('.commerce_head_infos .clearfix').css('display','block');
            $('.commerce_head_infos .separateur').css('display','block');
            $('.clearfix_infosrapides').css('display','none');
            
            $('.infosrapides3,.infosrapides4').css('display','none');
            $('.infosrapides1,.infosrapides2').css('margin-top','10px');
            $('.infosrapides1').css('margin-right','20px');
            $('.commerce_head_desc').css('width','294px');
            $('.commerce_head_desc_address').css('width','230px');
            $('.commerce_head_desc_identity').css('width','230px');
            $('.commerce_head_desc_ariane').css('width','40px');
            $('#commerce_head_desc_ariane_wrap').css('display','none');
            $('#commerce_head_desc_ariane_button').css('float','right');
            $('.commerce_head_desc_prices').css('width','40px');
            $('#commerce_head_desc_prices_wrap').css('display','none');
            $('#commerce_head_desc_prices_button').css('float','right');
            $('.commerce_head_desc_social').addClass('ipad_portrait_social');
            $('.commerce_head_desc_social span').css('display','block');
            $('.commerce_head_desc_social img').css('display','none');
            $('.commerce_head_desc_title').css('font-size','70%');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',88);
            $('.commerce_head_infos_suivre').css('width',70).css('height',88);
            $('.commerce_head_infos_suivre span').css('margin-bottom',15).css('margin-top',15);
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('text-align','center').css('margin','0');
            $('.commerce_head_infos_infos .img_container,.commerce_head_infos_services .img_container').css('padding-bottom',5).css('width',60).css('text-align','center').css('padding-top',10).css('height','35px');
            $('.commerce_head_infos .separateur').css('display','none');
            $('.commerce_head_infos_infosrapides').css('margin-left','18px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','90%').css('width',90).css('margin-top','2px');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('height',88);
            $('.commerce_head2_text1').css('margin-left',15);
            $('.commerce_head2_text2').css('margin-left',15);
            $('.commerce_head2_text3').css('margin-right',15);
            $('.commerce_head2_text3_end').css('margin-right',15);
            $('.commerce_recos').css('width','140px').css('height','55px');
            $('.commerce_labels').css('width','130px').css('right','160px').css('height','55px');
            $('.commerce_recos span').css('font-size','85%');
            $('.commerce_labels span').css('font-size','85%');
            $('.commerce_concept').css('width','272px').css('font-size','11px').css('line-height','12px').css('height','55px');
            $('.commerce_gerant').css('left','292px');
            $('.gerant_photo').css('width','75px');
            $('.gerant_title').css('font-size','75%').css('height','15px');
            $('.wrapper_boutons .boutons').addClass('boutons_ipad');
            $('.wrapper_boutons').css('top','15px');
            $('.commerce_head_note_reserver').css('font-size','1.1em')
            
            
            $('.ligne_verticale1').css('left','426px').css('height','210px');
            $('.ligne_verticale2').css('left','576px').css('height','210px');
            
            $('.ligne_verticale4').css('left','427px').css('height','210px');
            $('.ligne_verticale5').css('left','573px').css('height','210px');
                        
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
            $('.objet_head_infos .separateur').css('width','291px');
            $('.wrapper_boutons_objet').css('top','30px');
            
            $('.ligne_verticale3').css('left','602px').css('height','210px');
            
            //PAGE UTILISATEUR
            $('.utilisateur_head_desc_avatar .img_container img').css('height','80px').css('width','80px');
            $('.utilisateur_head_desc_desc').css('padding-left','100px').css('width','75px').css('font-size','80%');
            $('.utilisateur_head_desc_desc2').css('width','110px').css('font-size','80%');
            $('.utilisateur_gerant_photo').css('width','145px');
            
            //RECHERCHE AVANCÉE
            $('.recherche_avancee_left').css('line-height','2.4em');
            $('.recherche_avancee_left span').css('font-size','1.2em');
            $('.recherche_avancee_left a').css('height','26px');
            $('.recherche_avancee_img_container').css('height','50px');
            $('.recherche_avancee_img_container img').css('height','47.5px').css('width','48px');
        }
        /////////////////////////////////////////////////////////////////////////////////
        /* 4 */else if ($('.big_wrapper').width() == 986){
            
            // HEADER
            
            $('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
            $('.header_button_menu').css('display','block');
            $('.header_rightnav').css('display','block');
            $('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
            $('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');
            
            
            // PAGE COMMERCE
            
            $('.wrapper_boutons .boutons').removeClass('boutons_ipad');
            $('.wrapper_boutons').css('top','35px');
            
            $('.commerce_head_infos .clearfix').css('display','block');
            $('.commerce_head_infos .separateur').css('display','block');
            $('.clearfix_infosrapides').css('display','none');
            
            $('.commerce_concept').css('font-size','1em').css('line-height','1em').css('height','75px');
            $('.commerce_recos').css('width','180px').css('height','75px');
            $('.commerce_labels').css('width','180px').css('right','200px').css('height','75px');
            
            $('.commerce_head_desc_title').css('font-size','85%');
            $('.commerce_head_desc_social').removeClass('ipad_portrait_social');
            $('.commerce_head_desc_social img').css('display','inline-block');
            $('.commerce_head_desc_social span').css('display','none');
            $('.commerce_head_infos_infosrapides').css('margin-left','0px');
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',92).css('display','block').css('font-size','1em').css('margin-top','8px').css('margin-right','10px');
            $('.infosrapides1').css('margin-right','10px')
            $('.commerce_head_desc').css('width',418);
            $('.commerce_head_desc_address,.commerce_head_desc_identity').css('width','100px');
            $('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','120px');
            $('.commerce_head_desc_ariane').css('font-size','80%');
            $('#commerce_head_desc_ariane_wrap').css('display','block');
            $('#commerce_head_desc_ariane_button').css('float','left');
            $('#commerce_head_desc_prices_wrap').css('display','block');
            $('#commerce_head_desc_prices_button').css('float','left');
            $('.commerce_head_desc_address,.commerce_head_desc_identity').css('font-size','90%');
            $('.commerce_head_desc_address,.commerce_head_desc_ariane,.commerce_head_desc_identity,.commerce_head_desc_prices').css('width','195');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',142).css('height','82px');
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding',15).css('padding-top',22).css('padding-right',10).css('width','45px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','0.9em').css('margin-top',22).css('width','60px').css('text-align','left');
            $('.commerce_head_infos_infosrapides .img_container').css('width',35);
            $('.commerce_head_infos_suivre').css('width','85px').css('height','82px');
            $('.gerant_photo').css('width','96px');
            
            $('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
            $('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
            $('.commerce_head2_text2').css('margin-left','38px');
            $('.commerce_head2_text3').css('margin-right','36px');
            
            $('.ligne_verticale1').css('left','586px').css('height','280px');
            $('.ligne_verticale2').css('left','803px').css('height','280px');
            
            $('.ligne_verticale4').css('left','616px').css('height','280px');
            $('.ligne_verticale5').css('left','801px').css('height','280px');
            
            // PAGE OBJET
            $('.objet_head_desc_social').removeClass('ipad_portrait_social');
            $('.objet_head_desc_social img').css('display','inline-block');
            $('.objet_head_desc_social span').css('display','none');
            $('.objet_head_infos_services,.objet_head_infos_infos').css('width',150);
            $('.objet_head_infos_suivre').css('width',70);
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','10px').css('margin-left','0').css('margin-right','0').css('font-size','95%').css('width','80px').css('text-align','left');
            //$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css("font-size","0.8em");
            $('.objet_head_infos_services .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
            $('.objet_head_infos_services_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
            //$('.objet_head_infos_services_text_couleur').css('font-size','0.9em');
            
            $('.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
            $('.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
            //$('.objet_head_infos_infos_text_couleur').css('font-size','0.9em');
            
            $('.objet_head_desc').css('width','420px');
            $('.objet_head_desc_ouacheter').css('width','130px').css('font-size','1em');
            $('.objet_head_desc_ariane').css('width','160px').css('font-size','1em');
            $('.objet_head_desc_infosrapides').css('width','100px').css('display','block').css('font-size','1em');
            
            $('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','39px').css('height','41px');
            
            $('.ligne_verticale3').css('left','810px').css('height','280px');
            
            //PAGE UTILISATEUR
            $('.utilisateur_head_desc_desc').css('width','120px').css('padding-left','150px').css('font-size','1em');
            $('.utilisateur_head_desc_desc2').css('width','140px').css('font-size','1em');
            $('.utilisateur_head_desc_avatar .img_container img').css('height','120px').css('width','120px');
            $('.objet_head_infos .separateur').css('width','416px');

            //RECHERCHE AVANCÉE
            $('.recherche_avancee_left').css('line-height','2.8em');
            $('.recherche_avancee_left span').css('font-size','1.6em');
            $('.recherche_avancee_left a').css('height','32px');
            $('.recherche_avancee_img_container').css('height','60px');
            $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
        }
        /////////////////////////////////////////////////////////////////////////////////
        /* 5 */else if ($('.big_wrapper').width() == 1236){
            
            // HEADER
            
            $('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
            $('.header_button_menu').css('display','block');
            $('.header_rightnav').css('display','block');
            $('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
            $('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
                        
            // PAGE COMMERCE
            
            $('.wrapper_boutons .boutons').removeClass('boutons_ipad');
            $('.wrapper_boutons').css('top','70px');
            
            $('.commerce_head_desc_title').css('font-size','90%');
            $('.commerce_head_desc_social').removeClass('ipad_portrait_social');
            $('.commerce_head_desc_social img').css('display','inline-block');
            $('.commerce_head_desc_social span').css('display','none');
            
            $('.commerce_concept').css('font-size','1em').css('line-height','1em').css('height','75px');
            $('.commerce_recos').css('width','180px').css('height','75px');
            $('.commerce_labels').css('width','180px').css('right','200px').css('height','75px');
            
            $('.commerce_head_infos .clearfix').css('display','block');
            $('.commerce_head_infos .separateur').css('display','block');
            $('.clearfix_infosrapides').css('display','none');
            
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',122).css('font-size','1em').css('margin-top','10px').css('display','block');
            $('.infosrapides1,.infosrapides2,.infosrapides3').css('margin-right','0');
            $('.commerce_head_desc').css('width',545);
            $('.commerce_head_desc_address').css('width','250px').css('font-size','1em');
            $('.commerce_head_desc_ariane').css('width','270px').css('font-size','1em');
            $('#commerce_head_desc_ariane_wrap').css('display','block');
            $('#commerce_head_desc_ariane_button').css('float','left');
            $('#commerce_head_desc_prices_wrap').css('display','block');
            $('#commerce_head_desc_prices_button').css('float','left');
            $('.commerce_head_desc_identity').css('width','250px').css('font-size','1em');
            $('.commerce_head_desc_prices').css('width','270px').css('font-size','1em');;
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',200).css('height','82px');
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('padding-top','22px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','20px');
            $('.commerce_head_infos_suivre').css('width','88px').css('height','82px');
            $('.commerce_head_infos_infosrapides').css('margin-top','0px');
            $('.commerce_head_infos .separateur').css('margin-top','0px');
            $('.commerce_head_infos_suivre span').css('margin-bottom','12px').css('margin-top','12px');
            
            $('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
            $('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
            $('.commerce_head2_text2').css('margin-left','38px');
            $('.commerce_head2_text3').css('margin-right','36px');
            
            $('.ligne_verticale1').css('left','836px').css('height','352px');
            $('.ligne_verticale2').css('left','1032px').css('height','352px');
            
            $('.ligne_verticale4').css('left','866px').css('height','352px');
            $('.ligne_verticale5').css('left','1051px').css('height','352px');
        
            //PAGE OBJET
            $('.objet_head_desc').css('width',545);
            $('.objet_head_infos_services,.objet_head_infos_infos').css('width',200);
            $('.objet_head_infos_suivre').css('width',95);
            $('.objet_head_desc_ouacheter').css('width','160px');
            $('.objet_head_desc_ariane').css('width','200px');
            $('.objet_head_desc_infosrapides').css('width','150px');
            $('.wrapper_boutons_objet').css('top','90px');
            $('.objet_head_infos .separateur').css('width','540px');
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','1em');
            
            $('.ligne_verticale3').css('left','1060px').css('height','352px');
            
            //PAGE UTILISATEUR
            $('.utilisateur_head_desc_desc').css('width','180px').css('font-size','1em');
            $('.utilisateur_head_desc_desc2').css('width','180px').css('font-size','1em');
            
            //RECHERCHE AVANCÉE
            $('.recherche_avancee_left').css('line-height','3.8em');
            $('.recherche_avancee_left span').css('font-size','2.1em');
            $('.recherche_avancee_left a').css('height','44px');
            $('.recherche_avancee_img_container').css('height','96px');
            $('.recherche_avancee_img_container img').css('height','95px').css('width','96px');
        }
        /////////////////////////////////////////////////////////////////////////////////
        /* 6 */else if ($('.big_wrapper').width() == 1486){
            
            // HEADER
            
            $('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
            $('.header_button_menu').css('display','block');
            $('.header_rightnav').css('display','block');
            $('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
            $('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
            
            // PAGE COMMERCE
            
            $('.wrapper_boutons .boutons').removeClass('boutons_ipad');
            $('.wrapper_boutons').css('top','100px');
            
            $('.commerce_head_desc_title').css('font-size','1.1em');
            $('.commerce_head_desc_social').removeClass('ipad_portrait_social');
            $('.commerce_head_desc_social img').css('display','inline-block');
            $('.commerce_head_desc_social span').css('display','none');
            
            $('.commerce_concept').css('font-size','1em').css('line-height','1em').css('height','75px');
            $('.commerce_recos').css('width','180px').css('height','75px');
            $('.commerce_labels').css('width','180px').css('right','200px').css('height','75px');
            
            $('.commerce_head_infos .clearfix').css('display','block');
            $('.commerce_head_infos .separateur').css('display','block');
            $('.clearfix_infosrapides').css('display','none');
            
            $('.commerce_head_desc').css('width','670px');
            $('.commerce_head_desc_address,.commerce_head_desc_identity').css('width','350px').css('font-size','1em');;
            $('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','300px').css('font-size','1em');;
            $('#commerce_head_desc_ariane_wrap').css('display','block');
            $('#commerce_head_desc_ariane_button').css('float','left');
            $('#commerce_head_desc_prices_wrap').css('display','block');
            $('#commerce_head_desc_prices_button').css('float','left');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('width','266px').css('height','82px');
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('padding-top','22px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','20px').css('font-size','1em');;
            $('.commerce_head_infos_suivre').css('width','88px').css('height','82px');
            $('.commerce_head_infos_infosrapides').css('margin-top','0px').css('margin-left','0px');
            $('.infosrapides1').css('margin-right','50px');
            $('.infosrapides2,.infosrapides3').css('margin-right','50px');
            $('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('margin-top','8px').css('display','block');
            $('.commerce_head_infos .separateur').css('margin-top','0px');
            $('.commerce_head_infos_suivre span').css('margin-bottom','12px').css('margin-top','12px');
            
            $('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
            $('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
            $('.commerce_head2_text2').css('margin-left','38px');
            $('.commerce_head2_text3').css('margin-right','36px');
            
            $('.ligne_verticale1').css('left','1086px').css('height','424px');
            $('.ligne_verticale2').css('left','1284px').css('height','424px');
            
            // PAGE UTILISATEUR
            $('.objet_head_desc').css('width','665px');
            $('.utilisateur_head_desc_desc').css('width','220px');
            $('.objet_head_infos_infos,.objet_head_infos_services').css('width','265px');
            $('.objet_head_infos .separateur').css('width','670px');
            
            $('.ligne_verticale4').css('left','1119px').css('height','424px');
            $('.ligne_verticale5').css('left','1303px').css('height','424px');
            
            // PAGE OBJET
            $('.objet_head_desc_ouacheter').css('width','220px').css('font-size','1em');
            $('.objet_head_desc_ariane').css('width','230px').css('font-size','1em');
            $('.objet_head_desc_infosrapides').css('width','160px').css('display','block').css('font-size','1em');
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','1em');
            
            $('.ligne_verticale3').css('left','1312px').css('height','424px');
        
        }
        /////////////////////////////////////////////////////////////////////////////////
        /* 7 */else if ($('.big_wrapper').width() == 1736){
            
            // HEADER
            
            $('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
            $('.header_button_menu').css('display','block');
            $('.header_rightnav').css('display','block');
            $('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
            $('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
                        
            // PAGE COMMERCE
            
            $('.wrapper_boutons .boutons').removeClass('boutons_ipad');
            $('.wrapper_boutons').css('top','140px');
            
            $('.commerce_head_desc_title').css('font-size','1.2em');
            $('.commerce_head_desc_social').removeClass('ipad_portrait_social');
            $('.commerce_head_desc_social img').css('display','inline-block');
            $('.commerce_head_desc_social span').css('display','none');
            
            $('.commerce_head_desc').css('width','795px');
            $('.commerce_head_desc_address,.commerce_head_desc_identity').css('width','400px').css('font-size','1em');;
            $('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','360px').css('font-size','1em');;
            $('#commerce_head_desc_ariane_wrap').css('display','block');
            $('#commerce_head_desc_ariane_button').css('float','left');
            $('#commerce_head_desc_prices_wrap').css('display','block');
            $('#commerce_head_desc_prices_button').css('float','left');
            $('.commerce_head_infos .clearfix').css('display','none');
            $('.commerce_head_infos .separateur').css('display','none');
            $('.commerce_head_infos_suivre').css('float','right');
            $('.clearfix_infosrapides').css('display','block');
            $('.commerce_head_infos_services,.commerce_head_infos_infos').css('height','133px').css('width','200px');
            $('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','65px').css('padding-top','45px');
            $('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','40px').css('font-size','1em');
            $('.commerce_head_infos_infosrapides').css('margin-top','0px').css('margin-left','0px');
            $('.infosrapides1,.infosrapides2').css('margin-top','30px').css('margin-right','10px').css('width','100px').css('display','block');
            $('.infosrapides3,.infosrapides4').css('margin-top','20px').css('margin-right','10px').css('width','100px').css('display','block');
            $('.infosrapides1,.infosrapides3').css('margin-right','7px');
            $('.commerce_head_infos_suivre').css('width','115px').css('height','133px');
            $('.commerce_head_infos_suivre span').css('margin-bottom','36px').css('margin-top','36px');
            
            $('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
            $('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
            $('.commerce_head2_text2').css('margin-left','38px');
            $('.commerce_head2_text3').css('margin-right','36px');
            
            $('.ligne_verticale1').css('left','1336px').css('height','496px');
            $('.ligne_verticale2').css('left','1535px').css('height','496px');

            
            // PAGE UTILISATEUR
            $('.objet_head_desc').css('width','795px');
            $('.objet_head_infos_services').css('width','325px');
            $('.objet_head_infos_infos').css('width','325px');
            $('.objet_head_infos_suivre').css('width','94px');
            
            $('.ligne_verticale4').css('left','1368px').css('height','496px');
            $('.ligne_verticale5').css('left','1552px').css('height','496px');
            
            
            // PAGE OBJET
            $('.objet_head_desc_ouacheter').css('width','270px').css('font-size','1em');
            $('.objet_head_desc_ariane').css('width','270px').css('font-size','1em');
            $('.objet_head_desc_infosrapides').css('width','200px').css('display','block').css('font-size','1em');
            $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','1em');
            
            $('.ligne_verticale3').css('left','1562px').css('height','496px');
        }
  
}
     