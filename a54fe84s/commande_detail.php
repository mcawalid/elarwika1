<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/restreindre_adm.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	if(!(isset($_GET['id']) && $_GET['id']!=null)) {
		header ("Location:index.php");
		exit;
	}

	$id=intval($_GET['id']);
	
	$req = "Select * From commande where id=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$selectcle=mysqli_query($base, $req);
	if(mysqli_num_rows($selectcle)==0){
		header ("Location:index.php");
		exit;
	}
	$commande=mysqli_fetch_array($selectcle);
	
	$req = "SELECT * FROM commande_detail d where id_commande=$id";
	mysqli_query($base,"SET NAMES UTF8");
	$liste_produit=mysqli_query($base, $req);
	

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
                <h3>Détail de la commandes</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
					<a href='javascript:void(0)' onclick='print();' class='btn btn-primary'> Imprimer la commande</a>
					<hr/>
						
					<table class="table table-striped table-bordered" >
						<tr>
							<td>N°</td>
							<td><?php echo $commande['id']?></td>
						</tr>
						<tr>
							<td>Utilisateur</td>
							<td>
								Nom : <?php echo $commande['nom']?><br/>
								Email : <?php echo $commande['email']?><br/>
								Téléphone : <?php echo $commande['telephone']?>
							</td>
						</tr>
						<tr>
							<td>Type</td>
							<td><?php if($commande['type']==0) echo "Le retrait au magazin"; else echo "Livraition programmé";?></td>
						</tr>
						<tr>
							<td>Date</td>
							<td><?php echo $commande['date'] ?></td>
						</tr>
						<tr>
							<td>Heure</td>
							<td><?php echo str_pad($commande['heure'],2,0, STR_PAD_LEFT).':'.str_pad($commande['minute'],2,0, STR_PAD_LEFT) ?></td>
						</td>
					</table>
				
					<h1>Liste des produits</h1>
					<table class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prix unitaire</th>
								<th>Quantité</th>
								<th>Totale</th>
							</tr>
						</thead>
						<?php $prix_total=0;
							while($produit=mysqli_fetch_array($liste_produit)){?>
							<tr>
								<td><?php echo $produit['nom']?></td>
								<td>
									<?php
										$prix=$produit['prix'];
										echo $produit['prix']." DA";
									?>
								</td>
								<td><?php echo $produit['quantite']; ?></td>
								<td>
									<?php 
										$prix_total+=($prix*$produit['quantite']);
										echo ($prix*$produit['quantite'])." DA";
									?>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<th colspan="3"></th>
							<th style="vertical-align: middle;text-align:center">Totale : <?php echo $prix_total." DA";?></th>
						</tr>
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
