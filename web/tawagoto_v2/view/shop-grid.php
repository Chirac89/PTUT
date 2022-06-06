<?php

$allCats = $database->getAll("categories");

if(isset($_GET['page'])){
    $pageSelected = $_GET['page'];
}else{
    $pageSelected = 1;
}

//cat

if(isset($_GET['cat'])){
    if($_GET['cat'] == "all"){
        $arrayCategories = $database->getAll("categories");
    }else{
        $cat = $database->getOneByID("categories", $_GET['cat']);
        $arrayCategories = $database->FilterByCat("subcategories", $_GET['cat'], 0);
    }
    if(isset($_GET['search'])){
        $arrayProducts = $database->ResultSearch($_GET['cat'], $_GET['search'], $pageSelected);
    }else{
        $arrayProducts = $database->FilterByCat("products", $_GET['cat'], $pageSelected);
        $pageNumber = intdiv($database->CountProductsByCat($_GET['cat']),9);
        $arrayCategories = $database->FilterByCat("subcategories", $_GET['cat'],0);
    }
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
    }
}

if(isset($_SESSION['id']) && $_SESSION['id'] != "guest"){
    $cartCount = $database->CountProductCart($_SESSION['id']);
}else if(!isset($_SESSION['productlist'])){
    $cartCount = 0;
}else{
    $cartCount = 0;
    for($a = 0; $a < count($_SESSION['productlist']); $a++){
        $cartCount = $cartCount + (int)$_SESSION['productlist'][$a][1];
        //echo $_SESSION['productlist'][$a][1] . "</br>";
    }
}

include 'v_header.php';
include 'v_breadcrumbs.php'
?>


		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
								<?php 
								if((isset($_GET['cat']) && $_GET['cat'] != "all")|| isset($_GET['subcat'])){
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
											<button style="    text-align: center;vertical-align: text-bottom;display: inline-block;height: 29px;padding: 10px 30px;position: relative;background: #ff9999;color: #fff;font-size: 14px;font-weight: 500;text-transform: uppercase;"id="price-range-button" type="submit" formmethod="get">Filter</button>
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
											<img src="../assets/images/xboxss.jpg" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Xbox series S</a></h5>
											<p class="price">500 &#8364</p>
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
											<img src="../assets/images/ps5.jpeg" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Playstation 5</a></h5>
											<p class="price">600 &#8364</p>
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
											<img src="../assets/images/steamdeck.jpg" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Steam Deck</a></h5>
											<p class="price">790 &#8364</p>
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
										<button style="text-align: center;vertical-align: text-bottom;display: inline-block;height: 29px;padding: 10px 30px;position: relative;background: #ff9999;color: #fff;font-size: 14px;font-weight: 500;text-transform: uppercase;"
										class="btnn">Filter</button>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
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
								<a href="<?php echo "detail.php?product=".$product->getId()?>">
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
				    if(isset($pageNumber)){
				        for($i=1; $i<=$pageNumber+1; $i++){
				        echo "<li style=\"display : inline\"><a href=\"rendu.php?".$link."&page=".$i."\">".$i."</a></li>";
				    }
				}				    
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
		
<?php 
include 'v_footer.php';
?>