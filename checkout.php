<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/secure_sql.php");
	include("static/fonctions.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Finaliser vos achats - Site vente</title>

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
                        <li class="page-breadcrumb__nav active">Finaliser vos achats</li>
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
                        <h5 class="section-content__title text-center">Finaliser vos achats</h5>
                    </div>
                </div>
                <!-- Start Login Area -->
                <div class="col-lg-12 col-12">
					<div>
						<div id="resultat" style="display:none"></div>
						<div id="cart_div">
							<table id="tblList" class="table table-striped">
								<tr>
									<th>N° du produit</th>
									<th>Nom</th>
									<th class="text-right">Prix unitaire</th>
									<th class="text-center">Quantité</th>
									<th class="text-right">Totale</th>
								</tr>
							</table>
							
							
							<div class="col-md-12">
								<div class="product-details">
									<hr/>
									<h2 class="product-name">Retrait des produits :</h2>
									<br/>
									<?php if(isset($_SESSION['id_vente'])){
										$req = sprintf("SELECT * FROM user WHERE id=%s",GetSQLValueString($_SESSION['id_vente'],"int",$base));
										mysqli_query($base,"SET NAMES UTF8");
										$user=mysqli_fetch_array(mysqli_query($base, $req));
									?>
									<form method="POST" action="espace_panier.php" id="formID">
										<div class="row">
											<div class="form-group col-md-6">
												<label><b>Nom et Prénom *</b></label>
												<input id="nom" readonly name="nom" type="text" value="<?php echo $_SESSION['vente_name']?>" placeholder="Nom et Prénom" class="form-control" required>
											</div>
											<br/>
											<div class="form-group col-md-6">
												<label><b>Email *</b></label>
												<input id="email" readonly name="email" type="email" value="<?php echo $user['email']?>" placeholder="Email" class="form-control" required>
											</div>
											<div style="clear:both"></div>
											<br/>
											<div class="form-group col-md-6">
												<label><b>Téléphone *</b></label>
												<input id="telephone" readonly name="telephone" type="text" value="<?php echo $user['telephone']?>" placeholder="Téléphone" class="form-control" required>
											</div>
											<br/>
											<div class="form-group col-md-6">
												<label><b>Type de retrait *</b></label>
												<select name="retrait" id="retrait" class="form-control input-sm" required >
													<option value="" >Veuillez choisir un type de retrait</option>
													<option value="0" >Le retrait au magazin</option>
													<option value="1" >Livraition programmé</option>
												</select>
											</div>
											<div style="clear:both"></div>
											<br/>
											<div class="form-group col-md-12">
												<label><b>Date de livraison *</b></label>
												<input id="date" name="date" type="text" value="<?php echo date("d/m/Y"); ?>" placeholder="Date" class="form-control datepicker" required>
											</div>
											<div style="clear:both"></div>
											<br/>
											<div class="form-group col-md-12">
												<label><b>Heure de livraison *</b></label>
												<div class="row">
													<div class="form-group col-md-6">
														<select name="heure" id="heure" class="form-control" required>
															<option value="">Veuillez choisir l'heure</option>
															<?php for($i=8;$i<=20;$i++) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> heure</option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group col-md-6">
														<select name="minute" id="minute" class="form-control" required >
															<option value="">Veuillez choisir la minute</option>
															<?php for($i=0;$i<=59;$i++) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> minute</option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div style="clear:both"></div>
											<br/>
											<div class="form-group">
												<div class="col-md-12 widget-right">
													<a href="categorie.php" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold pull-lef">Continuer vos achat</a>
													<button type="button" id="btn" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold pull-right">Commander</button>
												</div>
											</div>
											
										</div>
									</form>
									<?php }else { ?>
										Veuillez vous <a href="login.php">connecter</a> pour pouvoir terminer vos achats
									<?php } ?>
								</div>
							</div>
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
<script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
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
$(document).ready(function() {
	var count=0;
	if(paypal.minicart.cart.items().length==0){
		$("#resultat").html('<div class="" role="alert">'+
			'Votre panier est vide, Merci de choisir vos produits en <a href="categorie.php">cliquant ici</a></div><br/><br/><br/><br/><br/><br/>');
		$('#resultat').css('display','block');
		$('#cart_div').css('display','none');
	}else {
		for(i=0;i<paypal.minicart.cart.items().length;i++){
			var product = paypal.minicart.cart.items()[i];
			$('#tblList tr:last').after('<tr><td>'+product._options[0].value+'</td><td>'+product._data.item_name+'</td><td style="text-align: right;">'+product._data.amount.toFixed(2)+' DA</td><td style="text-align: center;">'+product._data.quantity+'</td><td style="text-align: right;">'+(product._data.amount*product._data.quantity).toFixed(2)+' DA</td></tr>');
			count+=product._data.amount*product._data.quantity;
		}
		
		$('#tblList tr:last').after('<tr><th colspan="4"></th><th style="text-align: right;">'+count.toFixed(2)+' DA</th></tr>');
		
		$('#btn').click(function(){
			
			if(	($('#nom').val().trim()=="") ||
				($('#email').val().trim()=="") ||
				($('#telephone').val().trim()=="") ||
				($('#retrait').val().trim()=="") ||
				($('#heure').val().trim()=="") ||
				($('#minute').val().trim()=="") ||
				($('#date').val().trim()=="")){
					alert("Veuillez remplir tous les champs SVP .. ");
					return false;
				}
			if(!confirm("Vous étes sur de vouloir commander "+paypal.minicart.cart.items().length+" produits ("+count.toFixed(2)+" DA) ?")){
				return;
			}

			$.ajax(
				{
					url : 'js/commande.php',
					type: 'POST',
					async: false,
					dataType:'json',
					data: {
						items : JSON.stringify(paypal.minicart.cart.items()),
						nom:$('#nom').val().trim(),
						email:$('#email').val().trim(),
						telephone:$('#telephone').val().trim(),
						retrait:$('#retrait').val().trim(),
						heure:$('#heure').val().trim(),
						minute:$('#minute').val().trim(),
						date:$('#date').val().trim(),
					},
					success: function(response, status) {
						if(response.erreur =="non") {
							$("#resultat").html('<div class="" role="alert">'+
								'Votre demande a été bien enregistrer, Merci pour votre confiance<br/><br/>'+
								'Un commerciale vous contactera dans les bréves délais pour continuer la procédure du livraision<br/><br/>'+
								'Votre numéro de commande est : <b>'+response.resultat+'</b>, Merci de garder ce numéro afain d\'étre identifier<br/><br/>'+
								'Pour plus d\'informations vous pouvez nous contacter en <a href="contact.php">cliquant ici</a></div>');
							$('#resultat').css('display','block');
							$('#cart_div').css('display','none');
							paypal.minicart.reset();
						}
						else if(response.erreur =="yes"){
							alert('Une erreur c\'est produit, merci de réessayer');
							$('#resultat').css('display','none');
							$('#cart_div').css('display','block');
						}
						},
					error: function(err) {
						console.log(err);
						alert('Une erreur c\'est produit, merci de réessayer');
						$('#resultat').css('display','none');
						$('#cart_div').css('display','block');
					},
					complete:function(){
					}
				}
				);
		});
	}
});
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
 
 $('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: new Date(),
   });
</script>
</body>

</html>
