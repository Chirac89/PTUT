<?php
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