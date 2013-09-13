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
	case ($Secondes < 1800):
		$html .= "<div class=\"box_posttime\"><time><span class=\"box_new_item\">nouveau</span></time></div>";
		break;
	case ($Secondes < 3600):
		$Minutes = round($Secondes / 60);
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Minutes . " min.</strong></time></div>";
		break;
	case ($Secondes < 86400):
		$Heures = round($Secondes /60 / 60);
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Heures . " h.</strong></time></div>";
		break;
	case ($Secondes < 2592000):
		$Heures = round($Secondes /60 / 60 /24);
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Heures . " j.</strong></time></div>";
		break;	
	case ($Secondes < 31104000):
		$Heures = round($Secondes /60 / 60 /24 /30);
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Heures . " mois</strong></time></div>";
		break;
	case ($Secondes < 746496000):
		$Heures = round($Secondes /60 / 60 /24 /30 /12);
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Heures . " an</strong></time></div>";
		break;				
	default :
		$Jours = round($Secondes /60 / 60 /24 /30 /12 );
		$html .= "<div class=\"box_posttime\"><time><img src=\"" . SITE_URL . "/img/pictos_actions/clock.png\"/>Il y a <strong>" . $Jours . " ans</strong></time></div>";
		break;			
	}
	return $html;
}

function Age($Maintenant, $jour, $mois, $annee)
{
    $an = explode('-', $Maintenant);
	if ($jour + $mois + $annee == 0) {$age = "âge NC";}
	else
	{
		if(($mois < $an[1]) || ($mois == $an[1]) && ($jour <= $an[2])) {$age = $an[0] - $annee;}
		else {$age = $an[0] - $annee - 1;}
		$age .= " ans";
	}

    return $age;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function AfficheEtoiles($note_arrondi, $categorie) {
	switch ($categorie) {
		case ("Cuisine"):
			$posy = "-76px";
		break;
		case ("Beauté et bien être"):
			$posy = "-38px";
		break;
		case ("Culture"):
			$posy = "-133px";
		break;
		case ("Mode et design"):
			$posy = "-95px";
		break;
		case ("Santé"):
			$posy = "-114px";
		break;
		case ("Sorties, voyages et loisirs"):
			$posy = "-19px";
		break;
		case ("Sport"):
			$posy = "0px";
		break;
		case ("Services et inclassables"):
			$posy = "-57px";
		break;
	}
	$html = "";
	$reste = $note_arrondi / 2 - round($note_arrondi / 2);
	if ($reste <= -0.25) {$nbpleines = round($note_arrondi / 2) - 1;}
	else {$nbpleines = round($note_arrondi / 2);}
	for ($i = 1 ; $i <= $nbpleines ; $i++) {
	$html .= "<div style=\"float:left;margin-right:3px;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') 0px " . $posy . "\"></div>";
	}
	if (($reste <= -0.25) or ($reste >= 0.25)) {
		$html .= "<div style=\"float:left;margin-right:3px;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') -19px " . $posy . "\"></div>";
		$nbpleines++;
	}
	for ($i = $nbpleines ; $i < 5 ; $i++) {
		$html .= "<div style=\"float:left;margin-right:3px;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') 0px -152px\"></div>";
	}
	return $html;
}

function AffichePush($categorie) {
	switch ($categorie) {
		case ("Cuisine"):
			$posx = "-126px";
			$posy = "-19px";
		break;
		case ("Beauté et bien être"):
			$posx = "-76px";
			$posy = "-119px";
		break;
		case ("Culture"):
			$posx = "-126px";
			$posy = "-169px";
		break;
		case ("Mode et design"):
			$posx = "-126px";
			$posy = "-69px";
		break;
		case ("Santé"):
			$posx = "-126px";
			$posy = "-119px";
		break;
		case ("Sorties, voyages et loisirs"):
			$posx = "-76px";
			$posy = "-69px";
		break;
		case ("Sport"):
			$posx = "-76px";
			$posy = "-19px";
		break;
		case ("Services et inclassables"):
			$posx = "-76px";
			$posy = "-169px";
		break;
	}
	$html = "style=\"background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') " . $posx . " " . $posy . "\"";
	
	return $html;
}

function AfficheProvenance($provenance, $categorie) {
	switch ($provenance) {
		case ("avis") :
			$posy = "-169px";
		break;
		case ("aime") :
			$posy = "-19px";
		break;
		case ("aime_pas") :
			$posy = "-69px";
		break;
		case ("wish") :
			$posy = "-119px";
		break;
	}
	switch ($categorie) {
		case ("Cuisine"):
			$posx = "-376px";
		break;
		case ("Beauté et bien être"):
			$posx = "-276px";
		break;
		case ("Culture"):
			$posx = "-526px";
		break;
		case ("Mode et design"):
			$posx = "-426px";
		break;
		case ("Santé"):
			$posx = "-476px";
		break;
		case ("Sorties, voyages et loisirs"):
			$posx = "-226px";
		break;
		case ("Sport"):
			$posx = "-176px";
		break;
		case ("Services et inclassables"):
			$posx = "-326px";
		break;
	}

	$html = "style=\"background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') " . $posx . " " . $posy . "\"";
	return $html;
}

function AfficheAction($provenance, $categorie) {
	switch ($provenance) {
		case ("aime") :
			$posy = "-19px";
		break;
		case ("aime_pas") :
			$posy = "-69px";
		break;
		case ("wish") :
			$posy = "-119px";
		break;
	}
	switch ($categorie) {
		case ("Cuisine"):
			$posx = "-776px";
		break;
		case ("Beauté et bien être"):
			$posx = "-676px";
		break;
		case ("Culture"):
			$posx = "-926px";
		break;
		case ("Mode et design"):
			$posx = "-826px";
		break;
		case ("Santé"):
			$posx = "-876px";
		break;
		case ("Sorties, voyages et loisirs"):
			$posx = "-626px";
		break;
		case ("Sport"):
			$posx = "-576px";
		break;
		case ("Services et inclassables"):
			$posx = "-726px";
		break;
	}

	$html = "style=\"background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') " . $posx . " " . $posy . "\"";
	return $html;
}

function AfficheTrusts($note_arrondi, $categorie) {
	switch ($categorie) {
		case ("Cuisine"):
			$posy = "-76px";
		break;
		case ("Beauté et bien être"):
			$posy = "-38px";
		break;
		case ("Culture"):
			$posy = "-133px";
		break;
		case ("Mode et design"):
			$posy = "-95px";
		break;
		case ("Santé"):
			$posy = "-114px";
		break;
		case ("Sorties, voyages et loisirs"):
			$posy = "-19px";
		break;
		case ("Sport"):
			$posy = "0px";
		break;
		case ("Services et inclassables"):
			$posy = "-57px";
		break;
	}
	$html = "";
	$reste = $note_arrondi / 2 - round($note_arrondi / 2);
	if ($reste <= -0.25) {$nbpleines = round($note_arrondi / 2) - 1;}
	else {$nbpleines = round($note_arrondi / 2);}
	for ($i = 1 ; $i <= $nbpleines ; $i++) {
	$html .= "<div style=\"float:left;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') -38px " . $posy . "\"></div>";
	}
	if (($reste <= -0.25) or ($reste >= 0.25)) {
		$html .= "<div style=\"float:left;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') -57px " . $posy . "\"></div>";
		$nbpleines++;		
	}
	for ($i = $nbpleines ; $i < 5 ; $i++) {
		$html .= "<div style=\"float:left;height:19px;width:19px;background:url('" . SITE_URL . "/img/pictos_commerces/sprite.png') -38px -152px\"></div>";
	}
	return $html;
}

?>
