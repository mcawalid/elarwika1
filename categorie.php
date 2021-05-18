<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/fonctions.php");
	include("static/secure_sql.php");
	require('static/vote/_drawrating.php');
	
	$titre="Nos produits";
	$condition="";
	if(isset($_GET['id']) && $_GET['id']!=null){
		$condition=" AND p.id_categorie=".intval($_GET['id']);
		
		$req = "SELECT nom from categorie where id=".intval($_GET['id']);
		mysqli_query($base,"SET NAMES UTF8");
		$selectcle = mysqli_query($base, $req);
		if(mysqli_num_rows($selectcle)==0){
			echo "<script>window.location.href ='index.php'; </script>";
			exit;
		}
		$result=mysqli_fetch_array($selectcle);
		$titre=$result['nom'];
		
	}
	if(isset($_GET['q']) && $_GET['q']!=null){
		$condition.=sprintf(" AND p.nom like %s", GetSQLValueString("%".$_GET['q']."%", "text",$base) );
		$titre="RECHERCHE";
	}
	if	(isset($_GET['prix_min']) && $_GET['prix_min']!=null){
		$condition.=sprintf(" AND prix>=%s", GetSQLValueString(intval($_GET['prix_min']),"text",$base));
		$titre="RECHERCHE";
	}
	if	(isset($_GET['prix_max']) && $_GET['prix_max']!=null){
		$condition.=sprintf(" AND prix<=%s", GetSQLValueString(intval($_GET['prix_max']),"text",$base));
		$titre="RECHERCHE";
	}
	
	
	
	$sql = "SELECT count(*) FROM produit p,categorie c where c.id=p.id_categorie $condition";
	mysqli_query($base,"SET NAMES UTF8");
	$resultat = mysqli_query($base, $sql);
	$nb_total = mysqli_fetch_array($resultat);
	$nb_total = $nb_total[0];

	$nb_affichage_par_page=12;
	if (!isset($_GET['debut'])) $_GET['debut'] = 0;
			
	$req = "SELECT p.nb_vue,p.disponible,p.id,p.nom as nom,p.description_complet,p.prix,c.nom as categorie from produit p,categorie c where c.id=p.id_categorie $condition order by p.ordre DESC,p.id DESC LIMIT ".intval($_GET['debut']).', '.$nb_affichage_par_page;
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle = mysqli_query($base, $req);
	
	$req = "SELECT * FROM categorie order by ordre DESC";
	mysqli_query($base,"SET NAMES UTF8");
	$list_cat = mysqli_query($base, $req);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title><?php echo $titre ?> - Site vente</title>

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

    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/rating.css" />
</head>


<body>
   
	<?php include('static/header.php')?>
	
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Accueil</a></li>
                        <li class="page-breadcrumb__nav active"><?php echo $titre ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::: Start Main Container Wrapper :::::: -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <!-- Start Leftside - Sidebar Widget -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <form action="categorie.php" method="GET">
                        <div class="col">
							<div class="form-group">
								<div class="sidebar__box">
									<h5 class="sidebar__title">Catégorie</h5>
								</div>
								<select name="id" id="id" class="form-control" searchable="Recherche">
									<option value="">Tous les catégories</option>
									<?php while($cat=mysqli_fetch_array($list_cat)){ ?>
										<option value="<?php echo $cat['id']?>"><?php echo $cat['nom']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br/>
						<div class="col">
							<div class="sidebar__box">
                                <h5 class="sidebar__title">Objet</h5>
                            </div>
							<div class="form-group">
								<input type="text" id="q" placeholder="Objet" name="q" class="form-control">
							</div>
						</div>
						<br/>
                        <div class="sidebar__widget">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title">Prix (DA)</h5>
                            </div>
                            <div class="sidebar__price-filter ">
                                <div id="slider-range" class="price-filter-range"></div>
                                <div class="slider__price-filter-input d-flex justify-content-between">
                                    <input type="number" min=0 max="99000" oninput="validity.valid||(value='0');" name="prix_min" id="min_price" class="price-range-field" />
                                    <input type="number" min=0 max="100000" oninput="validity.valid||(value='1000');" name="prix_max" id="max_price" class="price-range-field" />
                                </div>
                            </div>
                        </div>
						<button class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold m-t-30" type="submit">Recherche</button>
						</form>
					</div>
                </div>

                <div class="col-lg-9">
                    <div class="sort-box">
                        <div class="sort-box-item">
                            <span>Page <?php echo (intval($_GET['debut'])/$nb_affichage_par_page)+1; ?> - <?php echo mysqli_num_rows($selectcle)?> of <?php echo $nb_total?> résultat</span>
                        </div>
                    </div>

                    <div class="product-tab-area">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active shop-grid" id="sort-grid">
                                <div class="row">
                                    <?php while($commande=mysqli_fetch_array($selectcle)) {?>
									<div class="col-md-4 col-12">
                                        <div class="product__box product__default--single text-center">
                                        	<div class="product__img-box  pos-relative">
                                                <a href="produit.php?id=<?php echo $commande['id']?>" class="product__img--link">
													<?php
														$req = "SELECT lien from produit_img WHERE id_produit=".$commande['id']." ORDER BY id DESC LIMIT 1";
														mysqli_query($base,"SET NAMES UTF8");
														$liste_images = mysqli_query($base,$req);
														$img_to_show="default.png";
														if(mysqli_num_rows($liste_images)!=0)
														{
															$img=mysqli_fetch_array($liste_images);
															$img_to_show=$img['lien'];
														}
													?>
													<img src="images/gallery/produit/<?php echo $img_to_show; ?>" class="product__img img-fluid" alt="<?php echo $commande['nom']?>" style="width:480px;height:300px">
                                                </a>
                                                <?php if($commande['disponible']==1){?>
													<span class="product__label product__label--sale-out">Disponible</span>
												<?php } ?>
												
                                                <ul class="product__action--link pos-absolute">
                                                    <li>
														<form action="#" method="post" style='float: left;margin-right: 3px;'>
															<fieldset>
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="business" value=" ">
																<input type="hidden" name="item_name" value="<?php echo $commande['nom']?>">
																<input type="hidden" name="amount" value="<?php echo $commande['prix']?>">
																<input type="hidden" name="discount_amount" value="0">
																<input type="hidden" name="currency_code" value="USD">
																<ul style="display:none">
																	<li>
																		<select name="os0">
																			<option value="<?php echo $commande['id']?>"></option>
																		</select>
																		<input type="hidden" name="on0" value="ID" />
																	</li>
																</ul>
																<input type="hidden" name="return" value=" ">
																<input type="hidden" name="cancel_return" value=" ">
																<button type="submit" name="submit" style="margin-bottom: -12px;display: block;" ><a href="javascript::void(0)"><i class="icon-shopping-cart"></i></a></button>
															</fieldset>
														</form>
													</li>
                                                    <li><a href="follow.php?id=<?php echo $commande['id']?>"><i class="icon-heart"></i></a></li>
                                                    <li><a href="produit.php?id=<?php echo $commande['id']?>" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                                </ul>
												
                                            </div>
											
                                            <div class="product__content m-t-20">
                                                <ul class="product__review">
                                                    <center><?php echo rating_bar("p-".$commande['id'],5); ?></center>
                                                </ul>
                                                <a href="produit.php?id=<?php echo $commande['id']?>" class="product__link"><?php echo $commande['nom']?></a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price"><?php echo $commande['prix']?> DA</span>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<?php } ?>
								</div>
                            </div>
						</div>
                    </div>

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
                </div>  <!-- Start Rightside - Product Type View -->
            </div>
        </div>
    </main>  <!-- :::::: End MainContainer Wrapper :::::: -->

	<?php include('static/footer.php')?>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="js/vendor/jquery-ui.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>

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