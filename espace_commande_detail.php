<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/secure_sql.php");
	include("static/restreindre.php");
	include("static/fonctions.php");
	
	if(!(isset($_GET['id']) && $_GET['id']!=null)){
		echo "<script>window.location.href ='espace.php'; </script>";
		exit;
	}
	$id=intval($_GET['id']);
	
	$req = sprintf("SELECT * FROM commande where id=$id AND id_user=%s",
		GetSQLValueString($_SESSION['id_vente'], "int",$base));
	mysqli_query($base,"SET NAMES UTF8");
	$liste_commande=mysqli_query($base,$req);
	if(mysqli_num_rows($liste_commande)==0){
		echo "<script>window.location.href ='espace.php'; </script>";
		exit;
	}
	$commande=mysqli_fetch_array($liste_commande);
	
	
	$req = "SELECT d.* FROM commande_detail d where id_commande=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_produit=mysqli_query($base,$req);

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
                                            <h4>Détail de la commande :</h4>
											<br/><br/>
											<div style="line-height: 27px;">
												<b>Référence de la commande :</b> <?php echo $commande['id']?><br/>
												<b>Type :</b> <?php if($commande['type']==0) echo "Le retrait a la caisse"; else echo "livraison programmé";?><br/>
												<b>Date d'achat :</b> <?php echo getDateFormat($commande['date_insert']); ?><br/>
												<b>Date de livraison :</b> <?php echo getDateFormat($commande['date']); ?> à <?php echo str_pad($commande['heure'], 2, "0", STR_PAD_LEFT).':'.str_pad($commande['minute'], 2, "0", STR_PAD_LEFT) ?><br/>
											</div>
											<br/>
											<table class="table table-bordered table-hover table-striped tablesorter">
												<thead>
													<th>Nom</th>
													<th>Prix unitaire</th>
													<th>Quantité</th>
													<th style="text-align:center">Totale</th>
												</thead>
												<?php $prix_total=0;
													while($produit=mysqli_fetch_array($liste_produit)){?>
													<tr>
														<td><?php echo $produit['nom']?></td>
														<td>
															<?php
																$prix=$produit['prix'];
																echo $produit['prix']." DA";
															?>
														</td>
														<td><?php echo $produit['quantite']; ?></td>
														<td style="text-align:center">
															<?php 
																$prix_total+=($prix*$produit['quantite']);
																echo ($prix*$produit['quantite'])." DA";
															?>
														</td>
													</tr>
												<?php } ?>
												<tr>
													<th colspan="3" style="text-align:right">Le montant des achats</th>
													<th style="text-align:center"><?php echo $prix_total." DA";?></th>
												</tr>
												<?php $livraison=0; ?>
												<tr>
													<th colspan="3" style="text-align:right">Frais de livraison</th>
													<th style="text-align:center"><?php echo "0.00 DA"; ?></th>
												</tr>
												<tr>
													<th colspan="3" style="text-align:right">Montant global à payer</th>
													<th style="text-align:center"><?php echo $prix_total+$livraison." DA";?></th>
												</tr>
											</table>
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
