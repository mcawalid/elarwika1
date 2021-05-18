<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../static/connection.php');
include("static/restreindre.php");
include("static/fonctions.php");
include("static/secure_sql.php");
	
	$condition=" WHERE c.id_produit=p.id ";
	if($_SESSION['adm_type']!=0){
		$condition.=sprintf(" AND p.id_user=%s ",GetSQLValueString($_SESSION['adm_id'], "int",$base));
	}
	if(isset($_GET['type']) && $_GET['type']!=null){
		if(intval($_GET['type']==0)) $condition.=" AND c.type=0 ";
		else $condition.=" AND c.type=1 ";
	}
	if(isset($_GET['valide']) && $_GET['valide']!=null){
		if(intval($_GET['valide']==0)) $condition.=" AND c.valide=0 ";
		else $condition.=" AND c.valide=1 ";
	}
	
	$req = "SELECT c.*,p.nom from comment c,produit p $condition order by c.id DESC";
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
                <h3>Liste des commentaires</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
						<div class="row">
							<div class="col-md-12" >
								<a href="comment.php" class="btn btn-primary pull-right">Tous</a>
								<a href="comment.php?valide=1" class="btn btn-primary pull-right">Commentaires valide</a>
								<a href="comment.php?valide=0" class="btn btn-primary pull-right">Commentaires en attente</a>
							</div>
						</div>
						<hr/>
                      
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>N°</th>
									<th>Utilisateur</th>
									<th>Produit</th>
									<th>Commentaire</th>
									<th>Date</th>
									<th width="7%" >Action</th>
									<th width="7%" >Etat</th>
								</tr>
							</thead>
							<?php while($resultat = mysqli_fetch_assoc ($selectcle)) { ?>
								<tr>
									<td style="vertical-align: middle;"><?php echo $resultat['id'] ?></td>
									<td style="vertical-align: middle;">
										<?php 
											$req = "SELECT * from user where id=".$resultat['id_user'];
											mysqli_query($base, "SET NAMES UTF8");
											$user = mysqli_fetch_array(mysqli_query($base, $req));
											echo $user['pseudo']. " (".$user['nom']." ".$user['prenom'].")";
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php echo "<b>N° ".$resultat['id_produit']."</b> (".$resultat['nom'].")"; ?>
									</td>
									<td style="vertical-align: middle;"><?php echo nl2br($resultat['comment']); ?></td>
									<td style="vertical-align: middle;"><?php echo $resultat['date'] ?></td>
									<td style="vertical-align: middle;text-align: center;">
										<a onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette commentaire ?'));" href='comment_supp.php?id=<?php echo $resultat['id'] ?>'><img src='images/supp.png' /></a>
									</td>
									<td style="vertical-align: middle;text-align: center;">
										<center>
											<a href="comment_valide.php?id=<?php echo $resultat['id']?>">
												<?php if($resultat['valide']==1){ ?>
													<img src="images/valide.png" title="Cliquez ici pour annuler cette commentaire">
												<?php }else{ ?>
													<img src="images/non_valide.png" title="Cliquez ici pour valider cette commentaire">
												<?php } ?>
											</a>
										</center>
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
