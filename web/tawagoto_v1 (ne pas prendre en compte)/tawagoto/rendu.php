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
	<link rel="icon" type="image/png" href="./eshop/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="./eshop/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="./eshop/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="./eshop/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="./eshop/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="./eshop/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="./eshop/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="./eshop/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="./eshop/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="./eshop/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="./eshop/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="./eshop/css/reset.css">
	<link rel="stylesheet" href="./eshop/style.css">
    <link rel="stylesheet" href="./eshop/css/responsive.css">

</head>
<body class="js">

<?php 

    include 'Connexion.php';
    require 'Product.php';
    require 'Database.php';
    require 'Category.php';
    require 'SubCategory.php';
    
    global $db;
    
    $table = "products";
    
    $database = new Database($db);
    
    //$product = $database->getOneByID(100031, $table);
    //$arrayProducts = $database->getAll($table);


    
    
    require('./vues/v_header.php'); //ou include si le processus ne doit s'arrêter
    require './vues/v_list_product.php';
    //require('./vues/v_middle.php');
    require('./vues/v_footer.php');
    


?>

</body>
</html>