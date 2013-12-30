<!DOCTYPE html>
<html>
    <?php
    include_once 'acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
    require_once('acces/droits.inc.php');      // Liste de définition des ACL			
    include_once 'config/configuration.inc.php';
    include 'includes/head.php';
    include_once 'config/configPDO.inc.php';
    include_once 'includes/fonctions.inc.php';
    ?>
    <body>
        <?php
        /**
         * ====================================== test before continue ====================================
         */
        $sTitle = "Post a comment";
        if (!empty($_GET['token'])) {
            $sToken = $_GET['token'];
            //select request
            $req = $bdd->prepare('SELECT * FROM demande_avis WHERE token=:token');
            $req->execute(array('token' => $sToken));
            $aOpinionRequest = $req->fetch();
            if (!empty($aOpinionRequest)) {
                $aAlreadyRegistred = null; // contain user info (if registred)
                //test if user is already registred
                if (!empty($aOpinionRequest['email'])) {
                    $req = $bdd->prepare('SELECT * FROM contributeurs WHERE email_contributeur=:email');
                    $req->execute(array('email' => $aOpinionRequest['email']));
                    $aAlreadyRegistred = $req->fetch();
                }
            } else {
                header('location:/');
            }
        } else {
            header('location:/');
        }
        /**
         * ====================================== end ======================================================
         */
        include 'includes/header.php';
        ?> 
        <!-- --------------------------------------------------- main wrapper ------------------------------- -->
        <div class="big_wrapper"> 

            <!-- --------------------------------------------------- formulaire  ------------------------------- -->

            <div class="left100 radius" style="margin-top:20px; text-align: center;">
                <h1>Let me post my opinion dude !!!</h1>
                <style>
                    /*to delete*/
                    input, textarea, select{
                        border: 1px solid red;
                    }
                </style>
                <p>
                        Be Careful ! Dont say bullshits about "<b><?php echo $aOpinionRequest['nom']; ?></b>"
                </p>
                <form name="send-opinion">
                    
                    <?php
                    //if user is already registred in our database
                    echo '<input type="hidden" name="token" value="' . $sToken . '" /> <br />';
                    if (!empty($aAlreadyRegistred)) {
                        
                        echo 'Note 
                                <select name="note">
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>
                                   </select> <br />';
                        echo 'Avis <textarea name="avis"></textarea>';
                    } else {
                        echo 'Prénom <input type="text" name="prenom" value="' . ((!empty($aOpinionRequest['prenom'])) ? $aOpinionRequest['prenom'] : "") . '" /> <br />';
                        echo 'Nom <input type="text" name="nom" value="' . ((!empty($aOpinionRequest['nom'])) ? $aOpinionRequest['nom'] : "") . '" /> <br />';
                        echo 'Email <input type="text" name="mail" value="' . ((!empty($aOpinionRequest['email'])) ? $aOpinionRequest['email'] : "") . '" /> <br />';
                        echo 'Note 
                                <select name="note">
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>
                                   </select><br />';
                        echo 'Avis <textarea name="avis"></textarea>';
                    }
                    ?>
                </form>
                <input type="button" value="send" id="send-opinion">
            </div>

        </div>
        <?php include("includes/js.php"); ?>
        <script type="text/javascript">
            var oOpinion = {
                init : function(){
                    $(document).on('click', '#send-opinion', oOpinion.Send);
                },
                /**
                 *try to save opinion
                 */
                Send : function(){
                     var formData = new FormData(document.forms.namedItem("send-opinion"));   
                     $.ajax({
                        url: '/includes/requeteSaveOpinion.php',  
                        type: 'POST',
                      
                        //Ajax events
                        //beforeSend: beforeSendHandler,
                        success: function(data){
                            if(data.status == 'error'){
                                alert(data.message);
//                             
                            }else if(data.status == 'success'){
                                alert(data.message);
//                                document.location.href = '/timeline.php';
                            }
                           
                        },
                        //error: errorHandler,
                        // Form data
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                        
                    });
                }
            }
            
            oOpinion.init();
        </script>
    </body>
</html>