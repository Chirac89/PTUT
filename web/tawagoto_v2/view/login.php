<?php 

include '../model/Connexion.php';
require '../model/Database.php';
include 'test-login.php';

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

?>

				
		<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Login</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" action="#">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Password<span>*</span></label>
											<input type="password" name="password" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">Login</button>
											<a href="register.php" class="btn">Register</a>
												<!-- <button value="logout" type="submit"/> -->
											</div>
											</div>
											</div>
											</form>
											<div class="form-group login-btn">
    											<form class="form" method="post" action="#">
    												<input type="hidden" name="logout" value="true"/>
    												<button class="btn" type="submit">Log out</button>
    											</form>
											</div>
										</div>
									</div>
								</div>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Login -->
		
<?php 

include 'v_footer.php';

?>