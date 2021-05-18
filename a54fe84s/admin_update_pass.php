<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/restreindre_adm.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	if (!(isset($_GET['id']) && $_GET['id'] != null)) 
	{
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	
	$id=intval($_GET['id']);
	
	$req = sprintf("Select * From tab_admi where id=$id");
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle=mysqli_query($base, $req) or die(mysqli_error($base));
	if(mysqli_num_rows($selectcle)==0){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	$row_result = mysqli_fetch_assoc ($selectcle);
	
	


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
	
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
	
	<link href="css/upload.css" rel="stylesheet" type="text/css">
	
	<?php require_once("static/editeur.php"); ?>
	<link rel="stylesheet" href="css/tagsinput.css">
  
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
	   
	   
        <?php include('static/header.php')?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Modifier un administrateur</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
				  
					<?php
					$erreur="";
					if ((isset($_POST['password']) && $_POST['password'] != null) &&
						(isset($_POST['password2']) && $_POST['password2'] != null)) 
					{
						if($_POST['password']!=$_POST['password2']){
							$erreur = "Mot de passe non identique , Veuillez réessayer";
						}else {
							$req = sprintf("UPDATE tab_admi SET pass_md5=%s WHERE id=$id",
								GetSQLValueString(md5($_POST['password']),"text",$base));
							mysqli_query($base,"SET NAMES UTF8");
							mysqli_query($base, $req) or die(mysqli_error($base));
							
							echo "<script>window.location.href ='admin.php'; </script>";
							exit;
						}
					} ?>
				  
				  <?php if (!empty($erreur)){ ?>
						<div class="alert alert-error" role="alert">
							<?php echo $erreur; ?>
						</div>
					<?php } ?>
					<form method="POST" action="admin_update_pass.php?id=<?php echo $id; ?>" class="form-horizontal form-label-left" novalidate>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Pseudo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input value="<?php echo $row_result['loggin']?>" disabled id="pseudo" type="text" name="pseudo" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Nouveau mot de passe <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password" type="password" name="password" data-validate-length-range="3,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
						  
						  <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Confirmer nouveau mot de passe <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password2" type="password" name="password2" data-validate-length-range="3,200" required="required" class="form-control col-md-7 col-xs-12">
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
    <script src="css/iCheck/icheck.min.js"></script>
	<script src="css/validator/validator.js"></script>
  
    <script src="js/custom.min.js"></script>
  </body>
</html>
