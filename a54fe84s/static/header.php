 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="../images/logo.png" style="width: 60px;"> <span>Site du vente</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Acceuil</a></li>
                  <li><a><i class="fa fa-edit"></i> Gestion des produits <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<?php if($_SESSION['adm_type']==0){ ?>
						<li><a>Catégories<span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
								<li><a href="categorie.php">Tous les catégories</a></li>
								<li><a href="categorie_add.php">Ajouter une catégorie</a></li>
							</ul>
                        </li>
                        <?php } ?>
						<?php if($_SESSION['adm_type']==0){ ?>
						<li><a>Produits<span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
						<?php } ?>
								<li><a href="produit.php">Tous les produits</a></li>
								<li><a href="produit_add.php">Ajouter un produit</a></li>
						<?php if($_SESSION['adm_type']==0){ ?>
							</ul>
                        </li>
						<li><a href="produit_order.php">Ordre des produits</a></li>
						<?php } ?>
                    </ul>
                  </li>
				  
				  <?php if($_SESSION['adm_type']==0){ ?>
				  <li><a><i class="fa fa-edit"></i> Commandes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="commande.php">Liste des commandes</a></li>
						<li><a href="commande.php?valide=1">Commandes validées</a></li>
						<li><a href="commande.php?valide=0">Commandes en attente</a></li>
						<li><a href="commande_search.php">Chercher une commande</a></li>
                    </ul>
                  </li>
				  <?php } ?>
				  
				  <li><a><i class="fa fa-edit"></i> Commentaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="comment.php">Liste des commentaires</a></li>
						<li><a href="comment.php?valide=1">Commentaires validées</a></li>
						<li><a href="comment.php?valide=0">Commentaires en attente</a></li>
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-edit"></i> Statistiques <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="stat.php">Les plus visité</a></li>
						<?php if($_SESSION['adm_type']==0){ ?>
							<li><a href="user_stat.php">Statistiques des utilisateurs</a></li>
						<?php } ?>
                    </ul>
                  </li>
				  
				  <?php if($_SESSION['adm_type']==0){ ?>
				  <li><a><i class="fa fa-edit"></i> Recettes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="commande_stat.php">Statistiques des commandes</a></li>
						<li><a href="recette_date.php">Recettes par date</a></li>
						<li><a href="recette_mois.php">Recettes par mois</a></li>
						<li><a href="recette_annee.php">Recettes par année</a></li>
                    </ul>
                  </li>
				  <?php } ?>
				  
				  <li><a><i class="fa fa-edit"></i> Gestion du site<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<?php if($_SESSION['adm_type']==0){ ?>
							<li><a href="slide.php">Slide</a></li>
							<li><a href="users.php">Liste des utilisateurs</a></li>
							<li><a href="newsletter.php">Newslettre</a></li>
							<li><a href="upload.php">Espace upload</a></li>
						<?php } ?>
						<li><a href="password.php">Modifier mot de passe</a></li>
                    </ul>
                  </li>
				  
				  <?php if($_SESSION['adm_type']==0){ ?>
					  <li><a><i class="fa fa-edit"></i> Pages <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="page_update.php?id=presentation">Qui somme nous</a></li>
							<li><a href="page_update.php?id=conditions">Conditions d'utilisation</a></li>
							<li><a href="page_update.php?id=publicite">Publicité</a></li>
						</ul>
					  </li>
					  
					  <li><a><i class="fa fa-edit"></i> Services <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="service.php?id=1">Service 1</a></li>
							<li><a href="service.php?id=2">Service 2</a></li>
							<li><a href="service.php?id=3">Service 3</a></li>
						</ul>
					  </li>
				  <?php } ?>
				  
				  <li><a href="static/deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                </ul>
              </div>

            </div>
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> <?php echo $_SESSION['loggin']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../index.php" target="_blank">Retour vers le site</a></li>
                    <li><a href="password.php">Modifier mot de passe</a></li>
					<li><a href="static/deconnexion.php"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                  </ul>
                </li>
				<?php if($_SESSION['adm_type']==0){ ?>
				<li>
					<a href="commande.php?valide=0" class="dropdown-toggle info-number" title="Commandes en attente">
						<i class="fa fa-shopping-cart"></i>
						<?php
							$req = "SELECT count(*) as count from commande WHERE valide=0";
							mysqli_query($base,"SET NAMES UTF8");
							$tmp = mysqli_fetch_array(mysqli_query($base, $req));
						?>
						<span class="badge bg-green"><?php echo $tmp['count']?></span>
					</a>
                </li>
				<?php } ?>
				<li>
					<a href="comment.php?valide=0" class="dropdown-toggle info-number" title="Commentaires en attente">
						<i class="fa fa-edit"></i>
						<?php
							$req = "SELECT count(*) as count from comment  WHERE valide=0";
							if($_SESSION['adm_type']!=0){
								$req = "SELECT count(*) as count from comment c,produit p  WHERE c.id_produit=p.id AND c.valide=0 AND p.id_user=".$_SESSION['adm_id'];
							}
							mysqli_query($base,"SET NAMES UTF8");
							$tmp = mysqli_fetch_array(mysqli_query($base, $req));
						?>
						<span class="badge bg-green"><?php echo $tmp['count']?></span>
					</a>
                </li>
				<li>
					<a href="produit_add.php" class="dropdown-toggle info-number" title="Ajouter un produit">
						<i class="fa fa-plus" aria-hidden="true"></i>
					</a>
                </li>

               </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
