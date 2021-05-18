<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/fonctions.php");
	include("static/secure_sql.php");
	
	
	if(!((isset($_GET['id']) && $_GET['id']!=null))){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	
	$id=intval($_GET['id']);
	
	$req = "Select * From produit where id=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle=mysqli_query($base,$req);
	if(mysqli_num_rows($selectcle)==0){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	
	// ADD FOLOW IF NOT EXIST
	$req = sprintf("Select count(*) as count From follow where id_produit=$id AND id_user=%s",GetSQLValueString($_SESSION['id_vente'],"int",$base));
	mysqli_query($base,"SET NAMES UTF8");
	$count=mysqli_fetch_array(mysqli_query($base,$req));
	
	if($count['count']!=0){
		echo "<script>window.location.href ='produit.php?id=$id&follow=0'; </script>";
		exit;
	}else {
		$req = sprintf("INSERT INTO follow (id,id_user,id_produit,date) VALUES (NULL,%s,$id,NOW())",GetSQLValueString($_SESSION['id_vente'],"int",$base));
		mysqli_query($base,"SET NAMES UTF8");
		mysqli_query($base,$req);
		
		echo "<script>window.location.href ='produit.php?id=$id&follow=1'; </script>";
		exit;
	}

?>