<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';
$urlTo = FALSE; // Déclaration variable pour login_access destination

if ($_POST['init']) {$data['init'] = 0;}

$sql = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1
			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN enseignes AS t3
				ON t2.enseignes_id_enseigne = t3.id_enseigne
				INNER JOIN contributeurs_donnent_avis AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nbavis'] = $result['count_avis'];

$sql = "SELECT COUNT(*) AS nblikes FROM contributeurs_aiment_enseignes";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nblikes'] = $result['nblikes'];

$sql = "SELECT COUNT(*) AS nbnolikes FROM contributeurs_aiment_pas_enseignes";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nbnolikes'] = $result['nbnolikes'];

$sql = "SELECT COUNT(*) AS nbwish FROM contributeurs_wish_enseignes";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nbwish'] = $result['nbwish'];

$data['total'] = $data['nbavis'] + $data['nblikes'] + $data['nbnolikes'] + $data['nbwish'];
echo json_encode($data);

?>