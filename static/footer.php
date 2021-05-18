<footer class="footer m-t-100">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="index.html" class="footer__logo-link">
                                    <img src="images/logo.png" alt="" class="footer__logo-img" style="height: 80px;width: auto;">
                                </a>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><i class="fa fa-home"></i>Cité 1074 Logement, Birkhadem, Alger</li>
                                <li class="footer__address-item"><i class="fa fa-phone-alt"></i>+213 551 51 51 51</li>
                                <li class="footer__address-item"><i class="fa fa-envelope"></i>contact@alarwika.com</li>
                            </ul>
                            <ul class="footer__social-nav">
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">Informations</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="index.php" class="footer__link">Accueil</a></li>
                                <li class="footer__list"><a href="article.php?id=conditions" class="footer__link">Conditions d'utilisation</a></li>
                                <li class="footer__list"><a href="article.php?id=publicite" class="footer__link">Publicité</a></li>
                                <li class="footer__list"><a href="contact.php" class="footer__link">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">Nos catégories</h4>
                            <ul class="footer__nav">
								<?php
									$req = "SELECT * FROM categorie order by RAND() DESC LIMIT 5";
									mysqli_query($base,"SET NAMES UTF8");
									$list_menu_cat = mysqli_query($base, $req);
									while($menu_cat=mysqli_fetch_array($list_menu_cat)){
								?>
									<li class="footer__list"><a href="categorie.php?id=<?php echo $menu_cat['id']?>" class="footer__link"><?php echo $menu_cat['nom']?></a></li>
								<?php } ?>
								<li class="footer__list"><a href="categorie.php" class="footer__link">Tous les produits</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">Mon compte</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="espace.php" class="footer__link">Espace privé</a></li>
                                <li class="footer__list"><a href="espace_commande.php" class="footer__link">Mes commandes</a></li>
                                <li class="footer__list"><a href="espace_profile.php" class="footer__link">Mon profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="footer__bottom">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="footer__copyright-text">
                            <p>Copyright &copy; <a href="index.php">ALARWIKA</a>. <?php echo date('Y'); ?> All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <button class="material-scrolltop" type="button"></button>