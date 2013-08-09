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
  
});