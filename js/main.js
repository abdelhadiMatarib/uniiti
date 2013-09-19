datanvelements = {init:1};
$(".home_newsfeed").css({'display': 'none'});
function NouveauxElements(data) {

	$.ajax({
		type: "POST",
		url: "includes/requeteintervalle.php",
		data: datanvelements,
		dataType: "json",
	    beforeSend: function(x) {
	        if(x && x.overrideMimeType) {
            x.overrideMimeType("application/json;charset=UTF-8");
	        }
	    },
		success: function(data) {
					if (datanvelements.init) {datanvelements = data;}
					else if (data.total > datanvelements.total) {
						$(".home_newsfeed_number").html(data.total - datanvelements.total);
						$(".home_newsfeed").css({'display': 'block'});
						$(".home_newsfeed").click(function(){
							window.location.reload()
							$(".home_newsfeed").css({'display': 'none'});
						});
					}
				},
		error: function() {alert('Erreur sur url : ' + url);}
	});
}

function filter(){
	$('.rang2 li,.rang3 li,.rang4 li').hide();
	$(".filters").css({display: "block"});
	$('.rang0 li').click(function(){
		$('.rang1 li').show('slideUp');
		$('.rang2 li,.rang3 li,.rang4 li').hide('slideDown');
	});
	$('.rang1 li').click(function(){
	   $(this).siblings().hide('slideDown');
	   $('.rang2 li.'+$(this).attr('class').split(' ')[0]).show('slideUp');
	   $('.rang3 li,.rang4 li').hide('slideDown');
	});
	$('.rang2 li').click(function(){
	   $(this).siblings().hide('slideDown');
	   $('.rang3 li.'+$(this).attr('class').replace(" ", ".")).show('slideUp');
	   $('.rang4 li').hide('slideDown');
	});
	$('.rang3 li').click(function(){
	   $(this).siblings().hide('slideDown');
	   $('.rang4 li.'+$(this).attr('class').replace(" ", ".").replace(" ", ".")).show('slideUp');
	});
}
filter();

function OuvrePopin(data, url, div) {
	url = siteurl + url;
	//$("#dialog_overlay").fadeIn();
	$.ajax({
		async : false,
		type :"POST",
		url : url,
		data : data,
		success: function(html){
			$("#" + div).html(html).dialog('open');
		},
		error: function() {alert('Erreur sur url : ' + url);}
	});
	//$("#dialog_overlay").fadeOut();
}

function ActualisePopin(data, url, div) {
	url = siteurl + url;
	//$("#dialog_overlay").animate({display: "block"});
	$.ajax({
		async : false,
		type:"POST",
		url : url,
		data : data,
		success: function(html){
			$("#" + div).dialog('close').html(html).dialog('open');
		},
		error: function() {alert('Erreur sur url : ' + url);}
	});
	//$("#dialog_overlay").animate({display: "none"});
}

function OuvrePopinInscription(data) {
	$("#default_dialog").dialog('close');
	OuvrePopin(data, '/pages/inscription.php', 'default_dialog_inscription');
}

function OuvrePopinMotDePasseOublie(data) {
	$("#default_dialog").dialog('close');
	OuvrePopin(data, '/includes/popins/oublimdp.tpl.php', 'default_dialog');
}

function CreerOverlayPush() {
    // Push image box
    $('.box_push_et_img').click(function(e){
        e.preventDefault();//don't go to default URL
		var overlay_push = $(this).next('.overlay_push');
		overlay_push.click(function(e){
			e.preventDefault();//don't go to default URL
			$('.overlay_push').css('display','none');
		});
		$('.overlay_push').css('display','none');
		overlay_push.css('display','block');
    });
}
    // FLUX UTILISATEUR SWITCH BOUTONS
       $('.button_moving').click(function(e){
           e.preventDefault();
       $(this).css('float','left');
       $(this).siblings('.button_moving').css('float','right').slideDown();
	   if ($(this).hasClass('flux_utilisateur')) {SetFiltre({provenance:'all'});}
    });
    
    // Social buttons display
    $('.commerce_head_desc_social span').click(function(){
       $('.overlay_social_buttons').hide().fadeIn().toggleClass('overlay_social_buttons_specific');
       $('.overlay_social_buttons_specific img').css('margin-right','5px');
    });

var y = new Array;	
function AjusteCouvertures(NewWidth) {
	
	if ($('.commerce_couv').length > 0) {
		$('.commerce_couv').css('height',NewWidth*500/1750);
		$(".slidesjs2-control").css('width' ,NewWidth);
		for (i = 1 ; i <= 5 ; i++) {
			if ($('#couv'+i).length > 0) {
				$('#couv'+i).css({'margin-top' : -y[i]*NewWidth/1750});
			}
		}
	}
}
	
        // RESIZING THE WRAPPER DEPENDING ON BOXES CONTAINER
function resizeboxContainer(){
	var boxcontainersize = $('#box_container').width();
    var biggymarginer = $('.biggymarginer').width();

	if (boxcontainersize == 250){$('.big_wrapper').css('width',236);AjusteCouvertures(236);}
	if (boxcontainersize == 500){$('.big_wrapper').css('width',486);AjusteCouvertures(486);}
	if (boxcontainersize == 750){$('.big_wrapper').css('width',736);AjusteCouvertures(736);}
	if (boxcontainersize == 1000){$('.big_wrapper').css('width',986);AjusteCouvertures(986);}
	if (boxcontainersize == 1250){$('.big_wrapper').css('width',1236);AjusteCouvertures(1236);}
	if (boxcontainersize == 1500){$('.big_wrapper').css('width',1486);AjusteCouvertures(1486);}
	if (boxcontainersize == 1750){$('.big_wrapper').css('width',1736);AjusteCouvertures(1736);}
	if (boxcontainersize == 2000){$('.big_wrapper').css('width',1986);AjusteCouvertures(1986);}
	
	// RESIZING CONTENT DEPENDING ON SIZES
	
        // CHAMPS DE RECHERCHE AVANCÉE
        /* 3 */if ($('.big_wrapper').width() == 736){
    
        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','-120px');
        $('.recherche_avancee_left').css('line-height','2.2em').css('width','500px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.1em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','24px');
        $('.recherche_avancee_left a.recherche_mot_inactif').css('font-size','0.8em');
        $('.recherche_avancee_img_container').css('height','60px');
        $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
        }
        /* 4 */if ($('.big_wrapper').width() == 986){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center');
        $('.recherche_avancee_left').css('line-height','2.5em').css('width','600px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.3em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','26px');
        $('.recherche_avancee_img_container').css('height','60px');
        $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
        }
        /* 5 */else if ($('.big_wrapper').width() == 1236){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center');
        $('.recherche_avancee_left').css('line-height','2.5em').css('width','700px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.5em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','29px');
        $('.recherche_avancee_img_container').css('height','96px');
        $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
        }
        /* 6 */else if ($('.big_wrapper').width() == 1486){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center');
        $('.recherche_avancee_left').css('line-height','2.8em').css('width','800px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.6em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','33px');
        $('.recherche_avancee_img_container').css('height','96px');
        $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
        }
        /* 7 */else if ($('.big_wrapper').width() == 1736){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center');
        $('.recherche_avancee_left').css('line-height','3em').css('width','900px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.7em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','36px');
        $('.recherche_avancee_img_container').css('height','96px');
        $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
        }
        
        // CHAMPS DE RECHERCHE AVANCÉE
        
        
	/* 1 */if ($('.big_wrapper').width() == 236){
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','none');
		$('.header_button_menu').css('display','none');
		$('.header_rightnav').css('display','none');
		$('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');	
	}
	
	/* 1 */if ($('.big_wrapper').width() == 236){
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','none');
		$('.header_button_menu').css('display','none');
		$('.header_rightnav').css('display','none');
		$('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');	
	}
	
	/* 3 */if ($('.big_wrapper').width() == 736){
            
            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').css('width','20px');
                $('.commerce_head_desc_ariane').css('width','240px');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','none');
            });
            $('#commerce_head_desc_address_button').click(function(){
                $('.commerce_head_desc_ariane').css('width','40px');
                $('.commerce_head_desc_address').css('width','230px');
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','none');
            });
            $('#commerce_head_desc_identity_button').click(function(){
                $('.commerce_head_desc_prices').css('width','40px');
                $('.commerce_head_desc_identity').css('width','230px');
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','none');
            });
            $('#commerce_head_desc_prices_button').click(function(){
                $('.commerce_head_desc_identity').css('width','30px');
                $('.commerce_head_desc_prices').css('width','230px');
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','none');
            });
		
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
		$('.infosrapides1').css('margin-right','20px').css('width','120px');
                $('.infosrapides2').css('margin-right','0').css('width','110px');
		$('.commerce_head_desc').css('width','294px');
		$('.commerce_head_desc_address').css('width','230px').css('font-size','1em');
                $('.commerce_head_desc_address span').css('margin-top','0px');
                $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','12px');
		$('.commerce_head_desc_identity').css('width','230px');
                $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','12px').css('margin-top','5px');
		$('.commerce_head_desc_ariane').css('width','40px');
                $('.commerce_head_desc_ariane span').css('font-size','0.9em');
		$('#commerce_head_desc_ariane_wrap').css('display','none').css('line-height','12px').css('margin-top','5px');
		$('#commerce_head_desc_ariane_button').css('float','left');
		$('.commerce_head_desc_prices').css('width','40px');
		$('#commerce_head_desc_prices_wrap').css('display','none').css('line-height','12px');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_desc_social').css('margin-top','15px').addClass('ipad_portrait_social');
		$('.commerce_head_desc_social span').css('display','block');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','none');
                $('.commerce_head_desc_title h2').css('font-size','1em').css('margin-top','15px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','180px');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',88);
		$('.commerce_head_infos_suivre').css('width',70).css('height',88);
		$('.commerce_head_infos_suivre span').css('margin-bottom',15).css('margin-top',15);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('text-align','center').css('margin','0');
		$('.commerce_head_infos_infos .img_container,.commerce_head_infos_services .img_container').css('padding-bottom',5).css('padding-right','5px').css('padding-left','5px').css('width',80).css('text-align','center').css('padding-top',10).css('height','35px');
		$('.commerce_head_infos .separateur').css('display','none');
		$('.commerce_head_infos_infosrapides').css('margin-left','18px');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','90%').css('width',90).css('margin-top','2px');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('height',88);
		$('.commerce_head2_text1').css('margin-left',15);
		$('.commerce_head2_text2').css('margin-left',15);
		$('.commerce_head2_text3').css('margin-right',15);
		$('.commerce_head2_text3_end').css('margin-right',15);
                
		$('.commerce_recos').css('width','130px');
                $('.commerce_recos a').css('width','110px');
		$('.commerce_labels').css('width','141px').css('right','130px');
                $('.commerce_labels a').css('width','120px');
                
		$('.commerce_recos span').css('font-size','0.7em');
		$('.commerce_labels span').css('font-size','0.7em');
                
		$('.commerce_concept').css('width','272px').css('font-size','11px');
                $('.commerce_concept a').css('width','250px');
                $('.concept_content').css('overflow-y','scroll').css('overflow-x','hidden').css('max-height','165px');
		$('.commerce_gerant').css('left','272px');
		$('.gerant_photo').css('width','80px');
		$('.gerant_title').css('font-size','11px');
		$('.wrapper_boutons').css('top','15.5px');
                $('.wrapper_boutons .boutons').css('margin-bottom','0px');
		$('.commerce_head_note_reserver').css('font-size','1.1em')
		
		
		$('.ligne_verticale1').css('left','465px').css('height','210px');
		$('.ligne_verticale2').css('left','606px').css('height','210px');
		
		$('.ligne_verticale4').css('left','447px').css('height','210px');
		$('.ligne_verticale5').css('left','582px').css('height','210px');
                
                // COMMERCE INTERFACE
                $('.commerce_reservation_commerce').css('width','60px').css('height','28px').css('padding-top','5px').css('font-size','0.7em');
                $('.commerce_optin_commerce').css('width','60px').css('height','28px').css('padding-top','4px').css('font-size','0.7em');
                $('.commerce_optin_commerce span').css('margin-top','0px');
					
		//PAGE OBJET
		$('.objet_head_desc_social').addClass('ipad_portrait_social');
		$('.objet_head_desc_social span').css('display','block');
		$('.objet_head_desc_social img').css('display','none');
		
		$('.objet_head_desc').css('width','295px');
                $('.utilisateur_suggerer_commerce,.utilisateur_suggerer_objet').css('width','65px');
                $('.utilisateur_suggerer_commerce a').css('font-size',"0.85em");
		$('.utilisateur_suggerer_objet a').css('font-size',"0.85em");
		$('.objet_head_desc_ouacheter').css('width','120px').css("font-size","85%");
		$('.objet_head_desc_ariane').css('width','150px').css("font-size","85%");
		$('.objet_head_desc_infosrapides').css('display','none');
		$('.objet_head_desc_title').css('font-size','80%');
		//$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css('display','none');

		$('.objet_head_infos_services,.objet_head_infos_infos').css('width',90);
		$('.objet_head_infos_suivre').css('width',65);
		
		$('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','0');
		$('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','45px').css('padding-top','5px').css('padding-bottom','2px').css('padding-left','23px').css('padding-right','23px').css('text-align','center');
		$('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','0.85em').css('width','90px').css('text-align','center');
		$('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('display','inline-block').css('font-size','95%').css('font-weight','bold').css('width','90px');
		$('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','28px').css('height','30px');
		$('.objet_head_infos_suivre').css('font-size','0.8em');
		$('.objet_head_infos_suivre_lastcat').css('margin-bottom','9px');
		$('.objet_head_infos .separateur').css('width','291px');
		$('.wrapper_boutons_objet').css('top','30px');
		
		$('.ligne_verticale3').css('left','602px').css('height','210px');
		
		//PAGE UTILISATEUR
                $('.utilisateur_head_infos_suggestion').css('width',75).css('float','left');
		$('.utilisateur_head_desc_avatar img.user_avatar_target').css('height','60px').css('width','60px');
                $('.utilisateur_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','190px');
		$('.utilisateur_head_desc_desc').css('padding-left','90px').css('width','75px').css('font-size','0.8em');
		$('.utilisateur_head_desc_desc2').css('width','110px').css('font-size','80%');
		$('.utilisateur_gerant_photo').css('width','145px');
                
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar a.button_changer_couverture span').css('display','none');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar').css('width','12px').css('top','45px').css('left','35px');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar .utilisateur_interface_modifier_icon_noir').css('margin-left','0px');
	}
	/////////////////////////////////////////////////////////////////////////////////
	/* 4 */else if ($('.big_wrapper').width() == 986){
            
            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').css('width','195px');
                $('.commerce_head_desc_ariane').css('width','195px');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
                $('.commerce_head_desc_ariane').css('width','195px');
                $('.commerce_head_desc_address').css('width','195px');
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
                $('.commerce_head_desc_prices').css('width','195px');
                $('.commerce_head_desc_identity').css('width','195px');
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
                $('.commerce_head_desc_identity').css('width','195px');
                $('.commerce_head_desc_prices').css('width','195px');
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });

		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');
		
		
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','35.5px');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.commerce_concept').css('font-size','1em').css('width','370px');
                $('.commerce_gerant').css('left','370px');
                $('.commerce_concept a').css('width','350px');
                $('.concept_content').css('overflow-y','scroll').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
                $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
                $('.commerce_labels a').css('width','170px');
                
                $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');

                $('.commerce_head_desc_title h2').css('font-size','1.3em').css('margin-top','12px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','240px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','8px');
                $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		$('.commerce_head_infos_infosrapides').css('margin-left','0px');
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',92).css('display','block').css('font-size','1em').css('margin-top','6px').css('margin-right','10px');
		$('.infosrapides1').css('margin-right','10px')
		$('.commerce_head_desc').css('width',418);
		$('.commerce_head_desc_address,.commerce_head_desc_identity').css('width','100px');
                $('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('font-size','0.8em');
                $('.commerce_head_desc_address span').css('margin-top','0px');
                $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','12px');
		$('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','120px');
		$('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','12px').css('margin-top','5px');
		$('#commerce_head_desc_ariane_button').css('float','left');
                $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','12px').css('margin-top','5px');
                $('#commerce_head_desc_identity_button').css('float','left').css('height','20px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','12px');
		$('#commerce_head_desc_prices_button').css('float','left').css('height','20px');
		$('.commerce_head_desc_address,.commerce_head_desc_ariane,.commerce_head_desc_identity,.commerce_head_desc_prices').css('width','195');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',142).css('height','82px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('padding',15).css('padding-top',22).css('padding-left',10).css('padding-right',10).css('width','35px');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','0.9em').css('margin-top',22).css('width','60px').css('text-align','left');
		$('.commerce_head_infos_infosrapides .img_container').css('width',35);
		$('.commerce_head_infos_suivre').css('width','85px').css('height','82px');
		$('.gerant_photo').css('width','96px');
                $('.gerant_title').css('font-size','1em');
		
		$('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
		$('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
		$('.commerce_head2_text1').css('margin-left',38);
                $('.commerce_head2_text3_end').css('margin-right',36);
                $('.commerce_head2_text2').css('margin-left','38px');
		$('.commerce_head2_text3').css('margin-right','36px');
		
		$('.ligne_verticale1').css('left','627px').css('height','280px');
		$('.ligne_verticale2').css('left','812px').css('height','280px');
		
		$('.ligne_verticale4').css('left','636px').css('height','280px');
		$('.ligne_verticale5').css('left','811px').css('height','280px');

                // COMMERCE INTERFACE
                $('.commerce_reservation_commerce').css('width','75px').css('height','25px').css('padding-top','5px').css('font-size','0.8em');
                $('.commerce_optin_commerce').css('width','75px').css('height','26px').css('padding-top','4px').css('font-size','0.8em');
                $('.commerce_optin_commerce span').css('margin-top','0px');
		
		// PAGE OBJET
		$('.objet_head_desc_social').removeClass('ipad_portrait_social');
		$('.objet_head_desc_social img').css('display','inline-block');
		$('.objet_head_desc_social span').css('display','none');
		$('.objet_head_infos_services,.objet_head_infos_infos').css('width',150);
		$('.objet_head_infos_suivre').css('width',70);
		
		$('.utilisateur_head_infos_suggestion').css('width',80).css('float','left');
		$('.utilisateur_suggerer_commerce a').css('font-size',"0.85em");
		$('.utilisateur_suggerer_objet a').css('font-size',"0.85em");
		
		$('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','10px').css('margin-left','0').css('margin-right','0').css('font-size','95%').css('width','80px').css('text-align','left');
		//$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css("font-size","0.8em");
		$('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
		$('.objet_head_infos_services_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
		//$('.objet_head_infos_services_text_couleur').css('font-size','0.9em');
		
		$('.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
		//$('.objet_head_infos_infos_text_couleur').css('font-size','0.9em');
		
		$('.objet_head_desc').css('width','420px');
                $('.utilisateur_suggerer_commerce,.utilisateur_suggerer_objet').css('width','70px');
		$('.objet_head_desc_ouacheter').css('width','130px').css('font-size','1em');
		$('.objet_head_desc_ariane').css('width','160px').css('font-size','1em');
		$('.objet_head_desc_infosrapides').css('width','100px').css('display','block').css('font-size','1em');
		
		$('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','39px').css('height','41px');
		
		$('.ligne_verticale3').css('left','810px').css('height','280px');
		
		//PAGE UTILISATEUR
		$('.utilisateur_head_desc_desc').css('width','120px').css('padding-left','155px').css('font-size','1em');
                $('.utilisateur_head_desc_title h2').css('font-size','2em').css('margin-top','8px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','320px');
		$('.utilisateur_head_desc_desc2').css('width','120px').css('font-size','1em');
		$('.utilisateur_head_desc_avatar img.user_avatar_target').css('height','120px').css('width','120px');
		$('.objet_head_infos .separateur').css('width','416px');
                
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar a.button_changer_couverture span').css('float','left').css('display','block');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar').css('width','96px').css('top','103px').css('left','8px');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar .utilisateur_interface_modifier_icon_noir').css('margin-left','5px');
	
	}
	/////////////////////////////////////////////////////////////////////////////////
	/* 5 */else if ($('.big_wrapper').width() == 1236){
            
            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').css('width','250px');
                $('.commerce_head_desc_ariane').css('width','260px');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
                $('.commerce_head_desc_ariane').css('width','260px');
                $('.commerce_head_desc_address').css('width','250px');
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
                $('.commerce_head_desc_prices').css('width','270px');
                $('.commerce_head_desc_identity').css('width','250px');
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
                $('.commerce_head_desc_identity').css('width','250px');
                $('.commerce_head_desc_prices').css('width','270px');
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });
		
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
					
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','70px');
		$('.gerant_title').css('font-size','1em');

                $('.commerce_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','370px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','8px');
                $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		
		$('.commerce_concept').css('font-size','1em').css('width','370px');
                $('.commerce_gerant').css('left','370px');
                $('.commerce_concept a').css('width','350px');
                $('.concept_content').css('overflow-y','scroll').css('overflow-x','hidden').css('max-height','305px');
		$('.commerce_recos').css('width','174px');
                $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
                $('.commerce_labels a').css('width','170px');
                
                $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',122).css('font-size','1em').css('margin-top','6px').css('display','block');
		$('.infosrapides1,.infosrapides2,.infosrapides3').css('margin-right','12px');
                $('.infosrapides4').css('margin-right','0').css('width','110px');
		$('.commerce_head_desc').css('width',545);
		$('.commerce_head_desc_address').css('width','250px').css('font-size','0.8em');
                $('.commerce_head_desc_address span').css('margin-top','0px');
                $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','12px');
		$('.commerce_head_desc_ariane').css('width','260px').css('font-size','0.8em');
		$('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','12px').css('margin-top','5px');
		$('#commerce_head_desc_ariane_button').css('float','left');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','12px');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_desc_identity').css('width','250px').css('font-size','0.8em');
                $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','12px').css('margin-top','5px');
		$('.commerce_head_desc_prices').css('width','270px').css('font-size','1em');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',200).css('height','82px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('padding-top','22px').css('padding-left',20).css('padding-right',10);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','20px').css('font-size','1em').css('text-align','left');
		$('.commerce_head_infos_suivre').css('width','88px').css('height','82px');
		$('.commerce_head_infos_infosrapides').css('margin-top','0px');
		$('.commerce_head_infos .separateur').css('margin-top','0px');
		$('.commerce_head_infos_suivre span').css('margin-bottom','12px').css('margin-top','12px');
		
		$('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
		$('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
		$('.commerce_head2_text1').css('margin-left',38);
                $('.commerce_head2_text3_end').css('margin-right',36);
                $('.commerce_head2_text2').css('margin-left','38px');
		$('.commerce_head2_text3').css('margin-right','36px');
		
		$('.ligne_verticale1').css('left','877px').css('height','352px');
                
		$('.ligne_verticale2').css('left','1062px').css('height','352px');
		
		$('.ligne_verticale4').css('left','886px').css('height','352px');
		$('.ligne_verticale5').css('left','1061px').css('height','352px');
                
                // COMMERCE INTERFACE
                $('.utilisateur_head_infos_suggestion').css('width','100px');
                $('.commerce_reservation_commerce').css('width','85px').css('height','25px').css('padding-top','5px').css('font-size','0.8em');
                $('.commerce_optin_commerce').css('width','85px').css('height','26px').css('padding-top','4px').css('font-size','0.8em');
                $('.commerce_optin_commerce span').css('margin-top','0px');
	
		//PAGE OBJET
		$('.objet_head_desc').css('width',545);
                $('.utilisateur_suggerer_commerce,.utilisateur_suggerer_objet').css('width','95px');
                $('.utilisateur_suggerer_commerce a').css('font-size',"1em");
		$('.utilisateur_suggerer_objet a').css('font-size',"1em");
		$('.objet_head_infos_services,.objet_head_infos_infos').css('width',200);
		$('.objet_head_infos_suivre').css('width',95);
		$('.objet_head_desc_ouacheter').css('width','160px');
		$('.objet_head_desc_ariane').css('width','200px');
		$('.objet_head_desc_infosrapides').css('width','150px');
		$('.wrapper_boutons_objet').css('top','90px');
		$('.objet_head_infos .separateur').css('width','540px');
		
                $('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('margin-top','15px').css('margin-left','0').css('margin-right','0').css('font-size','1em').css('width','80px').css('text-align','left');
		//$('.objet_head_infos_services_text_fin,.objet_head_infos_infos_text_fin').css("font-size","0.8em");
		$('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
		$('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em").css('font-weight','700');
		//$('.objet_head_infos_services_text_couleur').css('font-size','0.9em');
		
		$('.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
		//$('.objet_head_infos_infos_text_couleur').css('font-size','0.9em');
		$('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','39px').css('height','41px');
                
		$('.ligne_verticale3').css('left','1060px').css('height','352px');
		
		//PAGE UTILISATEUR
                $('.utilisateur_head_desc_avatar img.user_avatar_target').css('height','120px').css('width','120px');
		$('.utilisateur_head_desc_desc').css('width','180px').css('padding-left','190px').css('font-size','1em');
                $('.utilisateur_head_desc_title h2').css('font-size','2em').css('margin-top','8px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','440px');
		
		$('.utilisateur_head_desc_desc2').css('width','160px').css('font-size','1em');
                
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar a.button_changer_couverture span').css('float','left').css('display','block');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar').css('width','96px').css('top','103px').css('left','8px');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar .utilisateur_interface_modifier_icon_noir').css('margin-left','5px');
	
	}
	/////////////////////////////////////////////////////////////////////////////////
	/* 6 */else if ($('.big_wrapper').width() == 1486){
		
            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').css('width','350px');
                $('.commerce_head_desc_ariane').css('width','280px');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
                $('.commerce_head_desc_ariane').css('width','280px');
                $('.commerce_head_desc_address').css('width','350px');
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
                $('.commerce_head_desc_prices').css('width','280px');
                $('.commerce_head_desc_identity').css('width','350px');
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
                $('.commerce_head_desc_identity').css('width','350px');
                $('.commerce_head_desc_prices').css('width','280px');
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });
                
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
		
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','110px');

                $('.commerce_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','500px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','8px');
                $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		
                $('.commerce_concept').css('font-size','1em').css('width','370px');
                $('.commerce_gerant').css('left','370px');
                $('.commerce_concept a').css('width','350px');
                $('.concept_content').css('overflow-y','scroll').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
                $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
                $('.commerce_labels a').css('width','170px');
                
                $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.commerce_head_desc').css('width','670px');
		$('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('width','350px').css('font-size','1em');
                $('.commerce_head_desc_address span').css('margin-top','0px');
                $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','1.5em');
		$('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','280px');
		$('.commerce_head_desc_ariane span').css('font-size','1em');
                $('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','1.5em').css('margin-top','5px');
		$('#commerce_head_desc_ariane_button').css('float','left');
                $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','1.5em').css('margin-top','5px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','1.5em');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width','266px').css('height','82px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('width','35px').css('padding-top','22px').css('padding-left',70).css('padding-right',10);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','20px').css('font-size','1em').css('text-align','left');
		$('.commerce_head_infos_suivre').css('width','88px').css('height','82px');
		$('.commerce_head_infos_infosrapides').css('margin-top','0px').css('margin-left','0px');
		$('.infosrapides1').css('margin-right','50px');
		$('.infosrapides2,.infosrapides3').css('margin-right','50px');
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('margin-top','6px').css('display','block').css('width','120px');
		$('.commerce_head_infos .separateur').css('margin-top','0px');
		$('.commerce_head_infos_suivre span').css('margin-bottom','12px').css('margin-top','12px');
		
		$('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
		$('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
		$('.commerce_head2_text1').css('margin-left',38);
                $('.commerce_head2_text3_end').css('margin-right',36);
                $('.commerce_head2_text2').css('margin-left','38px');
		$('.commerce_head2_text3').css('margin-right','36px');
                $('.gerant_photo').css('width','96px');
                $('.gerant_title').css('font-size','1em');
		
		$('.ligne_verticale1').css('left','1127px').css('height','424px');
		$('.ligne_verticale2').css('left','1312px').css('height','424px');
		
                // COMMERCE INTERFACE
                $('.utilisateur_head_infos_suggestion').css('width','100px');
                $('.commerce_reservation_commerce').css('width','80px').css('height','25px').css('padding-top','5px').css('font-size','0.8em');
                $('.commerce_optin_commerce').css('width','80px').css('height','26px').css('padding-top','4px').css('font-size','0.8em');
                $('.commerce_optin_commerce span').css('margin-top','0px');
                
		// PAGE UTILISATEUR
		$('.objet_head_desc').css('width','665px');
                $('.utilisateur_suggerer_commerce,.utilisateur_suggerer_objet').css('width','95px');
                $('.utilisateur_suggerer_commerce a').css('font-size',"1em");
		$('.utilisateur_suggerer_objet a').css('font-size',"1em");
		$('.utilisateur_head_desc_desc').css('width','220px').css('padding-left','220px').css('font-size','1em');
                $('.utilisateur_head_desc_title h2').css('font-size','2em').css('margin-top','8px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','560px');
                $('.utilisateur_head_desc_desc2').css('width','200px').css('font-size','1em');
                $('.utilisateur_head_desc_avatar img.user_avatar_target').css('height','120px').css('width','120px');
		$('.objet_head_infos_infos,.objet_head_infos_services').css('width','265px');
		$('.objet_head_infos .separateur').css('width','670px');
                
                $('.objet_head_infos_suivre').css('width','95px');
		
		$('.ligne_verticale4').css('left','1136px').css('height','424px');
		$('.ligne_verticale5').css('left','1311px').css('height','424px');
		
		// PAGE OBJET
		$('.objet_head_desc_ouacheter').css('width','220px').css('font-size','1em');
		$('.objet_head_desc_ariane').css('width','230px').css('font-size','1em');
		$('.objet_head_desc_infosrapides').css('width','160px').css('display','block').css('font-size','1em');
		$('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','1em').css('margin-top','15px').css('text-align','left');
		
                $('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','45px').css('padding-top','12px').css('padding-bottom','12px').css('padding-left','22px').css('padding-right','22px').css('text-align','center');
                $('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('display','block').css('font-size','1.2em').css('font-weight','700').css('width','80px');
		
                $('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','39px').css('height','41px');
		
                
		$('.ligne_verticale3').css('left','1312px').css('height','424px');
                
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar a.button_changer_couverture span').css('float','left').css('display','block');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar').css('width','96px').css('top','103px').css('left','8px');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar .utilisateur_interface_modifier_icon_noir').css('margin-left','5px');
	
	}
	/////////////////////////////////////////////////////////////////////////////////
	/* 7 */else if ($('.big_wrapper').width() == 1736){

            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').css('width','400px');
                $('.commerce_head_desc_ariane').css('width','320px');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
                $('.commerce_head_desc_ariane').css('width','320px');
                $('.commerce_head_desc_address').css('width','400px');
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
                $('.commerce_head_desc_prices').css('width','320px');
                $('.commerce_head_desc_identity').css('width','400px');
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
                $('.commerce_head_desc_identity').css('width','400px');
                $('.commerce_head_desc_prices').css('width','320px');
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
					
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','145px');
		
                $('.commerce_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','580px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','8px');
                $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		
                $('.commerce_concept').css('font-size','1em').css('width','370px');
                $('.commerce_gerant').css('left','370px');
                $('.commerce_concept a').css('width','350px');
                $('.concept_content').css('overflow-y','scroll').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
                $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
                $('.commerce_labels a').css('width','170px');
                
                $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
                $('.commerce_head_desc').css('width','795px');
		$('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('width','400px').css('font-size','1em');
                $('.commerce_head_desc_address').css('font-size','1em');
                $('.commerce_head_desc_address span').css('margin-top','0px');
                $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','1.5em');
		$('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','320px');
		$('.commerce_head_desc_ariane span').css('font-size','1em');
                $('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','1.5em').css('margin-top','5px');
		$('#commerce_head_desc_ariane_button').css('float','left');
                $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','1.5em').css('margin-top','5px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','1.5em');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_infos .clearfix').css('display','none');
		$('.commerce_head_infos .separateur').css('display','none');
		$('.commerce_head_infos_suivre').css('float','right');
		$('.clearfix_infosrapides').css('display','block');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('height','133px').css('width','200px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','65px').css('width','35px').css('padding-top','45px').css('padding-left',40).css('padding-right',10);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','40px').css('font-size','1em').css('text-align','left');
		$('.commerce_head_infos_infosrapides').css('margin-top','0px').css('margin-left','0px');
		$('.infosrapides1,.infosrapides2').css('margin-top','30px').css('margin-right','10px').css('width','100px').css('display','block');
		$('.infosrapides3,.infosrapides4').css('margin-top','20px').css('margin-right','10px').css('width','100px').css('display','block');
		$('.infosrapides1,.infosrapides3').css('margin-right','7px');
		$('.commerce_head_infos_suivre').css('width','115px').css('height','133px');
		$('.commerce_head_infos_suivre span').css('margin-bottom','36px').css('margin-top','36px');
		
		$('.commerce_head2_avis .commerce_head2_text1').css('margin-left','43px');
		$('.commerce_head2_reseau .commerce_head2_text1,.commerce_head2_abonnes .commerce_head2_text1').css('margin-left','38px');
		$('.commerce_head2_text1').css('margin-left',38);
                $('.commerce_head2_text3_end').css('margin-right',36);
                $('.commerce_head2_text2').css('margin-left','38px');
		$('.commerce_head2_text3').css('margin-right','36px');
                $('.gerant_photo').css('width','96px');
                $('.gerant_title').css('font-size','1em');
		
		$('.ligne_verticale1').css('left','1377px').css('height','496px');
		$('.ligne_verticale2').css('left','1562px').css('height','496px');

                // COMMERCE INTERFACE
                $('.commerce_reservation_commerce').css('width','108px').css('height','40px').css('padding-top','15px').css('font-size','1.1em');
                $('.commerce_optin_commerce').css('width','108px').css('height','40px').css('padding-top','15px').css('font-size','1.1em');
                $('.commerce_optin_commerce span').css('margin-top','0px');
		
		// PAGE UTILISATEUR
		$('.objet_head_desc').css('width','795px');
                $('.utilisateur_suggerer_commerce,.utilisateur_suggerer_objet').css('width','95px');
                $('.utilisateur_suggerer_commerce a').css('font-size',"1em");
		$('.utilisateur_suggerer_objet a').css('font-size',"1em");
                $('.utilisateur_head_desc_desc').css('padding-left','280px').css('width','240px').css('font-size','1em');
                $('.utilisateur_head_desc_title h2').css('font-size','2em').css('margin-top','8px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','680px');
                $('.utilisateur_head_desc_desc2').css('width','260px').css('font-size','1em');
                $('.utilisateur_head_desc_avatar img.user_avatar_target').css('height','120px').css('width','120px');
		$('.objet_head_infos_services').css('width','325px');
		$('.objet_head_infos_infos').css('width','325px');
		$('.objet_head_infos_suivre').css('width','95px');
                
                $('.utilisateur_head_infos_suggestion').css('float','right');
                $('.utilisateur_head_infos_suggestion .clearfix').css('display','block');
		
		$('.ligne_verticale4').css('left','1386px').css('height','496px');
		$('.ligne_verticale5').css('left','1561px').css('height','496px');
		
		
		// PAGE OBJET
		$('.objet_head_desc_ouacheter').css('width','270px').css('font-size','1em');
		$('.objet_head_desc_ariane').css('width','270px').css('font-size','1em');
		$('.objet_head_desc_infosrapides').css('width','200px').css('display','block').css('font-size','1em');
		$('.objet_head_infos_services_text,.objet_head_infos_infos_text').css('font-size','1em').css('margin-top','15px').css('text-align','left');
		
                $('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','45px').css('padding-top','12px').css('padding-bottom','12px').css('padding-left','22px').css('padding-right','22px').css('text-align','center');
                $('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('display','block').css('font-size','1.2em').css('font-weight','700').css('width','80px');
		
                $('.objet_head_infos_services .img_container img,.objet_head_infos_infos .img_container img').css('width','39px').css('height','41px');
                
		$('.ligne_verticale3').css('left','1562px').css('height','496px');
                
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar a.button_changer_couverture span').css('float','left').css('display','block');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar').css('width','96px').css('top','103px').css('left','8px');
                $('.utilisateur_head_desc_avatar .img_container .utilisateur_interface_modifier_couv.modifier_avatar .utilisateur_interface_modifier_icon_noir').css('margin-left','5px');
	}
	if ($(".content").css("display") == "none") {$(".content").css({display: "block"});}
}
	


$(document).ready(function() {
    


    $('#recherche_avancee_button').click(function(){
        if(
        $('.overlay').is(':visible'))
        {
            $('.overlay').fadeOut();
        }
        else{$('.overlay').fadeIn();}
        
    $('.recherche_avancee_wrapper').load(siteurl+"/includes/menus/recherche_avancee.tpl.php").stop().slideToggle(300);
    $('.header').css('z-index','1000');
    $('.recherche_avancee_wrapper').css('z-index','999');
    });
    // GESTION DES POP-INS
    // initialize dialog
    var defaultdialog = $("#default_dialog").dialog({ 
        autoOpen: false,
        modal:true,
        draggable:false,
        resizable:false,
        width: '560px',
        height: 'auto',
		open: function() {
                    $('.ui-widget-overlay').hide().fadeIn();
			jQuery('.ui-widget-overlay').bind('click', function() {
				jQuery('#default_dialog').dialog('close');
			});
			$('.popin_close_button').click(function(e){
				e.preventDefault(); //don't go to default URL
				var defaultdialog = $("#default_dialog").dialog();
				defaultdialog.dialog('close');
			});
		}
    });

	var defaultdialog_large = $("#default_dialog_large").dialog({ 
		autoOpen: false,
		modal:true,
		draggable:false,
		resizable:false,
		width: '760px',
		height: 'auto',
		open: function() {
                    $('.ui-widget-overlay').hide().fadeIn();
		function appendsuggest() {
			var widthleft = $('.presentation_action_left').height();
		    var changewidthsuggest = widthleft - 101;
		    $('.presentation_action_right_suggestions').height(changewidthsuggest);
		    var heightright = $('.presentation_action_left').height();
		    var appendcount = Math.ceil((heightright - 101)/48);
			for (var i=1; i<=appendcount; i++) {
			$("\
				<div id='posts'>\
		        <div class='presentation_action_right_suggestions_img_container'><img src='"+siteurl+"/img/pictos_commerces/restaurant.png'/></div>\
		            <div class='presentation_action_right_suggestions_content'>\
		                <span class='presentation_action_right_suggestions_content_titre'>Au bon goût de...</span>\
		                <span class='presentation_action_right_suggestions_content_categorie'>Restauration</span>\
        			</div>\
		            <div class='presentation_action_right_suggestions_note'>\
		                <span class='presentation_action_right_suggestions_note_reelle'>7</span>\
		                <span class='presentation_action_right_suggestions_note_base'>/10</span>\
		            </div>\
        		</div>\
        		" ).appendTo( ".presentation_action_right_suggestions" );
		    }
		    var newheightright = (appendcount*47);
		    var heightrightafterresize = $('.presentation_action_right').height();
			var newheightleft = newheightright-254;
			$('.presentation_action_right_suggestions').height(newheightright);
			$('.presentation_action_commentaire_left_body').height(newheightleft);
			var ifaction = $('.presentation_action_commentaire_left_body').height();
			if (ifaction == 28) {
				$('.presentation_action_commentaire_left_body').css( "padding-top", "+=15").css( "padding-bottom", "+=15");
			}
		}
		appendsuggest();

		jQuery('.ui-widget-overlay').bind('click', function() {
			jQuery('#default_dialog_large').dialog('close');
		})
		$('.popin_close_button').click(function(e){
			e.preventDefault(); //don't go to default URL
			var defaultdialog_large = $("#default_dialog_large").dialog();
			defaultdialog_large.dialog('close');
		});
	}

	});
	
	var defaultdialog_inscription = $("#default_dialog_inscription").dialog({ 
		autoOpen: false,
		modal:true,
		draggable:false,
		resizable:false,
		width: '1230px',
		height: 'auto',
		open: function() {
                    $('.ui-widget-overlay').hide().fadeIn();
			jQuery('.ui-widget-overlay').bind('click', function() {
				jQuery('#default_dialog_inscription').dialog('close');
			})
			$('.popin_close_button').click(function(e){
				e.preventDefault(); //don't go to default URL
				var defaultdialog_inscription = $("#default_dialog_inscription").dialog();
				defaultdialog_inscription.dialog('close');
			});
		}
	});
  
    // Overlay bandeau accueil
$('#close_button_home').click(function() {
  $('#total_overlay').hide('fast');
    });
    
    // Menu déroulant header
    $('#header_usermenu,#header_usermenu2').click(function(){
       $('#header_menu').stop().slideToggle(150);
    });
    
    // On empêche le comportement par défaut des liens au clic sur les boutons d'action de la vignette (like, dislike, wishlit)
    $('.push_buttons_like a,.push_buttons_dislike a,.push_buttons_wishlist a').click(function(e){
        e.preventDefault();
    });
    
    // Couverture commerce Toggle des divs
    $(".button_show_concept").click(function(e){
        e.preventDefault();
        $(".gerant_photo").stop().slideToggle();
        $(".concept_content").stop().slideToggle();
        $('.commerce_concept_arrow').toggleClass("concept_arrow_down").toggleClass("concept_arrow_up");
    });
     // Couverture utilisateur Toggle des divs
    $(".button_show_concept_utilisateur").click(function(e){
        e.preventDefault();
        $(".utilisateur_gerant_photo").stop().slideToggle();
        $(".concept_content").stop().slideToggle();
        $('.commerce_concept_arrow').toggleClass("concept_arrow_down").toggleClass("concept_arrow_up");
    });
    // Recos commerce Toggle des divs
    $(".button_show_recos").click(function(e){
        e.preventDefault();
        $(".wrapper_boutons").stop().slideToggle();
        $(".commerce_recos_wrap").stop().slideToggle();
        $('.commerce_recos_arrow').toggleClass("recos_arrow_down").toggleClass("recos_arrow_up");
    });
    // Labels commerce Toggle des divs
    $(".button_show_labels").click(function(e){
        e.preventDefault();
        $(".commerce_labels_wrap").stop().slideToggle();
        $('.commerce_labels_arrow').toggleClass("labels_arrow_down").toggleClass("labels_arrow_up");
    });
    
     $(window).load(function(){resizeboxContainer()});
     $(window).resize(function(){
        clearTimeout(this.id);
        this.id = setTimeout(resizeboxContainer, 200);
        $("#default_dialog").dialog("option", "position", "center");
    });
	// Respond
	
	$('.presentation_action_right_voirplus_txt a').click(function(e){
		e.preventDefault();
		console.log('youhou');
		var new_element = $("#posts");
		/*var commentHeight = $('.presentation_action_commentaire_left_body_message').height();
		var suggestionBox =*/
		$(".presentation_action_right_suggestions").append(new_element.html());
	
	});
	
	function content_message_suggestion_height(){
		
	var contentHeight = $('.presentation_action_commentaire_left_body_message').height();
	var new_element = $("#posts");

	if (contentHeight == 18){
		$(".presentation_action_right_suggestions").css('height',280);
	}
	if (contentHeight == 36){
		$(".presentation_action_right_suggestions").css('height',330);
		$(".presentation_action_right_suggestions").append(new_element.html());
	}
	if (contentHeight == 54){
		$(".presentation_action_right_suggestions").css('height',330);
		$(".presentation_action_right_suggestions").append(new_element.html());
	}
	if (contentHeight == 72){
		$(".presentation_action_right_suggestions").css('height',330);
		$(".presentation_action_right_suggestions").append(new_element.html());
	}
	if (contentHeight == 90){
		$(".presentation_action_right_suggestions").css('height',380);
		$(".presentation_action_right_suggestions").append(new_element.html());
		$(".presentation_action_right_suggestions").append(new_element.html());
	}
	if (contentHeight == 108){
		$(".presentation_action_right_suggestions").css('height',380);
		$(".presentation_action_right_suggestions").append(new_element.html());
		$(".presentation_action_right_suggestions").append(new_element.html());
	}
	
	}
	content_message_suggestion_height()

	$('#ScrollToTop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
		
	//////////////////////////////////
	// Concerne le filtre du header //
	//////////////////////////////////
	
	var suggestionsContainer1 = $("#suggestionsContainer1"), inputSearch1 = $("input#inputSearch1"),
		inputSearch1Hidden = $("input#inputSearch1Hidden"), suggestionList1 = $("#suggestionList1"), clickSuggestion = -1;
	var suggestionsContainer2 = $("#suggestionsContainer2"), inputSearch2 = $("input#inputSearch2"),
		inputSearch2Hidden = $("input#inputSearch2Hidden"), suggestionList2 = $("#suggestionList2");

	document.selectSuggestion  = function (keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden) {
		var suggestionListLi = suggestionList.children();
		switch (keyCode) {
			case 38:
				clickSuggestion -= 1;
				if (clickSuggestion < 0) {clickSuggestion = 0;}
				break;
			case 40:
				clickSuggestion += 1;
				if (clickSuggestion > suggestionListLenght) {clickSuggestion = suggestionListLenght;}
				break;
			case 13:
				$('#ButtonFiltre').trigger('click');
				break;
			case 27:
				clickSuggestion = -1;
				$("div#suggestionsContainer1").addClass("display-none");
				break;
		}

		if(keyCode == 38 || keyCode == 40) {
			suggestionListLi
				.removeClass("active")
				.eq(clickSuggestion).addClass("active");
			inputSearchHidden.val(suggestionListLi.eq(clickSuggestion).html());
			inputSearch.val(suggestionListLi.eq(clickSuggestion).text());
		} else {clickSuggestion = -1;}
	}
	
	$(document).click(function(event) {
		if( suggestionsContainer1.is(":visible") === true ) {suggestionsContainer1.hide();}
		if( suggestionsContainer2.is(":visible") === true ) {suggestionsContainer2.hide();}
	});

	function arrowsAction (keyCode, suggestionList, inputSearch, inputSearchHidden) {
		var suggestionListLenght = suggestionList.children().size() - 1;
		document.selectSuggestion (keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden);
		return false;
	}

	inputSearch1.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList1, inputSearch1, inputSearch1Hidden);
			return false;
		}
		if(suggestionsContainer1.is(":visible") === false) {suggestionsContainer1.show();}
		emptyInput(inputSearch1, suggestionsContainer1);
	});

	inputSearch2.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList2, inputSearch2, inputSearch2Hidden);
			return false;
		}
		if(suggestionsContainer2.is(":visible") === false) {suggestionsContainer2.show();}
		emptyInput(inputSearch2, suggestionsContainer2);
	});		
	
	inputSearch1.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadSuggestions('quoi', suggestionsContainer1, inputSearch1, inputSearch1Hidden, suggestionList1);
		}
		emptyInput(inputSearch1, suggestionsContainer1);
	});
	
	inputSearch2.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadSuggestions('où', suggestionsContainer2, inputSearch2, inputSearch2Hidden, suggestionList2);
		}
		emptyInput(inputSearch2, suggestionsContainer2);
	});

	function emptyInput(inputSearch, suggestionsContainer){
		if (jQuery.trim(inputSearch.val()) == "") {suggestionsContainer.addClass("display-none");}
		else {suggestionsContainer.removeClass("display-none");}
	}

	$('#ButtonFiltre').click(function() {
		var data = {provenance:'all'};
		var quoi = inputSearch1.val(), lieu = inputSearch2.val();
		var CmpArrondissement =  inputSearch2Hidden.val().replace(/<sup>/gi, "");
		CmpArrondissement =  CmpArrondissement.replace(/<\/sup>/gi, "");
		if (inputSearch2.val() == CmpArrondissement) {lieu = inputSearch2Hidden.val();}	// traitement des arrondissements en html <sup></sup>
		
		if (quoi != '') {$.extend(data, {'quoi':encodeURIComponent(quoi)});}
		if (lieu != '') {$.extend(data, {'lieu':encodeURIComponent(lieu)});}
		if (location.href != siteurl+"/timeline.php") {window.location.assign(siteurl+"/timeline.php");}
		else {SetFiltre(data);}
	});
}); // fin function ready

function callback (suggestionsContainer, inputSearch, inputSearchHidden, suggestionList) {
	return function (listData) {
		suggestionsContainer.removeClass("display-none");
		var toSend = '';
		for (k in listData) {toSend += '<li>'+listData[k].result+'</li>';}
		suggestionList.html(toSend);
		suggestionList.children().on("mouseenter" , function(){
			suggestionList.children().removeClass("active");
			$(this).addClass("active");
		}).on("click" , function() {
			inputSearchHidden.val($(this).html());
			inputSearch.val($(this).text());
			suggestionsContainer.addClass("display-none");
		});
	};
}

function loadSuggestions(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	query = inputSearch.val();
	query = query.toLowerCase();

	if(query.length == 0){return;}

	query = encodeURIComponent(query);
	res = $.getJSON(siteurl+'/includes/requetesearch.php?key='+query+'&search='+search, callback(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList));
	console.log(res);
}
var lastRequestI, lastRequestT;

function timeLoadSuggestions(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	if(lastRequestI){clearTimeout(lastRequestI);}
	lastRequestI = setTimeout(function () {loadSuggestions(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList)}, 500);
}
