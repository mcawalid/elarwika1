<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/restreindre_adm.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	$date=date('Y');
	$mois=intval(date('m'));
	
	
	if((isset($_GET['date']) && $_GET['date']!=null) &&
		(isset($_GET['mois']) && $_GET['mois']!=null)) {
		$date= intval($_GET['date']);
		$mois= intval($_GET['mois']);
	}
	$condition=" and MONTH(c.date)='$mois' AND YEAR(c.date)='$date' ";

	
		// trouver nombre totale
	$req = "SELECT count(distinct d.id_commande) as nb_commande,
			ifnull(sum(d.quantite),0) as nb_prod,
			ifnull(sum(d.prix*d.quantite),0) as totale
			FROM commande_detail d,commande c where c.id=d.id_commande  $condition";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle = mysqli_query($base, $req);
	
	$mons = array(1 => "Janvier", 2 => "Fevrier", 3 => "Mars", 4 => "Avril", 5 => "Mai", 6 => "Juin", 7 => "Juillet", 8 => "Aout", 9 => "Septembre", 10 => "Octobre", 11 => "Nouvembre", 12 => "Decembre");


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
                <h3>Liste des commandes</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
						<form action="recette_mois.php" method="GET">
							<div class="row">
								<div class="col-md-3">
									<select name="mois" id="mois" class="form-control">
										<option value="">Veuillez choisir un mois</option>
										<?php 
											for($i=1;$i<=12;$i++) {
										?>
											<option <?php if($i==$mois) echo 'selected="selected"'; ?> value="<?php echo $i ?>"><?php echo $mons[$i] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-3">
									<select name="date" id="date" class="form-control">
										<option value="">Veuillez choisir une année</option>
										<?php 
											$date1=date('Y');
											for($i=2016;$i<=$date1;$i++) {
										?>
											<option <?php if($i==$date) echo 'selected="selected"'; ?> value="<?php echo $i ?>" <?php if($date==$i) echo "selected='selected'"; ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-3" >
									<input type="submit" class="btn btn-primary form-control" value="Filtre" />
								</div>
							</div>
						</form>
						<hr/>
                      
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nombre des commandes</th>
									<th>Nombre des produits</th>
									<th>Totale</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td><?php echo $resultat['nb_commande'] ?></td>
									<td><?php echo $resultat['nb_prod'] ?></td>
									<td><?php echo $resultat['totale']." DA"; ?></td>
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
