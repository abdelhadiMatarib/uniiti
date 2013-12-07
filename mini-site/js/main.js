$(document).ready(function() {
	var activeform = false;
		$('#contacteznous').click(function(){
			if (activeform==false){
				$(this).addClass('open').removeClass('close');
				$('#contacteznous').animate({right: "450px"},500);
				$('#contact_form').animate({right: "0px"},500);
				$('#wrapper_form').css('width','500px');
				activeform = true;
			} else {
				$(this).addClass('close').removeClass('open');
				$('#contacteznous').animate({right: "0px"},500);
				$('#contact_form').animate({right: "-450px"},500);
				$('#wrapper_form').animate({width: "60px"},500);
				activeform = false;
			}
		});

	$('#reservation_body table td.full').click(function(){
		$('td.full').removeClass('selected');
		$(this).addClass('selected');
		var horaire = $(this).text();
		return horaire;
	});

	$('#next_step1').click(function(){
		$('#step1').animate({opacity:'0'}, 500).hide(200);
		$('#step2').delay(500).show(200).animate({opacity:'1'}, 500);
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

