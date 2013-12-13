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

            if (!empty($_POST['from_uniiti']) || !empty($_POST['from_upload'])) {
                //----------------------------------------mail from uniiti 
                if (!empty($_POST['from_uniiti'])) {
                    $bFromUniiti = true;
                    $sql = "SELECT t1.prenom_contributeur, t1.nom_contributeur, t1.email_contributeur ";
                    $sql .= "FROM contributeurs t1 ";
                    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
                    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
                    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
                    $sql .= "WHERE ";
                    $sql .= "t4.id_enseigne = :idEnseigne GROUP BY t1.email_contributeur";
                    $req = $bdd->prepare($sql);
                    $req->execute(array('idEnseigne' => $iIdEnseigne));
                    $res = $req->fetchAll();
                    $aCustomers = array_merge($aCustomers, $res);
                }
                //-------------------------------------------- mail from upload
                if (!empty($_POST['from_upload'])) {
                    $bFromUpload = true;
                    $sql = "SELECT t1.prenom as prenom_contributeur, t1.nom as nom_contributeur, t1.email as email_contributeur ";
                    $sql .= "FROM enseigne_clients t1 ";
                    $sql .= "WHERE enseignes_id_enseigne =:idEnseigne GROUP BY t1.telephone ";
                    $req = $bdd->prepare($sql);
                    $req->execute(array('idEnseigne' => $iIdEnseigne));
                    $res = $req->fetchAll();
                    $aCustomers = array_merge($aCustomers, $res);
                }
            }
            //------------------------------------------------mail from partner
            elseif (!empty($_POST['from_partner'])) {
                $bFromPartner = true;
                //1) get all partners
                $sql2 = "SELECT * ";
                $sql2 .= "FROM enseignes_reseau_enseignes where (enseignes_id_enseigne1=:idEnseigne or enseignes_id_enseigne2=:idEnseigne) ";
                $sql2 .= "AND id_statut=1";
                $req2 = $bdd->prepare($sql2);

                $req2->execute(array("idEnseigne" => $iIdEnseigne));
                $res2 = $req2->fetchAll();

                if (!empty($res2)) {
                    $sql = "SELECT t1.prenom_contributeur, t1.nom_contributeur, t1.email_contributeur ";
                    $sql .= "FROM contributeurs t1 ";
                    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
                    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
                    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
                    $sql .= "WHERE ";
                    $sql .= "t4.id_enseigne = :idEnseigne GROUP BY t1.email_contributeur";
                    foreach ($res2 as $k => $result) {
                        //get count for every enseigne
                        //using main request
                        $req3 = $bdd->prepare($sql);
                        //select the partner shop id
                        if ($result['enseignes_id_enseigne1'] != $iIdEnseigne) {
                            $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne1']));
                        } else {
                            $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne2']));
                        }
                        $res3 = $req3->fetchAll();
                        $aCustomers = array_merge($aCustomers, $res3);
                    }
                }
            }

            break;
        //-------------------------------------- SMS ---------------------------------------------
        case "sms";
            $sType = 'sms';

            if (!empty($_POST['from_uniiti']) || !empty($_POST['from_upload'])) {
                //----------------------------------------mail from uniiti 
                if (!empty($_POST['from_uniiti'])) {
                    $bFromUniiti = true;
                    $sql = "SELECT t1.prenom_contributeur, t1.nom_contributeur, t1.telephone_contributeur ";
                    $sql .= "FROM contributeurs t1 ";
                    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
                    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
                    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
                    $sql .= "WHERE ";
                    $sql .= "t4.id_enseigne = :idEnseigne AND t1.telephone_contributeur!='' AND t1.telephone_contributeur IS NOT NULL ";
                    $sql .= "GROUP BY t1.telephone_contributeur";
                    $req = $bdd->prepare($sql);
                    $req->execute(array('idEnseigne' => $iIdEnseigne));
                    $res = $req->fetchAll();
                    $aCustomers = array_merge($aCustomers, $res);
                }
                //-------------------------------------------- mail from upload
                if (!empty($_POST['from_upload'])) {
                    $bFromUpload = true;
                    $sql = "SELECT t1.prenom as prenom_contributeur, t1.nom as nom_contributeur, t1.telephone as telephone_contributeur ";
                    $sql .= "FROM enseigne_clients t1 ";
                    $sql .= "WHERE enseignes_id_enseigne =:idEnseigne AND t1.telephone!='' AND t1.telephone IS NOT NULL  GROUP BY t1.telephone ";
                    $req = $bdd->prepare($sql);
                    $req->execute(array('idEnseigne' => $iIdEnseigne));
                    $res = $req->fetchAll();
                    $aCustomers = array_merge($aCustomers, $res);
                }
            }
            //------------------------------------------------mail from partner
            elseif (!empty($_POST['from_partner'])) {
                $bFromPartner = true;
                //1) get all partners
                $sql2 = "SELECT * ";
                $sql2 .= "FROM enseignes_reseau_enseignes where (enseignes_id_enseigne1=:idEnseigne or enseignes_id_enseigne2=:idEnseigne) ";
                $sql2 .= "AND id_statut=1";
                $req2 = $bdd->prepare($sql2);

                $req2->execute(array("idEnseigne" => $iIdEnseigne));
                $res2 = $req2->fetchAll();

                if (!empty($res2)) {
                    $sql = "SELECT t1.prenom_contributeur, t1.nom_contributeur, t1.telephone_contributeur ";
                    $sql .= "FROM contributeurs t1 ";
                    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
                    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
                    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
                    $sql .= "WHERE ";
                    $sql .= "t4.id_enseigne = :idEnseigne AND t1.telephone_contributeur!='' AND t1.telephone_contributeur IS NOT NULL ";
                    $sql .= "GROUP BY t1.telephone_contributeur";
                    foreach ($res2 as $k => $result) {
                        //get count for every enseigne
                        //using main request
                        $req3 = $bdd->prepare($sql);
                        //select the partner shop id
                        if ($result['enseignes_id_enseigne1'] != $iIdEnseigne) {
                            $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne1']));
                        } else {
                            $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne2']));
                        }
                        $res3 = $req3->fetchAll();
                        $aCustomers = array_merge($aCustomers, $res3);
                    }
                }
            }

            break;
    }


//============================================================================================================
//============================================ Sauvegarde des données  =========================================================
//============================================================================================================
    //============================================== si c'est une campgne de via des partenaires
    if (!empty($aCustomers) and $bFromPartner == true) {
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
            'base_uniiti' => $bFromUniiti, 'base_upload' => $bFromUpload, 'base_partenaires' => $bFromPartner, 'message'=>$sMessage, 'date_envoi' => $sDateEnvoi));
        $idCampagne = $bdd->lastInsertId();
        //insertion des customers
        $sql = "INSERT INTO enseigne_clients_campagne_destination (enseigne_clients_campagne_id, nom, prenom, email, telephone) VALUES ";
        foreach ($aCustomers as $aCustomer) {
            $sql .= "(";
            $sql .= "'" . mysql_real_escape_string($idCampagne) . "', ";
            $sql .= "'" . mysql_real_escape_string($aCustomer['prenom_contributeur']) . "', ";
            $sql .= "'" . mysql_real_escape_string($aCustomer['nom_contributeur']) . "', ";
            if (!empty($aCustomer['email_contributeur'])) {
                $sql .= "'" . mysql_real_escape_string($aCustomer['email_contributeur']) . "', ";
            } else {
                $sql .= "NULL, ";
            }
            if (!empty($aCustomer['telephone_contributeur'])) {
                $sql .= "'" . mysql_real_escape_string($aCustomer['telephone_contributeur']) . "' ";
            } else {
                $sql .= "NULL ";
            }
            $sql .= "),";
        }
        $sql = trim($sql, ',');
        $req = $bdd->prepare($sql);
        if($req->execute()){
            echo json_encode(array('status'=>'success', 'message'=>'compagne enregistré !'));
        }
    } 
     //============================================== si c'est une campgne de via des uniiti ou upload
    elseif (!empty($aCustomers)) {
         echo json_encode(array('status' => 'edit', 'message' => 'Editer les contacts', 'contacts'=>$aCustomers));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Aucun destinataire !'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Impossible de trouver le type de votre compagne'));
}
?>
