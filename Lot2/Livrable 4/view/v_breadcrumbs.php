<?php
?>

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<?php
								if(!isset($_GET['cat']) && !isset($_GET['subcat'])){
								    
								        echo "<li><a href=\"index3.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								        echo "<li class=\"active\"><a href=\"rendu.php\"><b>Products</b></a></li>";
								    
								}
								if(isset($_GET['cat'])){
								    if($_GET['cat'] == "all"){
								        if(isset($_GET['search'])){
								            echo "<li><a href=\"index3.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								            echo "<li class=\"active\"><a href=\"rendu.php\">Products<i class=\"ti-arrow-right\"></i></a></li>";
								            echo "<li class=\"active\">";
								            echo "<li class=\"active\"><a href=\"#\"><b>". " results for \"" . $_GET['search'] ."\"" ."</b></a></li>";
								        }
								    }else{
								        if(isset($_GET['search'])){
								            echo "<li><a href=\"index3.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								            echo "<li class=\"active\"><a href=\"rendu.php\">Products<i class=\"ti-arrow-right\"></i></a></li>";
								            echo "<li class=\"active\">";
								            echo "<li><a href=\"rendu.php?cat=".$cat->getID()."\">".$cat->getName()."<i class=\"ti-arrow-right\"></i></a></li>";
								            echo "<li class=\"active\"><a href=\"#\"><b>". " results for \"" . $_GET['search'] ."\"" ."</b></a></li>";
								        }else{
    								    echo "<li><a href=\"index3.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
    								    echo "<li class=\"active\"><a href=\"rendu.php\">Products<i class=\"ti-arrow-right\"></i></a></li>";
    						    		echo "<li class=\"active\">";
    									echo "<a href=\"rendu.php?cat=".$cat->getID()."\"><b>".$cat->getName()."</b></a>";
    						   			echo "</li>";
								        }
								    }
								}else{
								    if (isset($_GET['subcat'])) {
								        echo "<li><a href=\"index3.php\">Home<i class=\"ti-arrow-right\"></i></a></li>";
								        echo "<li class=\"active\"><a href=\"rendu.php\">Products<i class=\"ti-arrow-right\"></i></a></li>";
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