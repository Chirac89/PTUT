<?php


include 'Connexion.php';
require 'Product.php';
require 'Category.php';
require 'Database.php';
require 'SubCategory.php';

global $db;

$table = "";

$database = new Database($db);

$res = $database->getOneByID("subcategories", 1001);
echo $res;

//$arrayProducts = $database->getAllWithLimit("products", 15, 0);

$subcat = $database->getOneByID("categories", 1001);

echo $subcat->name;

//foreach ($arrayCategories as $resOne){
 //   echo $resOne;
//}



//echo $_GET['test'];