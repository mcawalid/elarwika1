<?php
require_once('../static/connection.php'); 

// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		$sql = 'SELECT * FROM tab_admi WHERE loggin="'.mysqli_real_escape_string($base,$_POST['pseudo']).'" AND pass_md5="'.mysqli_real_escape_string($base,md5($_POST['pass'])).'"';
		mysqli_query($base,"SET NAMES UTF8");
		$liste_adm = mysqli_query($base,$sql);
		
		// si on obtient une rponse, alors l'utilisateur est un membre
		if(mysqli_num_rows($liste_adm)==1) {
			session_start();
			
			$adm = mysqli_fetch_array($liste_adm);
			$_SESSION['loggin'] = $_POST['pseudo'];
			$_SESSION['adm_type'] = $adm['type'];
			$_SESSION['adm_id'] = $adm['id'];
			
			echo "<script>window.location.href ='index.php'; </script>";
			exit;
		}
		else {
			$erreur="Veuillez resissir votre login et password.";
		}
	}
	else {
		$erreur="Au moins un des champs est vide.";
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"><link rel="shortcut icon" href="../images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administration</title>
	<link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
	
	<link href="css/pnotify/dist/pnotify.css" rel="stylesheet">
  </head>

  <body class="login" style="background:#fff">
    <div>
	  <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
			<div class="login-logo">
				<a href="../index.php">
					<img class="align-content" src="../images/logo.png" style="width:100%">
				</a>
			</div>
			<br/><br/>
            <form action='login.php' method='POST'>
              <h1>Administration</h1>
				<div class="sufee-login d-flex align-content-center flex-wrap">
					<div class="container">
						<div class="login-content">
							
							
							<div class="login-form">
								<form>
									<div class="form-group">
										<label>Pseudo</label>
										<input type="text" class="form-control" placeholder="Pseduo" name='pseudo'>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="Password" name='pass'>
									</div>
									<br/><br/>
									<input type='submit' name='connexion' id='connexion' style='float: unset;margin-left: unset;' class='btn btn-success btn-flat m-b-30 m-t-30' value='Connexion' />
								</form>
							</div>
						</div>
					</div>
				</div>
            </form>
          </section>
        </div>

      </div>
    </div>
<script src="css/jquery/dist/jquery.min.js"></script>
<script src="css/pnotify/dist/pnotify.js"></script>
<?php if (!empty($erreur)){ ?>
<script>
new PNotify({
       title: 'Alert',
       text: "<?php echo $erreur; ?>",
       type: 'error',
       styling: 'bootstrap3'
});
</script>
<?php } ?>
  </body>
</html>
