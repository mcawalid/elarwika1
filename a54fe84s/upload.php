<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/restreindre_adm.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	if($_SESSION['adm_type']!=0){
		echo "<script>window.location.href ='index.php'; </script>";
		exit;
	}
	
	$req = "SELECT * from upload";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle = mysqli_query($base, $req);

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
	
	<link href="css/upload.css" rel="stylesheet" type="text/css">
	
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
                <h3>Espace upload</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Lien</th>
									<th width="5%" >Action</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td>
										<a href='https://<?php echo $_SERVER['HTTP_HOST']?>/images/gallery/upload/<?php echo $resultat['lien'] ?>' target='_blank'>
											https://<?php echo $_SERVER['HTTP_HOST']?>/images/gallery/upload/<?php echo $resultat['lien'] ?>
										</a>
									</td>
									<td>
										<a onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce fichier ?'));" href='upload_supp.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
									</td>
								</tr>
							<?php } ?>
						</table>
						<hr/>
						<div class="upload_box" style="text-align:center !important;">
							<div id="mulitplefileuploader">Veuillez choisir un fichier</div>
							<div id="status"></div>
							<div class='supp_img' style="border: 0px;"><div id="gallery" ></div></div>
						</div>

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
		url: "uploads/upload.php",
		returnType:"html",
		method: "POST",
		allowedTypes:"*",
		fileName: "uploadfile",
		maxFileCount: 1,
		multiple: true,
		onSuccess:function(files,data,xhr)
		{
			$("#status").html("<font color='green'>تم التحميل بنجاح</font>");
			$("#status").fadeOut(7000);
			document.location.href="upload.php";

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
  </body>
</html>
