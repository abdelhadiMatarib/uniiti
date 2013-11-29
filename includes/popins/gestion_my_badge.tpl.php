<?php
include_once '../../config/configuration.inc.php';
$urlTo = FALSE; // Déclaration variable pour login_access destination
$data = "{}";
$id = $_POST['i'];
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_gestion_minisite.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Mon Badge Uniiti</span>
    </div>

    <div class="minisite_body">
        <div class="minisite_body_head_titre account-my-badge">
            <span>Votre Badge</span>
            <div id="my-uniiti-rate">

                <script type="text/javascript" src="/js/my_badge.js">
                </script>

                <script type="text/javascript">oUniitiBadge.init(<?php echo $id; ?>);</script>
            </div>
        </div>
        <div class="minisite_body_head2_content account-my-badge">
            <textarea id="my-badge-code"><!-- Placez ce code à l'endroit de votre choix -->
<div id="my-uniiti-rate"></div>
<script type="text/javascript" src="http://uniiti.fr/js/my_badge.js"></script>
<script type="text/javascript">oUniitiBadge.init(<?php echo $id; ?>);</script>
            </textarea>
        </div>
    </div>

    <div class="suggestioncommerce_footer">


    </div>
</div>