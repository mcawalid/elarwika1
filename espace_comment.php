<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/fonctions.php");
	include("static/secure_sql.php");
	
	// trouver nombre totale
	$sql = "select count(*) from produit p,comment c where c.id_produit=p.id and c.id_user=".$_SESSION['id_vente'];
	mysqli_query($base,"SET NAMES UTF8");
	$resultat = mysqli_query($base,$sql);
	$nb_total = mysqli_fetch_array($resultat);
	$nb_total = $nb_total[0];

	// calcule des elements
	$nb_affichage_par_page=20;
	if (!isset($_GET['debut'])) $_GET['debut'] = 0;
			
	$req = "select p.nom,c.* from produit p,comment c where c.id_produit=p.id and c.id_user=".$_SESSION['id_vente']." order by c.id DESC LIMIT ".intval($_GET['debut']).', '.$nb_affichage_par_page;
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle = mysqli_query($base,$req);

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
                                            <h4>Mes commentaires :</h4>
											<br/><br/>
											<table class="table table-bordered table-hover table-striped tablesorter">
												<thead>
													<tr>
														<th>Produit</th>
														<th>Commentaire</th>
														<th>Date</th>
														<th style="text-align:center">Etat</th>
													</tr>
												</thead>
												<?php while($resultat=mysqli_fetch_array($selectcle)){?>
													<tr>
														<td style="vertical-align:middle;">
															<a href="produit.php?id=<?php echo $resultat['id_produit']?>" target="_blank"><?php echo $resultat['nom']?></a>
														</td>
														<td style="vertical-align:middle;"><?php echo nl2br(strip_tags($resultat['comment']));?></td>
														<td style="vertical-align:middle;"><?php echo getDateFormat($resultat['date']) ?>
														<td style="text-align:center">
															<?php if($resultat['valide']==1){ ?>
																<img src="images/valide.png" title="Valide">
															<?php }else{ echo "En attente"; } ?>
														</td>
												</tr>
											<?php } ?>
										</table>
										
										<div style="clear:both"></div>
										<hr/>
										<div class="row justify-content-center mt-4 page-item">
											<nav class="mb-4">
												<ul class="pagination pagination-circle pg-blue mb-0" style=" display: flex;align-items: center;justify-content: center;">
													<?php echo barre_navigation($nb_total, $nb_affichage_par_page, intval($_GET['debut']), 5); ?> 
												</ul>
											</nav>
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
