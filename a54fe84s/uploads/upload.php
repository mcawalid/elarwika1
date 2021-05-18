<?php
	session_start();
	require_once('../../static/connection.php');  
	require_once '../static/Plugin/ThumbLib.inc.php';

	$uploaddir = '../../images/gallery/upload/'; 

$file = $uploaddir . basename(no_special_character($_FILES['uploadfile']['name']));


if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 

	// finale
	$file = no_special_character($_FILES['uploadfile']['name']);
	$req = "INSERT INTO upload (id,lien) VALUES (NULL,'$file')";
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