<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php require_once('../static/connection.php');?>
<?php include("static/restreindre.php");
include("static/restreindre_adm.php");
?>
<?php include("static/secure_sql.php");?>
<?php
	try{

		if(isset($_GET['id']) && $_GET['id']!=null)
		{
			mysqli_query($base,'START TRANSACTION');

			// supprimer le nouveau // a supprimer lien
			$req = sprintf("select * from commande WHERE id=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			$selectcle=mysqli_query($base,$req);
			if(mysqli_num_rows($selectcle)==0){
				echo "<script>window.location.href ='index.php'; </script>";
				exit;
			}
			$row_result = mysqli_fetch_assoc ($selectcle);
			
			$valide=1;
			if($row_result['valide']==1){
				$valide=0;
			}
			
			$req = sprintf("UPDATE commande SET valide=$valide WHERE id=%s",
				GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			mysqli_query($base,$req);
								
			mysqli_query($base, 'COMMIT');
			// tout est OK
			echo "<script>window.location.href ='".$_SERVER["HTTP_REFERER"]."'; </script>";
			exit;
		}
		else // pas de droit de supprimer cette annonce
		{
			echo "<script>window.location.href ='index.php'; </script>";
			exit;
		}
	}
	catch (Exception $e) {
			echo "<script>window.location.href ='index.php'; </script>";
			exit;
	}
?>
