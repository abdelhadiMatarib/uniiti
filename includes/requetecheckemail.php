<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';



$sql = "SELECT * FROM contributeurs WHERE email_contributeur = '" . $_POST['email'] . "'";
				
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);

if ($result) {
	$data['result'] = 1;
	if ((isset($_POST['oublimdp'])) && ($_POST['oublimdp'] == 1)) {
	$contenu = "";
	$contenu .= "<html> \n";
	$contenu .= "<head> \n";
	$contenu .= "<title> Subject </title> \n";
	$contenu .= "</head> \n";
	$contenu .= "<body> \n";
	$contenu .= $result['password_contributeur'];
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
	if(mail($_POST['email'],mb_encode_mimeheader(utf8_decode("UNIITI : oubli de mot de passe")),$contenu,$headers)) {
		$data['resultemail'] = "Un email vous a bien été envoyé.";
	}
	else {$data['resultemail'] = "Une erreur s'est produite lors de l'envoi de l'email.";}	
	}
} else {$data['result'] = -1;}

echo json_encode($data);

?>