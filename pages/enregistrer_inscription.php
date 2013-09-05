<?php
//include_once '../access/auth.inc.php';                 // gestion accès à la page - incluant la session
include_once '../config/configuration.inc.php';
//include_once '../includes/enregistrer_inscription.inc.php';
?>
<div id="wrapper_contenu">    
    <!-- Colonne gauche -->
    <section id="bloc_gauche">
        <section id="bloc_inscription">
            <h2>Confirmation création compte</h2>
            <section class="content_text">
                <?php
                // Connection à la base
                include_once '../config/configPDO.inc.php';
                
                // Réception données formulaire par method post
                $email_login            = htmlspecialchars($_POST['email-login']);            // Email login
                //$pseudo                 = htmlspecialchars($_POST['pseudo']);               // Pseudo
                $prenom                 = htmlspecialchars($_POST['prenom']);                 // Nom
                $nom                    = htmlspecialchars($_POST['nom']);                    // Prénom
                $date_naissance_jour    = htmlspecialchars($_POST['date-naissance-jour']);    // Date de naissance
                $date_naissance_mois    = htmlspecialchars($_POST['date-naissance-mois']);    // Date de naissance
                $date_naissance_annee   = htmlspecialchars($_POST['date-naissance-annee']);   // Date de naissance
                // $date_naissance         = $date_naissance_jour . "/" . $date_naissance_mois . "/" . $date_naissance_annee;
                $sexe                   = (int)$_POST['sexe'];                                // Date de naissance
                $password               = sha1($_POST['password']);                           // Mot de passe, hashé grâce à la fonction sha1()
                $ville                  = htmlspecialchars($_POST['ville']);                  // Ville
                $codepostal             = htmlspecialchars($_POST['codepostal']);             // Code postal
                $pays                   = htmlspecialchars($_POST['pays']);                   // Pays
                $telephone_contributeur = htmlspecialchars($_POST['telephone_contributeur']); // Telephone
                
                // Newsletter
                if(!empty($_POST['newsletter'])) {
                    $newsletter_result = 1;
                } else {
                    $newsletter_result = 0;
                }
                
                // Bonus
                if(!empty($_POST['bonus'])) {
                    $bonus_result = 1;
                } else {
                    $bonus_result = 0;
                }
                
                
                // Photo
//                if($sexe == 1) {
//                    $photo = 'photo_contributeur_m.jpg';
//                } else {
//                    $photo = 'photo_contributeur_f.jpg';
//                }
                if($sexe == 0) {
                    $photo = 'photo_contributeur_f.jpg';
                } else if($sexe == 1) {
                    $photo = 'photo_contributeur_h.jpg';
                } else {
                    $photo = 'photo_contributeur_n.jpg';
                }
                
                $certification  = 0;                                            // Certification
                
                $groupe_permission = 1;
                
                
                // Vérification si email exist
                $sqlCheck = "SELECT email_contributeur
                             FROM contributeurs
                             WHERE email_contributeur = :email_login
                            ";

                $reqCheck = $bdd->prepare($sqlCheck);
                $reqCheck->bindParam(':email_login', $email_login, PDO::PARAM_STR);
                $reqCheck->execute();
                $resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);
                
                //$email_login_check = $resultCheck['email_contributeur'];
                
                // array debug
//                echo '<pre>';
//                echo print_r($resultCheck);
//                echo '</pre>';
                
        
                
                
                if ($resultCheck) {
                    
                    echo 'Cet email existe déjà<br />';
                    echo 'Veuillez vous inscrire à nouveau :<br />';
                    echo '<a href="inscription.php">S\'inscrire</a>';
                
                    
                } else {
                
                
                                
                        // Preparation requete + execution pour enregistrement dans la base
                        $req = $bdd->prepare('INSERT INTO contributeurs(email_contributeur,
                                                                        photo_contributeur, 
                                                                        prenom_contributeur, 
                                                                        nom_contributeur, 
                                                                        sexe_contributeur, 
                                                                        password_contributeur, 
                                                                        cp_contributeur, 
                                                                        ville_contributeur,
                                                                        pays_contributeur,
                                                                        telephone_contributeur,
                                                                        date_naissance_jour_contributeur, 
                                                                        date_naissance_mois_contributeur, 
                                                                        date_naissance_annee_contributeur,
                                                                        certification_contributeur, 
                                                                        reception_newsletter, 
                                                                        reception_bonus, 
                                                                        groupes_permissions_id_permission
                                                                        ) 
                                                        VALUES(
                                                                        :email_contributeur, 
                                                                        :photo_contributeur,
                                                                        :prenom_contributeur,  
                                                                        :nom_contributeur, 
                                                                        :sexe_contributeur, 
                                                                        :password_contributeur, 
                                                                        :cp_contributeur, 
                                                                        :ville_contributeur,
                                                                        :pays_contributeur,
                                                                        :telephone_contributeur,
                                                                        :date_naissance_jour_contributeur, 
                                                                        :date_naissance_mois_contributeur, 
                                                                        :date_naissance_annee_contributeur, 
                                                                        :certification_contributeur, 
                                                                        :reception_newsletter, 
                                                                        :reception_bonus, 
                                                                        :groupes_permissions_id_permission
                                                                )');

                        $req->bindParam(':email_contributeur', $email_login, PDO::PARAM_STR);
                        //$req->bindParam(':pseudo_contributeur', $pseudo, PDO::PARAM_STR);
                        $req->bindParam(':photo_contributeur', $photo, PDO::PARAM_STR);
                        $req->bindParam(':prenom_contributeur', $prenom, PDO::PARAM_STR);
                        $req->bindParam(':nom_contributeur', $nom, PDO::PARAM_STR);
                        $req->bindParam(':sexe_contributeur', $sexe, PDO::PARAM_INT);
                        $req->bindParam(':password_contributeur', $password, PDO::PARAM_STR);
                        $req->bindParam(':cp_contributeur', $codepostal, PDO::PARAM_STR);
                        $req->bindParam(':ville_contributeur', $ville, PDO::PARAM_STR);
                        $req->bindParam(':pays_contributeur', $pays, PDO::PARAM_STR);
                        $req->bindParam(':telephone_contributeur', $telephone_contributeur, PDO::PARAM_STR);
                        $req->bindParam(':date_naissance_jour_contributeur', $date_naissance_jour, PDO::PARAM_INT);
                        $req->bindParam(':date_naissance_mois_contributeur', $date_naissance_mois, PDO::PARAM_INT);
                        $req->bindParam(':date_naissance_annee_contributeur', $date_naissance_annee, PDO::PARAM_INT);
                        $req->bindParam(':certification_contributeur', $certification, PDO::PARAM_INT);
                        $req->bindParam(':reception_newsletter', $newsletter_result, PDO::PARAM_INT);
                        $req->bindParam(':reception_bonus', $bonus_result, PDO::PARAM_INT);
                        $req->bindParam(':groupes_permissions_id_permission', $groupe_permission, PDO::PARAM_INT);
                        $req->execute();

                        if($req) echo '<p>Ton compte est bien crée, tu peux à présent te connecter !<br />
                                    <a href="index.php">Se connecter</a>
                                    </p>';   // Si c'est bon, message OK
                        else echo '<p>Ton inscription a échoué, recommence !</p>';         // Sinon, on affiche un message d'erreur

                        // Ferme la connexion du serveur
                        $req->closeCursor();
                
                }
                
                
                $reqCheck->closeCursor();
                // Détruit l'objet PDO
                $bdd = null;
                //echo 'BDD Fermée';
                ?>
            </section>
        </section>
    </section>
</div>
<div class="clear"></div>
