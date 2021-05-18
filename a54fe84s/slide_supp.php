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
		if((isset($_GET['id']) && $_GET['id']!=null))
		{
			mysqli_query($base,'START TRANSACTION');

			// supprimer le nouveau // a supprimer lien
			$sql = sprintf("select image from slide WHERE id=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			$selectcle=mysqli_query($base,$sql) or die(mysqli_error($base));
			$row_result = mysqli_fetch_assoc ($selectcle);
			if($row_result['image']!='default.png'){
				@unlink('../images/slide/'.$row_result['image']);
			}
			
			$req = sprintf("DELETE from slide WHERE id=%s",
				GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			mysqli_query($base, $req) or die(mysqli_error($base));
								
			mysqli_query($base,'COMMIT') or die(mysqli_error($base));
			// tout est OK
			echo "<script>window.location.href ='slide.php'; </script>";
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
