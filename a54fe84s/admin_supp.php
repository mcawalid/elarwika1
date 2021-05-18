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
		if(isset($_GET['id']) && $_GET['id']!=null){
			
			mysqli_query($base,'START TRANSACTION');

			$req = sprintf("DELETE from tab_admi WHERE id=%s",
				GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			mysqli_query($base, $req) or die(mysqli_error($base));
								
			mysqli_query($base,'COMMIT') or die(mysqli_error($base));
			// tout est OK
			echo "<script>window.location.href ='admin.php'; </script>";
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
