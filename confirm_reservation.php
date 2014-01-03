<!DOCTYPE html>
<html>
    <?php
    include_once 'config/configPDO.inc.php';
    ?>
    <body style="text-align: center; background: black; opacity: 0.7; height: 100%; color: white; font-family: Tahoma">
        <?php
        /**
         * ====================================== test before continue ====================================
         */
        $sTitle = "Valider une réservation";
        if (!empty($_GET['token'])) {
            $sToken = $_GET['token'];
            //select request
            $req = $bdd->prepare('SELECT * FROM enseigne_reservation WHERE hash=:token and status_id = 1');
            $req->execute(array('token' => $sToken));
            $aReservationRequest = $req->fetch();
            if (empty($aReservationRequest)) {
                header('location:/');
            }
        } 
        else{
            header('location:/');
        }
        /**
         * ====================================== end ======================================================
         */
        ?> 
        <!-- --------------------------------------------------- main wrapper ------------------------------- -->
        <div class="big_wrapper" > 
            <img src="http://uniiti.fr/img/pictos_splash/logo_splash.png" />

            <!-- --------------------------------------------------- formulaire  ------------------------------- -->
            <style>
                .choice{
                    width: 75%;
                    height: 50px;
                    margin-bottom: 15px;
                    font-size: 20px;
                }
            </style>
            <div class="left100 radius" style="margin-top:20px; text-align: center;">
                <h1>Résumé de la réservation</h1>
                <style>
                    /*to delete*/
                    input, textarea, select{
                        border: 1px solid red;
                    }
                </style>
                <table style="width: 100%; text-align: center; border-bottom: 1px solid black;">
                    <tr><th style="width: 33%;">Date</th><th style="width: 33%;">Heure</th><th>Nombre de personnes</th></tr>
                    <tr><td><?php echo $aReservationRequest['date_reservation']; ?></td><td><?php echo $aReservationRequest['heure_reservation']; ?></td><td><?php echo $aReservationRequest['nombre_reservation']; ?></td></tr>
                </table>
                <table style="width: 100%; text-align: left; border-bottom: 1px solid black;">
                    <tr><th>Nom</th><td><?php echo $aReservationRequest['telephone_destinataire']; ?></td></tr>
                    <tr><th>Numéro de téléphone</th><td><?php echo $aReservationRequest['nom_reservation']; ?> <?php echo $aReservationRequest['prenom_reservation']; ?></td></tr>
                    <tr><th>Email</th><td><?php echo $aReservationRequest['email_destinataire']; ?></td></tr>
                </table>
                <form name="send-opinion" method="POST" action="/includes/requeteupdatereservation.php">
                    <input type="hidden" name="valider" value="oui" />
                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" />
                    <input type="submit" value="valider" class="choice" />
                </form>
                <form name="send-opinion" method="POST" action="/includes/requeteupdatereservation.php">
                    <input type="hidden" name="valider" value="non" />
                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" />
                    <input type="submit" value="refuser" class="choice"/>
                </form>
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