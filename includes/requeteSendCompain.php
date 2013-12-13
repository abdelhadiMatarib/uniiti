<?php

session_start();
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';

//print_r($_POST);
//die();
//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
$iIdEnseigne = $_POST['id_enseigne'];
$req = $bdd->prepare('select professionnels_id_pro from enseignes where id_enseigne=:id_enseigne');
$req->execute(array('id_enseigne' => $iIdEnseigne));
$aEnseigne = $req->fetch();

//if user is not admin
if ($_SESSION['droits'] != 8) {
    if (empty($aEnseigne) || ($aEnseigne['professionnels_id_pro'] != $_SESSION['SESS_MEMBER_ID'])) {
        echo json_encode(array('status' => 'error', 'message' => 'vous n\'etes pas le propriètaire de cette enseigne'));
    }
}
$sType = null;
$aCustomers = array();
$bFromUniiti = false;
$bFromUpload = false;
$bFromPartner = false;
if (!empty($_POST['type'])) {
    switch ($_POST['type']) {
        //-------------------------------------- MAIL ---------------------------------------------
        case "mail";
            $sType = 'mail';
            $aCustomers = $_POST['email'];
            if (!empty($_POST['from_uniiti']) || !empty($_POST['from_upload'])) {
                //----------------------------------------mail from uniiti 
                if (!empty($_POST['from_uniiti'])) {
                    $bFromUniiti = true;
                }
                //----------------------------------------mail from upload 
                if (!empty($_POST['from_upload'])) {
                    $bFromUpload = true;
                }
            }

            break;
        //-------------------------------------- SMS ---------------------------------------------
        case "sms";
            $sType = 'sms';
            $aCustomers = $_POST['telephone'];
            if (!empty($_POST['from_uniiti']) || !empty($_POST['from_upload'])) {
                //----------------------------------------mail from uniiti 
                if (!empty($_POST['from_uniiti'])) {
                    $bFromUniiti = true;
                }
                //-------------------------------------------- mail from upload
                if (!empty($_POST['from_upload'])) {
                    $bFromUpload = true;
                }
            }

            break;
    }


//============================================================================================================
//============================================ Sauvegarde des données  =========================================================
//============================================================================================================
    //============================================== si c'est une campgne de via des partenaires
    
    if (!empty($aCustomers)) {
        $sMessage = "";
        $sMessage = $_POST['text'];
        $sDateEnvoi = 'null';
        if(!empty($_POST['date_envoi'])){
            $sDateEnvoi = $_POST['date_envoi'];
            
        }
        $sql = "INSERT INTO enseigne_clients_campagne (id_enseigne, type, date, status, base_uniiti, base_upload, base_partenaires, message, date_envoi)
            VALUES 
            (:id_enseigne, :type, :date, :status, :base_uniiti, :base_upload, :base_partenaires, :message, :date_envoi)";

        $req = $bdd->prepare($sql);
        $req->execute(array('id_enseigne' => $iIdEnseigne, 'type' => $sType, 'date' => date('Y-m-d H:i:s'), 'status' => '1',
            'base_uniiti' => $bFromUniiti, 'base_upload' => $bFromUpload, 'base_partenaires' => $bFromPartner, 'message' => $sMessage, 'date_envoi' => $sDateEnvoi));
        $idCampagne = $bdd->lastInsertId();
        //insertion des customers
        $sql = "INSERT INTO enseigne_clients_campagne_destination (enseigne_clients_campagne_id, nom, prenom, email, telephone) VALUES ";
        foreach ($aCustomers as $aCustomer) {
            if (!empty($aCustomer['email']) or !empty($aCustomer['telephone'])) {
                $sql .= "(";
                $sql .= "'" . mysql_real_escape_string($idCampagne) . "', ";
                $sql .= "'" . mysql_real_escape_string($aCustomer['prenom']) . "', ";
                $sql .= "'" . mysql_real_escape_string($aCustomer['nom']) . "', ";
                if (!empty($aCustomer['email'])) {
                    $sql .= "'" . mysql_real_escape_string($aCustomer['email']) . "', ";
                } else {
                    $sql .= "NULL, ";
                }
                if (!empty($aCustomer['telephone'])) {
                    $sql .= "'" . mysql_real_escape_string($aCustomer['telephone']) . "' ";
                } else {
                    $sql .= "NULL";
                }
                $sql .= "),";
            }
        }
        $sql = trim($sql, ',');
        $req = $bdd->prepare($sql);
        if ($req->execute()) {
            echo json_encode(array('status' => 'success', 'message' => 'compagne enregistré !'));
        }
    }
    //============================================== si c'est une campgne de via des uniiti ou upload
    elseif (!empty($aCustomers)) {
        echo json_encode(array('status' => 'edit', 'message' => 'Editer les contacts', 'contacts' => $aCustomers));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Aucun destinataire !'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Impossible de trouver le type de votre compagne'));
}
?>
