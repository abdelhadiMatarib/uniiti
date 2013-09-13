        <?php
        include_once '../../config/configuration.inc.php';?>
    <div class="recherche_avancee_left">
        
            <span class="recherche_avancee_1">Je recherche un <a href="#" title="">Commerce</a></span>
            <span class="recherche_avancee_2">près de <a href="#" title="">Paris 15<sup>ème</sup></a></span>
            <span class="recherche_avancee_3">dans la catégorie <a href="#" title="">Insolite et Inclassable</a></span>
            <span class="recherche_avancee_4">et plus précisemment <a href="#">Une station-service</a></span>
            <span class="recherche_avancee_5">pour un prix <a href="#" title="">Peu élevé</a></span>

    </div>
    <div class="recherche_avancee_right">
        <a href="#" title="">
        <div class="recherche_avancee_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/recherche_loupe.png" title="" alt="" height="95" width="96"/></div>
        <!--<div class="recherche_avancee_right_txt"><span class="recherche_avancee_right_txt1">Recherche</span><span class="recherche_avancee_right_txt2">avancée</span></div>-->
        </a>
        <div class="recherche_avancee_right_cliquez_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/cliquezici.png" title="" alt="" height="44" width="57"/></div>
    </div>

<style>
    span.recherche_avancee_2 p{float:left;margin:0;}
</style>
<script>
$('span.recherche_avancee_2,span.recherche_avancee_3,span.recherche_avancee_4,span.recherche_avancee_5,.recherche_avancee_right').css('display','none');
$('.recherche_avancee_left span a').click(function(e){
    e.preventDefault();
    var lol = $(this).parent().next().slideDown();
    console.log(lol);
});
$('.recherche_avancee_left span a:last').click(function(e){
    e.preventDefault();
    $('.recherche_avancee_right').slideDown();
});

/* 3 */if ($('.big_wrapper').width() == 736){
    
    //RECHERCHE AVANCÉE
    $('.recherche_avancee_left').css('line-height','2.2em').css('width','600px').css('margin','20px auto');
    $('.recherche_avancee_right').css('top','5px');
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
    $('.recherche_avancee_left').css('line-height','2.5em').css('width','1000px').css('margin','40px auto');
    $('.recherche_avancee_right').css('top','40px');
    $('.recherche_avancee_left span').css('font-size','2.1em');
    $('.recherche_avancee_left a').css('height','30px');
    $('.recherche_avancee_img_container').css('height','96px');
    $('.recherche_avancee_img_container img').css('height','96px').css('width','95px');
}
</script>