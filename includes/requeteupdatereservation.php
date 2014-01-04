<?php

include_once '../config/configPDO.inc.php';
function encodeObjet($objet) {
    $objet = '=?UTF-8?B?' . base64_encode($objet) . '?=';
    return $objet;
}

$sToken = $_POST['token'];
//select request
$req = $bdd->prepare('SELECT * FROM enseigne_reservation WHERE hash=:token and status_id = 1');
$req->execute(array('token' => $sToken));
$aReservationRequest = $req->fetch();
//select enseigne
$req = $bdd->prepare('SELECT * FROM enseignes WHERE id_enseigne=:id');
$req->execute(array('id' => $aReservationRequest['enseignes_id_enseigne']));
$aEnseigne = $req->fetch();
if (empty($aReservationRequest)) {
    header('location:/');
}
if (!empty($_POST['valider']) and !empty($_POST['token'])) {
    if ($_POST['valider'] == 'oui') {
        $sToken = $_POST['token'];
        $req = $bdd->prepare('UPDATE enseigne_reservation SET status_id=2 where hash=:token');
        $req->execute(array('token' => $sToken));
        $message = "Votre demande a bien été confirmé par ".$aEnseigne['nom_enseigne'].".";
        $title = "UNIITI | Confirmation de votre réservation";
    } elseif ($_POST['valider'] == 'non') {
        $req = $bdd->prepare('UPDATE enseigne_reservation SET status_id=3 where hash=:token');
        $req->execute(array('token' => $sToken));
        $message = "Votre demande n'a pas été prise en compte. Merci de contacter directement ".$aEnseigne['nom_enseigne']."";
        if(!empty($aEnseigne['telephone_reservation'])){
            $message .= " au ".$aEnseigne['telephone_enseigne'];
        }
        $message .= ".";
        $title = "UNIITI | Réservation";
    }
    if (!empty($aReservationRequest['telephone_destinataire'])) {
//entrer votre nic-handle, remplacer xx123456-ovh par votre propre nic-handle
        $nic = "dj187129-ovh";

//entrer le mot de passe de votre nic-handle, remplacer ovh123456 par votre propre mot de passe
        $pass = "johann111";

//entrer le nom de votre compte sms, remplacer sms-xx123456-1 par votre propre compte
        $sms_compte = "sms-dj187129-1";

        /* entrer le numéro emetteur du sms, ce numéro doit etre identifie dans votre manager,
          remplacer +33600110011 par votre propre numero de mobile */
        $from = "UNIITI";


        /* creation de la variable to dans laquelle nous recuperons via la methode post
          le champ portant le nom destinataire au niveau de la page form.html */
        $tel = str_replace(" ", "", $aReservationRequest['telephone_destinataire']);
        $tel = ltrim($tel, '0');
        $to = '+33' . $tel;

        try {
// on travail en soapi
            $soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");

            /* connexion a votre manager avec vos identifiants, ici on utilise
              le compte xx123456-ovh ($nic) avec le mot de passe ovh123456 ($pass), le nic-handle est francais */
            $session = $soap->login("$nic", "$pass", "fr", false);

            /* on utilise ici le compte sms sms-xx123456-1 ($sms_compte) pris sur notre nic-handle xx123456-ovh,
              le numero 06600110011 ($from) a ete identifie dans notre manager on l utilise donc en tant
              qu emetteur, le desinataire se place ensuite ($to), la variable $message contient le texte du sms, le vide permet de laisser
              les parametres par defaut, le "1" force l envoi du sms au format classique,
              le sms est sauvegarde sur le portable client */
            $result = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to", "$message", "", "1", "", "");


            $data['result'] = "Un sms a été envoyé à l'enseigne: \n" . $_POST['sujet'];
        } catch (SoapFault $fault) {
// affichage des erreurs
            echo($fault);
            $data['result'] = "Une erreur s'est produite lors de l'envoi de l'sms.";
        }
    }
    //envoi du mail 
    $contenu = "";
    $contenu .= "<html> \n";
    $contenu .= "<head> \n";
    $contenu .= "<title> Subject </title> \n";
    $contenu .= "</head> \n";
    $contenu .= "<body> \n";
    $contenu .= stripslashes($message);
    $contenu .= "<BR/><BR/>L'équipe UNIITI vous remercie pour votre confiance.\n";
    $contenu .= "</body> \n";
    $contenu .= "</html> \n";


    $headers = 'From: "UNIITI"<info@uniiti.fr>' . "\n";
    $headers .='Reply-To: info@uniiti.fr' . "\n";
    $headers .='Content-Type: text/html; charset="utf-8"' . "\n";
    $headers .='Content-Transfer-Encoding: 8bit';
    if (!empty($aReservationRequest['email_destinataire'])) {
        mail($aReservationRequest['email_destinataire'], encodeObjet($title), $contenu, $headers);
    }

    die("Votre décision a été transmise au client.");
} else {
    header('location:/');
}
?>
