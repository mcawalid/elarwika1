<?php   
function barre_navigation ($nb_total,$nb_affichage_par_page,$debut,$nb_liens_dans_la_barre)
{
	$barre = '';
	if ($_SERVER['QUERY_STRING'] == "") {
		$query = $_SERVER['PHP_SELF'].'?debut=';
	}
	else {
		$tableau = explode ("debut=", $_SERVER['QUERY_STRING']);
		$nb_element = count ($tableau);
		if ($nb_element == 1) {
			$query = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&debut=';
		}
		else {
			if ($tableau[0] == "") {
				$query = $_SERVER['PHP_SELF'].'?debut=';
			}else {
				$query = $_SERVER['PHP_SELF'].'?'.$tableau[0].'debut=';
			}
		}
	}

	$page_active = floor(($debut/$nb_affichage_par_page)+1);
	$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
	if ($nb_liens_dans_la_barre%2==0) {
		$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
		$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
	} else {
		$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
		$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
	}
	
	if ($cpt_deb1 <= 1) {
		$cpt_deb = 1;
		$cpt_fin = $nb_liens_dans_la_barre;
	}elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) {
		$cpt_deb = $cpt_deb1;
		$cpt_fin = $cpt_fin1;
	}else {
		$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
		$cpt_fin = $nb_pages_total;
	}
	
	if ($nb_pages_total <= $nb_liens_dans_la_barre) {
		$cpt_deb=1;
		$cpt_fin=$nb_pages_total;
	}

	if ($cpt_deb != 1) {
		$cible = $query.(0);
		$lien = '<li class="page-item "><a href="'.$cible.'"class="page-link waves-effect waves-effect" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>';
	}else {
		$lien='';
	}
	
	$barre .= $lien;

	for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) {
		if ($cpt == $page_active) {
			if ($cpt == $nb_pages_total) {
				$barre .= '<li class="page-item active"><a class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			} else {
				$barre .= '<li class="page-item active"><a class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}
		}else {
			if ($cpt == $cpt_fin) {
				// LAST NUMERO
				$barre .= '<li class="page-item"><a href="'.$query.(($cpt-1)*$nb_affichage_par_page).'" class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}else {
				// NUMERO
				$barre .= '<li class="page-item"><a href="'.$query.(($cpt-1)*$nb_affichage_par_page).'" class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}
		}
	}
	
	$fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
	if (($nb_total % $nb_affichage_par_page) == 0) {
		$fin = $fin - $nb_affichage_par_page;
	}

	if ($cpt_fin != $nb_pages_total) {
		$cible = $query.$fin;
		$lien = '<li class="page-item"><a href="'.$cible.'" class="page-link waves-effect waves-effect" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';
	} else {
		$lien='';
	}
	$barre .= $lien;
	return $barre;
}

function barre_navigation_perso ($cat,$sub,$nb_total,$nb_affichage_par_page,$debut,$nb_liens_dans_la_barre)
{
	$barre = '';
	if($sub!="") $sub=$sub."/";

		$tableau = explode ("debut=", $_SERVER['QUERY_STRING']);
		$nb_element = count ($tableau);
		if ($nb_element == 1) {
			$query = $cat.'/'.$sub;
		}
		else {
			if ($tableau[0] == "") {
				$query = $cat.'/'.$sub;
			}else {
				$query = $cat.'/'.$sub;
			}
		}

	$page_active = floor(($debut)+1);
	$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
	if ($nb_liens_dans_la_barre%2==0) {
		$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
		$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
	} else {
		$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
		$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
	}
	
	if ($cpt_deb1 <= 1) {
		$cpt_deb = 1;
		$cpt_fin = $nb_liens_dans_la_barre;
	}elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) {
		$cpt_deb = $cpt_deb1;
		$cpt_fin = $cpt_fin1;
	}else {
		$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
		$cpt_fin = $nb_pages_total;
	}
	
	if ($nb_pages_total <= $nb_liens_dans_la_barre) {
		$cpt_deb=1;
		$cpt_fin=$nb_pages_total;
	}

	if ($cpt_deb != 1) {
		$cible = $query.(0);
		$lien = '<li class="page-item "><a href="'.$cible.'/" class="page-link waves-effect waves-effect" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>';
	}else {
		$lien='';
	}
	
	$barre .= $lien;

	for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) {
		if ($cpt == $page_active) {
			if ($cpt == $nb_pages_total) {
				$barre .= '<li class="page-item active"><a class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			} else {
				$barre .= '<li class="page-item active"><a class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}
		}else {
			if ($cpt == $cpt_fin) {
				// LAST NUMERO
				$barre .= '<li class="page-item"><a href="'.$query.(($cpt-1)).'/" class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}else {
				// NUMERO
				$barre .= '<li class="page-item"><a href="'.$query.(($cpt-1)).'/" class="page-link waves-effect waves-effect">'.$cpt.'</a></li>';
			}
		}
	}
	
	$fin = ($nb_total - ($nb_total % $nb_affichage_par_page))/$nb_affichage_par_page;
	if (($nb_total % $nb_affichage_par_page) == 0) {
		$fin = $fin - $nb_affichage_par_page;
	}

	if ($cpt_fin != $nb_pages_total) {
		$cible = $query.$fin;
		$lien = '<li class="page-item"><a href="'.$cible.'/" class="page-link waves-effect waves-effect" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';
	} else {
		$lien='';
	}
	$barre .= $lien;
	return $barre;
}

	// nb mot
	function resume_xmots($MaChaine,$xmots)    
	{  
	   $NouvelleChaine="";
	   $ChaineTab=explode(" ",$MaChaine);    

	   for($i=0;$i<$xmots && $i<count($ChaineTab) ;$i++)    
	   {    
		  $NouvelleChaine.=" "."$ChaineTab[$i]";
	   }  
	   return $NouvelleChaine;
	}
	
	
	function dailymotion_thumbnail_url($id){
		$thumbnail_large_url='https://api.dailymotion.com/video/'.$id.'?fields=thumbnail_large_url';
		$json_thumbnail = file_get_contents($thumbnail_large_url);
		$get_thumbnail = json_decode($json_thumbnail, TRUE);
		$thumb=$get_thumbnail['thumbnail_large_url'];
		echo $thumb;
	}
	
	function getDailyMotionId($url)
{
		if (preg_match('!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!', $url, $m)) {
			if (isset($m[6])) {
				return $m[6];
			}
			if (isset($m[4])) {
				return $m[4];
			}
			return $m[2];
		}
		return false;
	}
	
	function youtube_thumbnail_url($url)
	{
		if(!filter_var($url, FILTER_VALIDATE_URL)){
			return false;
		}
		$domain=parse_url($url,PHP_URL_HOST);
		if($domain=='www.youtube.com' OR $domain=='youtube.com')
		{
			if($querystring=parse_url($url,PHP_URL_QUERY))
			{   
				parse_str($querystring);
				if(!empty($v)) return "http://img.youtube.com/vi/$v/mqdefault.jpg";
				else return false;
			}
			else return false;
		 
		}
		elseif($domain == 'youtu.be')
		{
			$v= str_replace('/','', parse_url($url, PHP_URL_PATH));
			return (empty($v)) ? false : "http://img.youtube.com/vi/$v/mqdefault.jpg" ;
		}
		 
		else
		 
		return false;
	}
	
	function getURL(){
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
			$url = "https";
		else
			$url = "http";
		$url .= "://";
		$url .= $_SERVER['HTTP_HOST']; 
		$url .= $_SERVER['REQUEST_URI']; 
		return $url; 
	}
	
	function getID($url){
	if(!filter_var($url, FILTER_VALIDATE_URL)){
			return false;
		}
		$domain=parse_url($url,PHP_URL_HOST);
		if($domain=='www.youtube.com' OR $domain=='youtube.com')
		{
			if($querystring=parse_url($url,PHP_URL_QUERY))
			{   
				parse_str($querystring);
				if(!empty($v)) return $v;
				else return false;
			}
			else return false;
		 
		}
		elseif($domain == 'youtu.be')
		{
			$v= str_replace('/','', parse_url($url, PHP_URL_PATH));
			return (empty($v)) ? false : $v ;
		}
		 
		else
		 
		return false;
	}
	
	function link_text($text){
		$text=str_replace(array(" ", "/", "\"","'","’",":","  ","#","%","?",",",";","!","."), "-",$text);
		$text = strtolower(str_replace(array("--"), "-",$text));
		if(substr($text, -1)=="-")
			$text= substr($text, 0, -1);
		return $text;
	}
	
	function addOrUpdateUrlParam($name, $value)
	{
		$params = $_GET;
		unset($params[$name]);
		$params[$name] = $value;
		return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
	}
	
	function startsWith($haystack, $needle) {
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}

	function getDateFormat($date){
		$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
		$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
		return $jour[date("w", strtotime($date))]." ".date("d", strtotime($date))." ".$mois[date("n", strtotime($date))]." ".date("Y", strtotime($date));
	}
	function getDateFormatEn($date){
		$mois = array("","January","February","March","April","May","June","July","August","September","October","November","December"); 
		return $mois[date("n", strtotime($date))]." ".date("d", strtotime($date)).", ".date("Y", strtotime($date));
	}
	function getDateFormatSepare2($date){
		$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
		return date("d", strtotime($date));
	}
	function getDateFormatSepare3($date){
		$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
		return $mois[date("n", strtotime($date))];
	}
	function getDateFormatSepare4($date){
		return date("Y", strtotime($date));
	}
	
	function getCommune($wilaya,$commune){
		$file="js/wilaya.json";
		$myfile = fopen($file, "r");
		$array= fread($myfile,filesize($file));
		$jArr = json_decode($array, true);
		echo $jArr["wilaya".$wilaya][$commune-1];
	}
	
	function getWilaya($wilaya){		$liste_wilaya = array("Adrar","Chlef","Laghouate","Oumbouaghi","Batna","Bejaia","Biskra","Béchar","Blida","Bouira","Tamanrasset",		"Tébessa","Tlemcen","Tiaret","Tizi Ouzou","Alger","Djelfa","Jijel","Setif","Saïda","Skikda","Sidi belabess","Annaba","Guelma",		"Constantine","Media","Mostaganeme","M'Sila","Maskara","Ouargla","Oran","El Bayadh","Illizi","Bordj Bouariridj","Boumerdes",		"El Tarf","Tindouf","Tissemsilt","El Oued","Khenchela","Souk Ahras","Tipaza","Mila","Ain defla","Naâma","Ain Témouchent",		"Ghardaia","Ghelizane");		return $liste_wilaya[intval($wilaya)-1];	}
?>