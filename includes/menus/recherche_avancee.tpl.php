        <?php
        include_once '../../config/configuration.inc.php';?>
    <div class="recherche_avancee_left">
        
            <span class="recherche_avancee_1">Je recherche un 
                <ul>
                    <li><a class="recherche_mot_actif recherche_avancee_commerce" href="#" title="">Commerce</a></li>
                    <div class="recherche_avancee_menu">
                        <li class="recherche_avancee_item">
                            <a class="recherche_mot_inactif recherche_avancee_commerce" href="#" title="">Objet</a>
                            <div class="recherche_picto_container"></div>
                        </li>
                    </div>
                </ul>
            </span>

            <span class="recherche_avancee_2">près de 
                <ul>
                    <li><a class="recherche_avancee_lieu" href="#" title="">Paris 15<sup>ème</sup></a></li>
                </ul>
            </span>
        
            <span class="recherche_avancee_3">dans la catégorie 
                <ul>
                    <li><a class="recherche_avancee_categorie" href="#" title="">Cuisine</a></li>
                </ul>       
            </span>
            <span class="recherche_avancee_4">et la sous-catégorie 
                <ul>
                    <li><a class="recherche_avancee_souscategorie" href="#">Cuisine française</a></li>
                </ul>
            </span>
            <span class="recherche_avancee_5">et plus précisement
                <ul>
                    <li><a class="recherche_avancee_soussouscategorie" href="#">Cuisine Corse</a></li>
                </ul>        
            </span>
            <span class="recherche_avancee_6">pour un prix 
                <ul>
                    <li><a class="recherche_avancee_prix" href="#" title="">Peu élevé</a></li>
                </ul>
            </span>


    </div>
    <div class="recherche_avancee_right">
        <a href="#" title="">
        <div class="recherche_avancee_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/recherche_loupe.png" title="" alt="" height="95" width="96"/></div>
        <!--<div class="recherche_avancee_right_txt"><span class="recherche_avancee_right_txt1">Recherche</span><span class="recherche_avancee_right_txt2">avancée</span></div>-->
        </a>
        <div class="recherche_avancee_right_cliquez_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/cliquezici.png" title="" alt="" height="44" width="57"/></div>
    </div>
<div class="recherche_avancee_position_wrap">
    <input type="range" list="position" min="0" max="9"/>
    <datalist id="position">
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>5</option>
    <option>9</option>
    </datalist>
</div>
<style>
    .recherche_avancee_menu{background-color:#252525;}
    .recherche_avancee_item{float:left;width:210px;}
    .recherche_picto_container{float:right;width:40px;height:40px;}
    
    span.recherche_avancee_2 p{float:left;margin:0;}
    .recherche_avancee_wrapper{left:0;width:100%;}
    .recherche_avancee_left span{display:inline-block;font-size:1.8em;color: #89c1c6;}
    .recherche_avancee_left{float:none;}
    .recherche_avancee_right{position:absolute;right:10px;}
    .recherche_avancee_right_cliquez_wrap{position:absolute;top:30px;right:105px;}
    
    .recherche_avancee_left ul{margin:0;padding:0;display:inline-block;}
    .recherche_avancee_left ul li{list-style:none;display:inline-block;}
    
    .recherche_mot_actif .recherche_avancee_commerce{color:#03068a;}
    .recherche_mot_actif .recherche_avancee_lieu{color:#f480bc;}
    .recherche_mot_actif .recherche_avancee_categorie{color:#a1679a;}
    .recherche_mot_actif .recherche_avancee_souscategorie{color:#fabe41;}
    .recherche_mot_actif .recherche_avancee_soussouscategorie{color:#46ba8f;}
    .recherche_mot_actif .recherche_avancee_prix{color:#de5b30;}
    .recherche_avancee_position_wrap{margin:0 auto;width:460px;}
    .recherche_avancee_position_wrap input[type='range']{}
    
    .recherche_avancee_menu{display:none;}
</style>
<script>
$('span.recherche_avancee_2,span.recherche_avancee_3,span.recherche_avancee_4,span.recherche_avancee_5,span.recherche_avancee_6,.recherche_avancee_right').css('display','none');
$('.recherche_avancee_left span ul li a').click(function(e){
    e.preventDefault();
    var lol = $(this).parent().parent().parent().next().slideDown();
    console.log(lol);
});
$('.recherche_avancee_left span a:last').click(function(e){
    e.preventDefault();
    $('.recherche_avancee_right').slideDown();
});

/* 3 */if ($('.big_wrapper').width() == 736){
    
    //RECHERCHE AVANCÉE
    $('.recherche_avancee_left').css('line-height','2.2em').css('width','600px').css('margin','20px auto');
    $('.recherche_avancee_right').css('top','10px');
    $('.recherche_avancee_left span').css('font-size','1.4em');
    $('.recherche_avancee_left a').css('height','25px');
    $('.recherche_avancee_img_container').css('height','60px');
    $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
}
/* 4 */if ($('.big_wrapper').width() == 986){
    
    //RECHERCHE AVANCÉE
    $('.recherche_avancee_left').css('line-height','2.5em').css('width','800px').css('margin','20px auto');
    $('.recherche_avancee_right').css('top','10px');
    $('.recherche_avancee_left span').css('font-size','1.7em');
    $('.recherche_avancee_left a').css('height','29px');
    $('.recherche_avancee_img_container').css('height','60px');
    $('.recherche_avancee_img_container img').css('height','55.5px').css('width','56px');
}
/* 5 */else if ($('.big_wrapper').width() == 1236){
    
    //RECHERCHE AVANCÉE
    $('.recherche_avancee_left').css('line-height','2.5em').css('width','690px').css('margin','20px auto');
    $('.recherche_avancee_right').css('top','10px');
    $('.recherche_avancee_left span').css('font-size','1.5em');
    $('.recherche_avancee_left a').css('height','30px');
    $('.recherche_avancee_img_container').css('height','96px');
    $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
}
</script>