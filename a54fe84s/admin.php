<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/restreindre_adm.php");
include("static/fonctions.php");
include("static/secure_sql.php");

	
	$req = "SELECT * from tab_admi WHERE id<>".$_SESSION['adm_id']." ORDER BY id DESC";
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
                <h3>Gestion des boutiques / admin</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <a href='admin_add.php' class='btn btn-primary'> Ajouter un administrateur </a>
					  <hr/>
				
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th width="5px">N??</th>
									<th>Username</th>
									<th>Nom</th>
									<th>Type</th>
									<th width="5%" >Action</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td style="vertical-align: middle;text-align: center;"><?php echo $resultat['id'] ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['loggin']?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['name']?></td>
									<td style="vertical-align: middle;"><?php if($resultat['type']==0) echo "Super admin"; else echo "Boutique"; ?></td>
									<td style="vertical-align: middle;text-align: center;">
										<a href='admin_update_pass.php?id=<?php echo $resultat['id'] ?>'><img src='images/password.png' /></a>
										<a href='admin_update.php?id=<?php echo $resultat['id'] ?>'><img src='images/edit.png' /></a>
										<a onclick="return(confirm('Etes-vous s??r de vouloir supprimer ce admin ?'));" href='admin_supp.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
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
