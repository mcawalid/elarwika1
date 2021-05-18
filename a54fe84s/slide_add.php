<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
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
	
	<script src="css/jquery/dist/jquery.min.js"></script>
    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="css/fastclick/lib/fastclick.js"></script>
    <script src="css/nprogress/nprogress.js"></script>
	<script src="css/validator/validator.js"></script>
	<link rel="stylesheet" href="css/tagsinput.css">
  
	
	<script src="js/jquery.fileuploadmulti.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/tagsinput.js"></script>
   
    <script src="js/custom.min.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
	   
	   
        <?php include('static/header.php')?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ajouter un slide</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
				  
					<?php
						if ((isset($_POST['titre'])) &&
							(isset($_POST['description'])))
						{
							
							$req = sprintf("INSERT INTO slide (`id`,`titre`, `description`) VALUES (NULL, %s,%s)",
								GetSQLValueString($_POST['titre'],"text",$base),
								GetSQLValueString($_POST['description'],"text",$base));							
							mysqli_query($base,"SET NAMES UTF8");
							mysqli_query($base, $req) or die(mysqli_error($base));
							$id_article= mysqli_insert_id($base);
?>
							<div class="upload_box" style="text-align:center !important;">
								<span style="color: #F00;font-weight: bold;">Taille maximum = 1Mo</span>
								<div id="mulitplefileuploader">Veuillez choisir une image</div>
								<div id="status"></div>
								<div class='supp_img' style="border: 0px;"><div id="gallery" ></div></div>
								<hr style="border-top: 1px solid #000;"/>
								<a href="slide.php" class="btn btn-primary">Valider</a>
							</div>
<script>
$(document).ready(function()
{
	var settings = {
		url: "uploads/slide_add.php",
		returnType:"html",
		method: "POST",
		formData: {  id : "<?php echo $id_article; ?>" },
		allowedTypes:"jpg,png,gif,jpeg",
		fileName: "uploadfile",
		maxFileCount: 1,
		maxFileSize: 1200000,
		multiple: true,
		onSuccess:function(files,data,xhr)
		{
			$("#status").html("<font color='green'>تم التحميل بنجاح</font>");
			$("#status").fadeOut(7000);
			var json=$.parseJSON(noscript(data));
			$("#gallery").append('<a style="padding: 5px 10px;" href="../images/slide/'+json.name+'" target="_blank" ><img width="110px" src="../images/slide/'+json.name+'" /></a>');
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
					<?php }else { ?>
				  
				  
					<form method="POST" action="slide_add.php" class="form-horizontal form-label-left" novalidate>
						
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Titre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input id="titre" type="text" name="titre" data-validate-length-range="0,200"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea name="description" rows="2"  id="description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  
						 
						  <div class="ln_solid"></div>
						  <div class="form-group">
							<div class="col-md-6 col-md-offset-3">
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

    

  </body>
</html>
