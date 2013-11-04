<?php
        include_once '../../config/configuration.inc.php'; ?>

<div class="oublimdp_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="oublimdp_head">
        <div class="oublimdp_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/ident_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Identifiants oubliés</span>
    </div>   
    <div class="oublimdp_body">
            
        <div class="oublimdp_explications">

            <span class="oublimdp_explications_txt"><span>Pour récupérer vos accès, indiquez ci-dessous votre email :</span>
        
        </div>
        <div class="oublimdp_inputs">
            <input id="email_login" class="oublimdp_input_email" type="mail" placeholder="Votre email" />
        </div> 
            
    </div>
    <div class="oublimdp_footer">
        
        <div class="modifprofil_valider_wrap" onclick="VerifieEtErg();">Valider</div>
        
    </div>
</div>

<script>

	// getElementById
	function $id(id) {return document.getElementById(id);}

	function VerifEmail(email) {
		var place = email.indexOf("@",1);
		var point = email.indexOf(".",place+1);
		if ((place > -1)&&(email.length >2)&&(point > 1))	{return true;}
		else {return false;}
	}
	
	function VerifieEtErg() {

		if (!VerifEmail($id("email_login").value)) {alert("format de l'email invalide");return false;}
		
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetecheckemail.php',
			data : {email : ''+$id("email_login").value+'', 'oublimdp' : 1, 'SITE_URL' : encodeURIComponent(siteurl)},
			success: function(result){
				if (result.result != 1) {
					alert("Cet email n'existe pas.");						
				}
				else {
					alert(result.resultemail);
					$('.popin_close_button').click();
				}
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});		
		return false; // si false l action du form ne sera pas appelé
	};	
</script>