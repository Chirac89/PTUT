<?php

$allCats = $database->getAll("categories");

if(isset($_GET['page'])){
    $pageSelected = $_GET['page'];
}else{
    $pageSelected = 1;
}
if(isset($_GET['cat'])){
    $pageNumber = intdiv($database->CountProductsByCat($_GET['cat']),9);
    $arrayProducts = $database->FilterByCat("products", $_GET['cat'], $pageSelected);
    $arrayCategories = $database->FilterByCat("subcategories", $_GET['cat'],0);
    $cat = $database->getOneByID("categories", $_GET['cat']);
}else{
    if(isset($_GET['subcat'])){
        $pageNumber = intdiv($database->CountProductsBySubCat($_GET['subcat']),9);
        $subcat = $database->getOneByID("subcategories", $_GET['subcat']);
        $arrayCategories = $database->FilterByCat("subcategories", $subcat->cat, 0);
        $arrayProducts = $database->FilterBySubCat("products", $_GET['subcat'], $pageSelected);
        $cat = $database->getOneByID("categories", $subcat->cat);
    }else{
    $pageNumber = intdiv($database->CountAllProducts(),9);
    $arrayProducts = $database->getAllWithLimit("products", 9, ($pageSelected-1)*9);
    $arrayCategories = $database->getAll("categories");
    }}?>

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
	<link rel="icon" type="image/png" href="images/favicon.png">
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
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
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
	<!--<link rel="stylesheet" href="css/color/color2.css">-->
	<!--<link rel="stylesheet" href="css/color/color3.css">-->
	<!--<link rel="stylesheet" href="css/color/color4.css">-->
	<!--<link rel="stylesheet" href="css/color/color5.css">-->
	<!--<link rel="stylesheet" href="css/color/color6.css">-->
	<!--<link rel="stylesheet" href="css/color/color7.css">-->
	<!--<link rel="stylesheet" href="css/color/color8.css">-->
	<!--<link rel="stylesheet" href="css/color/color9.css">-->
	<!--<link rel="stylesheet" href="css/color/color10.css">-->
	<!--<link rel="stylesheet" href="css/color/color11.css">-->
	<!--<link rel="stylesheet" href="css/color/color12.css">-->

	<link rel="stylesheet" href="#" id="colors">
	
</head>
<body class="js">
	<!-- Section supprim�e Preloader -->
	<!-- Preloader -->
	<!-- End Preloader -->
	<!-- Section supprim�e Preloader -->

	<!-- Eshop Color Plate -->
		<!-- section � supprimer Anthony
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
		fin section � supprimer Anthony -->
	<!-- /End Color Plate -->

		
		<!-- Header -->
		<header class="header shop">
			<!-- Section supprim�e : Topbar -->
			<!-- Section supprim�e : End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="index.html"><img src="../assets/images/logo.png" alt="logo"></a>
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
									<select name="category" id="category">
										<option>All Categories</option>
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
									<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span>2 Items</span>
											<a href="#">View Cart</a>
										</div>
										<ul class="shopping-list">
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
												<h4><a href="#">Woman Ring</a></h4>
												<p class="quantity">1x - <span class="amount">$99.00</span></p>
											</li>
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
												<h4><a href="#">Woman Necklace</a></h4>
												<p class="quantity">1x - <span class="amount">$35.00</span></p>
											</li>
										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">$134.00</span>
											</div>
											<a href="checkout.html" class="btn animate">Checkout</a>
										</div>
									</div>
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
													<li class="active"><a href="#">Home<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="index.html">Home Ecommerce V1</a></li>
															<li><a href="index2.html">Home Ecommerce V2</a></li>
															<li><a href="index3.html">Home Ecommerce V3</a></li>
															<li><a href="index4.html">Home Ecommerce V4</a></li>
														</ul>
													</li>
													<li><a href="#">Product</a></li>												
													<li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="shop-grid.html">Shop Grid</a></li>
															<li><a href="shop-list.html">Shop List</a></li>
															<li><a href="shop-single.html">shop Single</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="about-us.html">About Us</a></li>
															<li><a href="login.html">Login</a></li>
															<li><a href="register.html">Register</a></li>
															<li><a href="mail-success.html">Mail Success</a></li>
															<li><a href="404.html">404</a></li>
														</ul>
													</li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-grid.html">Blog Grid</a></li>
															<li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
															<li><a href="blog-single.html">Blog Single</a></li>
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
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
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<?php
								if(!isset($_GET['cat'])&&!isset($_GET['subcat'])){
								    echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								    echo "<li class=\"active\"><a href=\"rendu.php\"><b>Produits</b></a></li>";
								}
								if(isset($_GET['cat'])){
								    echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								    echo "<li class=\"active\"><a href=\"rendu.php\">Produits<i class=\"ti-arrow-right\"></i></a></li>";
						    		echo "<li class=\"active\">";
									echo "<a href=\"rendu.php?cat=".$cat->getID()."\"><b>".$cat->getName()."</b></a>";
						   			echo "</li>";
								}else{
								    if (isset($_GET['subcat'])) {
								        echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								        echo "<li class=\"active\"><a href=\"rendu.php\">Produits<i class=\"ti-arrow-right\"></i></a></li>";
						    			echo "<li><a href=\"rendu.php?cat=".$cat->getID()."\">".$cat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
						    			echo "<li class=\"active\"><a href=\"#\"><b>".$subcat->getName()."</b></a></li>";
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
								<?php 
								if(isset($_GET['cat'])|| isset($_GET['subcat'])){
						    		echo "<h3 class=\"title\">Subcategories</h3><ul class=\"categor-list\">";
									foreach($arrayCategories as $categorie){
							    		echo "<li><a href=\"rendu.php?subcat=".$categorie->getId()."\">".$categorie->getName()."</a></li>";}
								}else{
							    	echo "<h3 class=\"title\">Categories</h3><ul class=\"categor-list\">";
							    	foreach ($arrayCategories as $categorie){
							        	echo "<li><a href=\"rendu.php?cat=".$categorie->getId()."\">".$categorie->getName()."</a></li>";
									}
								}
								?>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<!-- <div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div>  -->
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">0 &#8364 - 20 &#8364<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">20 &#8364 - 50 &#8364<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">50 &#8364 - 100 &#8364<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="4"><input name="news" id="4" type="checkbox">100 &#8364 - 250 &#8364<span class="count">(8)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="5"><input name="news" id="5" type="checkbox">250 &#8364 +<span class="count">(3)</span></label>
											</li>
											<!-- ajout bouton Anthony -->
											<button id="price-range-button" type="submit" formmethod="get">Filter</button>
											<!-- fin ajout bouton Anthony -->
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter" style="display:inline-flex">
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Review</option>
											</select>
										</div>
										<button style="text-align: center;vertical-align: text-bottom;display: inline-block;height: 29px;padding: 10px 30px;position: relative;background: #F7941D;color: #fff;font-size: 14px;font-weight: 500;text-transform: uppercase;"
										class="btnn">Filter</button>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
										<?php foreach ($arrayProducts as $product){?>
					<div class="col-lg-4 col-md-6 col-12">
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="<?php echo $database->GetPicture($product->getId());?>" alt="#">
									<img class="hover-img" src="<?php echo $database->GetPicture($product->getId());?>" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href=<?php echo "essai2.php?test=".$product->getName()?>><?php echo $product->getName()?></a></h3>
								<div class="product-price">
									<span><?php echo $product->getPrice()." &#8364"?></span>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
						</div>
					</div>
				</div>
			</div>
			<!-- ajout pages Anthony -->
			<div>			
				<ol style="display: flex; justify-content: space-evenly; padding-top: 6vh">
				<?php 
    				if(isset($_GET['cat'])){
    				    $link = "cat=".$_GET['cat'];
    				}else{
    				    if (isset($_GET['subcat'])) {
    				        $link = "subcat=".$_GET['subcat'];
    				    }else{
    				        $link = "";
    				    }
    				}
				?>
				<?php
				for($i=1; $i<=$pageNumber+1; $i++)
				    echo "<li style=\"display : inline\"><a href=\"rendu.php?".$link."&page=".$i."\">".$i."</a></li>";
				?>
				</ol>
			</div>
			<!-- fin ajout pages Anthony -->
		</section>
		<!--/ End Product Style 1  -->	

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->
		
		
		
		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>Flared Shift Dress</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>$29.00</h3>
										<div class="quickview-peragraph">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<h5 class="title">Size</h5>
													<select>
														<option selected="selected">s</option>
														<option>m</option>
														<option>l</option>
														<option>xl</option>
													</select>
												</div>
												<div class="col-lg-6 col-12">
													<h5 class="title">Color</h5>
													<select>
														<option selected="selected">orange</option>
														<option>purple</option>
														<option>black</option>
														<option>pink</option>
													</select>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" class="btn">Add to cart</a>
											<a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
		
		<!-- Start Footer Area -->
		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="../assets/images/logo2.png" alt="#"></a>
								</div>
								<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
								<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Faq</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Customer Service</h4>
								<ul>
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Money-back</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Get In Tuch</h4>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li>NO. 342 - London Oxford Street.</li>
										<li>012 United Kingdom.</li>
										<li>info@eshop.com</li>
										<li>+032 3456 7890</li>
									</ul>
								</div>
								<!-- End Single Widget -->
								<ul>
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-flickr"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<!-- Section supprim�e : div class="copyright" -->
			<!-- Fin Section supprim�e : div class="copyright" -->
		</footer>
		<!-- /End Footer Area -->
	
	
    <!-- Jquery -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-migrate-3.0.0.js"></script>
	<script src="../assets/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="../assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="../assets/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="../assets/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="../assets/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="../assets/js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="../assets/js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="../assets/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="../assets/js/finalcountdown.min.js"></script>
	
	<!-- Nice Select JS -->
	<script src="../assets/js/nicesellect.js"></script>
	
	<!-- Ytplayer JS -->
	<script src="../assets/js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="../assets/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="../assets/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="../assets/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="../assets/js/easing.js"></script>
	
	<!-- Active JS -->
	<script src="../assets/js/active.js"></script>
	
</body>
</html>