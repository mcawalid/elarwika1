<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/fonctions.php");
	include("static/secure_sql.php");
	
	if(isset($_SESSION['id_vente'])){
		echo "<script>window.location.href ='espace.php'; </script>";
		exit();
	}

	$erreur="";
	if (isset($_POST['connexion'])) {
			if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
				$sql = sprintf("SELECT id,nom,prenom,pseudo,avatar FROM user WHERE pseudo=%s AND password=%s",
					GetSQLValueString($_POST['pseudo'],"text",$base),
					GetSQLValueString(md5($_POST['password']),"text",$base));
				mysqli_query($base,"SET NAMES UTF8");
				$liste_user = mysqli_query($base,$sql);

				if(mysqli_num_rows($liste_user)==1){
					$user=mysqli_fetch_array($liste_user);
					$_SESSION['vente_pseudo'] = $user['pseudo'];
					$_SESSION['vente_name'] = $user['nom']." ".$user['prenom'];
					$_SESSION['vente_avatar'] = $user['avatar'];
					$_SESSION['id_vente'] = $user['id'];
					
					echo "<script>window.location.href ='espace.php'; </script>";
					exit;
				}
				else {
					$erreur="Nom d'utilistaeur ou mot de passe non valide, Veuillez réesayer.";
				}
			}
			else {
				$erreur="Au moins un des champs est vide.";
			}
	}
	

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Se connecter - Site vente</title>

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
                        <li class="page-breadcrumb__nav active">Se connecter</li>
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
                    <div class="section-content m-b-40">
                        <h5 class="section-content__title text-center">Mon compte</h5>
                    </div>
                </div>
                <!-- Start Login Area -->
                <div class="col-lg-12 col-12">
                    <div class="login-form-container">
                        <h5 class="sidebar__title">Se connecter</h5>
                        <div class="login-register-form">
							<?php if (!empty($erreur)){ ?>
								<div class="alert alert-primary" role="alert">
									<?php echo $erreur; ?>
								</div>
							<?php } ?>
                            <form action="login.php" method="post">
                                <div class="form-box__single-group">
                                    <label for="form-username">Pseudo *</label>
                                    <input type="text" id="form-username" placeholder="Pseudo" name="pseudo" required>
                                </div>
                                <div class="form-box__single-group">
                                    <label for="form-username-password">Password *</label>
                                    <div class="password__toggle">
                                        <input type="password" id="form-username-password" name="password" placeholder="Mot de passe" required>
                                        <span data-toggle="#form-username-password" class="password__toggle--btn fa fa-fw fa-eye"></span>
                                    </div>
                                </div>
								<br/>
                                <button class="btn btn--box btn--medium btn--radius btn--black btn--black-hover-green btn--uppercase font--semi-bold" name="connexion" type="submit">Se connecter</button>
								<div class="mt-5">
									<p>
										Vous n'avez pas de compte ?
										<a href="signup.php" class="text-success">Cliquez ici pour vous inscrire</a>
									</p>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

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
