<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('static/connection.php');
	include("static/secure_sql.php");
	include("static/fonctions.php");
	

	if(isset($_SESSION['id_vente'])){
		echo "<script>window.location.href ='espace.php'; </script>";
		exit();
	}
	
	$erreur="";
	$email=$email2=$nom=$prenom=$pseudo=$password=$password2=$genre=$adresse=$wilaya=$commune=$telephone="";
	if(isset($_POST['pseudo'])){
		if(!(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])){
			$erreur="Les chiffres que vous avez introduit ne sont pas juste";
		}
		else {
			
			if(isset($_POST['terme']) && $_POST['terme']==1){
			
				if(	(isset($_POST['email']) && $_POST['email']!=null) &&
					(isset($_POST['email2']) && $_POST['email2']!=null) &&
					(isset($_POST['nom']) && $_POST['nom']!=null) &&
					(isset($_POST['prenom']) && $_POST['prenom']!=null) &&
					(isset($_POST['pseudo']) && $_POST['pseudo']!=null) &&
					(isset($_POST['password']) && $_POST['password']!=null) &&
					(isset($_POST['password2']) && $_POST['password2']!=null) &&
					(isset($_POST['genre']) && $_POST['genre']!=null) &&
					(isset($_POST['adresse']) && $_POST['adresse']!=null) &&
					(isset($_POST['wilaya']) && $_POST['wilaya']!=null) &&
					(isset($_POST['commune']) && $_POST['commune']!=null) &&
					(isset($_POST['telephone']) && $_POST['telephone']!=null)){
						
						$email=preg_replace('#(<|>)#', '-', $_POST['email']);  
						$email2=preg_replace('#(<|>)#', '-', $_POST['email2']);  
						$nom=preg_replace('#(<|>)#', '-', $_POST['nom']);  
						$prenom=preg_replace('#(<|>)#', '-', $_POST['prenom']);  
						$pseudo=preg_replace('#(<|>)#', '-', $_POST['pseudo']);  
						$password=preg_replace('#(<|>)#', '-', $_POST['password']);  
						$password2=preg_replace('#(<|>)#', '-', $_POST['password2']);  
						$genre=preg_replace('#(<|>)#', '-', $_POST['genre']);  
						$adresse=preg_replace('#(<|>)#', '-', $_POST['adresse']);  
						$wilaya=preg_replace('#(<|>)#', '-', $_POST['wilaya']);  
						$commune=preg_replace('#(<|>)#', '-', $_POST['commune']);  
						$telephone=preg_replace('#(<|>)#', '-', $_POST['telephone']);
						
						if($email==$email2){
							if($password==$password2){
								
								// CHECK PSEUDO
								$req = sprintf("SELECT count(*) as count FROM  user WHERE pseudo=%s",
									GetSQLValueString($pseudo,"text",$base));
								mysqli_query($base,"SET NAMES UTF8");
								$tmp=mysqli_fetch_array(mysqli_query($base, $req));
								if($tmp['count']==0){
									// CHECK EMAIL
									$req = sprintf("SELECT count(*) as count FROM  user WHERE email=%s",
										GetSQLValueString($email,"text",$base));
									mysqli_query($base,"SET NAMES UTF8");
									$tmp=mysqli_fetch_array(mysqli_query($base, $req));
									if($tmp['count']==0){

										// REQ INSERTION
										$req = sprintf("INSERT INTO user (id, pseudo, email, password, nom, prenom, genre, wilaya, commune, adresse, telephone, date) ".
											"VALUES (NULL,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s, NOW())",
											GetSQLValueString($pseudo,"text",$base),
											GetSQLValueString($email,"text",$base),
											GetSQLValueString(md5($password),"text",$base),
											GetSQLValueString($nom,"text",$base),
											GetSQLValueString($prenom,"text",$base),
											GetSQLValueString($genre,"int",$base),
											GetSQLValueString($wilaya,"int",$base),
											GetSQLValueString($commune,"text",$base),
											GetSQLValueString($adresse,"text",$base),
											GetSQLValueString($telephone,"text",$base));
										mysqli_query($base,"SET NAMES UTF8");
										mysqli_query($base, $req);

										$_SESSION['id_vente']=mysqli_insert_id($base);
										$_SESSION['vente_pseudo']=$pseudo;
										$_SESSION['vente_name']=$prenom." ".$nom;
										$_SESSION['vente_avatar'] = "default.png";
										
										echo "<script>window.location.href ='espace.php'; </script>";
										exit;
									}else {
										$erreur="Email déja enregistrer, Merci de choisir un autre";
									}
								}else {
									$erreur="Pseudo déja prise, Veuillez choisir un autre";
								}
							}else {
								$erreur="Merci de vérifier votre mot de passe";
							}
						}else {
							$erreur="Merci de vérifier votre email";
						}
				}else {
					$erreur="Merci de remplir tous les champs";
				}				
			}else {
				$erreur="Merci de vérifier les termes et conditions";
			}
		}
	}
		
	
	

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="images/favicon.png">
    <title>Crée un compte - Site vente</title>

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
                        <li class="page-breadcrumb__nav active">Crée un compte</li>
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
                        <h5 class="section-content__title text-center">S'inscrire</h5>
                    </div>
                </div>
                <!-- Start Login Area -->
                <div class="col-lg-12 col-12">
                    <div class="login-form-container">
                        <div class="login-register-form">
							<?php if (!empty($erreur)){ ?>
								<div class="alert alert-primary" role="alert">
									<?php echo $erreur; ?>
								</div>
							<?php } ?>
                            <form method="POST" action="signup.php" >
								<div class="form-group row">
									<label class="control-label col-sm-3">Pseudo <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<input type="text" class="form-control" required="required" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?php echo $pseudo; ?>">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Nom et prénom <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" class="form-control" required="required" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom; ?>">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" required="required" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $prenom; ?>">
											</div>
										</div>
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Mot de passe <span class="text-danger">*</span></label>
									<div class="col-md-5 col-sm-8">
										<input type="password" class="form-control" required="required" name="password" id="password" placeholder="Merci du choisir (5-15 caractéres)" value="">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Confirmer votre mot de passe <span class="text-danger">*</span></label>
									<div class="col-md-5 col-sm-8">
										<input type="password" class="form-control" required="required" name="password2" id="password2" placeholder="Confirmer votre mot de passe" value="">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<input name="genre" type="radio" value="0" <?php if($genre==0) echo "checked"; ?> />  Homme
										<input name="genre" type="radio" value="1" <?php if($genre==1) echo "checked"; ?> /> Femme
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Adresse <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<div class="row">
											<div class="col-sm-6">
												<select class="form-control" id="wilaya" required="required" name="wilaya">
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
											<div class="col-sm-6">
												<select class="form-control" id="commune" required="required" name="commune">
													<option value="" >Veuillez choisir votre commune</option>
												</select>
											</div>
											<br/><br/>
											<div class="col-sm-12">
												<textarea type="text" class="form-control" required="required" name="adresse" id="adresse" placeholder="Adresse" rows="2" value="<?php echo $adresse; ?>"></textarea>
											</div>
										</div>
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
 										<input type="email" class="form-control" required="required" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Confrimer votre email <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<input type="email" class="form-control" required="required" name="email2" id="email2" placeholder="Confrimer votre email" value="<?php echo $email2; ?>">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3">Téléphone <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
 										<input type="text" class="form-control" required="required" name="telephone" id="telephone" placeholder="Téléphone" value="<?php echo $telephone; ?>">
									</div>
								</div>
								<br/>
								<div class="form-group row">
									<label class="control-label col-sm-3"><img src="images/captcha.php" /></label>
									<div class="col-md-5 col-sm-8">
										<div>
											<input class="form-control" required="required" placeholder="Captcha" type="number" id="captcha" name="captcha" /></td>
										</div>
									</div>
								</div>
								<br/>
								<h4 class="text-white">Conditions d'utilisations</h4>
								<label><input name="terme" type="checkbox" required="required" value="1" > J'ai lu et accepté les <a href="article.php?id=conditions" class="text-warning" target="_blank">Conditions d'utilisations</a></label>
								<hr/>
								<div class="form-group row">
									<div class="offset-3 col-md-10">
										<input name="Submit" type="submit" value="Crée un compte" class="btn btn--box btn--medium btn--radius btn--black btn--black-hover-green btn--uppercase font--semi-bold">
									</div>
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
