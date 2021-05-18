<?php
if($_SESSION['adm_type']!=0){
	echo "<script>window.location.href ='index.php'; </script>";
	exit;
}
?>