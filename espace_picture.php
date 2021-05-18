<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/secure_sql.php");
	include("static/fonctions.php");
	
	$erreur="";
	if(!empty($_FILES['uploadFile']['name'])){
			$dossier = 'images/gallery/user/';
			$fichier = basename($_FILES['uploadFile']['name']);
			$taille_maxi = 500000;
			$taille = filesize($_FILES['uploadFile']['tmp_name']);
			$extensions = array('.jpg','.jpeg', '.png','.gif');
			$extension = strrchr($_FILES['uploadFile']['name'], '.'); 
						
			$verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';  
			
			if($taille>$taille_maxi)
				$erreur="Le fichier que vous avez choisi est trop volumineux";
			else if(!in_array($extension, $extensions))
				$erreur="Format accepté : .jpg,.png,.gif";
			else{
				//On formate le nom du fichier ici...
				$fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
				$file_name=$_SESSION['id_vente'].$extension;
			
				if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $dossier.$file_name))
				{
					$req=sprintf("UPDATE user SET avatar=%s WHERE id=%s",
						GetSQLValueString($file_name,"text",$base),
						GetSQLValueString($_SESSION['id_vente'],"text",$base));
					mysqli_query($base,"SET NAMES UTF8");
					mysqli_query($base,$req);
					
					$_SESSION['vente_avatar']=$file_name;
					echo "<script>window.location.href ='espace_picture.php?ok=1'; </script>";
					exit;
				}
				else
				{
					$erreur="Une erreur c'est produit lors l'envoie du fichier veuillez réessayer";
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Espace privé - Site vente</title>

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="css/vendor/fontawesome.css">
    <link rel="stylesheet" href="css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    
    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="css/plugin/slick.css">
    <link rel="stylesheet" href="css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="css/plugin/price_range_style.css">
    <link rel="stylesheet" href="css/plugin/in-number.css">
    <link rel="stylesheet" href="css/plugin/venobox.min.css">
    <link rel="stylesheet" href="css/plugin/jquery.lineProgressbar.css">


    <!-- Main Style CSS File -->
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
   
   <?php include('static/header.php')?>

    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Accueil</a></li>
                        <li class="page-breadcrumb__nav active">Mon compte</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <div class="row">
                            <?php include('static/header_user.php')?>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h3>Modifier votre photo de profile</h3>
											<hr/>
											<?php if (!empty($erreur)){ ?>
												<div class="alert alert-primary" role="alert">
													<?php echo $erreur; ?>
												</div>
											<?php }elseif(isset($_GET['ok']) && $_GET['ok']==1){ ?>
												<div class="alert alert-primary" role="alert">Votre photo de profile a été modifier avec succées</div>
											<?php } ?>
											<form action="espace_picture.php" method="POST" enctype="multipart/form-data">
												<div class="row">
													<label class="col-md-12 control-label" for="uploadFile">Fichier : (jpg jpeg png gif)</label>
													<div class="col-md-12">
														<input type="file" class="text-input" name="uploadFile" required="required"  class="form-control">
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<hr/>
														<center>
															<input type="submit" value="Modifier la photo du profile" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold">
														</center>
													</div>
												</div>
											</form>
										</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('static/footer.php')?>

    <!-- Vendor JS Files -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="js/vendor/jquery-ui.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS Files -->
    <script src="js/plugin/slick.min.js"></script>
    <script src="js/plugin/jquery.countdown.min.js"></script>
    <script src="js/plugin/material-scrolltop.js"></script>
    <script src="js/plugin/price_range_script.js"></script>
    <script src="js/plugin/in-number.js"></script>
    <script src="js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="js/plugin/venobox.min.js"></script>
    <script src="js/plugin/jquery.waypoints.js"></script>
    <script src="js/plugin/jquery.lineProgressbar.js"></script>

    <script src="js/main.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/minicart.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: 'checkout.php'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
	
	$(".wishlist-item-count").html(paypal.minicart.cart.items().length);
</script>
</body>

</html>
