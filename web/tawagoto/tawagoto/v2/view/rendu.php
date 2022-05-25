<?php 

    include '../model/Connexion.php';
    require '../model/Product.php';
    require '../model/Database.php';
    require '../model/Category.php';
    require '../model/SubCategory.php';
    
    global $db;
        
    $database = new Database($db);
    
    require 'shop-grid.php';