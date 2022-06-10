<?php 

include '../model/Connexion.php';
require '../model/Database.php';

include '../controller/c_login.php';
include '../controller/c_page_number.php';
include '../controller/c_cart_count.php';

include 'v_header.php';

?>

				
		<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Login</h2>
							<?php  if(isset($confirm)) echo "<h1>". $confirm . "</h1>" ?>
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