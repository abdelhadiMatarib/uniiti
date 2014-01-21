$(document).ready(function() {
    setTimeout(function() {
        $('#reservation').animate({
            right:"0"
        },400);
    }, 5000);
    var activeform = false;
    $('#contacteznous').click(function(){
        if (activeform==false){
            $(this).addClass('open').removeClass('close');
            $('#contacteznous').animate({
                bottom: "340px"
            },500);
            $('#wrapper_form').animate({
                height: "340px"
            },500);
            $('#contact_form').animate({
                bottom: "280px"
            },500);
            $('#reservation').animate({
                bottom:"370px"
            },400);
            activeform = true;
        } else {
            $(this).addClass('close').removeClass('open');
            $('#contacteznous').animate({
                bottom: "101px"
            },500);
            $('#wrapper_form').animate({
                height: "151px"
            },500);
            $('#contact_form').animate({
                bottom: "0px"
            },500);
            $('#reservation').animate({
                bottom:"160px"
            },600);
            $('#reservation').css('z-index', 15);
            activeform = false;
        }
    });
    var horaireResa;
    var nombreResa;
    

    $('#reservation_body').on('click', 'table td.full', function(){
        $('td.full').removeClass('selected');
        $(this).addClass('selected');
        horaireResa = $(this).text();
        $('#reservation-final-step-heure').html(horaireResa);
    });
    
    $('.table-nombre').on('click', 'table td', function(){
        $('td.full').removeClass('selected');
        $(this).addClass('selected');
        nombreResa = $(this).text();
        $('#reservation-final-step-nombre').html(nombreResa+' personnes');
    });
    

    $('#next_step1').click(function(){
        $.ajax({
            async : false,
            type:"POST",
            url : "http://uniiti.fr/includes/reservationMiniSiteStep2.php",
            data : {
                'id_enseigne':enseigne_id, 
                'date':$( "#datepicker" ).val()
            },
            success: function(html){
                $('.table-horaires').html(html);
                $('#step1').animate({
                    opacity:'0'
                }, 500).hide(200);
                $('#step2').delay(500).show(200).animate({
                    opacity:'1'
                }, 500);
            },
            error: function() {}
        });
    });

    $('#next_step2').click(function(){
        $('#step2').animate({
            opacity:'0'
        }, 500).hide(200);
        $('#step3').delay(500).show(200).animate({
            opacity:'1'
        }, 500);
    });

    $('#prev_step2').click(function(){
        $('#step2').animate({
            opacity:'0'
        }, 500).hide(200);
        $('#step1').delay(500).show(200).animate({
            opacity:'1'
        }, 500);
    });

    $('#next_step3').click(function(){
        $('#reservation-final-step-date').html($( "#datepicker" ).val());

        $('#step3').animate({
            opacity:'0'
        }, 500).hide(200);
        $('#step4').delay(500).show(200).animate({
            opacity:'1'
        }, 400);
    });

    $('#prev_step3').click(function(){
        $('#step3').animate({
            opacity:'0'
        }, 500).hide(200);
        $('#step2').delay(500).show(200).animate({
            opacity:'1'
        }, 500);
    });
        
    $(document).on('click', '#submit_resa', function(){
        //comme sur le site, (histoire d'utiliser le meme script)
        //envoi de dexu requetes ajax
        //1) pour le shop
        var date = $( "#datepicker" ).val();
        var nom = $( "#nom_resa" ).val();
        var prenom = $( "#prenom_resa" ).val();
        var email = $( "#email_resa" ).val();
        var telephone = $( "#telephone_resa" ).val();
        if(isRdv){
            var message = 'Rendez-vous pour '+nombreResa+' personnes, le '+date+' à '+horaireResa+'.  Client : '+nom+' '+prenom+'. Email : '+email+'. Tel : '+telephone+'.'
            var sujet = 'Prise de rendez-vous pour '+nombreResa+' personnes, le '+date+' à '+horaireResa;
        }else{
            var message = 'Une réservation pour '+nombreResa+' personnes, le '+date+' à '+horaireResa+'.  Client : '+nom+' '+prenom+'. Email : '+email+'. Tel : '+telephone+'.'
            var sujet = 'Réservation pour '+nombreResa+' personnes, le '+date+' à '+horaireResa;
        }
        var data = {
            step : "4",
            id_enseigne : enseigne_id,
            nom_enseigne : enseigne_nom,
            sujet : sujet,
            message : message,
            date : date,
            heure : horaireResa,
            nom_destinataire : nom,
            prenom_destinataire : prenom,
            telephone_destinataire : telephone,
            destinataire : email,
            email_destinataire : email,
            prevenir_reservation : prevenir_reservation,
            telephone_reservation : telephone_reservation,
            email_reservation  : email_reservation,
            nombre : nombreResa
        }   
        if(isRdv){
            var message2 = 'Une prise de rendez-vous pour '+nombreResa+' personnes, le '+date+' à '+horaireResa+' a été transmise à '+enseigne_nom+'. Une confirmation va vous etre envoyée très prochainement.'
            var sujet2 = 'Rendez-vous pour '+nombreResa+' personnes, le '+date+' à '+horaireResa;
        }else{
            var message2 = 'Une réservation pour '+nombreResa+' personnes, le '+date+' à '+horaireResa+' a été transmise à '+enseigne_nom+'. Une confirmation va vous etre envoyée très prochainement.'
            var sujet2 = 'Réservation pour '+nombreResa+' personnes, le '+date+' à '+horaireResa;
        }
        var dataClient = {
            destinataire : email,
            tel_destinataire : telephone,
            sujet : sujet2,
            message : message2
        };
                
        $.ajax({
            async : true,
            type:"POST",
            url : "http://uniiti.fr/includes/envoyer_mail.php",
            data : data,
            success: function(data){
                alert(data.result);
            },
            error: function() {}
        });
        $.ajax({
            async : true,
            type:"POST",
            dataType: 'json',
            url : "http://uniiti.fr/includes/envoyer_mail.php",
            success: function(data2){
                if(data2.result != null){
                    alert(data2.result) 
                }else{
                    alert("une erreur s'est produite lors de l'enregistrement de votre réservation."); 
                }
            },
            error: function() {}
        });
    })
})

$(window).resize(function() {
    var widthviewportsize = $(window).width();
    var heightviewportsize = $(window).height();
    $("#navigation").width(widthviewportsize);
    $("#navigation").height(heightviewportsize);
});

