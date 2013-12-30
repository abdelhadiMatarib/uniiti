<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php
    include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
    require_once('../acces/droits.inc.php');      // Liste de définition des ACL	
    include_once '../config/configuration.inc.php';
    include'../includes/head.php';
    include_once '../includes/fonctions.inc.php';
    include_once '../config/configPDO.inc.php';

    if ((isset($_SESSION['SESS_MEMBER_ID'])) && ((int) $_SESSION['droits'] & ADMINISTRATEUR)) {
        $Connecte = true;
    } else {
        echo "vous ne pouvez pas accéder à cette page sans être connecté!\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>";
        exit;
    }
    
    //all user to prospect for their opinion 
                            $sql = "SELECT t1.*, T2.nom_enseigne ";
                            $sql .= "FROM demande_avis T1 ";
                            $sql .= "JOIN enseignes T2 on T1.enseigne_id = T2.id_enseigne ";
                            $sql .= "WHERE T1.a_donne_avis = 0";
                            
                            $req = $bdd->prepare($sql);
                            $req->execute();
                            $aToProspect = $req->fetchAll();
    ?>

    <body>
        <div class="bg_dashboard">
            <div id="default_dialog"></div>
            <div id="default_dialog_large"></div>
            <div id="dialog_overlay">
                <div class="index_overlay"></div>
                <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
                </div>
            </div>
            <?php include'../includes/header.php'; ?>
            <div class="biggymarginer">
                <div class="big_wrapper" id="test">

                </div>
                <!-- FIN BIG WRAPPER -->
                <!-- CONTENU PRINCIPAL -->
                <div class="dashboard_wrap"><!-- DASH WRAP -->
                    <div class="dashboard_cube_ariane">
                        <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Demande d'avis</span></a></div>
                    </div>
                    <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>

                    <div class="dashboard_retour_wrapper autocomplete">
                    </div>

                    <div class="dashboard_retour_wrapper">
                        <input name="search_enseigne" type="text" style="border: 1px solid red" /> <br />
                    </div>
                    <!-- ================================================== Upload de csv ========================= -->
                    <div class="dashboard_retour_wrapper">
                        <h2>Uploader une liste de contact à partir d'un csv/xls</h2>
                        <div class="left100">
                            Wanna download an empty csv  => <a href="/files/example.csv">click here</a> <br />
                            Wanna download an empty xlsx  => <a href="/files/example.xlsx">click here</a> <br />
                            Wanna download an empty xls  => <a href="/files/example.xls">click here</a> <br />
                        </div>
                        <form enctype="multipart/form-data" id="upload-form" >
                            <input name="file" type="file" /> <br />
                            <input type="button" value="Upload" id="send-csv" />
                        </form>
                    </div>
                    <!-- ================================================== ONE by ONE ========================= -->
                    <form enctype="multipart/form-data" name="main-form" method="POST">
                        <div class="dashboard_retour_wrapper">
                            <h2>Ajouter manuellement</h2>
                            <div class="left100">
                                <img src="/img/plus.png" id="add-row" />
                                <div class="left100">
                                    <img src="/img/trash.png" class="remove-row" />
                                    Prénom <input name="prenom[]" type="text" style="border: 1px solid red" /> <br />
                                    Nom <input name="nom[]" type="text" style="border: 1px solid red" /> <br />
                                    Email <input name="email[]" type="text" style="border: 1px solid red" /> <br />
                                    Téléphone <input name="telephone[]" type="text" style="border: 1px solid red" /> <br />
                                    Commentaire <input name="commentaire[]" type="text" style="border: 1px solid red" /> <br />
                                    <br />
                                </div>
                            </div>
                            <input type="button" value="send" id="send-form" />
                        </div>
                    </form>
                    
                    <!-- ================================================== Upload de csv ========================= -->
                    <div class="dashboard_retour_wrapper">
                        <h2>Customers waiting to get email/sms invitation to post their opinion</h2>
                        <a href="/includes/exportCsvToCollectOpinion.php">Download</a>
                        <table>
                            <tr>
                                <th>nom</th>
                                <th>prénom</th>
                                <th>email</th>
                                <th>téléphone</th>
                                <th>nom de l'enseigne</th>
                                <th>commentaires</th>
                                <th>url à envoyer</th>
                            </tr>
                      
                        <?php
                            if(!empty($aToProspect)){
                                foreach ($aToProspect as $aRow){
                                    echo '<tr>';
                                        echo '<td>';
                                            echo $aRow['prenom'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['nom'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['email'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['telephone'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['nom_enseigne'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['commentaire'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo $aRow['token'];
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                              </table>
                    </div>
                    
                </div><!-- FIN DASH WRAP -->
                <!-- FIN CONTENU PRINCIPAL -->
            </div><!-- FIN BIGGY -->
            <?php include'../includes/js.php' ?>
            <script type="text/javascript">
                //---------------- selim
                var oUploadList = {
                    idEnseigne : null,
                    oFile : null,
                    init : function(){
                        $(document).on('click', '.enseigne-link', oUploadList.SelectEnseigne);
                        $(document).on('click', '#send-csv', oUploadList.SendFile);
                        $(document).on('change', ':file', oUploadList.FileChanged);
                        $(document).on('keyup', 'input[name=search_enseigne]', oUploadList.AutoComplete);
                        $(document).on('keyup', 'input[name=search_enseigne]', oUploadList.AutoComplete);
                    },
                    /**
                     *load file into oUploadFile
                     */
                    FileChanged: function(){
                        oUploadList.oFile = $(this)[0].files[0];
                    },
                    /**
                     * Send csv /cls /xlsx file
                     */
                    SendFile : function(){
                        if(oUploadList.idEnseigne == null || oUploadList.oFile == null){
                            alert('Merci de selectionner une enseigne + une fichier');
                            return false;
                        }else{
                            var formData = new FormData();    
                            formData.append( 'file', oUploadList.oFile );
                            formData.append( 'id_enseigne', oUploadList.idEnseigne);
                            formData.append( 'type', 'by_file');
                            $.ajax({
                                url: '/includes/requeteUploadMailSmsToGetOpinion.php',  //Server script to process data
                                type: 'POST',
                                //Options to tell jQuery not to process data or worry about content-type.
                                cache: false,
                                contentType: false,
                                processData: false,
                                
                                //Ajax events
                                //beforeSend: beforeSendHandler,
                                success: function(data){
                                    if(data.status == "error"){
                                        alert(data.message)
                                    }else{
                                        alert(data.message)
                                        
                                    }
                                },
                                //error: errorHandler,
                                // Form data
                                data: formData
                        
                            });
                        }
                    },
                    /**
                     * auto complete enseigne => id
                     */
                    AutoComplete : function(){
                        var formData = new FormData();    
                        formData.append( 'search', $(this).val());
                        $.ajax({
                            url: '/includes/requeteAutoCompleteEnseigne.php',  //Server script to process data
                            type: 'POST',
                            //Options to tell jQuery not to process data or worry about content-type.
                            cache: false,
                            contentType: false,
                            processData: false,
                           
                            //Ajax events
                            //beforeSend: beforeSendHandler,
                            success: function(data){
                                if(data.status == "error"){
                                    alert(data.message);
                                    oUploadList.idEnseigne = null;
                                }else{
                                    $('div .autocomplete').html('');
                                    for(index in data.enseignes){
                                        $('div .autocomplete').append('<a class="enseigne-link" href="#'+data.enseignes[index].id_enseigne+'">'+data.enseignes[index].nom_enseigne+'</a> ');   
                                    }
                                     
                                }
                            },
                            //error: errorHandler,
                            // Form data
                            data: formData
                        
                        });
                    },
                    /**
                     * initi enseigne id from clicked link
                     */
                    SelectEnseigne : function(){
                        var id = $(this).attr('href').replace('#','');
                        oUploadList.idEnseigne = id;
                        oUploadForm.idEnseigne = id;
                        $('input[name=search_enseigne]').val($(this).text());
                    }
                
                }
                
                
                var oUploadForm = {
                    idEnseigne : null,
                    oFile : null,
                    init : function(){
                        $(document).on('click', '#add-row', oUploadForm.FormAddRow);
                        $(document).on('click', '.remove-row', oUploadForm.FormRemoveRow);
                        $(document).on('click', '#send-form', oUploadForm.SendForm);
                    },
                   
                    /**
                     * Send csv /cls /xlsx file
                     */
                    SendForm : function(){
                        
                        if(oUploadForm.idEnseigne == null){
                            alert('Merci de selectionner une enseigne');
                            return false;
                        }else{
                            var formData = new FormData(document.forms.namedItem("main-form"));    
                            formData.append('id_enseigne', oUploadForm.idEnseigne);
                            formData.append('type', 'by_form');
                           
                            $.ajax({
                                url: '/includes/requeteUploadMailSmsToGetOpinion.php',  //Server script to process data
                                type: 'POST',
                                //Options to tell jQuery not to process data or worry about content-type.
                                cache: false,
                                contentType: false,
                                processData: false,
                                
                                //Ajax events
                                //beforeSend: beforeSendHandler,
                                success: function(data){
                                    if(data.status == "error"){
                                        alert(data.message)
                                    }else{
                                        alert(data.message)
                                        
                                    }
                                },
                                //error: errorHandler,
                                // Form data
                                data: formData
                        
                            });
                        }
                    },
                    FormAddRow : function(){
                        $(this).parent().append('<div class="left100"><img src="/img/trash.png" class="remove-row" />'+
                            'Prénom <input name="prenom[]" type="text" style="border: 1px solid red" /> <br />'+
                            'Nom <input name="nom[]" type="text" style="border: 1px solid red" /> <br />'+
                            'Email <input name="email[]" type="text" style="border: 1px solid red" /> <br />'+
                            'Téléphone <input name="telephone[]" type="text" style="border: 1px solid red" /> <br />'+
                            'Commentaire <input name="commentaire[]" type="text" style="border: 1px solid red" /> <br /><br />'+
                            '</div>')
                    },
                    FormRemoveRow : function(){
                        $(this).parent('.left100').remove();
                    }
                   
                
                }
                
                
                oUploadList.init();
                oUploadForm.init();
            </script>

        </div>
    </body>
</html>
