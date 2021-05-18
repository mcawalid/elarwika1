<div class="col-xl-3 col-md-4">
    <div class="my-account-menu">
		<div class="profile-usertitle text-center">
			<a href="espace_picture.php" title="Modifier la photo de profile">
				<img src="images/gallery/user/<?php echo $_SESSION['vente_avatar']; ?>" id="profile_picture" class="img-fluid">
			</a>
			<br/><br/>
			<div class="profile-usertitle-job">
				<b><?php echo $_SESSION['vente_pseudo']; ?></b>
			</div>
			<hr/>
			<div class="profile-usertitle-name">
				<?php echo $_SESSION['vente_name']; ?>
			</div>
			
		</div>
		<br/>
        <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
			<li>
				<a href="espace_profile.php" class="btn btn-success btn-sm text-white" style="background:#218838">Mon profile</a>
			</li>
			<li><a class="link--icon-left" href="espace.php"><i class="fa fa-home"></i> Accueil </a></li>
			<li><a class="link--icon-left" href="espace_follow.php"><i class="far fa-heart"></i> Mes produits</a></li>
			<li><a class="link--icon-left" href="espace_commande.php"><i class="fas fa-shopping-cart"></i> Mes commandes</a></li>
			<li><a class="link--icon-left" href="espace_comment.php"><i class="fas fa-edit"></i> Mes commentaires</a></li>
			<li><a class="link--icon-left" href="espace_password.php"><i class="fa fa-lock"></i> Modifier mot de passe</a></li>
			<li><a class="link--icon-left" href="categorie.php"><i class="fa fa-plus"></i> Consulter les produits</a></li>
			<li><a class="link--icon-left" href="logout.php"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
        </ul>
    </div>
</div>