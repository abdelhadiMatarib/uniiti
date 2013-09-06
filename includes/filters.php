<?php
		$sql = "SELECT * FROM categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien1Categories[$row['id_categorie']] = $row['categorie_principale'];
		}
		$sql = "SELECT * FROM sous_categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien2Categories[$Lien1Categories[$row['id_categorie']]][$row['id_sous_categorie']] = $row['sous_categorie'];
		}
		$sql = "SELECT * FROM sous_categories2";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien3Categories[$Lien1Categories[$row['id_categorie']]][$Lien2Categories[$Lien1Categories[$row['id_categorie']]][$row['id_sous_categorie']]][$row['id_sous_categorie2']] = $row['sous_categorie2'];
		}
?>

<!--<nav>-->
<div class="filters">
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