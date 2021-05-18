<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");

	$id_cat="";
	if(isset($_GET['cat']) && $_GET['cat']!=null){
		$id_cat=intval($_GET['cat']);
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
                <h3>Ajouter une produit</h3>
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
							$req = sprintf("INSERT INTO produit (`id`, `nom`, `id_categorie`, `prix`,`disponible`,`description_complet`,`id_user`,date) VALUES (NULL,%s,%s,%s,%s,%s,%s,NOW())",
								GetSQLValueString($_POST['nom'],"text",$base),
								GetSQLValueString($_POST['categorie'],"int",$base),
								GetSQLValueString($_POST['prix'],"int",$base),
								GetSQLValueString($_POST['disponible'],"int",$base),
								GetSQLValueString($_POST['description_complet'],"text",$base),
								GetSQLValueString($_SESSION['adm_id'],"int",$base));
							mysqli_query($base,"SET NAMES UTF8");
							mysqli_query($base, $req);
							$id_article= mysqli_insert_id($base);
							
							echo "<script>window.location.href ='produit_vue.php?id=$id_article'; </script>";
							exit;

					}else { 
						$req = "SELECT * from categorie order by ordre DESC,id DESC";
						mysqli_query($base,"SET NAMES UTF8");
						$liste_categorie = mysqli_query($base, $req);
					?>
				  
				  
					<form method="POST" action="produit_add.php?cat=<?php echo $id_cat ?>" class="form-horizontal form-label-left" novalidate>
							<div class="item form-group">
								<label class="control-label col-md-1 col-sm-1 col-xs-12" for="categorie">Catégorie <span class="required">*</span></label>
								<div class="col-md-11 col-sm-11 col-xs-12">
									<select id="categorie" name="categorie" required="required" class="form-control col-md-7 col-xs-12">
										<option value="">Veuillez choisir une catégorie</option>
										<?php while($categorie=mysqli_fetch_array($liste_categorie)){ ?>
											<option value="<?php echo $categorie['id']?>"><?php echo $categorie['nom']?></option>
										<?php } ?>
									</select>
<?php if($id_cat!=""){?>
<script>
	$(window).load(function (){
		$('#categorie').val("<?php echo $id_cat; ?>");
	});
</script>
<?php } ?>
								</div>
							</div>

						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nom">Nom du produit <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input id="nom" type="text" name="nom" data-validate-length-range="1,200" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
						  
						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="prix">Prix (DA)<span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input id="prix" type="number" name="prix" data-validate-length-range="1,11" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>

						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="disponible">Disponible ? <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input type="radio" name="disponible" value="1" checked="checked"> Oui
								<input type="radio" name="disponible" value="0" > Non
							</div>
						  </div>
						  
						  
						  <div class="item form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="description_complet">Description <span class="required">*</span>
							</label>
							<div class="col-md-11 col-sm-11 col-xs-12">
							  <textarea name="description_complet" required="required" id="description_complet" class="form-control col-md-7 col-xs-12"></textarea>
							</div>
						  </div>
						  
						  <div class="ln_solid"></div>
						  <div class="form-group">
							<div class="col-md-6 col-md-offset-6">
							  <button id="send" type="submit" class="btn btn-success">Ajouter</button>
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
