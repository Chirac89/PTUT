<?php 

    include '../model/Connexion.php';
    require '../model/Database.php';
    require '../model/Product.php';
    include '../controller/c_login.php';
    require '../model/Category.php';
    require '../model/SubCategory.php';
    
    global $db;
        
    $database = new Database($db);
    
    require 'shop-grid.php';
    //require 'detail.php';