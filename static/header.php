<header>
        <div class="header d-none d-lg-block">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__top-content d-flex justify-content-between align-items-center">
                                <div class="header__top-content--left">
                                    <span>Email : contact@elarwika.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="header__center sticky-header p-tb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="header__logo">
                                <a href="index.php" class="header__logo-link img-responsive">
                                    <img class="header__logo-img img-fluid" src="images/logo.png" alt="" style="max-height: 57px;width: auto;">
                                </a>
                            </div>
                             <div class="header-menu">
                                <nav>
                                    <ul class="header__nav">
                                        <li class="header__nav-item pos-relative"><a class="header__nav-link" href="index.php">Accueil</a></li>
                                        <li class="header__nav-item pos-relative"><a class="header__nav-link" href="presentation.php">Notre magasin</a></li>
                                        <li class="header__nav-item pos-relative">
                                            <a href="#" class="header__nav-link">Nos articles<i class="fal fa-chevron-down"></i></a>
                                            <ul class="dropdown__menu pos-absolute">
												<li class="dropdown__list">
													<a href="categorie.php" class="dropdown__link d-flex justify-content-between align-items-center">Tous les articles</a>
												</li>
												<?php
													$req = "SELECT * FROM categorie order by ordre DESC LIMIT 16";
													mysqli_query($base,"SET NAMES UTF8");
													$list_menu_cat = mysqli_query($base, $req);
													while($menu_cat=mysqli_fetch_array($list_menu_cat)){
												?>
													<li class="dropdown__list">
														<a href="categorie.php?id=<?php echo $menu_cat['id']?>" class="dropdown__link d-flex justify-content-between align-items-center"><?php echo $menu_cat['nom']?></a>
													</li>
												<?php } ?>
                                            </ul>
                                        </li>
										<li class="header__nav-item pos-relative"><a class="header__nav-link" href="contact.php"> Contact</a></li>
									</ul>
                                </nav>
                            </div>

                            <ul class="header__user-action-icon">
                                <li>
                                    <a href="espace.php">
                                        <i class="icon-users"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="espace_follow.php">
                                        <i class="icon-heart"></i>
                                        <span class="item-count pos-absolute">
										<?php if(isset($_SESSION['id_vente'])){ 
											$req = "Select count(*) as count from follow where id_user=".$_SESSION['id_vente'];
											mysqli_query($base,"SET NAMES UTF8");
											$tmp_count=mysqli_fetch_array(mysqli_query($base, $req));
										?>
											<?php echo $tmp_count['count']?>
										<?php }else{ ?>
											0
										<?php } ?>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.php" >
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute"></span>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
			
             <div class="header__bottom p-tb-30">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="header-menu-vertical pos-relative">
                                <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i>CATEGORIES</h4>
                                <ul class="menu-content pos-absolute">
									<?php
										$req = "SELECT * FROM categorie order by ordre DESC";
										mysqli_query($base,"SET NAMES UTF8");
										$list_menu_cat = mysqli_query($base, $req);
										while($menu_cat=mysqli_fetch_array($list_menu_cat)){
									?>
										<li class="menu-item"><a href="categorie.php?id=<?php echo $menu_cat['id']?>"><?php echo $menu_cat['nom']?></a></li>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <form class="header-search" action="categorie.php" method="GET">
                                <div class="header-search__content pos-relative">
                                    <input type="search" name="q" placeholder="Recherche" required>
                                    <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-2 col-lg-3">
                            <div class="header-phone text-right"><span>Tél : +213 553 53 53 53</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__mobile mobile-header--1 d-block d-lg-none p-tb-20">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <ul class="header__mobile--leftside d-flex align-items-center justify-content-start">
                            <li>
                                <div class="header__mobile-logo">
                                    <a href="index.php" class="header__mobile-logo-link" >
                                        <img src="images/logo.png" alt="" class="header__mobile-logo-img" style="max-height: 57px;width: auto;">
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="header__mobile--rightside header__user-action-icon  d-flex align-items-center justify-content-end"> 
                            <li>
                                <a href="checkout.php" >
                                    <i class="icon-shopping-cart"></i>
                                    <span class="wishlist-item-count pos-absolute"></span>
                                </a>
                            </li>
                            <li><a href="#offcanvas-mobile-menu" class="offcanvas-toggle"><i class="far fa-bars"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="header-menu-vertical pos-relative m-t-30">
                            <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i>CATEGORIES</h4>
                            <ul class="menu-content pos-absolute">
								<?php
									$req = "SELECT * FROM categorie order by ordre DESC";
									mysqli_query($base,"SET NAMES UTF8");
									$list_menu_cat = mysqli_query($base, $req);
									while($menu_cat=mysqli_fetch_array($list_menu_cat)){
								?>
									<li class="menu-item"><a href="categorie.php?id=<?php echo $menu_cat['id']?>"><?php echo $menu_cat['nom']?></a></li>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"></span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>
            
            <div class="offcanvas-inner">
                <form class="header-search m-tb-15" action="categorie.php" method="GET">
                    <div class="header-search__content pos-relative">
                        <input type="search" name="q" placeholder="Recherche" required>
                        <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
                <ul class="header__user-action-icon m-tb-15 text-center">
                    <li>
                        <a href="espace.php">
                            <i class="icon-users"></i>
                        </a>
                    </li>
                    <li>
                        <a href="espace_follow.php">
                            <i class="icon-heart"></i>
                            <span class="item-count pos-absolute">
								<?php if(isset($_SESSION['id_vente'])){ 
									$req = "Select count(*) as count from follow where id_user=".$_SESSION['id_vente'];
									mysqli_query($base,"SET NAMES UTF8");
									$tmp_count=mysqli_fetch_array(mysqli_query($base, $req));
								?>
									<?php echo $tmp_count['count']?>
								<?php }else{ ?>
									0
								<?php } ?>
							</span>
                        </a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            <i class="icon-shopping-cart"></i>
                            <span class="wishlist-item-count pos-absolute"></span>
                        </a>
                    </li> <!-- End Header Add Cart Box -->
                </ul>  <!-- End Mobile User Action -->
                <div class="offcanvas-menu">
                    <ul>
                        <li><a href="index.php"><span>Accueil</span></a></li>
                        <li><a href="presentation.php"><span>Notre magasin</span></a></li>
                        <li>
                            <a href="#"><span>Nos articles</span></a>
                            <ul class="sub-menu">
								<?php
									$req = "SELECT * FROM categorie order by ordre DESC LIMIT 16";
									mysqli_query($base,"SET NAMES UTF8");
									$list_menu_cat = mysqli_query($base, $req);
									while($menu_cat=mysqli_fetch_array($list_menu_cat)){
								?>
									<li>
										<a href="categorie.php?id=<?php echo $menu_cat['id']?>"><?php echo $menu_cat['nom']?></a></li>
									<li>
								<?php } ?>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <ul class="offcanvas__social-nav m-t-50">
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-youtube"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="offcanvas-overlay"></div>
    </header>