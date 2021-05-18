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
	
	$req = "SELECT * from produit_img where id_produit=$id order by id DESC";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_images = mysqli_query($base, $req);
	
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
                <h3>Liste des photos / <?php echo $result['nom']?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

						
						<div class="upload_box" style="text-align:center !important;">
							<div id="mulitplefileuploader">Veuillez choisir une image</div>
							<div id="status"></div>
							<div class='supp_img' style="border: 0px;"><div id="gallery" ></div></div>
						</div>
						<hr/>
						
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Image</th>
									<th width="5%" >Action</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($liste_images)) { ?>
								<tr>
									<td>
										<a href='../images/gallery/produit/<?php echo $resultat['lien'] ?>' target='_blank'>
											<img src="../images/gallery/produit/<?php echo $resultat['lien'] ?>" style="height:200px;">
										</a>
									</td>
									<td>
										<a onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce fichier ?'));" href='produit_supp_img.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
									</td>
								</tr>
							<?php } ?>
						</table>

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
	
	<script src="js/jquery.fileuploadmulti.min.js"></script>
	<script src="js/jquery.form.js"></script>
	
   
    <script src="js/custom.min.js"></script>
<script>
$(document).ready(function()
{
	var settings = {
		url: "uploads/produit.php",
		returnType:"html",
		method: "POST",
		formData: {  id : "<?php echo $id; ?>" },
		allowedTypes:"jpg,png,gif,jpeg",
		fileName: "uploadfile",
		maxFileCount: 1,
		maxFileSize: 1200000,
		multiple: false,
		onSuccess:function(files,data,xhr)
		{
			$("#status").html("<font color='green'>تم التحميل بنجاح</font>");
			$("#status").fadeOut(7000);
			document.location.href="produit_vue.php?id=<?php echo $id; ?>";

		},
		afterUploadAll:function()
		{
			$("#status").html("<font color='green'>تم تحميل كل الصور</font>");
			$("#status").fadeOut(7000);
		},
		onError: function(files,status,errMsg)
		{        
			$("#status").html("<font color='red'>حدث خطأ أثناء التحميل</font>");
			$("#status").fadeOut(7000);
		}
	}
	$("#mulitplefileuploader").uploadFile(settings);
});
function noscript(strCode){
   var html = $(strCode.bold()); 
   html.find('script').remove();
 return html.html();
}
</script>