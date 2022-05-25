<?php


include 'Connexion.php';
require 'Product.php';
require 'Category.php';
require 'Database.php';

global $db;

$table = "";

$database = new Database($db);

//$res = $database->getOneByID(100031, $table);
//echo $res;

//$arrayProducts = $database->getAllWithLimit("products", 15, 0);

$arrayCategories = $database->getAll("categories");

foreach ($arrayCategories as $resOne){
    echo $resOne;
}



//echo $_GET['test'];