<?php
		$sql = "SELECT * FROM categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien1Categories[$row['categorie_principale']] = $row['categorie_principale'];
			$Lien2Categories[$row['categorie_principale']][$row['sous_categorie']] = $row['sous_categorie'];
			$Lien3Categories[$row['categorie_principale']][$row['sous_categorie']][$row['sous_categorie2']] = $row['sous_categorie2'];
		}
?>

<!--<nav>-->
<div class="filters">
    <style>
        .quoideneuf_utilisateur,.recommandations_utilisateur,.avisenattente_utilisateur,.flux_utilisateur{float:left;}
        .quoideneuf_utilisateur a,.recommandations_utilisateur a,.avisenattente_utilisateur a,.flux_utilisateur a{display:inline-block;color:white;height:21px;margin-right:1px;padding:12px;background-color:#CBCBCB;}
        .quoideneuf_utilisateur a:hover,.recommandations_utilisateur a:hover,.avisenattente_utilisateur a:hover,.flux_utilisateur a:hover{color:white;background-color:#ADADAD;}
    </style>
    <div class="quoideneuf_utilisateur"><a href="#" title="">Quoi de neuf ?</a></div>
    <div class="recommandations_utilisateur"><a href="#" title="">Recommandations</a></div>
    <div class="avisenattente_utilisateur"><a href="#" title="">Avis en attente</a></div>
    <div class="flux_utilisateur"><a href="#" title="">Mon flux</a></div>
        <div class="rang0">
            <ul>
                <li class="button_all"></li>
            </ul>
        </div>
        <div class="rang1">
            <ul>
                <li class="button_avis"></li>
                <li class="button_like"></li>
                <li class="button_dislike"></li>
                <li class="button_wishlist"></li>
            </ul> 
        </div>
        <div class="rang2">
            <ul>
				<?php 
				$Compteur = 0;
				foreach ($Lien1Categories as $Key => $Categorie) { 
					$Compteur++ ?>
					<li class="cat<?php echo $Compteur ?>"><?php echo $Categorie ?></li>
				<?php }	?>
            </ul>            
        </div>
        <div class="rang3">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien2Categories as $Key => $Categorie) { 
						$Compteur++;
						$CompteurSousCat = 0;
						foreach ($Lien2Categories[$Key] as $Key2 => $SousCategorie) {
						$CompteurSousCat++; ?>
                <li class="cat<?php echo $Compteur ?> sscat<?php echo $CompteurSousCat ?>"><?php echo $SousCategorie ?></li>
				<?php 	}
					  }	?>
            </ul>            
        </div>
        <div class="rang4">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien3Categories as $Key => $Categorie) {
						$Compteur++;
						$CompteurSousCat = 0;
						foreach ($Lien3Categories[$Key] as $Key2 => $SousCategorie) {
							$CompteurSousCat++;
							foreach ($Lien3Categories[$Key][$Key2] as $Key3 => $SousCategorie2) {
								if ($SousCategorie2 != "") { ?>
                <li class="cat<?php echo $Compteur ?> sscat<?php echo $CompteurSousCat ?>"><?php echo $SousCategorie2 ?></li>
				<?php			}
							}
						}
					  }	?>
            </ul>            
        </div>
</div>
<!--</nav>-->