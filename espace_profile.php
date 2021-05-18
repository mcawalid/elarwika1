<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/restreindre.php");
	include("static/secure_sql.php");
	include("static/fonctions.php");
	
	$erreur="";
	if(	(isset($_POST['nom']) && $_POST['nom']!=null) &&
		(isset($_POST['prenom']) && $_POST['prenom']!=null) &&
		(isset($_POST['wilaya']) && $_POST['wilaya']!=null) &&
		(isset($_POST['commune']) && $_POST['commune']!=null) &&
		(isset($_POST['genre']) && $_POST['genre']!=null) &&
		(isset($_POST['email']) && $_POST['email']!=null) &&
		(isset($_POST['telephone']) && $_POST['telephone']!=null) &&
		(isset($_POST['adresse']) && $_POST['adresse']!=null)){
			
			
			$email=preg_replace('#(<|>)#', '-', $_POST['email']);  
			$nom=preg_replace('#(<|>)#', '-', $_POST['nom']);  
			$prenom=preg_replace('#(<|>)#', '-', $_POST['prenom']);  
			$genre=preg_replace('#(<|>)#', '-', $_POST['genre']);  
			$adresse=preg_replace('#(<|>)#', '-', $_POST['adresse']);  
			$wilaya=preg_replace('#(<|>)#', '-', $_POST['wilaya']);  
			$commune=preg_replace('#(<|>)#', '-', $_POST['commune']);  
			$telephone=preg_replace('#(<|>)#', '-', $_POST['telephone']);
			
			$req = sprintf("UPDATE user SET nom=%s, `prenom`=%s, `wilaya`=%s,`commune`=%s,`genre`=%s,`email`=%s,`telephone`=%s, `adresse`=%s WHERE id=%s",
					GetSQLValueString($nom, "text",$base),
					GetSQLValueString($prenom, "text",$base),
					GetSQLValueString($wilaya, "text",$base),
					GetSQLValueString($commune, "text",$base),
					GetSQLValueString($genre, "text",$base),
					GetSQLValueString($email, "text",$base),
					GetSQLValueString($telephone, "text",$base),
					GetSQLValueString($adresse, "text",$base),
					GetSQLValueString($_SESSION['id_vente'], "int",$base));
				mysqli_query($base,"SET NAMES UTF8");
				mysqli_query($base,$req);
				
				$_SESSION['vente_name'] = $_POST['nom']." ".$_POST['prenom'];
				$_SESSION['vente_name'] = $_POST['nom']." ".$_POST['prenom'];
				
				$erreur="Vos informations ont été modifié avec succès";
			
		}
	
	$sql = sprintf("SELECT * FROM user WHERE id=%s",
		GetSQLValueString($_SESSION['id_vente'], "int",$base));
	mysqli_query($base,"SET NAMES UTF8");
	$liste_user=mysqli_query($base, $sql);
	if(mysqli_num_rows($liste_user)!=1){
		echo "<script>window.location.href ='login.php'; </script>";
		exit();
	}
	$user=mysqli_fetch_array($liste_user);
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
                                <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
									<div class="my-account-dashboard account-wrapper">
									<h3>Modifier votre profile</h3>
									<hr/>
									<?php if (!empty($erreur)){ ?>
										<div class="alert alert-primary" role="alert">
											<?php echo $erreur; ?>
										</div>
									<?php } ?>
									<form action="espace_profile.php" method="POST">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													Pseudo : <br/><input readonly type="text" value="<?php echo $user['pseudo']?>" name="pseudo" id="pseudo" class="form-control input-sm" placeholder="Pseudo">
												</div>
											</div>
											<div style="clear:both"></div><br/>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													Nom : <br/><input type="text" required="required" value="<?php echo $user['nom']?>" name="nom" id="nom" class="form-control input-sm" placeholder="Nom">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													Prénom : <br/><input type="text" required="required" value="<?php echo $user['prenom']?>" name="prenom" id="prenom" class="form-control input-sm" placeholder="Prénom">
												</div>
											</div>
											<div style="clear:both"></div><br/>
											<div class="col-md-12">
												<div class="form-group">
													Gender :<br/>
													<label><input name="genre" type="radio" value="0" <?php if($user['genre']==0) echo "checked"; ?>> Homme </label>
													<label><input name="genre" type="radio" value="1" <?php if($user['genre']==1) echo "checked"; ?>> Femme </label>
												</div>
											</div>
										</div>
										<div style="clear:both"></div><br/>
										<div class="row" >
											<div class="col-md-6">
												<div class="form-group">
													Wilaya : <br/>
													<select name="wilaya" id="wilaya" required="required" class="form-control input-sm validate[required]">
														<option value="" >Veuillez choisir votre wilaya</option>
														<option value="1" >01 Adrar</option>
														<option value="2" >02 Chlef</option>
														<option value="3" >03 Laghouate</option>
														<option value="4" >04 Oumbouaghi</option>
														<option value="5" >05 Batna</option>
														<option value="6" >06 Bejaia</option>
														<option value="7" >07 Biskra</option>
														<option value="8" >08 Béchar</option>
														<option value="9" >09 Blida</option>
														<option value="10" >10 Bouira</option>
														<option value="11" >11 Tamanrasset</option>
														<option value="12" >12 Tébessa</option>
														<option value="13" >13 Tlemcen</option>
														<option value="14" >14 Tiaret</option>
														<option value="15" >15 Tizi Ouzou</option>
														<option value="16" >16 Alger</option>
														<option value="17" >17 Djelfa</option>
														<option value="18" >18 Jijel</option>
														<option value="19" >19 Setif</option>
														<option value="20" >20 Saïda</option>
														<option value="21" >21 Skikda</option>
														<option value="22" >22 Sidi belabess</option>
														<option value="23" >23 Annaba</option>
														<option value="24" >24 Guelma</option>
														<option value="25" >25 Constantine</option>
														<option value="26" >26 Medea</option>
														<option value="27" >27 Mostaganeme</option>
														<option value="28" >28 M'Sila</option>
														<option value="29" >29 Maskara</option>
														<option value="30" >30 Ouargla</option>
														<option value="31" >31 Oran</option>
														<option value="32" >32 El Bayadh</option>
														<option value="33" >33 Illizi</option>
														<option value="34" >34 Bordj Bouariridj</option>
														<option value="35" >35 Boumerdes</option>
														<option value="36" >36 El Tarf</option>
														<option value="37" >37 Tindouf</option>
														<option value="38" >38 Tissemsilt</option>
														<option value="39" >39 El Oued</option>
														<option value="40" >40 Khenchela</option>
														<option value="41" >41 Souk Ahras</option>
														<option value="42" >42 Tipaza</option>
														<option value="43" >43 Mila</option>
														<option value="44" >44 Ain defla</option>
														<option value="45" >45 Naâma</option>
														<option value="46" >46 Témouchent</option>
														<option value="47" >47 Ghardaia</option>
														<option value="48" >48 Ghelizane</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													Commune : <br/>
													<select name="commune" id="commune" required="required" class="form-control input-sm validate[required]">
														<option value="<?php echo $user['commune']?>" ><?php echo getCommune($user['wilaya'],$user['commune'])?></option>
													</select>
												</div>
											</div>
										</div>
										<div style="clear:both"></div><br/>
										<div class="row" >
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													Adresse : <br/><textarea required="required" rows="2" name="adresse" id="adresse" placeholder="Adresse" class="form-control" /><?php echo $user['adresse']?></textarea>
												</div>
											</div>
										</div>
										<div style="clear:both"></div><br/>
										<div class="row" >
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													Email : <br/><input required="required" type="email" value="<?php echo $user['email']?>" name="email" id="email" class="form-control input-sm" placeholder="Email">
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													Téléphone : <br/><input required="required" type="text" value="<?php echo $user['telephone']?>" name="telephone" id="telephone" class="form-control input-sm" placeholder="Téléphone">
												</div>
											</div>
										</div>
										<div style="clear:both"></div><br/>
										<div class="row">
											<div class="col-md-12">
												<hr/>
												<center>
													<input type="submit" value="Modifier mes informations" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold">
													<a href="espace_picture.php" class="btn btn--box btn--medium btn--radius-tiny btn--black btn--black-hover-green btn--uppercase font--bold">Modifier photo de profile</a>
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
    <script src="js/wilaya.js"></script>
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
