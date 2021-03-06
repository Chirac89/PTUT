<?php 

include '../model/Connexion.php';
require '../model/Database.php';
include 'test-login.php';
require '../model/Product.php';
require '../model/Category.php';
require '../model/SubCategory.php';

global $db;

$database = new Database($db);

if(isset($_POST['quant']) && isset($_POST['product'])){
    $database->addToCart($_SESSION['id'], $_POST['product'], $_POST['quant'][1]);
    unset($_POST['quant']);
    unset($_POST['product']);
}

$product = $database->getOneById("products",$_GET['product']);
$cat = $database->getOneById("categories", $product->getCat());
$subcat = $database->getOneById("subcategories", $product->getSubcat());


?>
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
	
	<!-- Section supprim?e Preloader -->
	<!-- Preloader -->
	<!-- End Preloader -->
	<!-- Section supprim?e Preloader -->
	
	<!-- Eshop Color Plate -->
		<!-- section ? supprimer Anthony
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
		fin section ? supprimer Anthony -->
	<!-- /End Color Plate -->
		
		<!-- Header -->
		<header class="header shop">
			<!-- Section supprim?e : Topbar -->
			<!-- Section supprim?e : End Topbar -->
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
									<select>
										<option selected="selected">All Category</option>
										<option>watch</option>
										<option>mobile</option>
										<option>kid???s item</option>
									</select>
									<form>
										<input name="search" placeholder="Search Products Here....." type="search">
										<button class="btnn"><i class="ti-search"></i></button>
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
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">
									<?php
										echo $database->CountProductCart($_SESSION['id']);
									?></span></a>
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
							
								echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"rendu.php\">Produits<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li><a href=\"rendu.php?cat=".$cat->getID()."\">".$cat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"rendu.php?subcat=".$subcat->getID()."\">".$subcat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"#\"><b>".$product->getName()."</b></a></li>";								
								/*
								if(!isset($_GET['cat']) && !isset($_GET['subcat'])){
								    echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								    echo "<li class=\"active\"><a href=\"rendu.php\"><b>Produits</b></a></li>";
								}
								if(isset($_GET['cat'])){
								    if($_GET['cat'] == "all"){
								        echo "TEST";
								    }else{
    								    echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
    								    echo "<li class=\"active\"><a href=\"rendu.php\">Produits<i class=\"ti-arrow-right\"></i></a></li>";
    						    		echo "<li class=\"active\">";
    									echo "<a href=\"rendu.php?cat=".$cat->getID()."\"><b>".$cat->getName()."</b></a>";
    						   			echo "</li>";
								    }
								}else{
								    if (isset($_GET['subcat'])) {
								        echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								        echo "<li class=\"active\"><a href=\"rendu.php\">Produits<i class=\"ti-arrow-right\"></i></a></li>";
						    			echo "<li><a href=\"rendu.php?cat=".$cat->getID()."\">".$cat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
						    			echo "<li class=\"active\"><a href=\"#\"><b>".$subcat->getName()."</b></a></li>";
									}
								}
								*/
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Single -->
		<section class="shop single section">
					<div class="container">
						<div class="row"> 
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
												<ul class="slides">
													<li data-thumb="<?php echo $database->GetPicture($product->getId());?>" rel="adjustX:10, adjustY:">
														<img src="<?php echo $database->GetPicture($product->getId());?>" alt="#">
													</li>
													<!-- Images suppl?mentaires slider
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													Fin images suppl?mentaires slider -->
												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>
									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4><?php echo $product->getName()?></h4>
												<div class="rating-main">
													<ul class="rating">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-half-o"></i></li>
														<li class="dark"><i class="fa fa-star-o"></i></li>
													</ul>
													<a href="#" class="total-review">(102) Review</a>
												</div>
												<p class="price"><span class="discount">
													<?php 
													if($database->getDiscountOfProduct($product->getID()) == ""){
													    echo $product->getPrice() . " &#8364";
													    echo "</span>";
													}else{
													    echo $product->getPrice()*(1-$database->getDiscountOfProduct($product->getID())/100) . " &#8364";
														echo "</span><s>";
														echo $product->getPrice() . " &#8364". "</s><p>";
														echo "-" . $database->getDiscountOfProduct($product->getID()) . "% </p>";}?>
												</p>
												<p class="description"><?php echo $product->getDescription()?></p>
											</div>
											<!--/ End Description -->
											<!-- Color -->
											<!--/ End Color -->
											<!-- Size -->
											<!--/ End Size -->
											<!-- Product Buy -->
											<div class="product-buy">
												<div class="quantity">
													<h6>Quantity :</h6>
													<!-- Input Order -->
													<form class="add-to-cart" action="#" method="POST">
													<div class="input-group">
														<div class="button minus">
															<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																<i class="ti-minus"></i>
															</button>
														</div>
														<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
														<div class="button plus">
															<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																<i class="ti-plus"></i>
															</button>
														</div>
													</div>
													<!--/ End Input Order -->
												</div>
												<div class="add-to-cart">
    												<!-- <form class="add-to-cart" action="#" method="POST">  -->
    													<input type="hidden" id="fname" name="product" value="<?php echo $product->getId() ?>">
    													<input class="btn min" type="submit" value="Add to cart">
    													<!-- <a href="#" class="btn">Add to cart</a> -->
    												</form>
													<a href="#" class="btn min"><i class="ti-heart"></i></a>
													<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
												</div>
												<p class="cat">Category :<a href="rendu.php?cat=
												<?php
													echo $database->getOneByID("categories", $product->getCat())->getID()
												?>
												">
												<?php
													echo $database->getOneByID("categories", $product->getCat())->getName()
												?>
												</a></p>
												<p class="availability">Availability : 
												<?php
													$stock = $product->getStock();
													if($stock <= $product->getAlertThreshold()){
													    echo "Only " . $stock . " products left !";
													}else{
													    echo $product->getStock() . " products In Stock";
													}
												?> </p>
											</div>
											<!--/ End Product Buy -->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p><?php echo $product->getDescription()?></p>
																</div>
																<div class="single-des">
																	<p><?php echo $product->getDescription()?></p>
																</div>
																<div class="single-des">
																	<h4>Product Features:</h4>
																	<ul>
																		<li>long established fact.</li>
																		<li>has a more-or-less normal distribution. </li>
																		<li>lmany variations of passages of. </li>
																		<li>generators on the Interne.</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">
																<div class="ratting-main">
																	<div class="avg-ratting">
																		<h4>4.5 <span>(Overall)</span></h4>
																		<span>Based on 1 Comments</span>
																	</div>
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			<img src="https://via.placeholder.com/200x200" alt="#">
																		</div>
																		<div class="rating-des">
																			<h6>Naimur Rahman</h6>
																			<div class="ratings">
																				<ul class="rating">
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star-half-o"></i></li>
																					<li><i class="fa fa-star-o"></i></li>
																				</ul>
																				<div class="rate-count">(<span>3.5</span>)</div>
																			</div>
																			<p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			<img src="https://via.placeholder.com/200x200" alt="#">
																		</div>
																		<div class="rating-des">
																			<h6>Advin Geri</h6>
																			<div class="ratings">
																				<ul class="rating">
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																				</ul>
																				<div class="rate-count">(<span>5.0</span>)</div>
																			</div>
																			<p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																</div>
																<!-- Review -->
																<div class="comment-review">
																	<div class="add-review">
																		<h5>Add A Review</h5>
																		<p>Your email address will not be published. Required fields are marked</p>
																	</div>
																	<h4>Your Rating</h4>
																	<div class="review-inner">
																		<div class="ratings">
																			<ul class="rating">
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																			</ul>
																		</div>
																	</div>
																</div>
																<!--/ End Review -->
																<!-- Form -->
																<form class="form" method="post" action="mail/mail.php">
																	<div class="row">
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Your Name<span>*</span></label>
																				<input type="text" name="name" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Your Email<span>*</span></label>
																				<input type="email" name="email" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group">
																				<label>Write a review<span>*</span></label>
																				<textarea name="message" rows="6" placeholder="" ></textarea>
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group button5">	
																				<button type="submit" class="btn">Submit</button>
																			</div>
																		</div>
																	</div>
																</form>
																<!--/ End Form -->
															</div>
														</div>
													</div>
												</div>
												<!--/ End Reviews Tab -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->
		
		<!-- Start Most Popular -->
	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Related Products</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="out-of-stock">Hot</span>
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
								<h3><a href="product-details.html">Black Sunglass For Women</a></h3>
								<div class="product-price">
									<span class="old">$60.00</span>
									<span>$50.00</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
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
                                <h3><a href="product-details.html">Women Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="new">New</span>
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
                                <h3><a href="product-details.html">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
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
                                <h3><a href="product-details.html">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	
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
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright ?? 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="../assets/images/payments.png" alt="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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