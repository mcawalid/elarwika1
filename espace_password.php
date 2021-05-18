<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/secure_sql.php");
	include("static/fonctions.php");
	
	if(	(isset($_POST['password']) && $_POST['password']!=null) &&
		(isset($_POST['new_password']) && $_POST['new_password']!=null) &&
		(isset($_POST['new_password2']) && $_POST['new_password2']!=null)){
			
			if($_POST['new_password']!=$_POST['new_password2']){
				$erreur="Merci de vérifier le nouveau de passe";
			}else {
				$req = sprintf("SELECT password FROM user WHERE id=%s",
							GetSQLValueString($_SESSION['id_vente'],"int",$base));
				mysqli_query($base,"SET NAMES UTF8");
				$tmp=mysqli_fetch_array(mysqli_query($base, $req));
			
				if($tmp['password']!=md5($_POST['password'])){
					$erreur="Merci de vérifier le mot de passe actuel";
				}else {
					$req = sprintf("UPDATE user SET password=%s WHERE id=%s",
							GetSQLValueString(md5($_POST['new_password']),"text",$base),
							GetSQLValueString($_SESSION['id_vente'],"int",$base));
					mysqli_query($base,"SET NAMES UTF8");
					mysqli_query($base, $req);
					
					$erreur = "Votre mot de passe a été changer";
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
                                            <h3>Modifier votre mot de passe</h3>
											<hr/>
											<?php if (!empty($erreur)){ ?>
												<div class="alert alert-primary" role="alert">
													<?php echo $erreur; ?>
												</div>
											<?php } ?>
											<form action="espace_password.php" method="POST">
												<div class="form-group row">
													<label class="control-label col-sm-3">Mot de passe actuel <span class="text-danger">*</span></label>
													<div class="col-md-9">
														<input type="password" class="form-control" required="required" name="password" id="password" placeholder="Mot de passe actuel" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-3">Nouveau mot de passe <span class="text-danger">*</span></label>
													<div class="col-md-9">
														<input type="password" class="form-control" required="required" name="new_password" id="new_password" placeholder="Nouveau mot de passe (5-15 caractéres)" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-3">Confirmer le nouveau mot de passe <span class="text-danger">*</span></label>
													<div class="col-md-9">
														<input type="password" class="form-control" required="required" name="new_password2" id="new_password2" placeholder="Confirmer le nouveau mot de passe" value="">
													</div>
												</div>
												<hr/>
												<div class="row">
													<div class="col-md-10">
													<center>
														<input name="Submit" type="submit" value="Confirmer" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold">
													</center>
													</div>
												</div>
											</form>
										</div>
										<div style="clear:both"></div>
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
