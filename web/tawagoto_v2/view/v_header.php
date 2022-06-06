<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="../assets/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="../assets/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="../assets/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="../assets/css/reset.css">
	<link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

	<!-- Color CSS -->
	<link rel="stylesheet" href="../assets/css/color/color1.css">
	<!--<link rel="stylesheet" href="../assets/css/color/color2.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color3.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color4.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color5.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color6.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color7.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color8.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color9.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color10.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color11.css">-->
	<!--<link rel="stylesheet" href="../assets/css/color/color12.css">-->

	<link rel="stylesheet" href="#" id="colors">
	
</head>
<body class="js">
	
	<!-- Section supprimée Preloader -->
	<!-- Preloader -->
	<!-- End Preloader -->
	<!-- Section supprimée Preloader -->
	
	<!-- Eshop Color Plate -->
		<!-- section à supprimer Anthony
		<div class="color-plate ">
		<a class="color-plate-icon"><i class="ti-paint-bucket"></i></a>
		<h4>Eshop Colors</h4>
		<p>Here is some awesome color's available on Eshop Template.</p>
		<span class="color1"></span>
		<span class="color2"></span>
		<span class="color3"></span>
		<span class="color4"></span>
		<span class="color5"></span>
		<span class="color6"></span>
		<span class="color7"></span>
		<span class="color8"></span>
		<span class="color9"></span>
		<span class="color10"></span>
		<span class="color11"></span>
		<span class="color12"></span>
		</div>	 
		fin section à supprimer Anthony -->
	<!-- /End Color Plate -->
		
		<!-- Header -->
		<header class="header shop">
			<!-- Section supprimée : Topbar -->
			<!-- Section supprimée : End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="index3.php"><img src="../assets/images/logo.png" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
    								<form style="width: auto" action="rendu.php">
    									<select name="cat" id="cat">
    										<option value="all">All Categories</option>
    										<?php 
    										foreach($allCats as $listcat){
    										    echo "<option value=".$listcat->getId().">".$listcat->getName()."</option>";
    										}
    										?>
    									</select> 
    										<input name="search" id="search" placeholder="Search Products Here....." type="search">
    										<button type="submit" class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
									<a href="login.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
									<a href="cart.php" class="single-icon"><i class="ti-bag"></i> <span class="total-count">
									<?php
										echo $cartCount;
									?></span></a>
									<!-- Shopping Item -->
									<!--/ End Shopping Item -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li><a href="index3.php">Home</a>

													</li>
													<li><a href="rendu.php">Product</a></li>												
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->