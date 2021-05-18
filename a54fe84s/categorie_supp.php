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
			mysqli_query($base, 'START TRANSACTION');
			
			$sql = sprintf("select image from categorie WHERE id=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			$selectcle=mysqli_query($base,$sql) or die(mysqli_error($base));
			$row_result = mysqli_fetch_assoc ($selectcle);
			if($row_result['image']!='default.png'){
				@unlink('../images/gallery/categorie/'.$row_result['image']);
			}
			
			$req = sprintf("select lien from categorie c,produit p,produit_img i where i.id_produit=p.id and c.id=p.id_categorie and c.id=%s",GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base, "SET NAMES UTF8");
			$selectcle=mysqli_query($base, $req) or die(mysqli_error($base));
			while($row_result = mysqli_fetch_assoc ($selectcle))
				@unlink("../images/gallery/produit/".$row_result['lien']);
			
			$req = sprintf("DELETE from categorie WHERE id=%s",
				GetSQLValueString($_GET['id'], "int",$base));
			mysqli_query($base, "SET NAMES UTF8");
			mysqli_query($base, $req) or die(mysqli_error($base));
			
			
								
			mysqli_query($base, 'COMMIT');
			
			exit;
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
