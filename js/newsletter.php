<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("../static/secure_sql.php");

		$tabJson = array();
		$tabJson["resultat"]="Une erreur s'est produit lors le l'abonnement, Veuillez réessayer SVP !";

		// on verifier si'il y'a un get , et si on a le droit ...
		if(	isset($_POST['newsletter_mail']) && ($_POST['newsletter_mail'])!=null)
		{
			// tout est juste
			$mail=stripslashes(htmlentities($_POST['newsletter_mail']));  
			
			
			
			$verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#'; 
			if(!preg_match($verif,$mail)){
				$tabJson["resultat"]="L'adresse mail que vous avez introduit n'est pas valide, Veuillez réssayer";
			}
			else {
				// verifier double
				$req = "Select COUNT(*) as count FROM newsletter where email='$mail' LIMIT 1";
				mysqli_query($base,"SET NAMES UTF8");
				$result=mysqli_fetch_array(mysqli_query($base,$req));
				if($result['count']==0){
					// insertion
					$req = "INSERT INTO newsletter (id,email,date) values (null,'$mail',NOW())";
					mysqli_query($base,"SET NAMES UTF8");
					mysqli_query($base,$req);
					$tabJson["resultat"]="Votre mail ".$mail." a été ajouter avec succés.";
				}
				else
					$tabJson["resultat"]="Vous étes deja inscrit au service newsletter.";
			}
			
			
		}
		echo json_encode($tabJson);
?>
