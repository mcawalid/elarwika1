<?php
if (!isset($_SESSION)) {
  session_start();
}
	
	require_once('../static/connection.php');
	include("../static/secure_sql.php");
		
		$tabJson = array();
		$tabJson["erreur"]="yes";

		
		// on verifier si'il y'a un get , et si on a le droit ...
		if(	(isset($_POST['retrait']) && $_POST['retrait']!=null) &&
			(isset($_POST['items']) && $_POST['items']!=null) &&
			(isset($_POST['email']) && $_POST['email']!=null) &&
			(isset($_POST['nom']) && $_POST['nom']!=null) &&
			(isset($_POST['telephone']) && $_POST['telephone']!=null) &&
			(isset($_POST['heure']) && $_POST['heure']!=null) &&
			(isset($_POST['minute']) && $_POST['minute']!=null) &&
			(isset($_POST['date']) && $_POST['date']!=null)){
			
				$sql = sprintf("INSERT INTO commande (id,id_user,type,nom,email,telephone,date,heure,minute,date_insert) VALUES 
					(NULL,%s,%s,%s,%s,%s,%s,%s,%s,NOW())",
				GetSQLValueString($_SESSION['id_vente'], "int",$base),
				GetSQLValueString($_POST['retrait'], "int",$base),
				GetSQLValueString($_POST['nom'], "text",$base),
				GetSQLValueString($_POST['email'], "text",$base),
				GetSQLValueString($_POST['telephone'], "text",$base),
				GetSQLValueString(date("Y-m-d",strtotime(str_replace('/', '-',$_POST['date']))), "text",$base),
				GetSQLValueString($_POST['heure'], "int",$base),
				GetSQLValueString($_POST['minute'], "int",$base));
				mysqli_query($base,"SET NAMES UTF8");
				mysqli_query($base, $sql);
				$id_insert=mysqli_insert_id($base);
				
				$items = json_decode($_POST['items'], true);
								
				for($i=0;$i<count($items);$i++){
					$key=$items[$i]['_data']['os0'];
					$sql = "SELECT * FROM produit WHERE id= $key";
					mysqli_query($base,"SET NAMES UTF8");;
					$liste_produit = mysqli_query($base, $sql);
					if(mysqli_num_rows($liste_produit)==1) {
						$produit=mysqli_fetch_array($liste_produit);
						$sql = sprintf("INSERT INTO commande_detail (id,id_commande,id_produit,nom,quantite,prix) VALUES (NULL,%s,%s,%s,%s,%s)",
							GetSQLValueString($id_insert, "int",$base),
							GetSQLValueString($key, "int",$base),
							GetSQLValueString($produit['nom'], "text",$base),
							GetSQLValueString($items[$i]['_data']['quantity'], "int",$base),
							GetSQLValueString($produit['prix'], "int",$base)
						);
						mysqli_query($base,"SET NAMES UTF8");
						mysqli_query($base, $sql);
					}
				}
			$tabJson["resultat"]=$id_insert;
			$tabJson["erreur"]="non";
			
		}
		echo json_encode ($tabJson);
?>
