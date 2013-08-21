<?php
// Affichage ... si texte trop long
function tronque($str, $nb = 30) {
    // Si le nombre de caractères présents dans la chaine est supérieur au nombre 
    // maximum, alors on découpe la chaine au nombre de caractères 
    if (strlen($str) > $nb) 
    {
        $str = substr($str, 0, $nb);
        $position_espace = strrpos($str, " "); // on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $texte = substr($str, 0, $position_espace);  // on redécoupe à la fin du dernier mot
        $str = $str."..."; // puis on rajoute des ...
    }
    return $str; // on retourne la variable modifiée
}

// Tronquer Nom famille et mettre un . derrière la 1ere lettre
function tronqueName($str, $nb = 1) {
    // Si le nombre de caractères présents dans la chaine est supérieur au nombre 
    // maximum, alors on découpe la chaine au nombre de caractères 
    if (strlen($str) > $nb) 
    {
        $str = substr($str, 0, $nb);
        $position_espace = strrpos($str, " "); // on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $texte = substr($str, 0, $position_espace);  // on redécoupe à la fin du dernier mot
        $str = $str."."; // puis on rajoute des ...
    }
    return $str; // on retourne la variable modifiée
}

// 1ere lettre Majuscule puis suivantes Minuscules
function ucFirstOtherLower($str)
{
     return ucfirst(strtolower(trim($str)));
}

// Changement date en FR
function dateswitch($Date)			// swith MySql (year-mm-day) - input (day-mm-year)
{	$dates=explode(" ", " ".$Date);
	$Date=$dates[1];	$Time=$dates[2];
	if ($Time!=null) $Time=" $Time";
	$regs=explode("-", "-".$Date);
	return $regs['3']."-".$regs['2']."-".$regs['1']."$Time";
}


 // Fonction replace
function replaceCar($str) {
    $str    = str_replace(' ', '-', $str);
    $find_a = array('à', 'À', 'â', 'Â', 'ä', 'Ä');
    $str    = str_replace($find_a, 'a', $str);
    $find_e = array('é', 'É', 'è', 'È');
    $str    = str_replace($find_e, 'e', $str);
    $find_o = array('ô', 'Ô');
    $str    = str_replace($find_o, 'o', $str);
    $find_apostrophe = '\'';
    $str    = str_replace($find_apostrophe, '-', $str);
    return $str;
}

function EcartDate($Maintenant, $Date){
	$html = "";
	$Secondes = strtotime($Maintenant) - strtotime($Date);
	switch ($Secondes) {
	case ($Secondes < 60):
		$html .= $Secondes . " sec.";
		break;
	case ($Secondes < 3600):
		$Minutes = round($Secondes / 60);
		$html .= $Minutes . " min.";
		break;
	case ($Secondes < 86400):
		$Heures = round($Secondes /60 / 60);
		$html .= $Heures . " h.";
		break;		
	default :
		$Jours = round($Secondes /60 / 60 / 24 );
		$html .= $Jours . " j.";
		break;			
	}
	return $html;
}

?>
