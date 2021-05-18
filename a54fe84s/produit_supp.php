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
			
			
			$req = sprintf("select lien from produit_img WHERE id_produit=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base, "SET NAMES UTF8");
			$selectcle=mysqli_query($base, $req);
			while($row_result = mysqli_fetch_assoc ($selectcle))
				@unlink("../images/gallery/produit/".$row_result['lien']);
			
			$req = sprintf("DELETE from produit WHERE id=%s",
				GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base, "SET NAMES UTF8");
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
