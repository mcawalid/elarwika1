<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	$condition="";
	// IF SUPER ADMIN : CAN VIEW ALL
	if($_SESSION['adm_type']!=0){
		$condition=sprintf(" AND p.id_user=%s ",GetSQLValueString($_SESSION['adm_id'], "int",$base));
	}
	
	$id_cat="";
	if(isset($_GET['categorie']) && $_GET['categorie']!=null){
		$condition.=sprintf(" AND id_categorie=%s",
			GetSQLValueString($_GET['categorie'], "int",$base));
		$id_cat=intval($_GET['categorie']);
	}
	
	$req = "SELECT p.disponible,p.prix,p.id,p.nom,c.nom as categorie,p.nb_vue from produit p,categorie c where p.id_categorie=c.id $condition order by nb_vue DESC";
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
                <h3>Les plus visité</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
						<div class="row">
							<div class="col-md-7">
								<span style="font-weight: bold;">IL EXISTE <?PHP echo mysqli_num_rows($selectcle); ?> PRODUITS</span>
							</div>
							<div class="col-md-5">
								<form method="POST" action="produit.php">
									<div class="row">
										<div class="col-md-9">
											<select name="categorie" id="categorie" class="form-control">
												<option value="">Tous</option>
												<?php
													$req = "SELECT * from categorie order by id DESC";
													mysqli_query($base,"SET NAMES UTF8");
													$liste_categorie_menu = mysqli_query($base, $req);
													while($categorie=mysqli_fetch_array($liste_categorie_menu)){
												?>
													<option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['nom'] ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3">
											<input type="submit" class="btn btn-primary form-control" value="Filtre" />
										</div>
									</div>
								</form>
							</div>
						</div>
						<hr/>
                      
						<table id="datatable2" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>N°</th>
									<th>Nom du produit</th>
									<th>Catégorie</th>
									<th>Prix</th>
									<th>Nouveau</th>
									<th width="15%" >Consultation</th>
									<th width="9%" >Action</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td style="vertical-align: middle;"><?php echo $resultat['id'] ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['nom'] ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['categorie'] ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['prix']; ?> DA</td>
									<td style="vertical-align: middle;"><?php if($resultat['disponible']==0) echo "Non"; else echo "Oui"; ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['nb_vue'] ?> fois</td>
									<td style="vertical-align: middle;text-align: center;">
										<a href='produit_vue.php?id=<?php echo $resultat['id'] ?>'><img src='images/voir.png' title="Consulter les images"/></a>
										<a href='produit_update.php?id=<?php echo $resultat['id'] ?>'><img src='images/edit.png' /></a>
										<a onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce produit ?'));" href='produit_supp.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
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
<script>
	$("#datatable2").dataTable({bSort: false});
</script>
  </body>
</html>
