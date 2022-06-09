<?php 

include '../model/Connexion.php';
require '../model/Database.php';

include '../controller/c_login.php';
include '../controller/c_page_number.php';
include '../controller/c_cart_count.php';
include '../controller/c_register.php';

global $db;

$database = new Database($db);

/*
if(isset($_POST['lastName'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthDate = $_POST['birthDate'];
    if(($database->signIn($lastName, $firstName, $email, $password, $birthDate))==1){
        $confirm = "You have successfully signed in !";
        $_SESSION['id'] = $database->getCustomerID($_POST['email']);
    }
}*/

include 'v_header.php';
?>
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Register</h2>
							<p>Please register in order to checkout more quickly</p>
							<?php  if(isset($confirm)) echo "<h1>". $confirm . "</h1>" ?>
							<!-- Form -->
							<form class="form" method="post" action="register.php">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Your last name<span>*</span></label>
											<input type="text" name="lastName" id="lastName" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your first name<span>*</span></label>
											<input type="text" name="firstName" id="firstName" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your birth date<span>*</span></label>
											<input type="date" name="birthDate" id="birthDate" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
											<input type="text" name="email" id="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Password<span>*</span></label>
											<input type="password" name="password" id="password" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Confirm Password<span>*</span></label>
											<input type="password" name="cpassword" id="cpassword" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">Register</button>
											<!-- <input type="submit" name="formsend" id="formsend" value="Register">
											<a href="login.html" class="btn">Login</a> -->
										</div>
										<div class="checkbox">
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Sign Up for Newsletter</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Login -->
		
<?php include 'v_footer.php' ?>