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
	
	if ((isset($_POST['titre']) && $_POST['titre'] != null) &&
		(isset($_POST['description']) && $_POST['description'] != null)) 
	{
		// formulaire d'ajout + image
		$req = sprintf("UPDATE service SET titre=%s, description=%s WHERE id=%s",
				GetSQLValueString($_POST['titre'],"text",$base),
				GetSQLValueString($_POST['description'],"text",$base),
				GetSQLValueString($_GET['id'],"text",$base));
		mysqli_query($base,"SET NAMES UTF8");
		mysqli_query($base, $req) or die(mysqli_error($base));
	
		$message="Vos informations ont été mise a jour avec succes";
	}
	
	$req = sprintf("Select * From service where id=%s",GetSQLValueString($_GET['id'],"int",$base));
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../images/favicon.ico" />
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
                <h3>Service / <?php echo $row_result['titre'] ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
				
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
				  
					<form method="POST" action="service.php?id=<?php echo $_GET['id']; ?>" class="form-horizontal form-label-left" novalidate>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Titre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input value="<?php echo $row_result['titre']?>" id="titre" type="text" name="titre" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea rows="3" name="description" required="required" id="description" class="form-control col-md-7 col-xs-12"><?php echo $row_result['description']?></textarea>
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
<?php if (!empty($message)){ ?>
<script src="css/pnotify/dist/pnotify.js"></script>
<script>
new PNotify({
	   title: 'Alert',
	   text: "<?php echo $message; ?>",
	   type: 'info',
	   styling: 'bootstrap3'
});
</script>
<?php } ?>

  </body>
</html>
