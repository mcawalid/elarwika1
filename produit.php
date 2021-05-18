<?php
if (!isset($_SESSION)) {
  session_start();
} 

	require_once('static/connection.php');
	include("static/secure_sql.php");
	include("static/fonctions.php");
	require('static/vote/_drawrating.php');
	
	
	if(!(isset($_GET['id']) && $_GET['id']!=null)) {
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}

	$id=intval($_GET['id']);
	
	$req = "Select p.disponible,p.id,p.nom as nom,p.date,p.description_complet,p.nb_vue, c.nom as categorie,p.id_categorie,p.prix From produit p,categorie c where p.id=$id and p.id_categorie=c.id";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle=mysqli_query($base, $req);
	if(mysqli_num_rows($selectcle)==0){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	$resultat = mysqli_fetch_assoc ($selectcle);
	
	$req = "UPDATE produit SET nb_vue=nb_vue+1 where id=$id";
	mysqli_query($base, $req);;
	
	$req="select * from produit_img where id_produit=".$resultat['id']." order by id desc";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_images=mysqli_query($base, $req);
	$nb_img=mysqli_num_rows($liste_images);

	$req="select * from produit where id_categorie=".$resultat['id_categorie']." and id<>$id order by id desc limit 5";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_similaire=mysqli_query($base, $req);
	
	
	// if comment
	if(isset($_POST['commentBTN'])){
		if(!(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])){
			$erreur="Les chiffres que vous avez introduit ne sont pas juste";
		}
		else {
			if((isset($_POST['nom']) && $_POST['nom']!=null) &&
				(isset($_POST['tbxComment']) && $_POST['tbxComment']!=null)){
					$comment=trim(strip_tags($_POST['tbxComment']));
					$req=sprintf("INSERT INTO comment(id,id_user,id_produit,comment,date) values (NULL,%s,%s,%s,NOW())",
						GetSQLValueString($_SESSION['id_vente'], "int",$base),
						GetSQLValueString($id, "int",$base),
						GetSQLValueString($comment, "text",$base));
				mysqli_query($base,"SET NAMES UTF8");
				$selectcle=mysqli_query($base, $req);
				$erreur="Votre commentaire a été envoyer avec succés, il sera publier aprés la validation";
			}
		}
	}
	
	// COMMENTS LIST
	$req = "SELECT * FROM comment WHERE id_produit=$id AND valide=1 ORDER BY id DESC LIMIT 100";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_comment=mysqli_query($base, $req);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title><?php echo $resultat['nom']." - ".$resultat['categorie']?></title>

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
	<link rel="stylesheet" type="text/css" href="css/rating.css" />
</head>

<body>
    
	<?php include('static/header.php')?>
	
    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Accueil</a></li>
                        <li class="page-breadcrumb__nav"><a href="categorie.php?id=<?php echo $resultat['id_categorie']?>"><?php echo $resultat['categorie']?></a></li>
                        <li class="page-breadcrumb__nav active"><?php echo $resultat['nom']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- :::::: Start Main Container Wrapper :::::: -->
    <main id="main-container" class="main-container">

        <!-- Start Product Details Gallery -->
        <div class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product-gallery-box product-gallery-box--default m-b-60">
                            <div class="product-image--large product-image--large-horizontal">
								<?php if($nb_img==0){?>
									<img class="img-fluid" id="img-zoom" src="images/gallery/produit/default.png" alt="">
								<?php }else {
									$image=mysqli_fetch_array($liste_images);
									?>
									<img class="img-fluid" id="img-zoom" src="images/gallery/produit/<?php echo $image['lien']?>" alt="">
								<?php }?>
                            </div>
                            <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal pos-relative">
								<?php if($nb_img==0){?>
									<a class="zoom-active" data-image="images/gallery/produit/default.png" data-zoom-image="images/gallery/produit/default.png">
										<img class="img-fluid" src="images/gallery/produit/default.png" alt="">
									</a>
								<?php }else {
									mysqli_data_seek($liste_images,0);$i=0;
									while($image=mysqli_fetch_array($liste_images)){
									?>
									<a <?php if($i==0) echo 'class="zoom-active"'; ?> data-image="images/gallery/produit/<?php echo $image['lien']?>" data-zoom-image="images/gallery/produit/<?php echo $image['lien']?>">
										<img class="img-fluid" src="images/gallery/produit/<?php echo $image['lien']?>" alt="">
									</a>
								<?php $i=1;}}?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="product-details-box m-b-60">
                            <h4 class="font--regular m-b-20"><?php echo $resultat['nom']?></h4>
                            <ul class="product__review">
                                <?php echo rating_bar("p-".$resultat['id'],5); ?>
                            </ul>
                            <div class="product__price m-t-5">
                                <span class="product__price product__price--large"><?php echo $resultat['prix']?> DA</span>
                            </div>

                            <div class="product__desc m-t-25 m-b-30">
                                <p>
									<?php echo $resultat['description_complet']?>
								</p>
                            </div>
                            <div class="product-var p-tb-30">
                                <div class="product-quantity product-var__item">
                                    <ul class="product-modal-group">
                                        <li>
											<a href="#" data-toggle="modal"  class="link--gray link--icon-left"><i class="fal fa-money-check-edit"></i>
												<?php if($resultat['disponible']==0) echo "Produit non disponible"; else echo "Produit disponible"; ?>
											</a>
										</li>
                                        <li><a href="contact.php" data-toggle="modal"  class="link--gray link--icon-left"><i class="fal fa-envelope"></i>Vous avez une question</a></li>
                                    </ul>
                                </div>
								<?php if (isset($_GET['follow'])){ ?>
									<?php if ($_GET['follow']==1){ ?>
									<div class="alert alert-success" role="alert">Ce produit a été bien ajouter a votre liste de favoris</div>
								<?php }elseif ($_GET['follow']==0){ ?>
									<div class="alert alert-primary" role="alert">Ce produit existe déja sur votre liste de favoris</div>
								<?php }} ?>
                                <div class="product-var__item">
                                    <form action="#" method="post" style='float: left;margin-right: 3px;'>
										<fieldset>
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="business" value=" ">
											<input type="hidden" name="item_name" value="<?php echo $resultat['nom']?>">
											<input type="hidden" name="amount" value="<?php echo $resultat['prix']?>">
											<input type="hidden" name="discount_amount" value="0">
											<input type="hidden" name="currency_code" value="USD">
											<ul style="display:none">
												<li>
													<select name="os0">
														<option value="<?php echo $resultat['id']?>"></option>
													</select>
													<input type="hidden" name="on0" value="ID" />
												</li>
											</ul>
											<input type="hidden" name="return" value=" ">
											<input type="hidden" name="cancel_return" value=" ">
											<button type="submit" name="submit" class="btn btn--long btn--radius-tiny btn--green btn--green-hover-black btn--uppercase btn--weight m-r-20">Ajouter au panier</button>
										</fieldset>
									</form>
                                    <a href="follow.php?id=<?php echo $resultat['id']?>" class="btn btn--round btn--round-size-small btn--green btn--green-hover-black"><i class="fas fa-heart"></i></a>
                                </div>
								
                                <div class="product-var__item d-flex align-items-center">
                                    <span class="product-var__text">Partager : </span>
									
                                    <ul class="product-social m-l-20">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Product Details Gallery -->

        <!-- Start Product Details Tab -->
        <div class="product-details-tab-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-details-content">
                            <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-30 nav">
                                <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Commentaires</a></li>
                            </ul>
                            <div class="product-details-tab-box">
                                <div class="tab-content">
                                    <!-- Start Tab - Product Review -->
                                    <div class="tab-pane show active" id="product-review">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <?php if(mysqli_num_rows($liste_comment)==0){  ?>
												<div><p><br/>Ce produit ne pocéde aucun commentaire</p></div>
											<?php } else { ?>
												<?php while($comment=mysqli_fetch_array($liste_comment)){ 
														$req = "SELECT pseudo,avatar from user where id=".$comment['id_user'];
														mysqli_query($base, "SET NAMES UTF8");
														$user = mysqli_fetch_array(mysqli_query($base, $req));
												?>
													<li class="comment__list">
														<div class="comment__wrapper">
															<div class="comment__img">
																<img src="images/gallery/user/<?php echo $user['avatar']?>" class="rounded-circle profile-image">
															</div>
															<div class="comment__content" style="width: 100%;">
																<div class="comment__content-top">
																	<div class="comment__content-left">
																		<h6 class="comment__name"><?php echo $user['pseudo']; ?></h6>
																	</div>
																	<div class="comment__content-right">
																		<p class="link--gray link--icon-left m-b-5"><i class="fas fa-clock"></i> <?php echo $comment['date']?></p>
																	</div>
																</div>
																
																<div class="para__content">
																	<p class="para__text">
																		<?php echo nl2br($comment['comment']); ?>
																	</p>
																</div>
															</div>
														</div>
													</li>
												<?php } ?>
												<div style="clear:both"></div>
											<?php } ?>

                                        <div class="review-form m-t-40">
                                            <div class="section-content">
                                                <h6 class="font--bold text-uppercase">Ajouter un commentaire</h6>
												<?php if(!isset($_SESSION['id_vente'])){ ?>
													<p class="section-content__desc">Merci de vous <a href="login.php">connecter</a> pour pouvoir laisser votre commentaire</p>
												<?php }else{ ?>
                                            </div>
											<?php if (!empty($erreur)) { ?>
												<div class="alert bg-primary alert-warning text-white" role="alert">
													<?php echo $erreur; ?>
												</div>
											<?php }else { ?>
                                            <form method="POST" action="produit.php?id=<?php echo $id ?>" >
												Écrivez-nous vos impressions sur l'achat
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="form-name">Pseudo*</label>
                                                            <input readonly type="text " name="nom" id="form-name" value="<?php echo $_SESSION['vente_pseudo']?>">
                                                        </div>
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="form-name"><img src="images/captcha.php" width="50" height="24" title="captcha" alt="captcha" style="vertical-align: middle;width: 66px;"/></span><br/></label>
															<input class="text-input" type="number" required="required"  id="captcha" name="captcha" placeholder="Retappez les chiffres">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-box__single-group">
                                                            <label for="form-review">Votre message*</label>
															<textarea class="textarea" id="form-review" rows="8" required="required" name="tbxComment" onkeyup="CheckFieldLength(this, &#39;charcount3&#39;, &#39;remaining3&#39;, 1000);" onkeydown="CheckFieldLength(this, &#39;charcount3&#39;, &#39;remaining3&#39;, 1000);" onmouseout="CheckFieldLength(this, &#39;charcount3&#39;, &#39;remaining3&#39;, 1000);" onfocus="if(this.value==this.defaultValue)this.value=&#39;&#39;;" onblur="if(this.value==&#39;&#39;)this.value=this.defaultValue;" class="form-control" data-validation-engine="validate[required,minSize[3],maxSize[1000]]" placeholder="Votre commentaire"></textarea>
															<small>Caractéres restante : <span class="remaining" id="remaining3" style="color:red;">1000</span></small>
<script type="text/javascript">
//<![CDATA[
function CheckFieldLength(fn,wn,rn,mc) {
  var len = fn.value.length;
  if (len > mc) {
    fn.value = fn.value.substring(0,mc);
    len = mc;
  }
  document.getElementById(rn).innerHTML = mc - len;
}
//]]>
</script>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-12">
                                                        <button name="commentBTN" class="btn btn--box btn--small btn--black btn--black-hover-green btn--uppercase font--bold m-t-30" type="submit">Envoyer</button>
                                                    </div>
                                                </div>
											</form>
											<?php }} ?>
                                        </div>
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
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Produits similaires</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="default-slider default-slider--hover-bg-red product-default-slider">
                            <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">

                                <?php while($similaire=mysqli_fetch_array($liste_similaire)){?>
                                <div class="product__box product__default--single text-center">
                                	<div class="product__img-box  pos-relative">
                                        <a href="produit.php?id=<?php echo $similaire['id']?>" class="product__img--link">
											<?php
												$req = "SELECT lien from produit_img WHERE id_produit=".$similaire['id']." ORDER BY id DESC LIMIT 1";
												mysqli_query($base,"SET NAMES UTF8");
												$liste_images = mysqli_query($base,$req);
												$img_to_show="default.png";
												if(mysqli_num_rows($liste_images)!=0)
												{
													$img=mysqli_fetch_array($liste_images);
													$img_to_show=$img['lien'];
												}
											?>
											<img src="images/gallery/produit/<?php echo $img_to_show; ?>" class="product__img img-fluid" alt="<?php echo $similaire['nom']?>" style="width:480px;height:300px">
                                        </a>
                                        <?php if($similaire['disponible']==1){?>
											<span class="product__label product__label--sale-out">Disponible</span>
										<?php } ?>
										
                                        <ul class="product__action--link pos-absolute">
                                            <li>
											<form action="#" method="post" style='float: left;margin-right: 3px;'>
												<fieldset>
													<input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="add" value="1">
													<input type="hidden" name="business" value=" ">
													<input type="hidden" name="item_name" value="<?php echo $similaire['nom']?>">
													<input type="hidden" name="amount" value="<?php echo $similaire['prix']?>">
													<input type="hidden" name="discount_amount" value="0">
													<input type="hidden" name="currency_code" value="USD">
													<ul style="display:none">
														<li>
															<select name="os0">
																<option value="<?php echo $similaire['id']?>"></option>
															</select>
															<input type="hidden" name="on0" value="ID" />
														</li>
													</ul>
													<input type="hidden" name="return" value=" ">
													<input type="hidden" name="cancel_return" value=" ">
													<button type="submit" name="submit" style="margin-bottom: -12px;display: block;" ><a href="javascript::void(0)"><i class="icon-shopping-cart"></i></a></button>
												</fieldset>
											</form>
                                            <li><a href="follow.php?id=<?php echo $similaire['id']?>"><i class="icon-heart"></i></a></li>
                                            <li><a href="produit.php?id=<?php echo $similaire['id']?>"><i class="icon-eye"></i></a></li>
                                        </ul>
										
                                    </div>
									
                                    <div class="product__content m-t-20">
                                        <ul class="product__review">
                                            <center><?php echo rating_bar("p-".$similaire['id'],5); ?></center>
                                        </ul>
                                        <a href="produit.php?id=<?php echo $similaire['id']?>" class="product__link"><?php echo $similaire['nom']?></a>
                                        <div class="product__price m-t-5">
                                            <span class="product__price"><?php echo $similaire['prix']?> DA</span>
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

    <!-- Main js file that contents all jQuery plugins activation. -->
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
