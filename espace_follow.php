<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/fonctions.php");
	include("static/secure_sql.php");
	
	if(isset($_GET['delete']) && $_GET['delete']!=null){
		
		$req = sprintf("Select * From follow where id_user=%s and id=%s",GetSQLValueString($_SESSION['id_vente'],"int",$base),GetSQLValueString($_GET['delete'],"int",$base));
		mysqli_query($base,"SET NAMES UTF8");
		$liste_tmp=mysqli_query($base,$req);
		if(mysqli_num_rows($liste_tmp)==0){
			$erreur="Vous ne pouvez pas supprimer ce produit";
		}else {
			$req = sprintf("DELETE From follow where id_user=%s and id=%s",GetSQLValueString($_SESSION['id_vente'],"int",$base),GetSQLValueString($_GET['delete'],"int",$base));
			mysqli_query($base,"SET NAMES UTF8");
			mysqli_query($base,$req);
			$erreur="Produit supprimé avec succès";
		}
		
	}
	
	$req = sprintf("Select * From follow where id_user=%s order by ID DESC",GetSQLValueString($_SESSION['id_vente'],"int",$base));
	mysqli_query($base,"SET NAMES UTF8");
	$liste_result=mysqli_query($base,$req);

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
                                            <h4>Mes produits :</h4>
							<br/><br/>
							<?php if (!empty($erreur)){ ?>
								<div class="alert alert-primary" role="alert">
									<?php echo $erreur; ?>
								</div>
							<?php } ?>
							
							<?php if(mysqli_num_rows($liste_result)==0){?>
								<center>Vous n'avez aucun produit en favoris, Merci de choisir un <a href="categorie.php">ici</a></center>
							<?php } else {?>
								<table class="table table-bordored">
									<tr>
										<th colspan="2">Produit</th>
										<th>Categorie</th>
										<th style="min-width: 107px;">Date</th>
										<th>Supprimer</th>
									</tr>
								<?php while($result=mysqli_fetch_array($liste_result)){
										
											$req = sprintf("Select p.disponible,p.id,p.nom as nom,p.date,p.description_complet,p.nb_vue, c.nom as categorie,p.id_categorie,p.prix From produit p,categorie c where p.id=%s and p.id_categorie=c.id",GetSQLValueString($result['id_produit'],"int",$base));
											mysqli_query($base,"SET NAMES UTF8");
											$liste_topic=mysqli_query($base,$req);
											if(mysqli_num_rows($liste_topic)!=0){
												$topic=mysqli_fetch_array($liste_topic);
										?>
										<tr>
											<td>
												<a href="produit.php?id=<?php echo $topic['id']; ?>" target="_blank">
													<?php
														$req = "SELECT lien from produit_img WHERE id_produit=".$topic['id']." ORDER BY id DESC LIMIT 1";
														mysqli_query($base,"SET NAMES UTF8");
														$liste_images = mysqli_query($base,$req);
														$img_to_show="default.png";
														if(mysqli_num_rows($liste_images)!=0)
														{
															$img=mysqli_fetch_array($liste_images);
															$img_to_show=$img['lien'];
														}
													?>
													<lazy-image alt="" src="images/gallery/produit/<?php echo $img_to_show; ?>" classname="css-1u8c2i8">
														<img src="images/gallery/produit/<?php echo $img_to_show; ?>" alt="<?php echo $topic['nom']?>" style="width: 150px;height: 150px;" >
													</lazy-image>
												</a>
											</td>
											<td style='vertical-align: middle;'>
												<a href="produit.php?id=<?php echo $topic['id']; ?>" target="_blank">
													<?php echo $topic['nom']?>
												</a>
											</td>
											<td style='vertical-align: middle;'><a href="categorie.php?id=<?php echo $topic['id_categorie']; ?>" target="_blank"><?php echo $topic['categorie']?></a></td>
											<td style='vertical-align: middle;'><?php echo $result['date']?></td>
											<td style='vertical-align: middle;'>
												<a href="espace_follow.php?delete=<?php echo $result['id']; ?>" onclick="return(confirm('Vous étes sur de vouloir supprimer ce produit ?'));"><img src="images/supp.png"></a>
											</td>
										</tr>
								<?php }} ?>
								</table>
							<?php } ?>
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
