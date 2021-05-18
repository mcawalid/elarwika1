<?php
	if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/fonctions.php");
	include("static/secure_sql.php");
	require('static/vote/_drawrating.php');
	
	$req = "SELECT p.description_complet,p.disponible,p.prix,p.id,p.nom,c.nom as categorie,p.nb_vue from produit p,categorie c where p.id_categorie=c.id order by p.id DESC,p.id DESC LIMIT 15";
	mysqli_query($base,"SET NAMES UTF8");
	$list_last = mysqli_query($base, $req);
	
//	$req = "SELECT p.description_complet,p.disponible,p.prix,p.id,p.nom,c.nom as categorie,p.nb_vue from produit p,categorie c where p.id_categorie=c.id and p.id in ( SELECT id_produit FROM `commande_detail` d group by id_produit order by count(*) desc ) limit 10";
$req = "SELECT p.description_complet,p.disponible,p.prix,p.id,p.nom,c.nom as categorie,p.nb_vue from produit p,categorie c where p.id_categorie=c.id order by p.ordre DESC,p.id DESC LIMIT 15";
	mysqli_query($base,"SET NAMES UTF8");
	$list_commande = mysqli_query($base, $req);
	/*
	$req = "Select * From service order by id LIMIT 3";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_service=mysqli_query($base, $req);
	*/
	$req = "Select * From slide order by id DESC LIMIT 6";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_slide=mysqli_query($base, $req);
	


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Site vente</title>

    <link rel="stylesheet" href="css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="css/vendor/fontawesome.css">
    <link rel="stylesheet" href="css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/plugin/slick.css">
    <link rel="stylesheet" href="css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="css/plugin/price_range_style.css">
    <link rel="stylesheet" href="css/plugin/in-number.css">
    <link rel="stylesheet" href="css/plugin/venobox.min.css">
    <link rel="stylesheet" href="css/plugin/jquery.lineProgressbar.css">


    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/rating.css" />
<style>
.current-rating{
	display:none;
}
</style>
</head>

<body>

    <?php include('static/header.php')?>


    <main id="main-container" class="main-container">
        <div class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
            
			<?php while($slide=mysqli_fetch_array($liste_slide)){?>
			<div class="hero-slider">
                <img src="images/slide/<?php echo $slide['image'] ?>" alt="">
                <div class="hero__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="hero__content--inner">
                                    <h1 class="title__hero title__hero--xlarge font--regular text-uppercase"><?php echo $slide['titre']?></h1>
                                    <h4 class="title__hero title__hero--small font--regular"><?php echo $slide['description']?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
		</div>

        <div class="banner m-t-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="banner__box">
                            <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                                <a href="categorie.php" class="banner__link">
                                    <img src="images/slide.png" alt="" class="banner__img">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="banner__box">
                            <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                                <a href="categorie.php" class="banner__link">
                                    <img src="images/promo.jpg" alt="" class="banner__img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                         <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Top categories</h5>
                            <a href="categorie.php" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">Tous les catégories <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product__catagory">
							<?php
								$req = "SELECT c.id,c.nom,c.image,count(*) as count FROM categorie c,produit p where p.id_categorie=c.id group by c.id,c.nom,c.image order by c.ordre DESC LIMIT 10";
								mysqli_query($base,"SET NAMES UTF8");
								$list_menu_cat = mysqli_query($base, $req);
								while($menu_cat=mysqli_fetch_array($list_menu_cat)){
							?>
								<div class="product__catagory--single">
									<div class="product__content product__content--catagory">
										<a href="categorie.php?id=<?php echo $menu_cat['id']?>" class="product__link"><?php echo $menu_cat['nom']?></a>
										<span class="product__items--text"><?php echo $menu_cat['count']?> Produit</span>
									</div>
									<div class="product__img-box product__img-box--catagory">
										<a href="categorie.php?id=<?php echo $menu_cat['id']?>" class="product__img--link">
											<img class="product__img img-fluid" src="images/gallery/categorie/<?php echo $menu_cat['image']?>" alt="">
										</a>
									</div>
								</div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                         <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Top ventes</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content tab-animate-zoom">
                            <!-- Start Single Tab Item -->
                            <div class="tab-pane show active" id="fruits">
                                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                                    <div class="product-default-slider-4grid-2rows gap__col--30 gap__row--40">
        
										<?php while($commande=mysqli_fetch_array($list_commande)) {?>
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
										<?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                         <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Nouveaux produits</h5>
                            <a href="categorie.php" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">Tous les produits<i class="fal fa-angle-right"></i></a>
                        </div>  <!-- End Section Title -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="default-slider default-slider--hover-bg-red product-default-slider">
                            <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">
                                <?php while($last=mysqli_fetch_array($list_last)) {?>
                                  <div class="product__box product__default--single text-center">
                                  	<div class="product__img-box  pos-relative">
                                          <a href="produit.php?id=<?php echo $last['id']?>" class="product__img--link">
												<?php
													$req = "SELECT lien from produit_img WHERE id_produit=".$last['id']." ORDER BY id DESC LIMIT 1";
													mysqli_query($base,"SET NAMES UTF8");
													$liste_images = mysqli_query($base,$req);
													$img_to_show="default.png";
													if(mysqli_num_rows($liste_images)!=0)
													{
														$img=mysqli_fetch_array($liste_images);
														$img_to_show=$img['lien'];
													}
												?>
												<img src="images/gallery/produit/<?php echo $img_to_show; ?>" class="product__img img-fluid" alt="<?php echo $last['nom']?>" style="width:480px;height:300px">
                                          </a>
                                          <?php if($last['disponible']==1){?>
												<span class="product__label product__label--sale-out">Disponible</span>
											<?php } ?>
											
                                          <ul class="product__action--link pos-absolute">
                                              <li>
													<form action="#" method="post" style='float: left;margin-right: 3px;'>
														<fieldset>
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="business" value=" ">
															<input type="hidden" name="item_name" value="<?php echo $last['nom']?>">
															<input type="hidden" name="amount" value="<?php echo $last['prix']?>">
															<input type="hidden" name="discount_amount" value="0">
															<input type="hidden" name="currency_code" value="USD">
															<ul style="display:none">
																<li>
																	<select name="os0">
																		<option value="<?php echo $last['id']?>"></option>
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
                                              <li><a href="follow.php?id=<?php echo $last['id']?>"><i class="icon-heart"></i></a></li>
                                              <li><a href="produit.php?id=<?php echo $last['id']?>" data-toggle="modal"><i class="icon-eye"></i></a></li>
                                          </ul>
                                      </div>
										
                                      <div class="product__content m-t-20">
                                          <a href="produit.php?id=<?php echo $last['id']?>" class="product__link"><?php echo $last['nom']?></a>
                                          <div class="product__price m-t-5">
                                              <span class="product__price"><?php echo $last['prix']?> DA</span>
                                          </div>
                                      </div>
                                  </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="newsletter m-t-100 pos-relative">
            <div class="newsletter__bg">
                <img src="images/newsletter-bg-large.jpg" alt="">
            </div>
            <div class="newsletter__content pos-absolute absolute-center text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-content__inner">
                                <h2>Abonnez-vous à notre newsletter</h2>
                            </div>
                        </div>
                        <div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                            <div class="newsletter__form-content pos-relative">
                                <label class="pos-absolute" for="newsletter-mail"><i class="icon-mail"></i></label>
                                <input type="email" name="newsletter-mail" id="newsletter_mail" placeholder="Votre email">
                                <button class="text-uppercase pos-absolute" type="submit" id="newsletter-button" >S'inscrire</button>
                            </div>
							<br/>
							<center id="newsletter_resultat" style="color:#fff;background: #4285f4;font-size: 13px;"></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
<script>
$(function() {
     $('#newsletter-button').bind('click', function(e) {
		if($('#newsletter_mail').val()=="") {
			$('#newsletter_resultat').html("Veuillez introduire votre mail");
			return;
		}
	
         e.preventDefault();

		$('#newsletter_resultat').html("<center id='newsletter_resultat'>Veuillez patientez ...</center>");
		$.ajax(
		{
			url : 'js/newsletter.php',
			type: 'POST',
			dataType:'json',
			data : {
				newsletter_mail:$('#newsletter_mail').val(),
			},
			success: function(response, status) {
				$('#newsletter_resultat').html("<center id='newsletter_resultat'>"+response.resultat+"</center>");
			},
			error: function(err) {
				console.log(err);
				$('#newsletter_resultat').html("<center id='newsletter_resultat'>Une erreur s'est produit lors le l'abonnement, Veuillez réessayer SVP !</center>");
			},
			complete:function(){}
		}
		);
		
	});
 });
</script>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
</body>

</html>
