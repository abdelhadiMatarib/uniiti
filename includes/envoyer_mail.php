<?php
	header('Content-Type: application/json');
	$contenu = "";
	$contenu .= "<html> \n";
	$contenu .= "<head> \n";
	$contenu .= "<title> Subject </title> \n";
	$contenu .= "</head> \n";
	$contenu .= "<body> \n";
	$contenu .= stripslashes($_POST['message']);
	$contenu .= "<BR/><BR/>L'équipe UNIITI vous remercie pour votre confiance.\n";
	$contenu .= "</body> \n";
	$contenu .= "</html> \n";
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) {$passage_ligne = "\r\n";}
	else {$passage_ligne = "\n";}
	$headers  = "MIME-Version: 1.0 \n";
	$headers .= "Content-Transfer-Encoding: 8bit \n";
	$headers .= "From: \"UNIITI\"<info@uniiti.fr>\n";
	$headers .= "Reply-To: info@uniiti.fr\n";
	$headers .= "Content-type: text/html; charset=utf-8\n";
	if(mail($_POST['destinataire'],mb_encode_mimeheader(utf8_decode($_POST['sujet'])),$contenu,$headers)) {
		$data['result'] = "L'email a bien été envoyé.\n" . $_POST['destinataire'] . "\n" . $_POST['sujet'];
	}
	else {$data['result'] = "Une erreur c'est produite lors de l'envoi de l'email.";}
	echo json_encode($data);
?>
