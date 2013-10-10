<?php
    include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';

	if (!empty($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];}

	$sql = "SELECT COUNT(t5.email_contributeur) AS count_emails_enseigne
				FROM avis AS t1
				INNER JOIN enseignes_recoient_avis AS t2
				ON t1.id_avis = t2.avis_id_avis
				INNER JOIN enseignes AS t3
					ON t2.enseignes_id_enseigne = t3.id_enseigne
					INNER JOIN contributeurs_donnent_avis AS t4
						ON t1.id_avis = t4.avis_id_avis
						INNER JOIN contributeurs AS t5
							ON t4.contributeurs_id_contributeur = t5.id_contributeur
				WHERE id_enseigne = :id_enseigne AND email_contributeur IS NOT NULL AND email_contributeur <> '' ";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$count_emails_enseigne = $result['count_emails_enseigne'];

	$sql2 = "SELECT COUNT(t5.telephone_contributeur) AS count_telephone_enseigne
				FROM avis AS t1
				INNER JOIN enseignes_recoient_avis AS t2
				ON t1.id_avis = t2.avis_id_avis
				INNER JOIN enseignes AS t3
					ON t2.enseignes_id_enseigne = t3.id_enseigne
					INNER JOIN contributeurs_donnent_avis AS t4
						ON t1.id_avis = t4.avis_id_avis
						INNER JOIN contributeurs AS t5
							ON t4.contributeurs_id_contributeur = t5.id_contributeur
				WHERE id_enseigne = :id_enseigne AND telephone_contributeur IS NOT NULL AND telephone_contributeur <> '' ";
	$req2 = $bdd->prepare($sql2);
	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
	$count_telephone_enseigne = $result2['count_telephone_enseigne'];
	
	$sql3 = "SELECT enseignes_id_enseigne1, enseignes_id_enseigne2
				FROM enseignes_reseau_enseignes AS t1
					WHERE (enseignes_id_enseigne1 = :id_enseigne OR enseignes_id_enseigne2 = :id_enseigne) AND id_statut = 2";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetchAll(PDO::FETCH_ASSOC);
	$count_emails_reseau = $count_telephone_reseau = 0;
	foreach ($result3 as $row3) { 
		if ($row3['enseignes_id_enseigne1'] != $id_enseigne) {
			$req->bindParam(':id_enseigne', $row3['enseignes_id_enseigne1'], PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_emails_reseau += $result['count_emails_enseigne'];
			$req2->bindParam(':id_enseigne', $row3['enseignes_id_enseigne1'], PDO::PARAM_INT);
			$req2->execute();
			$result2 = $req2->fetch(PDO::FETCH_ASSOC);
			$count_telephone_reseau += $result2['count_telephone_enseigne'];
		}
		else {
			$req->bindParam(':id_enseigne', $row3['enseignes_id_enseigne2'], PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_emails_reseau += $result['count_emails_enseigne'];
			$req2->bindParam(':id_enseigne', $row3['enseignes_id_enseigne2'], PDO::PARAM_INT);
			$req2->execute();
			$result2 = $req2->fetch(PDO::FETCH_ASSOC);
			$count_telephone_reseau += $result2['count_telephone_enseigne'];
		}
	}
	
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_optin.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Gestion de vos campagnes Opt-in</span>
    </div>
    <div class="module_reservation_body">
        <div class="module_reservation_left">
            <div class="module_reservation_left_head1">
                <span>Données client de votre commerce</span>
            </div>
            <div class="module_reservation_left_head1_mailscol">
                <a href="#" title=""><span class="module_reservation_big_data"><?php echo $count_emails_enseigne; ?></span><span><strong>mails</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head1_smscol">
                <a href="#" title=""><span class="module_reservation_big_data"><?php echo $count_telephone_enseigne; ?></span><span><strong>sms</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head2">
                <span>Données client des partenaires</span>
            </div>
             <div class="module_reservation_left_head1_mailscol">
                <a href="#" title=""><span class="module_reservation_big_data"><?php echo $count_emails_reseau; ?></span><span><strong>mails</strong></span><span>collectés</span></a>
            </div>
            <div class="module_reservation_left_head1_smscol">
                <a href="#" title=""><span class="module_reservation_big_data"><?php echo $count_telephone_reseau; ?></span><span><strong>sms</strong></span><span>collectés</span></a>
            </div>
        </div>
        <div class="module_reservation_right">
            
            <div class="module_reservation_right_head1">
                <span>Choisissez le nombre et une option</span>
            </div>
            <div class="module_reservation_right_content">
                <form>
                    <div class="input_optin_float"><input type="radio" id="resa_infos_affichage" name="module_resa_radio_choice"/><label for="resa_infos_affichage"><span>Campagne auprès de mes clients</span></label></div>
                    
                    <div class="input_optin_float"><input type="radio" id="resa_infos_notifs_mail" name="module_resa_radio_choice"/><label for="resa_infos_notifs_mail"><span id="optin_camp_clients_part">Auprès des clients de mes partenaires</span></label></div>
                    
                    <div class="module_optin_nombre_wrap">
                        
                        <div class="module_optin_nombre_txt">79</div>
                        <div class="module_optin_nombre_choix_mails"><a href="#" title="">MAILS</a></div>
                        <div class="module_optin_nombre_choix_sms"><a href="#" title="">SMS</a></div>
                        <div class="module_optin_nombre_choix_lesdeux"><a href="#" title="">LES DEUX</a></div>
                        
                    </div>
                    
                    <div class="module_reservation_right_head1 optin_message">
                        <span>Message</span>
                    </div>
                    
                    <textarea class="module_optin_textarea_message"></textarea>
                </form>
            </div>
            
        </div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="bouton_envoyer_optin_wrap"><a href="#">Lancer ma campagne</a></div>
        <div class="recap_optin_footer"><span class="recap_optin_footer_total">TOTAL</span><span class="recap_optin_footer_total_prix">253 €</span></div>
    </div>
</div>
</html>