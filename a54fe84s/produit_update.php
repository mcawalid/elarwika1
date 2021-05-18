<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");

	if (!(isset($_GET['id']) && $_GET['id'] != null)){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	
	$id=intval($_GET['id']);
	$condition="";
	// IF SUPER ADMIN : CAN VIEW ALL
	if($_SESSION['adm_type']!=0){
		$condition=sprintf(" AND id_user=%s ",GetSQLValueString($_SESSION['adm_id'], "int",$base));
	}
	$req = sprintf("Select * From produit where id=%s $condition",GetSQLValueString($id,"int",$base));
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle=mysqli_query($base, $req);
	if(mysqli_num_rows($selectcle)==0){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	$result = mysqli_fetch_assoc ($selectcle);
	
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
	
	<script src="css/jquery/dist/jquery.min.js"></script>
</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
	   
	   
        <?php include('static/header.php')?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Modifier un produit</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
				  
					<?php
						if ((isset($_POST['nom']) && $_POST['nom'] != null) &&
							(isset($_POST['categorie']) && $_POST['categorie'] != null) &&
							(isset($_POST['disponible']) && $_POST['disponible'] != null) &&
							(isset($_POST['prix']) && $_POST['prix']!=null) &&
							(isset($_POST['description_complet']) && $_POST['description_complet'] != null))
						{
							$req = sprintf("UPDATE produit SET `nom`=%s, `id_categorie`=%s, `prix`=%s,`disponible`=%s,`description_complet`=%s WHERE id=$id",
								GetSQLValueString($_POST['nom'],"text",$base),
								GetSQLValueString($_POST['categorie'],"int",$base),
								GetSQLValueString($_POST['prix'],"int",$base),
								GetSQLValueString($_POST['disponible'],"int",$base),
								GetSQLValueString($_POST['description_complet'],"text",$base));
							mysqli_query($base,"SET NAMES UTF8");
							mysqli_query($base, $req);
							
							echo "<script>window.location.href ='produit_vue.php?id=$id'; </script>";
							exit;

					}else {
						$req = "SELECT * from categorie order by ordre DESC,id DESC";
						mysqli_query($base,"SET NAMES UTF8");
						$liste_categorie = mysqli_query($base, $req);
					?>
				  
				  
					<form method="POST" action="produit_update.php?id=<?php echo $id ?>" class="form-horizontal form-label-left" novalidate>
							<div class="item form-group">
								<label class="control-label col-md-1 col-sm-1 col-xs-12" for="categorie">Catégorie <span class="required">*</span></label>
								<div class="col-md-11 col-sm-11 col-xs-12">
									<select id="categorie" name="categorie" required="required" class="form-control col-md-7 col-xs-12">
										<option value="">Veuillez choisir une catégorie</option>
										<?php while($categorie=mysqli_fetch_array($liste_categorie)){ ?>
											<option value="<?php echo $categorie['id']?>"><?php echo $categorie['nom']?></option>
										<?php } ?>
									</select>
<script>
	$(window).load(function (){
		$('#categorie').val("<?php echo $result['id_categorie']; ?>");
	});
</script>
								</div>
							</div>

						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nom">Nom du produit <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input value="<?php echo $result['nom']; ?>" id="nom" type="text" name="nom" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
						  
						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="prix">Prix (DA)<span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input value="<?php echo $result['prix']; ?>" id="prix" type="number" name="prix" data-validate-length-range="1,11" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>

						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="disponible">Disponible ? <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input type="radio" name="disponible" value="1" <?php if ($result['disponible']==1) echo 'checked="checked"'; ?>> Oui
								<input type="radio" name="disponible" value="0" <?php if ($result['disponible']==0) echo 'checked="checked"'; ?>> Non
							</div>
						  </div>
						  
						  
						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="description_complet">Description <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
							  <textarea name="description_complet" required="required" id="description_complet" class="form-control col-md-7 col-xs-12"><?php echo $result['description_complet']; ?></textarea>
							</div>
						  </div>
						  
						  <div class="ln_solid"></div>
						  <div class="form-group">
							<div class="col-md-6 col-md-offset-6">
							  <button id="send" type="submit" class="btn btn-success">Modifier</button>
							</div>
						  </div>
						</form>
					<?php } ?>
                      
					  
					  
			      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
		<?php include('static/footer.php')?>
      </div>
    </div>

    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="css/fastclick/lib/fastclick.js"></script>
    <script src="css/nprogress/nprogress.js"></script>
	<script src="css/validator/validator.js"></script>
	<script src="js/jquery.fileuploadmulti.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/tagsinput.js"></script>
   
    <script src="js/custom.min.js"></script>    
  </body>
</html>
