<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php require_once('../static/connection.php');?>
<?php include("static/restreindre.php");?>
<?php include("static/secure_sql.php");?>
<?php
	try{

		if(isset($_GET['id']) && $_GET['id']!=null)
		{
			mysqli_query($base, 'START TRANSACTION');

			$condition=" WHERE c.id_produit=p.id ";
			if($_SESSION['adm_type']!=0){
				$condition.=sprintf(" AND p.id_user=%s ",GetSQLValueString($_SESSION['adm_id'], "int",$base));
			}
			$req = sprintf("select c.id from comment c,produit p $condition AND c.id=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			$selectcle=mysqli_query($base,$req);
			if(mysqli_num_rows($selectcle)==0){
				echo "<script>window.location.href ='index.php'; </script>";
				exit;
			}
			
			$req = sprintf("DELETE from comment WHERE id=%s",
				GetSQLValueString($_GET['id'], "int", $base));
			mysqli_query($base,"SET NAMES UTF8");
			mysqli_query($base, $req);
								
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
