<?php
	//Start session
	session_start();
	
	require_once('../config/config.inc.php');			// Include database connection details
	require_once('droits.inc.php'); 		// Liste de définition des ACL
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['email-login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM contributeurs WHERE email_contributeur='$login' AND password_contributeur='".sha1($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			
			// Add by Christophe Malo - gestion recup droits
			$select = mysql_query('SELECT * FROM groupes_permissions WHERE id_permission = "'.$member['groupes_permissions_id_permission'].'" ');
			$donnees = mysql_fetch_assoc($select); 				// Add by Christophe Malo - Gestion recup droits
			
			$_SESSION['SESS_MEMBER_ID']  = $member['id_contributeur'];
			$_SESSION['SESS_FIRST_NAME'] = $member['prenom_contributeur'];
			$_SESSION['SESS_LAST_NAME']  = $member['nom_contributeur'];
            $_SESSION['SESS_PHOTO']      = $member['photo_contributeur'];
			$_SESSION['CONTRIBUTEUR'] = 0x01;										// FF
			$_SESSION['ADMINISTRATEUR'] = 0x08;										// FF

			//$_SESSION['SESS_COMPANY'] = $member['company'];
			
			//$_SESSION['login'] = $member['pseudo_contributeur'];				// Add by Christophe Malo - Gestion recup droits
			$_SESSION['droits'] = addslashes($donnees['permissions']);	// Add by Christophe Malo - Gestion recup droits

			session_write_close();
			
			if (((int)$_SESSION['droits'] & CONTRIBUTEUR) OR ((int)$_SESSION['droits'] & PROFESSIONNEL))
			{
                            // Detecter si login_access doit renvoyer vers une page spécifique
                            // Dans le cas particulier d'un avis à donner sur un sujet
                            $urlTo = clean($_POST['urlTo']);
                            
                            if ($urlTo) {
                                
                                $id_enseigne  = clean($_POST['id_enseigne']);
                                $nom_enseigne = clean($_POST['nom_enseigne']);
                                
                                header("location: ../pages/donner_un_avis.php?id_enseigne=$id_enseigne&nom_enseigne=$nom_enseigne");
                                
                                
                            } else {
                                
                                header("location: ../timeline.php");
                                
                            }
                            
			}

			if ((int)$_SESSION['droits'] & ADMINISTRATEUR)	{header("location: ../pages/dashboard_index.php");}
			
			exit();
		} else {
			//Login failed
			header("location: login-failed.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>