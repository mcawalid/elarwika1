<?php
	session_start();
	require_once('../../static/connection.php');  
	require_once '../static/Plugin/ThumbLib.inc.php';

	$id=intval($_POST['id']);
	
	$req = "SELECT * FROM slide WHERE id=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_annonce = mysqli_query($base, $req);
	if(mysqli_num_rows($liste_annonce)==0){
		echo "error";
		exit;
	}
	$annonce=mysqli_fetch_array($liste_annonce);

	$uploaddir = '../../images/slide/'; 

$file = $uploaddir .$id."_". basename(no_special_character($_FILES['uploadfile']['name']));
$size=$_FILES['uploadfile']['size'];

/* thumb */
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 

	if($annonce['image']!="default.png"){
		@unlink('../../images/slide/'.$annonce['image']);
	}

	$infosfichier = pathinfo($file);
	$filetypes = strtolower($infosfichier['extension']);

	// finale
	$file = $id."_".no_special_character($_FILES['uploadfile']['name']);
	$req = "UPDATE slide SET image='$file' WHERE id=$id";
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