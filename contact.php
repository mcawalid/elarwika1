<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/fonctions.php");
	include("static/secure_sql.php");

	$erreur="";

	if (isset($_POST['message']))
	{  
		if(!(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])){
			$erreur="<div class='msg_err'>Les chiffres que vous avez introduit ne sont pas juste, Veuillez réssayer.</div>";
			$objet='';
			$votremail='';
			$message='';  
		}
		else {
			$verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';  

			$message=preg_replace('#(<|>)#', '-', $_POST['message']);  
			$message=str_replace('"', "'",$message);  
			$message=str_replace('&', 'et',$message);  
			$objet=preg_replace('#(<|>)#', '-', $_POST['objet']);  
			$objet=str_replace('"', "'",$objet);  
			$objet=str_replace('&', 'et',$objet);  

			$votremail=stripslashes(htmlentities($_POST['votremail']));  
			$message=stripslashes(htmlspecialchars($message));  
			$objet=stripslashes(htmlspecialchars($objet));  
															
			//on enlève les espaces  
			$votremail=trim($votremail);  
			$message=trim($message);  
			$objet=trim($objet);  

			if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))  
			{  
				//les 3 champs sont vides  
				if(empty($votremail)and(empty($message))and(empty($objet)))  
				{  
					$erreur="<div class='msg_err'>Il faut remplire tous les champs</div>";
				}  
				//un des champs est vide  
				else  
				{  
					if(!preg_match($verif,$votremail))  
						$erreur="<div class='msg_err'>L'adresse mail que vous avez introduit n'est pas juste, Veuillez réssayer</div>";
					else  
						$erreur="<div class='msg_err'>Il faut remplire tous les champs</div>";
				}  
			}  
			else  
			{  
				$domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);  
				$DomaineMailExiste=checkdnsrr($domaine,'MX');
				if(!$DomaineMailExiste)  
					$erreur="<div class='msg_err'>L'adresse mail que vous avez introduit n'est pas juste, Veuillez réssayer</div>";

				
				$headers = "From: Contact <".$votremail.">";
				
				$distination="contact@elarwika.com";
				
				if(@mail($distination,$objet,$message,$headers))  
				{  
					$erreur="<div class='msg_succes'>Votre message a été envoyé avec succes</div>";
				}  
				else  
					$erreur="<div class='msg_err'>Une erreur s'est produit lors l'envoie du mail, Veuillez réssayer</div>";
			}
		}
	}  
	else  
	{  
		$erreur= "";
		$objet='';
		$votremail='';
		$message='';
	} 
						
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Contact - Site vente</title>

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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="css/vendor/vendor.min.css"/>
    <link rel="stylesheet" href="css/plugin/plugins.min.css"/>
    <link rel="stylesheet" href="css/main.min.css"> -->

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
                        <li class="page-breadcrumb__nav active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::: Start Main Container Wrapper :::::: -->
    <main id="main-container" class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.801549241362!2d3.0347274156317856!3d36.72732707949748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fada56c7a3edf%3A0xeee94bd319a88f72!2sLotissement%20kardouna%20Birkhadem!5e0!3m2!1sfr!2sdz!4v1618160306977!5m2!1sfr!2sdz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="contact-info-wrap gray-bg m-t-40">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="tel:0551515151">+213551515151</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="mailto:contact@elarwika.com">contact@elarwika.com</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <span>Cité 1400 Logement</span>
                                <span>Birkhadem , Alger</span>
                            </div>
                        </div>
                        <div class="contact-social m-t-40">
                            <h5>Suivez nous</h5>
                            <div class="social-link">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form gray-bg m-t-40">
                        <div class="section-content">
                            <h5 class="section-content__title">Contactez nous</h5>
                        </div>
						<?php if (!empty($erreur)){ ?>
							<div class="alert alert-primary" role="alert">
								<?php echo $erreur; ?>
							</div>
						<?php } ?>
                        <form class="contact-form-style" id="contact-form" action="contact.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box__single-group">
                                        <input type="text" name="nom" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-box__single-group">
                                        <input type="email" name="votremail" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-box__single-group">
                                        <input type="text" name="objet" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box__single-group" >
                                        <textarea rows="10" name="message" placeholder="Votre Messege" required></textarea>
                                    </div>
                                </div>
								
								<div class="col-lg-12">
									<div class="form-box__single-group">
										<span id="messageHelp" class="form-text text-muted" >Retappez les chiffres <img src="images/captcha.php" width="50" height="24" title="captcha" alt="captcha" style="vertical-align: middle;width: 66px;"/></span><br/>
										<input type="number" name="captcha" class="form-control" id="captcha" value="" size="4" />
									</div>
                                    <button class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold m-t-30" type="submit">Envoyer</button>
								</div>
                            </div>
                        </form>
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