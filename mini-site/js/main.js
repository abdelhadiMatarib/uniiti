$(document).ready(function() {
	setTimeout(function() {
      $('#reservation').animate({right:"0"},400);
	}, 5000);
	var activeform = false;
		$('#contacteznous').click(function(){
			if (activeform==false){
				$(this).addClass('open').removeClass('close');
				$('#contacteznous').animate({bottom: "340px"},500);
				$('#wrapper_form').animate({height: "340px"},500);
				$('#contact_form').animate({bottom: "280px"},500);
				$('#reservation').animate({bottom:"370px"},400);
				activeform = true;
			} else {
				$(this).addClass('close').removeClass('open');
				$('#contacteznous').animate({bottom: "101px"},500);
				$('#wrapper_form').animate({height: "151px"},500);
				$('#contact_form').animate({bottom: "0px"},500);
				$('#reservation').animate({bottom:"160px"},600);
				$('#reservation').css('z-index', 15);
				activeform = false;
			}
		});

	$(document).on('click', '#reservation_body table td.full', function(){
		$('td.full').removeClass('selected');
		$(this).addClass('selected');
		var horaire = $(this).text();
		return horaire;
	});

	$('#next_step1').click(function(){
                $.ajax({
			async : false,
			type:"POST",
			url : "http://uniiti.fr/includes/reservationMiniSiteStep2.php",
			data : {'id_enseigne':enseigne_id, 'date':$( "#datepicker" ).val()},
			success: function(html){
				$('.table-horaires').html(html);
                                $('#step1').animate({opacity:'0'}, 500).hide(200);
                                $('#step2').delay(500).show(200).animate({opacity:'1'}, 500);
			},
			error: function() {}
		});
	});

	$('#next_step2').click(function(){
		$('#step2').animate({opacity:'0'}, 500).hide(200);
		$('#step3').delay(500).show(200).animate({opacity:'1'}, 500);
	});

	$('#prev_step2').click(function(){
		$('#step2').animate({opacity:'0'}, 500).hide(200);
		$('#step1').delay(500).show(200).animate({opacity:'1'}, 500);
	});

	$('#next_step3').click(function(){
		$('#step3').animate({opacity:'0'}, 500).hide(200);
		$('#step4').delay(500).show(200).animate({opacity:'1'}, 400);
	});

	$('#prev_step3').click(function(){
		$('#step3').animate({opacity:'0'}, 500).hide(200);
		$('#step2').delay(500).show(200).animate({opacity:'1'}, 500);
	});

    });

$(window).resize(function() {
	var widthviewportsize = $(window).width();
  	var heightviewportsize = $(window).height();
  	$("#navigation").width(widthviewportsize);
  	$("#navigation").height(heightviewportsize);
});
