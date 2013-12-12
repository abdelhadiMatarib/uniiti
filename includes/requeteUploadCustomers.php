<?php
session_start();
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';

//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
$iIdEnseigne = $_POST['id_enseigne'];
$req = $bdd->prepare('select professionnels_id_pro from enseignes where id_enseigne=:id_enseigne');
$req->execute(array('id_enseigne'=>$iIdEnseigne));
$aEnseigne = $req->fetch();

//if user is not admin
if($_SESSION['droits'] != 8){
    if(empty($aEnseigne) || ($aEnseigne['professionnels_id_pro']!= $_SESSION['SESS_MEMBER_ID'])){
        header('location: /');
    }
}


//print_r($_FILES);
$sError = null;
$aContacts = null;
if (!empty($_FILES['file'])) {
    //testinf if user send a real csv file
    //xlsx / xls
    $aMimesXls = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
    //format CSV
    $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.')+1);
    if ($ext=='csv') {
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
            if($row>1){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, "", TRUE, FALSE);
                //  Insert row data array into your database of choice here
                (!empty($rowData[0][0])) ? $prenom = $rowData[0][0] : $prenom = "";
                (!empty($rowData[0][1])) ? $nom = $rowData[0][1] : $nom= "";
                (!empty($rowData[0][2])) ? $email = $rowData[0][2] : $email= "";
                (!empty($rowData[0][3])) ? $telephone = $rowData[0][3] : $telephone= "";
                (!empty($rowData[0][4])) ? $commentaire = $rowData[0][4] : $commentaire= "";
                $aContacts[] = array($prenom, $nom, $email, $telephone, $commentaire);
            }
        }
    } else {
        $sError = "Le fichier n'est pas sous format csv ou xlsx.";
    }
} else {
    $sError = "Merci de selectionner un fichier.";
}


//if we found an error
if (!empty($sError)) {
    echo json_encode(array('status' => 'error', 'message' => $sError));
} else {
    //test if we haves contacts (not an empty csv)
    if (empty($aContacts)) {
        echo json_encode(array('status' => 'error', 'message' => "Votre fichier ne contient pas de contact."));
    } else {
        // 1) delete all current customers from db
        $sql = "DELETE FROM enseigne_clients WHERE ";
        $sql .= "enseignes_id_enseigne=:idEnseigne";
        $req = $bdd->prepare($sql);
        //$req->execute(array("idEnseigne"=>$_SESSION['SESS_MEMBER_ID']));
        $req->execute(array("idEnseigne" => $iIdEnseigne));  //enseigne90
        // 2) Save new records
        $sql2 = "INSERT INTO enseigne_clients (nom, prenom, email, telephone, commentaire, enseignes_id_enseigne) VALUES ";
        $sql2 .= "(:nom, :prenom, :email, :telephone, :commentaire, :enseignes_id_enseigne)";
        $req2 = $bdd->prepare($sql2);
        $sError = null;
        foreach ($aContacts as $aCustomer) {
            $sFirstName = $aCustomer[0];
            $sName = $aCustomer[1];
            $sEmail = $aCustomer[2];
            $sTel = $aCustomer[3];
            $sCommentary = $aCustomer[4];
            try {
                $req2->execute(array('nom' => $sName, 'prenom' => $sFirstName, 'email' => $sEmail, 'telephone' => $sTel, 'commentaire' => $sCommentary, 'enseignes_id_enseigne' => $iIdEnseigne));
            } catch (Exception $e) {
                $sError .= " - Impossible d'insérer le client : " . $sFirstName . " " . $sName;
            }
        }
        if ($sError) {
            echo json_encode(array('status' => 'success', 'message' => "Upload effectué avec des erreurs : " . $sEmail . " .", 'customers' => json_encode($aContacts)));
        } else {
            echo json_encode(array('status' => 'success', 'message' => "Upload effectué avec succès", 'customers' => $aContacts));
        }
    }
}
?>
