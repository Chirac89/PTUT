<?php 

include '../model/Connexion.php';
require '../model/Database.php';
include '../controller/c_login.php';
require '../model/Product.php';
require '../model/Category.php';
require '../model/SubCategory.php';

global $db;

$database = new Database($db);


// ajouter un produit dans le panier
if(isset($_POST['quant']) && isset($_POST['product'])){
    //utilisateur non connecté
    if($_SESSION['id'] == "guest"){
        if(!isset($_SESSION['productlist'])){
            $_SESSION['productlist']= array();
        }
        if(isset($_POST['product']) && isset($_POST['quant'])){
            $test = 0;
            for($a = 0; $a < count($_SESSION['productlist']); $a++){
                if($_SESSION['productlist'][$a][0] == $_POST['product']){
                    if($_SESSION['productlist'][$a][1] == ""){
                        $oldqte = 0;
                    }else{
                        $oldqte =  (int) $_SESSION['productlist'][$a][1];
                    }
                    $newqte = $oldqte + (int)$_POST['quant'][1];
                    $_SESSION['productlist'][$a][1] = $newqte;
                    $test++;
                }
            }
            if($test == 0){
                $addedProduct = array($_POST['product'],$_POST['quant'][1]);
                array_push($_SESSION['productlist'], $addedProduct);
            }
            
        }
    }else{
    //utilisateur connecté
    $database->addToCart($_SESSION['id'], $_POST['product'], $_POST['quant'][1]);
    unset($_POST['quant']);
    unset($_POST['product']);
    }
}

//Instanciation de l'objet "produit"
$product = $database->getOneById("products",$_GET['product']);
$cat = $database->getOneById("categories", $product->getCat());
$subcat = $database->getOneById("subcategories", $product->getSubcat());


//Comptage du nombre de produits dans le panier
//utilisateur connecté
if(isset($_SESSION['id']) && $_SESSION['id'] != "guest"){
    $cartCount = $database->countProductCart($_SESSION['id']);
}else if(!isset($_SESSION['productlist'])){
    $cartCount = 0;
}else{
    //utilisateur non connecté
    $cartCount = 0;
    for($a = 0; $a < count($_SESSION['productlist']); $a++){
        $cartCount = $cartCount + (int)$_SESSION['productlist'][$a][1];
    }
}

include 'v_header.php';
?>
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<?php
							
								echo "<li><a href=\"rendu.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"rendu.php\">Products<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li><a href=\"rendu.php?cat=".$cat->getID()."\">".$cat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"rendu.php?subcat=".$subcat->getID()."\">".$subcat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
								echo "<li class=\"active\"><a href=\"#\"><b>".$product->getName()."</b></a></li>";								
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
													<li data-thumb="<?php echo $database->getPicture($product->getId());?>" rel="adjustX:10, adjustY:">
														<img src="<?php echo $database->getPicture($product->getId());?>" alt="#">
													</li>
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
				
<?php 

include 'v_footer.php';

?>