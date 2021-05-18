<?php
	session_start();
	require_once('../../static/connection.php');  
	require_once '../static/Plugin/ThumbLib.inc.php';

	$id=intval($_POST['id']);
	
	$req = "SELECT * FROM produit WHERE id=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_annonce = mysqli_query($base, $req);
	if(mysqli_num_rows($liste_annonce)==0){
		echo "error";
		exit;
	}
	
	$req = "SELECT count(*) as count FROM produit_img";
	mysqli_query($base,"SET NAMES UTF8");
	$tmp = mysqli_fetch_array(mysqli_query($base, $req));
	$count=$tmp['count'];
	
	$uploaddir = '../../images/gallery/produit/'; 
	$file = $uploaddir .$count."_". basename(no_special_character($_FILES['uploadfile']['name']));


if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 

	// finale
	$file = $count."_".no_special_character($_FILES['uploadfile']['name']);
	$req = "INSERT INTO produit_img (id,id_produit,lien) VALUES (NULL,$id,'$file')";
	mysqli_query($base,"SET NAMES UTF8");
	mysqli_query($base, $req);

	$data = array('name' => $file);
    echo json_encode($data);
	
} else {
	echo "error ".$_FILES['uploadfile']['error']." --- ".$_FILES['uploadfile']['tmp_name']." %%% ".$file."($size)";
}
function no_special_character($chaine){
	$chaine=trim($chaine);
	$chaine= strtr($chaine,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	$chaine = preg_replace('/([^.a-z0-9]+)/i', '', $chaine);
	$chaine = strtolower($chaine);
	return $chaine;
}
?>