<!DOCTYPE html>
<html>
    <?php
    /**
     * Page title 
     */
    $sTitle = "My OPT-IN Campaign";
    $iIdEnseigne = $_GET['id_enseigne'];

    include_once 'acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
    require_once('acces/droits.inc.php');      // Liste de définition des ACL			
    include_once 'config/configuration.inc.php';
    include 'includes/head.php';
    include_once 'config/configPDO.inc.php';
    include_once 'includes/fonctions.inc.php';
    include_once 'includes/requeteCampagne.php';
    ?>
    <body>
        <?php
        include 'includes/header.php';
        /*
         * en attendant la liaison entre la connexion et l'enseigne 
         * seul, les pro et admin peuvent voir cette page
         * todo : verifier que c'est bien l'enseigne de luser connecté
         */

        if ($_SESSION['droits'] < 2) {
            header("location: /");
        }
        ?> 
        <!-- --------------------------------------------------- main wrapper ------------------------------- -->
        <div class="big_wrapper"> 
            <!-- --------------------------------------------------- H1 ------------------------------- -->
            <div class="my-campaign-h1">
                <h1>My OPT-IN campaign</h1>
            </div>

            <!-- --------------------------------------------------- First Step ------------------------------- -->

            <div class="left100 radius" style="margin-top:20px; text-align: center;">
                <h2 class="left100">Step One ! Choose you weapon !</h2>
                <div class="left49">
                    <h3>Send a new or saved compain</h3>

                    <a href="#" id="new-compain-button">Send a new compain</a> | 
                    <a href="#" id="saved-compain-button">Send a saved compain</a>

                </div>

                <div class="left49">
                    <h3>Upload / Download my customers infos</h3>
                    <a href="#" id="send-customers-button">Send my new customers infos</a> | 
                    <a href="#" id="download-customers-button">Download my customers infos.</a>
                </div>

            </div>
            <?php // --------------------------------------- SECOND STEP ----------------------------------------> ?>
            <div class="left100 radius" style="margin-top:20px; text-align: center;" id="step2">
                <?php // --------------------------------------- SEND NEW COMPAIN  ----------------------------------------> ?>
                <div class="left100" id="new-compain-div" style="display: none">
                    <h2>Your message please !</h2>
                    <textarea id="my-compain-message" style="border: 1px solid red"></textarea>
                    
                    <h2>Sending Date!</h2>
                    <input type="date" style="border: 1px solid red" name="date_envoi">
                    
                    <h2>MAKE A CHOICE DUDEEEEEE !</h2>
                    <div class="left49" id="email-compain-link">EMAIL COMPAIN</div>
                    <div class="left49" id="sms-compain-link">SMS COMPAIN</div>
                     
                </div>
                <?php // --------------------------------------- SAVED COMPAIN  ----------------------------------------> ?>
                <div class="left100" id="saved-compain-div" style="display: none">
                    <h3>SEND SAVED/PREVIOUS compain</h3>
                </div>
                <?php // --------------------------------------- UNPLOAD COMPAIN  ----------------------------------------> ?>
                <div class="left100" id="upload-compain-div" style="display: none">
                    <h3>UPLOAD my new customers infos</h3>
                    <div class="left100">
                        Wanna download an empty csv  => <a href="/files/example.csv">click here</a> <br />
                        Wanna download an empty xlsx  => <a href="/files/example.xlsx">click here</a> <br />
                        Wanna download an empty xls  => <a href="/files/example.xls">click here</a> <br />
                    </div>
                    <form enctype="multipart/form-data" id="upload-form" method="POST">
                        <input name="file" type="file" />
                        <input name="id_enseigne" type="hidde" value="<?php echo $iIdEnseigne; ?>" />
                        <input type="button" value="Upload" id="send-csv" />
                    </form>
                    <progress></progress>
                    <div id="uploaded-customers-table"></div>
                </div>
                <?php // --------------------------------------- DOWNLOAD COMPAIN  ----------------------------------------> ?>
                <div class="left100" id="download-compain-div" style="display: none">
                    <h4>DOWNLOAD my customers infos</h4>
                    <div class="left100">
                        <a href="#" id="download-compain-link">DOWNLOAD</a>
                    </div>
                </div>
            </div>

            <?php // ---------------------------------------- THIRD STEP ------------------------------------------ ?>
            <div class="left100 radius big_wrapper_header" style="margin-top:20px; text-align: center; display: none" id="step-3">
                <div class="left100" id="total-to-send">0</div>
                <!-- --------------------------------------------------- Content HEADER (stats- 6 blocks) ------------------------------- -->
                <?php
                /*
                 * $aResults array (size=4)
                 *    'nb-mail' => string 
                 *    'nb-tel' => string 
                 *    'nb-mail-partner' => int
                 *    'nb-tel-partner' => int
                 *    'nb-mail-uploaded' => int
                 *    'nb-tel-uploaded' => int
                 */
                ?>
                <!-- --------------------------------------------------- First 3 stats Block ------------------------------- -->
                <div class="left100" id="email-compain-select-numbers">
                   
                    <h2>Choose email number by clicking on boxes below </h2>



                    <div class="left32 margin-left-1 campaign-stats-box" id="block-mail-from-uniiti" >
                        <h2>Mail Collectés</h2>
                        <span class="count"><?php echo $aResults["nb-mail"]; ?></span>
                    </div>
                    <div class="left32 margin-left-1 campaign-stats-box" id="block-mail-from-partners">
                        <h2>Mail Collectés via partenaires</h2>
                        <span class="count"><?php echo $aResults["nb-mail-partner"]; ?></span>
                    </div>
                    <div class="left32 margin-left-1 campaign-stats-box" id="block-mail-from-upload">
                        <h2>Mail Uploadés</h2>
                        <span class="count"><?php echo $aResults["nb-mail-uploaded"]; ?></span>
                    </div>

                    <div clclass="left100" id="go-to-step-4-form-mail">
                        go ahead and send my @%!$/* mails
                    </div>

                </div>

                <!-- --------------------------------------------------- Second 3 stats Block ------------------------------- -->
                <div class="left100" id="sms-compain-select-numbers">
                    <h2>Choose sms number by clicking on boxes below </h2>

                    <div class="left32 margin-left-1 campaign-stats-box" id="block-sms-from-uniiti">
                        <h2>SMS Collectés</h2>
                        <span class="count"><?php echo $aResults["nb-tel"]; ?></span>
                    </div>

                    <div class="left32 margin-left-1 campaign-stats-box" id="block-sms-from-partners">
                        <h2>SMS Collectés via partenaires</h2>
                        <span class="count"><?php echo $aResults["nb-tel-partner"]; ?></span>
                    </div>

                    <div class="left32 margin-left-1 campaign-stats-box" id="block-sms-from-upload">
                        <h2>SMS Uploadés</h2>
                        <span class="count"><?php echo $aResults["nb-tel-uploaded"]; ?></span>
                    </div>

                    <div clclass="left100" id="go-to-step-4-form-sms">
                        go ahead and send my @%!$/* messages
                    </div>

                </div>


            </div>
            <?php // ---------------------------------------- THIRD FOUR ------------------------------------------ ?>
            <div class="left100 radius big_wrapper_header" style="margin-top:20px; text-align: center; display: none" id="step-4">

            </div>
        </div>
        <?php include("/includes/js.php"); ?>

        <!-- ---------------------------------------------------  Selim js compain ------------------------------- -->
        <script type="text/javascript">
            var oCompain = {
                oFile : null,
                //if mail or sms is clicked
                bMailCompain : null,
                bSmsCompain : null,
                //mail boxes clicked
                bMailCompainFromUniiti : null,
                bMailCompainPartner : null,
                bMailCompainUploaded : null,
                //sms boxes clicked
                bSmsCompainFromUniiti : null,
                bSmsCompainPartner : null,
                bSmsCompainUploaded : null,
                //mail / sms total number
                iTotalSms : null,
                iTotalMail : null,
                init: function(){
                    oCompain.bMailCompain = false;
                    oCompain.bSmsCompain = false;
                    
                    oCompain.bMailCompainFromUniiti = false;
                    oCompain.bMailCompainPartner = false;
                    oCompain.bMailCompainUploaded = false;
                    
                    oCompain.bSmsCompainFromUniiti = false;
                    oCompain.bSmsCompainPartner = false;
                    oCompain.bSmsCompainUploaded = false;
                
                    iTotalSms : 0;
                    iTotalMail : 0;
                
                    $(document).on('click', '#send-csv', oCompain.UploadFile);
                    $(document).on('change', ':file', oCompain.FileChanged);
                    $(document).on('click', '#new-compain-button', oCompain.ShowStepTwoNewCompain);
                    $(document).on('click', '#saved-compain-button', oCompain.ShowStepTwoSavedCompain);
                    $(document).on('click', '#send-customers-button', oCompain.ShowStepTwoUploadCompain);
                    $(document).on('click', '#download-customers-button', oCompain.ShowStepTwoDownloadCompain);
                    $(document).on('click', '#download-compain-link', oCompain.DownloadCsv);
                    $(document).on('click', '#email-compain-link', oCompain.ShowStepThreeEmail);
                    $(document).on('click', '#sms-compain-link', oCompain.ShowStepThreeSms);
                    $(document).on('click', '#block-mail-from-uniiti', oCompain.AddMailFromUniiti);
                    $(document).on('click', '#block-mail-from-partners', oCompain.AddMailFromPartners);
                    $(document).on('click', '#block-mail-from-upload', oCompain.AddMailFromUpload);
                    $(document).on('click', '#block-sms-from-uniiti', oCompain.AddSmsFromUniiti);
                    $(document).on('click', '#block-sms-from-partners', oCompain.AddSmsFromPartners);
                    $(document).on('click', '#block-sms-from-upload', oCompain.AddSmsFromUpload);
                    $(document).on('click', '#go-to-step-4-form-mail', oCompain.Send);
                    $(document).on('click', '#go-to-step-4-form-sms', oCompain.Send);
                    $(document).on('click', '#submit-my-compain', oCompain.SendUniitiCompain);
                },
                /*
                 * Download COMPAIN : from step 1 to step 2
                 */
                ShowStepTwoDownloadCompain : function(){
                    oCompain.RemoveSelected();
                    oCompain.HideStepTwo();
                    $(this).addClass('selected');
                    oCompain.HideStepThree()
                     oCompain.HideStepFour()
                    $("#download-compain-div").show();
                },
                /*
                 * UPLOAD COMPAIN : from step 1 to step 2
                 */
                ShowStepTwoUploadCompain : function(){
                    oCompain.RemoveSelected();
                    oCompain.HideStepTwo();
                    $(this).addClass('selected');
                    oCompain.HideStepThree()
                     oCompain.HideStepFour()
                    $("#upload-compain-div").show();
                    
                },
                /*
                 * Download COMPAIN : from step 1 to step 2
                 */
                ShowStepTwoNewCompain : function(){
                    oCompain.RemoveSelected();
                    oCompain.HideStepTwo();
                    $(this).addClass('selected');
                    oCompain.HideStepThree()
                    oCompain.HideStepFour()
                   
                    $("#new-compain-div").show();
                },
                /*
                 * UPLOAD COMPAIN : from step 1 to step 2
                 */
                ShowStepTwoSavedCompain : function(){
                    oCompain.RemoveSelected();
                    oCompain.HideStepTwo();
                    $(this).addClass('selected');
                    oCompain.HideStepThree()
                    oCompain.HideStepFour()
                    
                    $("#saved-compain-div").show();
                },
                /**
                 * Remove selected style from links
                 */
                RemoveSelected: function(){
                    $("#send-customers-button").removeClass('selected');
                    $("#download-customers-button").removeClass('selected');
                    $("#new-compain-button").removeClass('selected');
                    $("#saved-compain-button").removeClass('selected');
                }
                ,
                /**
                 * Hide all step 2 elements
                 */
                HideStepTwo: function(){
                    $("#download-compain-div").hide();
                    $("#upload-compain-div").hide();
                    $("#new-compain-div").hide();
                    $("#saved-compain-div").hide();
                }
                ,
                /**
                 * Hide all step 3 elements
                 */
                HideStepThree: function(){
                    oCompain.bMailCompain = false;
                    oCompain.bSmsCompain = false;
                    
                    oCompain.bMailCompainFromUniiti = false;
                    oCompain.bMailCompainPartner = false;
                    oCompain.bMailCompainUploaded = false;
                    
                    oCompain.bSmsCompainFromUniiti = false;
                    oCompain.bSmsCompainPartner = false;
                    oCompain.bSmsCompainUploaded = false;
                    
                    oCompain.iTotalSms = null;
                    oCompain.iTotalMail = null;
                    
                  
                
                    $('#sms-compain-select-numbers').hide();
                    $('#email-compain-select-numbers').hide();
                    $('#step-3').hide();
                }
                ,
                /**
                 * Hide all step 4 elements
                 */
                HideStepFour: function(){
                    oCompain.bMailCompain = false;
                    oCompain.bSmsCompain = false;
                    
                    oCompain.bMailCompainFromUniiti = false;
                    oCompain.bMailCompainPartner = false;
                    oCompain.bMailCompainUploaded = false;
                    
                    oCompain.bSmsCompainFromUniiti = false;
                    oCompain.bSmsCompainPartner = false;
                    oCompain.bSmsCompainUploaded = false;
                    
                    oCompain.iTotalSms = null;
                    oCompain.iTotalMail = null;
                    
                  
                
                    $('#step-4').hide();
                }
                ,
            
                /**
                 * update oCompain file propties when user select a new file
                 */
                FileChanged: function(){
                    oCompain.oFile = $(this)[0].files[0];
                },
                /**
                 * Upload file via ajax and wait for json response
                 */
                UploadFile: function(){
                    //var formData = new FormData($('#upload-form'));
                    var formData = new FormData();    
                    formData.append( 'file', oCompain.oFile );
                    formData.append( 'id_enseigne', $('input [name=id_enseigne]').val());
                    formData.append( 'date_envoi', $('input [name=date_envoi]').val());
                    $.ajax({
                        url: '/includes/requeteUploadCustomers.php',  //Server script to process data
                        type: 'POST',
                        //Options to tell jQuery not to process data or worry about content-type.
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function() {  // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // Check if upload property exists
                                myXhr.upload.addEventListener('progress',oCompain.ProgressHandlingFunction, false); // For handling the progress of the upload
                            }
                            return myXhr;
                        },
                        //Ajax events
                        //beforeSend: beforeSendHandler,
                        success: function(data){
                            if(data.status == "error"){
                                alert(data.message)
                            }else{
                                alert(data.message)
                                var html ="<table>";
                                html += "<tr><th>Prénom</th> <th>Nom</th> <th>Email</th> <th>Téléphone</th> <th>Commentaires</th></tr>";
                                    
                                for (var i in data.customers) {
                                    var customer = data.customers[i];
                                    html += "<tr><td>"+customer[0]+"</td> <td>"+customer[1]+"</td> <td>"+customer[2]+"</td> <td>"+customer[3]+"</td> <td>"+customer[4]+"</td></tr>";
                                    console.log(customer)
                                }
                                html +="</table>";
                                $("#uploaded-customers-table").html(html);
                            }
                        },
                        //error: errorHandler,
                        // Form data
                        data: formData
                        
                    });
                },
                /*
                 * Loading / waiting function
                 */
                ProgressHandlingFunction : function(e){
                    if(e.lengthComputable){
                        $('progress').attr({value:e.loaded,max:e.total});
                    }
                },
                /**
                 * DOWNLOAD User's customers from db
                 */
                DownloadCsv : function(){
                    document.location.href = '/includes/exportCsvClient.php?id_enseigne=<?php echo $iIdEnseigne; ?>';
                },
                /**
                 * from step 2 (choose sms or email) to sms panel
                 */
                ShowStepThreeSms : function(){
                    oCompain.HideStepThree();
                    oCompain.bMailCompain = false;
                    oCompain.bSmsCompain = true;
                    $('#step-3').show();
                    $('#sms-compain-select-numbers').show();
                },
                /**
                 * from step 2 (choose sms or email) to email panel
                 */
                ShowStepThreeEmail : function(){
                    oCompain.HideStepThree();
                    oCompain.bMailCompain = true;
                    oCompain.bSmsCompain = false;
                    $('#step-3').show();
                    $('#email-compain-select-numbers').show();
                }
                ,
                /**
                 * When user click to add uniiti mails to compain
                 */
                AddMailFromUniiti : function(){
                    if(oCompain.bMailCompainFromUniiti == false){
                        $("#block-mail-from-uniiti").addClass("selected");
                        $("#block-mail-from-partners").removeClass("selected");
                        oCompain.bMailCompainFromUniiti = true;
                    }else{
                        $("#block-mail-from-uniiti").removeClass("selected");
                        oCompain.bMailCompainFromUniiti = false;
                    }
                    oCompain.bMailCompainPartner = false;
                    oCompain.CalculMail();
                },
                /**
                 * When user click to add uniiti mails to compain
                 */
                AddMailFromPartners : function(){
                    
                    if(oCompain.bMailCompainPartner == true){
                        $("#block-mail-from-partners").removeClass("selected");
                        oCompain.bMailCompainPartner = false;
                    }else{
                        $("#block-mail-from-uniiti").removeClass("selected");
                        $("#block-mail-from-upload").removeClass("selected");
                        $("#block-mail-from-partners").addClass("selected");
                        oCompain.bMailCompainPartner = true;
                    }
                    oCompain.bMailCompainFromUniiti = false;
                    oCompain.bMailCompainUploaded = false;
                    oCompain.CalculMail();
                },
                /**
                 * When user click to add uniiti mails to compain
                 */
                AddMailFromUpload : function(){
                    if(oCompain.bMailCompainUploaded == true){
                        $("#block-mail-from-upload").removeClass("selected");
                        oCompain.bMailCompainUploaded = false;
                    }else{
                        $("#block-mail-from-upload").addClass("selected");
                        $("#block-mail-from-partners").removeClass("selected");
                        oCompain.bMailCompainPartner = false;
                        oCompain.bMailCompainUploaded = true;
                        
                    }
                    oCompain.CalculMail();
                }
                /**
                 * count all mails to send
                 */
                ,
                CalculMail : function(){
                    var nb = 0;
                    
                    if(oCompain.bMailCompainPartner ==true){
                        nb += parseInt($('#block-mail-from-partners span.count').text());
                    }
                    if(oCompain.bMailCompainFromUniiti==true){
                        nb += parseInt($('#block-mail-from-uniiti span.count').text());
                    }
                    if(oCompain.bMailCompainUploaded==true){
                        nb += parseInt($('#block-mail-from-upload span.count').text());
                    }
                    oCompain.iTotalMail = nb;
                    $('#total-to-send').html(oCompain.iTotalMail);
                }
                ,
                /**
                 * When user click to add uniiti sms's to compain
                 */
                AddSmsFromUniiti : function(){
                    if( oCompain.bSmsCompainFromUniiti == true){
                        $("#block-sms-from-uniiti").removeClass("selected");
                        oCompain.bSmsCompainFromUniiti = false;
                    }else{
                        $("#block-sms-from-uniiti").addClass("selected");
                        oCompain.bSmsCompainFromUniiti = true;
                    }
                    $("#block-sms-from-partners").removeClass("selected");
                    oCompain.bSmsCompainPartner = false;
                    oCompain.CalculSms();
                },
                /**
                 * When user click to add uniiti sms's to compain
                 */
                AddSmsFromPartners : function(){
                    if(oCompain.bSmsCompainPartner == true){
                        oCompain.bSmsCompainPartner = false;
                        $("#block-sms-from-partners").removeClass("selected");
                    }else{
                        oCompain.bSmsCompainPartner = true;
                        $("#block-sms-from-partners").addClass("selected");
                    }
                    $("#block-sms-from-uniiti").removeClass("selected");
                    $("#block-sms-from-upload").removeClass("selected");
                    oCompain.bSmsCompainFromUniiti = false;
                    oCompain.bSmsCompainUploaded = false;
                    oCompain.CalculSms();
                },
                /**
                 * When user click to add uniiti sms's to compain
                 */
                AddSmsFromUpload : function(){
                    if(oCompain.bSmsCompainUploaded == true){
                        oCompain.bSmsCompainUploaded = false;
                        $("#block-sms-from-upload").removeClass("selected");
                    }else{
                        oCompain.bSmsCompainUploaded = true;
                        $("#block-sms-from-upload").addClass("selected");
                    }
                    $("#block-sms-from-partners").removeClass("selected");
                    oCompain.bSmsCompainPartner = false;
                    oCompain.CalculSms();
                }
                /**
                 * count all sms's to send
                 */
                ,
                CalculSms: function(){
                    var nb = 0;
                    
                    if(oCompain.bSmsCompainPartner ==true){
                        nb += parseInt($('#block-sms-from-partners span.count').text());
                    }
                    if(oCompain.bSmsCompainFromUniiti==true){
                        nb += parseInt($('#block-sms-from-uniiti span.count').text());
                    }
                    if(oCompain.bSmsCompainUploaded==true){
                        nb += parseInt($('#block-sms-from-upload span.count').text());
                    }
                    oCompain.iTotalSms = nb;
                    $('#total-to-send').html(oCompain.iTotalSms);
                },
                
                Send: function(){
                    //get list of email to edit before sending
                    var formData = new FormData();   
                    formData.append('id_enseigne','<?php echo $iIdEnseigne; ?>');
                    formData.append( 'date_envoi', $('input[name=date_envoi]').val());
                    if($('#my-compain-message').val()!= ""){
                        formData.append('text', $('#my-compain-message').val());
                    }else{
                        alert('Merci de renseigner le message que vous voulez adresser à vos prospects');
                        return false;
                    }
                    if(oCompain.bMailCompain == true && oCompain.iTotalMail>0){
                        formData.append('type','mail');
                        if(oCompain.bMailCompainFromUniiti == true){ formData.append('from_uniiti', 'yes')}
                        if(oCompain.bMailCompainPartner == true){ formData.append('from_partner', 'yes')}
                        if(oCompain.bMailCompainUploaded == true){ formData.append('from_upload','yes')}
                    }else if(oCompain.bSmsCompain==true && oCompain.iTotalSms>0){
                        formData.append('type','sms');
                        if(oCompain.bSmsCompainFromUniiti == true){ formData.append('from_uniiti', 'yes')}
                        if(oCompain.bSmsCompainPartner == true){ formData.append('from_partner', 'yes')}
                        if(oCompain.bSmsCompainUploaded == true){ formData.append('from_upload', 'yes')}
                    }
                    
                    $.ajax({
                        url: '/includes/requetePrepareCompain.php',  
                        type: 'POST',
                      
                        //Ajax events
                        //beforeSend: beforeSendHandler,
                        success: function(data){
                            if(data.status == 'error'){
                                alert(data.message);
                                document.location.href = '/campagne/<?php echo $iIdEnseigne; ?>';
                            }else if(data.status == 'success'){
                                alert(data.message);
                                document.location.href = '/timeline.php';
                            }
                            else if(data.status == 'edit'){
                                console.log('edit');
                                var html = '<form method="POST" name="send-compain-from-uniiti-choose-customers" ><input type="button" id="submit-my-compain" value="envoyer">';
                                html += '<ul>';
                                for (var i in data.contacts) {
                                    //si c'une compagne mail'
                                    if(data.contacts[i].email_contributeur != null){
                                        html += '<li>'+data.contacts[i].prenom_contributeur+' '+data.contacts[i].nom_contributeur+' - '+data.contacts[i].email_contributeur+'<input type="checkbox" name="email['+i+'][email]" value="'+data.contacts[i].email_contributeur+'" checked="checked">';
                                        html += '<input type="hidden" name="email['+i+'][prenom]" value="'+data.contacts[i].prenom_contributeur+'">';
                                        html += '<input type="hidden" name="email['+i+'][nom]" value="'+data.contacts[i].nom_contributeur+'">';
                                        html += '</li>';
                                    }else if(data.contacts[i].telephone_contributeur != null){
                                        html += '<li>'+data.contacts[i].prenom_contributeur+' '+data.contacts[i].nom_contributeur+' - '+data.contacts[i].telephone_contributeur+'<input type="checkbox" name="telephone['+i+'][telephone]" value="'+data.contacts[i].telephone_contributeur+'" checked="checked">';
                                        html += '<input type="hidden" name="telephone['+i+'][prenom]" value="'+data.contacts[i].prenom_contributeur+'">';
                                        html += '<input type="hidden" name="telephone['+i+'][nom]" value="'+data.contacts[i].nom_contributeur+'">';
                                        html += '</li>';
                                    }
                                }
                                html += '</ul></form>';
                                $('#step-4').html(html);
                                $('#step-4').show();
                                //document.location.href = '/timeline.php';
                            }
                        },
                        //error: errorHandler,
                        // Form data
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                        
                    });
                },
                /**
                 * after choosing emails or phones, we register them
                 */
                SendUniitiCompain : function(){
                    //get list of email to edit before sending
                    var formData = new FormData(document.forms.namedItem("send-compain-from-uniiti-choose-customers"));   
                    formData.append('id_enseigne','<?php echo $iIdEnseigne; ?>');
                    formData.append('date_envoi', $('input[name=date_envoi]').val());
                    if($('#my-compain-message').val()!= ""){
                        formData.append('text', $('#my-compain-message').val());
                    }else{
                        alert('Merci de renseigner le message que vous voulez adresser à vos prospects');
                        return false;
                    }
                    if(oCompain.bMailCompain == true && oCompain.iTotalMail>0){
                        formData.append('type','mail');
                        if(oCompain.bMailCompainFromUniiti == true){ formData.append('from_uniiti', 'yes')}
                        if(oCompain.bMailCompainPartner == true){ formData.append('from_partner', 'yes')}
                        if(oCompain.bMailCompainUploaded == true){ formData.append('from_upload','yes')}
                    }else if(oCompain.bSmsCompain==true && oCompain.iTotalSms>0){
                        formData.append('type','sms');
                        if(oCompain.bSmsCompainFromUniiti == true){ formData.append('from_uniiti', 'yes')}
                        if(oCompain.bSmsCompainPartner == true){ formData.append('from_partner', 'yes')}
                        if(oCompain.bSmsCompainUploaded == true){ formData.append('from_upload', 'yes')}
                    }
                    $.ajax({
                        url: '/includes/requeteSendCompain.php',  
                        type: 'POST',
                      
                        //Ajax events
                        //beforeSend: beforeSendHandler,
                        success: function(data){
                            if(data.status == 'error'){
                                alert(data.message);
                                document.location.href = '/campagne/<?php echo $iIdEnseigne; ?>';
                            }else if(data.status == 'success'){
                                alert(data.message);
                                document.location.href = '/timeline.php';
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
              
            //init de l'objet Compain
            oCompain.init();
        </script>
        <!-- --------------------------------------------------- End js compain --------------------------------------- -->
    </body>
</html>