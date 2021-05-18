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
	
	if(isset($_GET['date']) && $_GET['date']!=null){
		$date= intval($_GET['date']);
	}
	
	
	$table="user";
			
	$req = "select MONTH(date) as date,
	sum(if(type=0,'1','0') AND if(valide=1,'1','0')) as magazin,
	sum(if(type=0,'1','0') AND if(valide=1,'0','1')) as magazin_non,
	sum(if(type=1,'1','0') AND if(valide=1,'1','0')) as programme,
	sum(if(type=1,'1','0') AND if(valide=1,'0','1')) as programme_non,
	count(*) as count
	from commande where YEAR(date)='$date' group by MONTH(date) order by MONTH(date)";
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
						<form action="commande_stat.php" method="GET">
							<div class="row">
								<div class="col-md-3">
									<select name="date" id="date" class="form-control">
										<?php 
											for($i=2019;$i<=date('Y');$i++) {
										?>
											<option value="<?php echo $i ?>" <?php if($date==$i) echo "selected='selected'"; ?>><?php echo $i ?></option>
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
									<th>Mois</th>
									<th>Le retrait au magazin (Valide)</th>
									<th>Livraition programmé (Valide)</th>
									<th>Total (Valide)</th>
									<th>Le retrait au magazin (En attente)</th>
									<th>Livraition programmé (En attente)</th>
									<th>Total (En attente)</th>
									<th>Total Générale</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td><?php echo $mons[$resultat['date']] ?></td>
									<td><?php echo $resultat['magazin'] ?></td>
									<td><?php echo $resultat['programme'] ?></td>
									<td><?php echo $resultat['magazin']+$resultat['programme'] ?></td>
									<td><?php echo $resultat['magazin_non'] ?></td>
									<td><?php echo $resultat['programme_non'] ?></td>
									<td><?php echo $resultat['magazin_non']+$resultat['programme_non'] ?></td>
									<td><?php echo $resultat['count'] ?></td>
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
