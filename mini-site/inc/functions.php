<?php

function EcartDate($Maintenant, $Date){
	$html = "";
	$Secondes = strtotime($Maintenant) - strtotime($Date);
	switch ($Secondes) {
	case ($Secondes < 1800):
		$html .= "nouveau";
		break;
	case ($Secondes < 3600):
		$Minutes = round($Secondes / 60);
		$html .= "Il y a " . $Minutes . " min.";
		break;
	case ($Secondes < 86400):
		$Heures = round($Secondes /60 / 60);
		$html .= "Il y a " . $Heures . " h.";
		break;
	case ($Secondes < 2592000):
		$Heures = round($Secondes /60 / 60 /24);
		$html .= "Il y a " . $Heures . " j.";
		break;	
	case ($Secondes < 31104000):
		$Heures = round($Secondes /60 / 60 /24 /30);
		$html .= "Il y a " . $Heures . " mois";
		break;
	case ($Secondes < 746496000):
		$Heures = round($Secondes /60 / 60 /24 /30 /12);
		$html .= "Il y a " . $Heures . " an";
		break;				
	default :
		$Jours = round($Secondes /60 / 60 /24 /30 /12 );
		$html .= "Il y a " . $Jours . " ans";
		break;			
	}
	return $html;
}

?>
