<?php
session_start();
require_once '../config/configPDO.inc.php';
//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
$iIdEnseigne = $_GET['id_enseigne'];
$req = $bdd->prepare('select professionnels_id_pro from enseignes where id_enseigne=:id_enseigne');
$req->execute(array('id_enseigne'=>$iIdEnseigne));
$aEnseigne = $req->fetch();

//if user is not admin
if($_SESSION['droits'] != 8){
    if(empty($aEnseigne) || ($aEnseigne['professionnels_id_pro']!= $_SESSION['SESS_MEMBER_ID'])){
        header('location: /');
    }
}
//============================================================================================================
//============================================SELECT COUNT EMAIL+TEL =========================================================
//============================================================================================================
    $sql = "SELECT t1.prenom_contributeur, t1.nom_contributeur, t1.email_contributeur , t1.telephone_contributeur ";
    $sql .= "FROM contributeurs t1 ";
    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
    $sql .= "WHERE ";
    $sql .= "t4.id_enseigne = :idEnseigne ";
    $sql .= "GROUP BY  t1.email_contributeur";
    

$req = $bdd->prepare($sql);
$req->execute(array('idEnseigne' => $iIdEnseigne));
$aData = $req->fetchAll();
/** Include PHPExcel */
require_once '../vendor/PHPExcel/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Uniiti.fr")
        ->setLastModifiedBy("Uniiti.fr")
        ->setTitle("Mes clients Uniiti.fr")
        ->setSubject("Mes clients Uniiti.fr")
        ->setDescription("Liste des clients qui ont commenté / noté mon enseigne sur Uniiti.fr.");


// Add some data 
$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'prénom')
        ->setCellValue('B1', 'nom')
        ->setCellValue('C1', 'email')
        ->setCellValue('D1', 'téléphone');
$i = 2;
foreach ($aData as $aClient){
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $aClient['prenom_contributeur'])
        ->setCellValue('B'.$i, $aClient['nom_contributeur'])
        ->setCellValue('C'.$i, $aClient['email_contributeur'])
        ->setCellValue('D'.$i, $aClient['telephone_contributeur']);
    $i++;
}
// Miscellaneous glyphs, UTF-8


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Mes clients Uniiti.fr');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="export_client.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');


exit;
?>
