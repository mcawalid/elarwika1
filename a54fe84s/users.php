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

	
	$req = "SELECT * from user ORDER BY id DESC";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle = mysqli_query($base, $req) or die(mysqli_error($base));

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

	<!-- Datatables -->
    <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	
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
                <h3>Liste des utilisateurs</h3>
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
									<th style="width:5%">N°</th>
									<th>Photo</th>
									<th>Pseudo</th>
									<th>Nom & Prénom</th>
									<th>Adresse</th>
									<th>Wilaya / Commune</th>
									<th>Email / Tél</th>
									<th>Date d'inscription</th>
									<th width="5%" >Action</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td style="vertical-align: middle;"><?php echo $resultat['id']?></td>
									<td style="vertical-align: middle;">
										<a href="../images/gallery/user/<?php echo $resultat['avatar']?>" target="_blank">
											<img src="../images/gallery/user/<?php echo $resultat['avatar']?>" style="width:120px;height:120px"> 
										</a>
									</td>
									<td style="vertical-align: middle;">
										<?php echo $resultat['pseudo']?>
									</td>
									<td style="vertical-align: middle;"><?php echo $resultat['nom']." ".$resultat['prenom']?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['adresse']?></td>
									<td style="vertical-align: middle;"><?php echo getWilaya($resultat['wilaya'])." - ".@getCommune($resultat['wilaya'],$resultat['commune']); ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['email']." / ".$resultat['telephone']?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['date']?></td>
									<td style="vertical-align: middle;text-align: center;">
										<a onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce compte ?'));" href='users_supp.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
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
	
    <script src="css/iCheck/icheck.min.js"></script>
	
	<!-- Datatables -->
    <script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

   
    <script src="js/custom.min.js"></script>
  </body>
</html>
