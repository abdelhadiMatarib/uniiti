<?php
session_start();
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
//if user is not admin
if ($_SESSION['droits'] != 8) {
    header('location: /');
}
if (!empty($_POST['type']) and !empty($_POST['id_enseigne'])) {
    $iIdEnseigne = $_POST['id_enseigne'];
    switch ($_POST['type']) {
        //=============================================== upload by sending file ==============================
        case 'by_file' :
            if (!empty($_FILES['file'])) {
                //testinf if user send a real csv file
                //xlsx / xls
                $aMimesXls = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
                //format CSV
                $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
                if ($ext == 'csv') {
                    // do something
                    $sCsvData = file_get_contents($_FILES['file']['tmp_name']);

                    $lines = explode("\n", $sCsvData);

                    //PARSING LINE BY LINE
                    foreach ($lines as $key => $line) {
                        if (!empty($line) and $key > 0) {
                            $aContacts[] = str_getcsv($line, ';');
                        }
                    }
                }
                // format xlsx
                else if (in_array($_FILES['file']['type'], $aMimesXls)) {
                    include '../vendor/PHPExcel/PHPExcel/IOFactory.php';

                    $inputFileName = $_FILES['file']['tmp_name'];

//  Read your Excel workbook
                    try {
                        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                        $objPHPExcel = $objReader->load($inputFileName);
                    } catch (Exception $e) {
                        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                    }

//  Get worksheet dimensions
                    $sheet = $objPHPExcel->getSheet(0);
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();
//  Loop through each row of the worksheet in turn
                    for ($row = 1; $row <= $highestRow; $row++) {
                        if ($row > 1) {
                            //  Read a row of data into an array
                            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, "", TRUE, FALSE);
                            //  Insert row data array into your database of choice here
                            (!empty($rowData[0][0])) ? $prenom = $rowData[0][0] : $prenom = "";
                            (!empty($rowData[0][1])) ? $nom = $rowData[0][1] : $nom = "";
                            (!empty($rowData[0][2])) ? $email = $rowData[0][2] : $email = "";
                            (!empty($rowData[0][3])) ? $telephone = $rowData[0][3] : $telephone = "";
                            (!empty($rowData[0][4])) ? $commentaire = $rowData[0][4] : $commentaire = "";
                            $aContacts[] = array($prenom, $nom, $email, $telephone, $commentaire);
                        }
                    }
                } else {
                    $sError = "Le fichier n'est pas sous format csv ou xlsx.";
                }
            } else {
                $sError = "Merci de selectionner un fichier.";
            }


            break;
        case 'by_form' :

            
            foreach ($_POST['email'] as $key=>$sMail){
                            (!empty($_POST['prenom'][$key])) ? $prenom = $_POST['prenom'][$key] : $prenom = "";
                            (!empty($_POST['nom'][$key])) ? $nom = $_POST['nom'][$key] : $nom = "";
                            (!empty($_POST['email'][$key])) ? $email = $_POST['email'][$key] : $email = "";
                            (!empty($_POST['telephone'][$key])) ? $telephone = $_POST['telephone'][$key] : $telephone = "";
                            (!empty($_POST['commentaire'][$key])) ? $commentaire = $_POST['commentaire'][$key] : $commentaire = "";
                            $aContacts[] = array($prenom, $nom, $email, $telephone, $commentaire);
            }
            

            break;
    }

    //---------------------------- 2) after collecting contacts => we save them in the db
    if (!empty($aContacts)) {
        $sql2 = "INSERT INTO demande_avis (nom, prenom, email, telephone, commentaire, enseigne_id, token, date) VALUES ";
        $sql2 .= "(:nom, :prenom, :email, :telephone, :commentaire, :enseignes_id_enseigne, :token, :date)";
        $req2 = $bdd->prepare($sql2);
        $sError = null;
        foreach ($aContacts as $aCustomer) {
            $sFirstName = $aCustomer[0];
            $sName = $aCustomer[1];
            $sEmail = $aCustomer[2];
            $sTel = $aCustomer[3];
            $sCommentary = $aCustomer[4];
            $sToken = sha1(uniqid(rand(), TRUE));
            try {
                $req2->execute(array('nom' => $sName, 'prenom' => $sFirstName, 'email' => $sEmail, 'telephone' => $sTel, 'commentaire' => $sCommentary, 'enseignes_id_enseigne' => $iIdEnseigne, 'token' => $sToken, 'date' => date('Y-m-d h:i:s')));
            } catch (Exception $e) {
                $sError .= " - Impossible d'insérer le client : " . $sFirstName . " " . $sName;
            }
        }
        if (empty($sError)) {
            echo json_encode(array('status' => 'success', 'message' => 'Upload effectué avec succès !'));
        } else {
            echo json_encode(array('status' => 'success', 'message' => $sError));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Aucun email / num telephone trouvé !'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Type d upload inconnu !'));
}
?>
