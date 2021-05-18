<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	$message="";
	if ((isset($_POST['ancien_pass']) && $_POST['ancien_pass']!=null) &&
		(isset($_POST['password']) && $_POST['password']!=null) &&
		(isset($_POST['confirme_password']) && $_POST['confirme_password']!=null)
	){
		$ancien_pass =  $_POST['ancien_pass'];
		$password =  $_POST['password'];
		$confirme_password =  $_POST['confirme_password'];
														
		$query = "SELECT pass_md5 FROM tab_admi WHERE loggin ='".$_SESSION['loggin']."'";
		mysqli_query($base,"SET NAMES UTF8");
		$bi2 = mysqli_query($base,$query) or die(mysqli_error($base));
		$row_bi2 = mysqli_fetch_array($bi2);
		
		if(md5($ancien_pass)==$row_bi2['pass_md5']){
			if($password==$confirme_password){
				
				$query_accepter = "UPDATE tab_admi SET pass_md5='".md5($password)."' WHERE loggin ='".$_SESSION['loggin']."'";
				mysqli_query($base,"SET NAMES UTF8");
				$accepter = mysqli_query($base,$query_accepter) or die(mysqli_error($base));	
	
				$message="Votre mot de passe a été modifier avec succes";
			}
			else
				$message="Le nouveau mot de passe n'est pas identique";
		}
		else
			$message="Le mot de passe que vous avez introduit n'est pas valide";
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

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
	
	<link href="css/pnotify/dist/pnotify.css" rel="stylesheet">
	
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
	   
	   
        <?php include('static/header.php')?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Modifier mot de passe</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
					
					<form  method='POST' action='password.php' class="form-horizontal form-label-left" novalidate>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Mot de passe actuel <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ancien_pass" type="password" name="ancien_pass" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						 </div>
						 
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Nouveau mot de passe <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password" type="password" name="password" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						 </div>
						 
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Confirmer votre nouveau mot de passe <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="confirme_password" type="password" name="confirme_password" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						 </div>
						 <div class="ln_solid"></div>
						  <div class="form-group">
							<div class="col-md-6 col-md-offset-3">
							  <button id="send" type="submit" class="btn btn-success">Modifier</button>
							</div>
						  </div>
						
				</form>
					
					

			      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
		<?php include('static/footer.php')?>
      </div>
    </div>

    <script src="css/jquery/dist/jquery.min.js"></script>
    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="css/fastclick/lib/fastclick.js"></script>
    <script src="css/nprogress/nprogress.js"></script>
	<script src="css/pnotify/dist/pnotify.js"></script>

    <script src="js/custom.min.js"></script>
<?php if (!empty($message)){ ?>
<script>
new PNotify({
	   title: 'Alert',
	   text: "<?php echo $message; ?>",
	   type: 'error',
	   styling: 'bootstrap3'
});
</script>
<?php } ?>
  </body>
</html>
