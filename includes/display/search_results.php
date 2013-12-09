<?php
$name = $row['nom_enseigne'];
$idEnseigne = $row['id_enseigne'];
$arondissement = $row['arrondissement'];

if (!empty($row['sous_categorie2'])) {
    $sousCateg = $row['sous_categorie2'];
} else {
    $sousCateg = $row['sous_categorie'];
}
$boxImg = SITE_URL . '/photos/enseignes/box/' . $row['box_enseigne'];
$enseigneUrl = SITE_URL . '/pages/commerce.php?id_enseigne=' . $row['id_enseigne'];

//number of opinions
//average rate
$ilyaunesemaine = mktime(date("H"), date("i"), date("s"), date("m"), date("d") - 7, date("Y"));
$datemoinssept = date('Y-m-d H:i:s', $ilyaunesemaine);
$sqlRate = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1
			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			
			WHERE(t1.id_statut = 2 OR (t1.id_statut = 1 AND t1.date_avis < '" . $datemoinssept . "'))
                        AND t2.enseignes_id_enseigne=:id_enseigne
";
$reqRate = $bdd->prepare($sqlRate);
$reqRate->bindParam(':id_enseigne', $idEnseigne, PDO::PARAM_INT);
$reqRate->execute();
$resultRate = $reqRate->fetch();
$rateCount = $resultRate['count_avis'];
$rateAvg = $resultRate['moyenne'];
?>
<div class="box isotope-item" id="2013-11-23 14:16:21" temps="1385216181">

    <header>
        <div class="box_icon" title="Restaurant gastronomique" style="background:url('http://uniiti.local/img/pictos_commerces/sprite_cat.jpg') 0px -50px"></div>
        <div class="box_desc" onclick="location.href='<?php echo $enseigneUrl; ?>'">
            <span class="box_title" title="<?php echo $name; ?>"><?php echo $name; ?></span>
            <span class="box_subtitle" title="<?php echo $sousCateg; ?>" style="color:#fabe41;"><?php echo $sousCateg; ?></span>
        </div>
    </header>

    <figure>
        <div class="box_mark">
            <div class="box_stars">
                <div style="float:left;margin-right:3px;height:19px;width:19px;background:url('http://uniiti.local/img/pictos_commerces/sprite.png') 0px -76px"></div><div style="float:left;margin-right:3px;height:19px;width:19px;background:url('http://uniiti.local/img/pictos_commerces/sprite.png') 0px -76px"></div><div style="float:left;margin-right:3px;height:19px;width:19px;background:url('http://uniiti.local/img/pictos_commerces/sprite.png') 0px -76px"></div><div style="float:left;margin-right:3px;height:19px;width:19px;background:url('http://uniiti.local/img/pictos_commerces/sprite.png') 0px -76px"></div><div style="float:left;margin-right:3px;height:19px;width:19px;background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -19px -76px"></div>
            </div>
            <div class="box_headratings"><span><?php echo round($rateAvg, 1); ?>/10 - <?php echo round($rateCount, 1); ?> avis</span></div>
        </div>

        <div class="box_localisation"><span><?php echo $arondissement; ?></span></div>
        <div class="box_push_et_img box_height_4" onclick="location.href='<?php echo $enseigneUrl; ?>'">
            <img style="margin-top: 0px;" src="<?php echo $boxImg; ?>" title="" alt="">
            <?php /* <div class="box_push" style="background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -126px -19px"></div>
             */ ?>
        </div>
        <?php /* <div class="overlay_push">
          <div class="push_buttons_wrapper">
          <div title="J'aime" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');" class="push_buttons_like" style="background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -776px -19px"></div>
          <div title="Je n'aime pas" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');" class="push_buttons_dislike" style="background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -776px -69px"></div>
          <div title="Ajouter à ma Wishlist" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');" class="push_buttons_wishlist" style="background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -776px -119px"></div>
          </div>
          </div> */
        ?>
    </figure>
    <?php /*
      <section onclick="OuvrePopin({provenance :'aime',type : 'enseigne',id_avis :0,id_contributeur :5504,nom_contributeur : '',photo_contributeur : 'photo 51.jpg',prenom_contributeur : '',id_enseigne :139,nom_enseigne : 'La petite cour',slide1 : '139couv1.jpg', x1 : '583', y1 : '465', couleur : '#fabe41',categorie : 'Cuisine',scategorie : 'Restaurant cuisine française',sscategorie : 'Restaurant gastronomique',arrondissement : 'Paris 6&lt;sup&gt;ème&lt;/sup&gt;',posx : 0,posy : -1550,commentaire : '\'\'',delai_avis : '&lt;div class=&quot;box_posttime&quot;&gt;&lt;time&gt;&lt;img src=&quot;http://uniiti.local/img/pictos_actions/clock.png&quot;/&gt;Il y a &lt;strong&gt;6 j.&lt;/strong&gt;&lt;/time&gt;&lt;/div&gt;',count_avis_enseigne :154,count_likes :1,note :'',note_arrondi :9.0}, '/includes/popins/presentation_action_commentaire.tpl.php','default_dialog_large');">
      <div class="box_useraction"><a href="http://uniiti.local/pages/utilisateur.php?id_contributeur=5504"><span style="color:#fabe41;"> </span></a> a aimé</div>
      <div class="arrow_up" style="border-bottom:5px solid #fabe41;"></div>
      </section>

      <footer>

      <div class="box_foot">
      <div class="box_userpic"><a href="http://uniiti.local/pages/utilisateur.php?id_contributeur=5504"><img title=" " src="http://uniiti.local/photos/utilisateurs/avatars/photo%2051.jpg" alt=""></a></div>
      <div class="box_user_time"><div class="box_posttime"><time><img src="http://uniiti.local/img/pictos_actions/clock.png">Il y a <strong>6 j.</strong></time></div></div>
      <div class="box_posttype" style="background:url('http://uniiti.local/img/pictos_commerces/sprite.png') -376px -19px"></div>
      </div>
      </footer>
     */ ?>
</div>