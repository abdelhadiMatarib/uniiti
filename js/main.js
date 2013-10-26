/* pour tester

$("a").click(function(e) {
	if (($("#loading_page").length > 0) && ($(this).attr("href") != "#")) {
		e.preventDefault(); //don't go to default URL
		$("#loading_page").show();
		var url=this.href;
		var left = $("#loading_page").css("left");
		var decalagelateral = Math.floor(left.substring(0, left.length - 2)) ;
		if (decalagelateral > 0 ) {
			$("#loading_page").animate({ left: "0px"}, 500, function () {window.location.assign(url);});
		}
		else {
			$("#loading_page").animate({ right : "0px"}, 500, function () {window.location.assign(url);});		
		}
	//$("#loading_page").fadeOut(3000);
	} else if ($(this).attr("href") != "#") {$("body").fadeOut(3000);}
});*/
// fin pour tester

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
	$("#dialog_overlay").css({display: "block"});
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
	$("#dialog_overlay").css({display: "none"});
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
    $('.box_push_et_img').click(function(e) {
        e.preventDefault();//don't go to default URL
		var overlay_push = $(this).next('.overlay_push');
		overlay_push.click(function(e){
			e.preventDefault();//don't go to default URL
			$('.overlay_push').css('display','none');
		});
		$('.overlay_push').css('display','none');
		overlay_push.stop().fadeIn();
    });	
	$(".box_push_et_img img").each(function () {$(this).load(function () {$(this).fadeIn(1000, function () {$(this).parent().css({'background':'none'});});});});
	
	$(".box_useraction a").click(function(e) {
		e.preventDefault(); //don't go to default URL
		e.stopPropagation();
		var url=this.href;
		window.location.assign(url);
	});

}
    // FLUX UTILISATEUR SWITCH BOUTONS
       $('.button_moving').click(function(e){
           e.preventDefault();
       $(this).css('float','left');
       $(this).siblings('.button_moving').css('float','right').slideDown();
	   if ($(this).hasClass('flux_utilisateur')) {SetFiltre({provenance:'all'});}
	   if ($(this).hasClass('avisenattente_utilisateur')) {SetFiltre({provenance:'avis_en_attente'});}
	   if ($(this).hasClass('quoideneuf_utilisateur')) {SetFiltre({provenance:'follow'});}
	   if ($(this).hasClass('flux_commerce')) {SetFiltre({provenance:'all'});}
	   if ($(this).hasClass('avisenattente_commerce')) {SetFiltre({provenance:'avis_en_attente'});}
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
	// LES AJUSTEMENTS SUR LA TAILLE DU TEXTE, TAILLE DES CONTAINERS ET AUTRES SUR 
        // PAGE COMMERCE, PAGE UTILISATEUR ET PAGE OBJET SE FONT ICI.
        // LA LARGEUR DU HEADER 'EN DESSOUS DU LISERET' SE FAIT PAR RAPPORT A LA TAILLE DU MUR DE BOX.

        // RESIZING THE WRAPPER DEPENDING ON BOXES CONTAINER
        function resizeboxContainer(){
	var boxcontainersize = $('#box_container').width();
        //var biggymarginer = $('.biggymarginer').width();

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
        $('.recherche_avancee_wrapper').css('background-color',"white").css('background-image','none');
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
        $('.recherche_avancee_wrapper').css('background-color',"white").css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1100.png')");
        $('.recherche_avancee_left').css('line-height','2.5em').css('width','600px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.3em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','26px');
        $('.recherche_avancee_img_container').css('height','60px');
        $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
        }
        /* 5 */else if ($('.big_wrapper').width() == 1236){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");
        $('.recherche_avancee_left').css('line-height','2.5em').css('width','700px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.5em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','29px');
        $('.recherche_avancee_img_container').css('height','96px');
        $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
        }
        /* 6 */else if ($('.big_wrapper').width() == 1486){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");
        $('.recherche_avancee_left').css('line-height','2.8em').css('width','800px').css('margin','20px auto');
        $('.recherche_avancee_right').css('top','10px');
        $('.recherche_avancee_left span').css('font-size','1.6em');
        $('.recherche_avancee_left a.recherche_mot_actif').css('height','33px');
        $('.recherche_avancee_img_container').css('height','96px');
        $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
        }
        /* 7 */else if ($('.big_wrapper').width() == 1736){

        //RECHERCHE AVANCÉE
        $('.recherche_avancee_wrapper').css('background-position','center').css('background-image',"url('http://www.uniiti.fr/img/pictos_actions/recherche_avancee_1300.png')");
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
                $('.commerce_head_desc_address').stop().animate({width: "38px"},500);
                $('.commerce_head_desc_ariane').stop().animate({width: "215px"},500);
                $('.commerce_head_desc_address span, .commerce_head_desc_address address').stop().animate({opacity: '0'}, 400);
                $('.commerce_head_desc_ariane span').stop().animate({opacity: '1'}, 400);
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
            	$('.commerce_head_desc_address span, .commerce_head_desc_address address').stop().animate({opacity: '1'}, 400);
            	$('.commerce_head_desc_ariane span').stop().animate({opacity: '0'}, 400)
                $('.commerce_head_desc_ariane').stop().animate({width: "38px"},500);
                $('.commerce_head_desc_address').stop().animate({width: "215px"},500);
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
            	$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').stop().animate({opacity: '1'}, 400);
                $('.commerce_head_desc_prices').stop().animate({width: "38px"},500);
                $('.commerce_head_desc_identity').stop().animate({width: "215px"},500);
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
            	$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').stop().animate({opacity: '0'}, 400);
                $('.commerce_head_desc_identity').stop().animate({width: "38px"},500);
                $('.commerce_head_desc_prices').stop().animate({width: "215px"},500);
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });
		
                AjusteCouvertures(736);
                
		// HEADER
		
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','none');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','none');
		$('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');
		
		// PAGE COMMERCE
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos').css('width','292px');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.infosrapides3,.infosrapides4').css('display','none');
		$('.infosrapides1,.infosrapides2').css('margin-top','4px').css('font-size','1em').css('margin-left','17px').css('display','inline');
		$('.infosrapides1').css('margin-right','0px').css('width','121px');
        $('.infosrapides2').css('margin-right','0').css('width','110px');
		$('.commerce_head_desc').css('width','294px');
		$('.commerce_head_desc_address').css('width','230px').css('font-size','0.9em');
        $('.commerce_head_desc_address span').css('margin-top','0px');
        $('#commerce_head_desc_address_wrap').css('margin-top','7px').css('display','block').css('line-height','15px');
		$('.commerce_head_desc_identity').css('width','230px').css('font-size','0.9em');
        $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','15px').css('margin-top','-1px');
		$('.commerce_head_desc_ariane').css('width','40px').css('font-size','0.9em');
		$('#commerce_head_desc_ariane_wrap').css('display','none').css('line-height','15px').css('margin-top','-1px');
		$('#commerce_head_desc_ariane_button').css('float','left');
		$('.commerce_head_desc_prices').css('width','40px');
		$('#commerce_head_desc_prices_wrap').css('display','none').css('line-height','12px');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_desc_social').css('margin-top','8px').addClass('ipad_portrait_social');
		$('.commerce_head_desc_social span').css('display','block');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','none');
        $('.commerce_head_desc_title h2').css('font-size','1.2em').css('margin-top','15px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','180px');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',110).css('height', '102px');
		$('.commerce_head_infos_suivre').css('width',70).css('height',102).css('border-left', '0px');
		$('.commerce_head_infos_suivre .img_container').css('padding-top',11);
		$('.commerce_head_infos_suivre .img_container img').attr("height","50px").attr("width","50px");
		$('#ImageSuivre').css("height","50px").css("width","50px");
		$('.commerce_head_infos_suivre span').css('margin-bottom',13).css('margin-top',5);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('text-align','center').css('margin','0');
		$('.commerce_head_infos_infos .img_container,.commerce_head_infos_services .img_container').css('padding-bottom',17).css('padding-right','5px').css('padding-left','5px').css('width',100).css('text-align','center').css('padding-top',10).css('height','35px');
		$('.commerce_head_infos_infosrapides').css('margin-left','0px').css('width',285).css('height','52px').css('padding-left','6px');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','90%').css('margin-top','2px');
		$('.commerce_head_infos_services .img_container img, .commerce_head_infos_infos .img_container img').attr("height","50px").attr("width","50px");
		$('.infosrapides1 .img_container img').attr("height","23px").attr("width","18px");
		$('.infosrapides2 .img_container img').attr("height","23px").attr("width","24px");

        $('.commerce_head_desc_ariane').css('width','38px').css('cursor', 'pointer');
        $('.commerce_head_desc_address').css('width','215px');
        $('.commerce_head_desc_ariane span').css('opacity','0');
		$('.commerce_head_desc_identity').css('width','38px').css('cursor', 'pointer');
		$('.commerce_head_desc_prices').css('width','215px').css('cursor', 'pointer');
		$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').css('opacity','0');

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
		$('.wrapper_boutons').css('top','15.5px');
        $('.wrapper_boutons .boutons').css('margin-bottom','0px');
		$('.commerce_head_note_reserver').css('font-size','1.1em')
		
		// VIDEO
		$('#lienvideo').attr("height", "210").attr("width", "323");
		$('.commerce_couv_video_embbed').width(453);
		$('.commerce_couv_video_txt_left').width(206).css("marginTop", "30px");
		$('.commerce_couv_video_txt_right').width(206).css("marginTop", "76px");
		$('.commerce_couv_video_txt_right span').css('font-size','1.2em');
		$('.commerce_couv_video_txt_left span').css('font-size','2.2em');

		$('.ligne_verticale1').css('left','374px').css('height','210px');
		$('.ligne_verticale2').css('left','555px').css('height','210px');
		
		$('.ligne_verticale4').css('left','447px').css('height','210px');
		$('.ligne_verticale5').css('left','582px').css('height','210px');
                
        // COMMERCE INTERFACE
        $('.utilisateur_head_infos_suggestion').css('width','70px');
        $('.commerce_reservation_commerce').css('width','60px').css('height','40px').css('padding-top','5px').css('font-size','0.7em').css('border-left','0px');
        $('.commerce_optin_commerce').css('width','60px').css('height','42px').css('padding-top','4px').css('font-size','0.75em').css('border-left','0px');
        $('.commerce_optin_commerce span').css('margin-top','10px');
        $('.utilisateur_suggerer_commerce_firstcat').css('margin-top','15px');
        
        //DASHBOARD
        $('a.commerce_head_desc_modif').css('width','295px');
        $('input.valider_nouveau_nom_commerce').css('margin-left','5px');
        
        $('a.objet_head_desc_modif').css('width','295px');
        $('input.valider_nouveau_nom_objet').css('margin-left','5px');
					
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
        $('.utilisateur_head_infos_suggestion').css('width',70).css('float','left');
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
            
            AjusteCouvertures(986);
            
            // Alternate descs in head
            $('#commerce_head_desc_ariane_button').click(function(){
                $('.commerce_head_desc_address').animate({width: "36px"},500);
                $('.commerce_head_desc_ariane').animate({width: "341px"},500);
                $('.commerce_head_desc_address span, .commerce_head_desc_address address').animate({opacity: '0'}, 400);
                $('.commerce_head_desc_ariane span').animate({opacity: '1'}, 400);
                $('#commerce_head_desc_ariane_wrap').css('display','block');
                $('#commerce_head_desc_address_wrap').css('display','block');
            });
            $('#commerce_head_desc_address_button').click(function(){
            	$('.commerce_head_desc_address span, .commerce_head_desc_address address').animate({opacity: '1'}, 400);
            	$('.commerce_head_desc_ariane span').animate({opacity: '0'}, 400)
                $('.commerce_head_desc_ariane').animate({width: "36px"},500);
                $('.commerce_head_desc_address').animate({width: "341px"},500);
                $('#commerce_head_desc_address_wrap').css('display','block');
                $('#commerce_head_desc_ariane_wrap').css('display','block');
            });
            $('#commerce_head_desc_identity_button').click(function(){
            	$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').animate({opacity: '1'}, 400);
                $('.commerce_head_desc_prices').animate({width: "36px"},500);
                $('.commerce_head_desc_identity').animate({width: "341px"},500);
                $('#commerce_head_desc_identity_wrap').css('display','block');
                $('#commerce_head_desc_prices_wrap').css('display','block');
            });
            $('#commerce_head_desc_prices_button').click(function(){
            	$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').animate({opacity: '0'}, 400);
                $('.commerce_head_desc_identity').animate({width: "36px"},500);
                $('.commerce_head_desc_prices').animate({width: "341px"},500);
                $('#commerce_head_desc_prices_wrap').css('display','block');
                $('#commerce_head_desc_identity_wrap').css('display','block');
            });

		// HEADER
		
        $('.header input[type="text"]').css('width','110px');
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','9px').css('padding-left','9px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','9px').css('padding-left','9px');
		
		
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','35.5px');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos').css('width','418px');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.commerce_concept').css('font-size','1em').css('width','370px');
        $('.commerce_gerant').css('left','370px');
        $('.commerce_concept a').css('width','350px');
        $('.concept_content').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
        $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
        $('.commerce_labels a').css('width','170px');
        
        $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');

        $('.commerce_head_desc_title h2').css('font-size','1.3em').css('margin-top','13px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','240px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','10px');
        $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		$('.commerce_head_infos_infosrapides').css('margin-left','0px').css('width', '418px').css('height', '52px').css('padding-left','0px');
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',96).css('display','block').css('font-size','0.85em').css('margin-top','6px').css('margin-right','0px').css('margin-left','7px');
		$('.commerce_head_infos_infosrapides .img_container').css('padding-top', '10px').css('width','30px');
		$('.infosrapides1 .img_container img').attr("height","20px").attr("width","15px");
		$('.infosrapides2 .img_container img').attr("height","20px").attr("width","21px");
		$('.infosrapides3 .img_container img').attr("height","23px").attr("width","23px");
		$('.infosrapides4 .img_container img').attr("height","18px").attr("width","27px");
		$('.commerce_head_desc').css('width',418);
        $('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('font-size','1em');
        $('.commerce_head_desc_address span').css('margin-top','0px');
        $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','16px');
        $('.commerce_head_desc_ariane').css('width','36px').css('cursor', 'pointer');
        $('.commerce_head_desc_address').css('width','341px');
        $('.commerce_head_desc_ariane span').css('opacity','0');
		$('.commerce_head_desc_identity').css('width','36px').css('cursor', 'pointer');
		$('.commerce_head_desc_prices').css('width','341px').css('cursor', 'pointer');
		$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').css('opacity','0');
		$('.commerce_head_desc_ariane span').css('opacity','0');

		$('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','16px').css('margin-top','5px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','12px');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',155).css('height','102px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('width',34).css('padding-bottom',10).css('padding-top',27).css('padding-left',12).css('padding-right',23).css('float','left');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('display', 'block').css('font-size','0.9em').css('margin-top',36).css('text-align','left');
		$('.commerce_head_infos_services .img_container img, .commerce_head_infos_infos .img_container img').attr("height","50px").attr("width","50px");
		$('.commerce_head_infos_suivre').css('width','106px').css('height','102px').css('border-left','0px');
		$('.commerce_head_infos_suivre .img_container').css('padding-top','15px');
		$('.commerce_head_infos_suivre .img_container img').attr("height","50px").attr("width","50px");
		$('#ImageSuivre').css("height","50px").css("width","50px");
		$('.commerce_head_infos_suivre span').css('margin-top', '4px').css('margin-bottom', '15px');
		$('.gerant_photo').css('width','96px');

		// VIDEO
		$('#lienvideo').attr("height", "282").attr("width", "453");
		$('.commerce_couv_video_embbed').width(453);
		$('.commerce_couv_video_txt_left').width(266).css("marginTop", "75px");
		$('.commerce_couv_video_txt_right').width(266).css("marginTop", "110px");
		$('.commerce_couv_video_txt_right span').css('font-size','1.3em');
		$('.commerce_couv_video_txt_left span').css('font-size','2.5em');

		$('.ligne_verticale1').css('left','624px').css('height','280px');
		$('.ligne_verticale2').css('left','805px').css('height','280px');
		
		$('.ligne_verticale4').css('left','636px').css('height','280px');
		$('.ligne_verticale5').css('left','811px').css('height','280px');

        // COMMERCE INTERFACE
        $('.utilisateur_head_infos_suggestion').css('width','106px');
        $('.commerce_reservation_commerce').css('width','96px').css('height','40px').css('padding-top','5px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce').css('width','96px').css('height','42px').css('padding-top','4px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce span').css('margin-top','10px');
        $('.utilisateur_suggerer_commerce_firstcat').css('margin-top','15px');
		
        //DASHBOARD
        $('a.commerce_head_desc_modif').css('width','420px');
        $('input.valider_nouveau_nom_commerce').css('margin-left','10px');
        
        $('a.objet_head_desc_modif').css('width','420px');
        $('input.valider_nouveau_nom_objet').css('margin-left','10px');
                
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
		$('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
		$('.objet_head_infos_services_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
		
		$('.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
		
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
            
        AjusteCouvertures(1236);
        		
		// HEADER
		
        $('.header input[type="text"]').css('width','auto');
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
					
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','70px');
		$('.gerant_title').css('font-size','1em');

        $('.commerce_head_desc_title h2').css('font-size','1.5em').css('margin-top','12px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','370px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','10px');
        $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		
		$('.commerce_concept').css('font-size','1em').css('width','370px');
        $('.commerce_gerant').css('left','370px');
        $('.commerce_concept a').css('width','350px');
        $('.concept_content').css('overflow-x','hidden').css('max-height','305px');
		$('.commerce_recos').css('width','174px');
        $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
        $('.commerce_labels a').css('width','170px');
                
        $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos').css('width','541px');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('width',122).css('font-size','1em').css('margin-top','4px').css('display','block');
		$('.infosrapides1,.infosrapides2,.infosrapides3').css('margin-right','0px');
        $('.infosrapides4').css('margin-right','0').css('width','133px');
        $('.infosrapides3').css('margin-left','-4px');
        $('.infosrapides1').css('margin-left','12px');
		$('.commerce_head_desc').css('width',545);
		$('.commerce_head_desc_address').css('width','251px').css('font-size','1em');
        $('.commerce_head_desc_address span').css('margin-top','0px');
        $('#commerce_head_desc_address_wrap').css('margin-top','5px').css('display','block').css('line-height','16px');
		$('.commerce_head_desc_ariane').css('width','253px').css('font-size','1em');
		$('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','15px').css('margin-top','0px');
		$('#commerce_head_desc_ariane_button').css('float','left');
		$('.commerce_head_desc_identity').css('width','251px').css('font-size','1em');
        $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','15px').css('margin-top','7px');
		$('.commerce_head_desc_prices').css('width','253px').css('font-size','1em');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width',210).css('height','101px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('padding-top','22px').css('padding-left',25).css('padding-right',37).css('width','35px').css('float','left');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','35px').css('font-size','1em').css('text-align','left');
		$('.commerce_head_infos_suivre').css('width','119px').css('height','101px').css('border-left','0px');
		$('.commerce_head_infos_suivre .img_container').css('padding-top', '10px');
		$('.commerce_head_infos_infosrapides').css('margin-top','0px').css('width','541px').css('height', '53px').css('padding-left','0px');
		$('.commerce_head_infos_infosrapides .img_container').css('padding-top','10px').css('width','45px');
		$('.commerce_head_infos_suivre .img_container img').attr("height","59px").attr("width","59px");
		$('.infosrapides1 .img_container img').attr("height","26px").attr("width","21px");
		$('.infosrapides2 .img_container img').attr("height","25px").attr("width","26px");
		$('.infosrapides3 .img_container img').attr("height","30px").attr("width","30px");
		$('.infosrapides4 .img_container img').attr("height","23px").attr("width","32px");

		$('.commerce_head_infos .separateur').css('margin-top','0px');
		$('.commerce_head_infos_suivre span').css('margin-bottom','2px').css('margin-top','2px');
		$('.commerce_head_desc_identity span, .commerce_head_desc_identity a').css('opacity','1');
		$('.commerce_head_desc_ariane span').css('opacity','1');
		
		// VIDEO
		$('#lienvideo').attr("height", "353").attr("width", "546");
		$('.commerce_couv_video_embbed').width(546);
		$('.commerce_couv_video_txt_left').width(345).css("marginTop", "110px", 'font-size','2.9em');
		$('.commerce_couv_video_txt_right').width(345).css("marginTop", "150px");
		$('.commerce_couv_video_txt_right span').css('font-size','1.4em');
		$('.commerce_couv_video_txt_left span').css('font-size','2.7em');
		
		$('.ligne_verticale1').css('left','874px').css('height','352px');
		$('.ligne_verticale2').css('left','1055px').css('height','352px');
		
		$('.ligne_verticale4').css('left','886px').css('height','352px');
		$('.ligne_verticale5').css('left','1061px').css('height','352px');
                
        // COMMERCE INTERFACE
        $('.utilisateur_head_infos_suggestion').css('width','119px');
        $('.commerce_reservation_commerce').css('width','109px').css('height','40px').css('padding-top','5px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce').css('width','109px').css('height','42px').css('padding-top','4px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce span').css('margin-top','15px');
        $('.utilisateur_suggerer_commerce_firstcat').css('margin-top','15px');
        
        //DASHBOARD
        $('a.commerce_head_desc_modif').css('width','545px');
        $('input.valider_nouveau_nom_commerce').css('margin-left','10px');
        
        $('a.objet_head_desc_modif').css('width','545px');
        $('input.valider_nouveau_nom_objet').css('margin-left','10px');
                
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
		$('.objet_head_infos_services .img_container,.objet_head_infos_infos .img_container').css('width','35px').css('padding-right','15px').css('padding-left','15px').css('padding-bottom','15px').css('padding-top','12px');
		$('.objet_head_infos_services_classement,.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em").css('font-weight','700');
		
		$('.objet_head_infos_infos_classement').css('width','80px').css('text-align','center').css('margin-top','2px').css("display","block").css("font-size","1.2em");
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
		
        AjusteCouvertures(1486);

		// HEADER
		
        $('.header input[type="text"]').css('width','auto');
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
		
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','110px');

        $('.commerce_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','500px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','10px');
        $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		
        $('.commerce_concept').css('font-size','1em').css('width','370px');
        $('.commerce_gerant').css('left','370px');
        $('.commerce_concept a').css('width','350px');
        $('.concept_content').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
        $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
        $('.commerce_labels a').css('width','170px');
                
        $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
		$('.commerce_head_infos .clearfix').css('display','block');
		$('.commerce_head_infos').css('width','666px');
		$('.commerce_head_infos .separateur').css('display','block');
		$('.clearfix_infosrapides').css('display','none');
		
		$('.commerce_head_desc').css('width','670px');
		$('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('width','315px').css('font-size','1em');
        $('.commerce_head_desc_address span').css('margin-top','0px');
        $('#commerce_head_desc_address_wrap').css('margin-top','2px').css('display','block').css('line-height','1.5em');
		$('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','314px');
		$('.commerce_head_desc_ariane span').css('font-size','1em');
        $('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','1.5em').css('margin-top','2px');
		$('#commerce_head_desc_ariane_button').css('float','left');
        $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','1.5em').css('margin-top','2px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','1.5em');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('width','266px').css('height','102px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','35px').css('width','35px').css('float','left').css('padding-top','22px').css('padding-left',50).css('padding-right',45);
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('margin-top','34px').css('font-size','1em').css('text-align','left');
		$('.commerce_head_infos_suivre').css('border','0px').css('width','131px').css('height','102px');
		$('.commerce_head_infos_suivre .img_container').css('padding-top','14px');
		$('.commerce_head_infos_infosrapides').css('margin-top','0px').css('margin-left','0px').css('width','666px').css('padding-left','0px').css('height','52px');
		$('.infosrapides1').css('margin-right','10px');
		$('.infosrapides2,.infosrapides3').css('margin-right','10px');
		$('.infosrapides1,.infosrapides2,.infosrapides3,.infosrapides4').css('display','block').css('width','135px').css('margin-top','2px').css('margin-left','17px');
		$('.commerce_head_infos .separateur').css('margin-top','0px');
		$('.commerce_head_infos_suivre span').css('margin-bottom','7px').css('margin-top','0px');
		$('.infosrapides1 .img_container img').attr("height","26px").attr("width","21px");
		$('.infosrapides2 .img_container img').attr("height","25px").attr("width","26px");
		$('.infosrapides3 .img_container img').attr("height","30px").attr("width","30px");
		$('.infosrapides4 .img_container img').attr("height","23px").attr("width","32px");
		
		// VIDEO
		$('#lienvideo').attr("height", "425").attr("width", "710");
		$('.commerce_couv_video_embbed').width(710);
		$('.commerce_couv_video_txt_left').width(388).css("marginTop", "149px");
		$('.commerce_couv_video_txt_right').width(388).css("marginTop", "182px");
		$('.commerce_couv_video_txt_right span').css('font-size','1.5em');
		$('.commerce_couv_video_txt_left span').css('font-size','2.9em');

       	$('.gerant_title').css('font-size','1em');
		$('.ligne_verticale1').css('left','1124px').css('height','424px');
		$('.ligne_verticale2').css('left','1305px').css('height','424px');
		
        // COMMERCE INTERFACE
        $('.utilisateur_head_infos_suggestion').css('width','132px');
        $('.commerce_reservation_commerce').css('width','122px').css('height','40px').css('padding-top','5px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce').css('width','122px').css('height','42px').css('padding-top','4px').css('font-size','0.85em').css('border-left','0px');
        $('.commerce_optin_commerce span').css('margin-top','15px');
        $('.utilisateur_suggerer_commerce_firstcat').css('margin-top','15px');
                
        //DASHBOARD
        $('a.commerce_head_desc_modif').css('width','670px');
        $('input.valider_nouveau_nom_commerce').css('margin-left','10px');
        
        $('a.objet_head_desc_modif').css('width','670px');
        $('input.valider_nouveau_nom_objet').css('margin-left','10px');
                
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

        AjusteCouvertures(1736);
                
		// HEADER
		
        $('.header input[type="text"]').css('width','auto');
		$('.header_searchbar1,.header_searchbar2,.header_button_search').css('display','block');
		$('.header_button_menu').css('display','block');
		$('.header_rightnav').css('display','block');
		$('.biggymarginer').css('padding-right','40px').css('padding-left','40px');
		$('.header').css('padding-top','7px').css('padding-bottom','7px').css('padding-right','40px').css('padding-left','40px');
					
		// PAGE COMMERCE
		
		$('.wrapper_boutons .boutons').css('margin-bottom','10px');
		$('.wrapper_boutons').css('top','145px');
		
        $('.commerce_head_desc_title h2').css('font-size','1.6em').css('margin-top','10px').css('text-overflow','ellipsis').css('white-space','nowrap').css('overflow','hidden').css('width','580px');
		$('.commerce_head_desc_social').removeClass('ipad_portrait_social').css('margin-top','10px');
        $('.overlay_social_buttons').removeClass('overlay_social_buttons_specific');
		$('.commerce_head_desc_social .overlay_social_buttons').css('display','block');
		$('.commerce_head_desc_social span').css('display','none');
		$('.commerce_head_infos').css('width','791px');
		
        $('.commerce_concept').css('font-size','1em').css('width','470px');
        $('.commerce_gerant').css('left','370px');
        $('.commerce_concept a').css('width','448px');
        $('.concept_content').css('overflow-x','hidden').css('max-height','234px');
		$('.commerce_recos').css('width','174px');
        $('.commerce_recos a').css('width','155px');
		$('.commerce_labels').css('width','185px').css('right','174px');
        $('.commerce_labels a').css('width','170px');
        
        $('.commerce_recos span').css('font-size','1em');
		$('.commerce_labels span').css('font-size','1em');
		
        $('.commerce_head_desc').css('width','795px');
		$('.commerce_head_desc_address,.commerce_head_desc_identity,.commerce_head_desc_ariane').css('width','377px').css('font-size','1em');
        $('.commerce_head_desc_address').css('font-size','1em');
        $('.commerce_head_desc_address span').css('margin-top','0px');
        $('#commerce_head_desc_address_wrap').css('margin-top','2px').css('display','block').css('line-height','1.5em');
		$('.commerce_head_desc_ariane,.commerce_head_desc_prices').css('width','377px');
		$('.commerce_head_desc_ariane span').css('font-size','1em');
        $('#commerce_head_desc_ariane_wrap').css('display','block').css('line-height','1.5em').css('margin-top','2px');
		$('#commerce_head_desc_ariane_button').css('float','left');
        $('#commerce_head_desc_identity_wrap').css('display','block').css('line-height','1.5em').css('margin-top','2px');
		$('#commerce_head_desc_prices_wrap').css('display','block').css('line-height','1.5em');
		$('#commerce_head_desc_prices_button').css('float','left');
		$('.commerce_head_infos .clearfix').css('display','none');
		$('.commerce_head_infos .separateur').css('display','none');
		$('.commerce_head_infos_suivre').css('float','right');
		$('.clearfix_infosrapides').css('display','block');
		$('.commerce_head_infos_services,.commerce_head_infos_infos').css('height','155px').css('width','200px');
		$('.commerce_head_infos_services .img_container,.commerce_head_infos_infos .img_container').css('height','55px').css('width','45px').css('padding-top','25px').css('padding-left',70).css('padding-right',0).css('float', 'none');
		$('.commerce_head_infos_services_text,.commerce_head_infos_infos_text').css('font-size','1em').css('text-align','center').css('margin-top', '0px');
		$('.commerce_head_infos_infosrapides').css('height','155px').css('margin-top','0px').css('margin-left','0px').css('width', '287px').css('padding-left','0px');
		$('.infosrapides1,.infosrapides2').css('margin-right','0px').css('margin-top','20px').css('width','125px').css('display','block');
		$('.infosrapides3,.infosrapides4').css('margin-right','0px').css('margin-top','20px').css('width','125px').css('display','block');
		$('.commerce_head_infos_suivre').css('width','101px').css('height','155px').css('border-left', '1px solid #eaeaea');
		$('.commerce_head_infos_suivre .img_container').css('padding-top','26px');
		$('.commerce_head_infos_suivre span').css('margin-top','20px');
		$('.infosrapides1 .img_container img').attr("height","26px").attr("width","21px");
		$('.infosrapides2 .img_container img').attr("height","25px").attr("width","26px");
		$('.infosrapides3 .img_container img').attr("height","30px").attr("width","30px");
		$('.infosrapides4 .img_container img').attr("height","23px").attr("width","32px");
		
		// VIDEO
		$('#lienvideo').attr("height", "496").attr("width", "835");
		$('.commerce_couv_video_embbed').width(835);
		$('.commerce_couv_video_txt_right').width(428).css("marginTop", "214px");
		$('.commerce_couv_video_txt_left').width(450).css("marginTop", "179px");
		$('.commerce_couv_video_txt_right span').css('font-size','1.6em');
		$('.commerce_couv_video_txt_left span').css('font-size','3.0em');
		
		$('.ligne_verticale1').css('left','1374px').css('height','496px');
		$('.ligne_verticale2').css('left','1555px').css('height','496px');

        // COMMERCE INTERFACE
        $('.commerce_reservation_commerce').css('border-left', '1px solid #E4E4E4').css('width','91px').css('height','48px').css('padding-top','24px').css('font-size','1em');
        $('.commerce_optin_commerce').css('border-left', '1px solid #E4E4E4').css('width','91px').css('height','72px').css('padding-top','0px').css('font-size','1em');
        $('.commerce_optin_commerce span').css('margin-top','0px');
        $('.utilisateur_suggerer_commerce_firstcat').css('margin-top','10px');
		
        //DASHBOARD
        $('a.commerce_head_desc_modif').css('width','790px');
        $('input.valider_nouveau_nom_commerce').css('margin-left','10px');
        
        $('a.objet_head_desc_modif').css('width','790px');
        $('input.valider_nouveau_nom_objet').css('margin-left','10px');
                
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
		$('.utilisateur_suggerer_objet_firstcat').css('margin-top','24px');
                
        $('.utilisateur_head_infos_suggestion').css('float','right').css('width','102px');
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
    
    $(document).tooltip({ tooltipClass: "custom-tooltip-styling" });
    // RECHERCHE AVANCEE TRIGGER BASIC EVENTS
    $('.recherche_avancee_wrapper').delegate('.close_button_cdr','click',function(){
       if(
        $('.recherche_avancee_wrapper').is(':visible'))
            {$('.header_button_plus button').text('+');}
        else {$('.header_button_plus button').text('-');} 
    });
    $('#recherche_avancee_button,.overlay').click(function (){
        if(
        $('.recherche_avancee_wrapper').is(':visible'))
            {$('.header_button_plus button').text('+');}
        else {$('.header_button_plus button').text('-');}
    });
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
			var data = {nbitems: appendcount, site_url: siteurl};
			console.log(data);
			$.ajax({
				type:"POST",
				url : siteurl+'/includes/requetevousaimeriez.php',
				data : {nbitems: appendcount, site_url: siteurl},
				success: function(html){
					if (html) {
						$(html).appendTo( ".presentation_action_right_suggestions" );
					}
				},
				error: function() {alert('Erreur sur url : ' + $url);}
			});		
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

	var defaultdialog_confirmation = $("#dialog_confirmation").dialog({
		autoOpen: false,
		modal:true,
		draggable:true,
		resizable:false,
		width: '560px',
		height: 'auto',
		open: function() {
            $('.ui-widget-overlay').hide().fadeIn();
			jQuery('.ui-widget-overlay').bind('click', function() {
				jQuery('#dialog_confirmation').dialog('close');
			});
		}
	});
	
	var defaultdialog_inscription = $("#default_dialog_inscription").dialog({ 
		autoOpen: false,
		modal:true,
		draggable:true,
		resizable:false,
		width: '690px',
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
	
	var defaultdialog_map = $("#default_dialog_map").dialog({ 
		autoOpen: false,
		modal:true,
		draggable:true,
		resizable:false,
		width: '760px',
		height: 'auto',
		open: function() {
            $('.ui-widget-overlay').hide().fadeIn();
			jQuery('.ui-widget-overlay').bind('click', function() {
				jQuery('#default_dialog_map').dialog('close');
			})
			$('.popin_close_button').click(function(e){
				e.preventDefault(); //don't go to default URL
				var defaultdialog_map = $("#default_dialog_map").dialog();
				defaultdialog_map.dialog('close');
			});
		}
	});
  
    // Overlay bandeau accueil
$('#close_button_home').click(function() {
  $('#total_overlay').hide('fast');
    });
    // Menu déroulant header USER (right)
    $('#header_usermenu,#header_usermenu2').click(function(){
       $('#header_menu').stop().slideToggle(150);
    });
    
    // Menu déroulant header INFOS (left)
    $('.header_button_menu').click(function(){
       $('#header_menu_left').stop().slideToggle(150);
    });
    
    // On empêche le comportement par défaut des liens au clic sur les boutons d'action de la vignette (like, dislike, wishlit)
    $('.push_buttons_like a,.push_buttons_dislike a,.push_buttons_wishlist a').click(function(e){
        e.preventDefault();
    });
    
    // Couverture commerce Toggle des divs
    $(".button_show_concept").click(function(e){
        e.preventDefault();
        $(".concept_content").animate({height: "toggle", 'padding-bottom' : "toggle"},1500,'easeOutQuart');// {duration: 1000,specialEasing: {height: "easeOutQuart"}});
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
		
	////////////////////////////////////////////////////////////////////////////
	// Concerne le filtre du header et les recherches d'enseignes et d'objets //
	////////////////////////////////////////////////////////////////////////////
	
	var suggestionsContainer1 = $("#suggestionsContainer1"), inputSearch1 = $("input#inputSearch1"),
		inputSearch1Hidden = $("input#inputSearch1Hidden"), suggestionList1 = $("#suggestionList1"), clickSuggestion = -1;
	var suggestionsContainer2 = $("#suggestionsContainer2"), inputSearch2 = $("input#inputSearch2"),
		inputSearch2Hidden = $("input#inputSearch2Hidden"), suggestionList2 = $("#suggestionList2");
	var suggestionsContainer3 = $("#suggestionsContainer3"), inputSearch3 = $("input#inputSearch3"),
		inputSearch3Hidden = $("input#inputSearch3Hidden"), suggestionList3 = $("#suggestionList3");
	var suggestionsContainer4 = $("#suggestionsContainer4"), inputSearch4 = $("input#inputSearch4"),
		inputSearch4Hidden = $("input#inputSearch4Hidden"), suggestionList4 = $("#suggestionList4");
	var suggestionsContainer5 = $("#suggestionsContainer5"), inputSearch5 = $("a#inputSearch5"),
		inputSearch5Hidden = $("input#inputSearch5Hidden"), suggestionList5 = $("#suggestionList5");

	document.selectSuggestion  = function (NumAction, keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden) {
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
				if ((NumAction == 1) || (NumAction == 2)) {$('#ButtonFiltre').trigger('click');}
				else if (NumAction == 3) {$('#ButtonModifierCommerce').trigger('click');}
				break;
			case 27:
				clickSuggestion = -1;
				$("div#suggestionsContainer"+NumAction).addClass("display-none");
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
		if( suggestionsContainer3.is(":visible") === true ) {suggestionsContainer3.hide();}
		if( suggestionsContainer4.is(":visible") === true ) {suggestionsContainer4.hide();}
	});

	function arrowsAction (NumAction, keyCode, suggestionList, inputSearch, inputSearchHidden) {
		var suggestionListLenght = suggestionList.children().size() - 1;
		document.selectSuggestion (NumAction, keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden);
		return false;
	}

	inputSearch1.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (1, keyCode, suggestionList1, inputSearch1, inputSearch1Hidden);
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

	inputSearch3.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList3, inputSearch3, inputSearch3Hidden);
			return false;
		}
		if(suggestionsContainer3.is(":visible") === false) {suggestionsContainer3.show();}
		emptyInput(inputSearch3, suggestionsContainer3);
	});
	
	inputSearch4.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList4, inputSearch4, inputSearch4Hidden);
			return false;
		}
		if(suggestionsContainer4.is(":visible") === false) {suggestionsContainer4.show();}
		emptyInput(inputSearch4, suggestionsContainer4);
	});
	
	$('#header_choixvilles2').click(function (e) {
		if( suggestionsContainer5.is(":visible") === false ) {suggestionsContainer5.show();}
		else {suggestionsContainer5.hide();}
		emptyInput(inputSearch5, suggestionsContainer5);
	});

	suggestionList5.children().on("mouseenter" , function(){
		suggestionList5.children().removeClass("active");
		$(this).addClass("active");
	}).on("click" , function() {
		inputSearch5Hidden.val($(this).val());
		inputSearch5.html($(this).text());
		suggestionsContainer5.hide();
		SetFiltre({provenance:'all', id_ville:$(this).val()});
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
	
	inputSearch3.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadEnseigneOuObjet('enseigne', suggestionsContainer3, inputSearch3, inputSearch3Hidden, suggestionList3);
		}
		emptyInput(inputSearch3, suggestionsContainer3);
	});
	
	inputSearch4.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadEmails(suggestionsContainer4, inputSearch4, inputSearch4Hidden, suggestionList4);
		}
		emptyInput(inputSearch4, suggestionsContainer4);
	});


	function emptyInput(inputSearch, suggestionsContainer){
		if (jQuery.trim(inputSearch.val()) == "") {suggestionsContainer.addClass("display-none");}
		else {suggestionsContainer.removeClass("display-none");}
	}

	$('#ButtonModifierCommerce').click(function() {
		window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+inputSearch3Hidden.val());
	});
	
	$('#ButtonFiltre').click(function() {
		var data = {provenance:'all'};
		var quoi = inputSearch1.val(), lieu = inputSearch2.val();
		var CmpArrondissement =  inputSearch2Hidden.val().replace(/<sup>/gi, "");
		CmpArrondissement =  CmpArrondissement.replace(/<\/sup>/gi, "");
		if (inputSearch2.val() == CmpArrondissement) {lieu = inputSearch2Hidden.val();}	// traitement des arrondissements en html <sup></sup>
		
		if (quoi != '') {$.extend(data, {'quoi':encodeURIComponent(quoi)});$('#quoi').val(encodeURIComponent(quoi));}
		if (lieu != '') {$.extend(data, {'lieu':encodeURIComponent(lieu)});$('#lieu').val(encodeURIComponent(lieu));}
		var $Page = window.location.pathname;
		$Page = $Page.substring($Page.lastIndexOf("/")+1, $Page.length);
		if ($Page == "timeline.php") {
			SetFiltre(data);
			return false;
		}
		else {return true;}
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

function callbackEmails (suggestionsContainer, inputSearch, inputSearchHidden, suggestionList) {
	return function (listData) {
		suggestionsContainer.removeClass("display-none");
		var toSend = '';
		for (k in listData) {toSend += '<li id="'+listData[k].id+'">'+listData[k].nom+'</li>';}
		suggestionList.html(toSend);
		suggestionList.children().on("mouseenter" , function(){
			suggestionList.children().removeClass("active");
			$(this).addClass("active");
		}).on("click" , function() {
			inputSearchHidden.val($(this).attr('id'));
			inputSearch.val($(this).text());
			suggestionsContainer.addClass("display-none");
		});
	};
}

function loadEmails(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	query = inputSearch.val();
	query = query.toLowerCase();

	if(query.length == 0){return;}

	query = encodeURIComponent(query);
	res = $.getJSON(siteurl+'/includes/requetechercheemails.php?key='+query, callbackEmails(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList));
	console.log(res);
}
var lastRequestI, lastRequestT;

function timeLoadEmails(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	if(lastRequestI){clearTimeout(lastRequestI);}
	lastRequestI = setTimeout(function () {loadEmails(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList)}, 500);
}


function callbackObjetOuEnseigne (suggestionsContainer, inputSearch, inputSearchHidden, suggestionList) {
	return function (listData) {
		suggestionsContainer.removeClass("display-none");
		var toSend = '';
		for (k in listData) {toSend += '<li id="'+listData[k].id+'">'+listData[k].nom+'</li>';}
		suggestionList.html(toSend);
		suggestionList.children().on("mouseenter" , function(){
			suggestionList.children().removeClass("active");
			$(this).addClass("active");
		}).on("click" , function() {
			inputSearchHidden.val($(this).attr('id'));
			inputSearch.val($(this).text());
			suggestionsContainer.addClass("display-none");
		});
	};
}

function loadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	query = inputSearch.val();
	query = query.toLowerCase();

	if(query.length == 0){return;}

	query = encodeURIComponent(query);
	res = $.getJSON(siteurl+'/includes/requetechercheobjetouenseigne.php?key='+query+'&search='+search, callbackObjetOuEnseigne(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList));
	console.log(res);
}

function timeLoadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	if(lastRequestI){clearTimeout(lastRequestI);}
	lastRequestI = setTimeout(function () {loadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList)}, 100);
}




