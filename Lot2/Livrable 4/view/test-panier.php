<?php

include '../model/Connexion.php';
require '../model/Product.php';
require '../model/Database.php';
require '../model/Category.php';
require '../model/SubCategory.php';

global $db;

$database = new Database($db);

echo "contenu de POST : " . var_dump($_POST); 

$essai = array();

$product_list = [
    ['produit' => "prod1", "qte" => 1],
    ['produit' => "prod2", "qte" => 2],
];

array_push($essai, $product_list);

//var_dump($product_list);

echo "</br></br></br>";

echo "test" .var_dump($essai);

echo "</br></br></br>";

array_push($product_list, ['produit' => "prod3", "qte" => 3]);

//var_dump($product_list);

echo "</br></br></br>";

foreach ($product_list as $prod){
    echo $prod['produit']. "   ". $prod['qte'];
    echo "</br>";
}
session_start();
$_SESSION['products'] = $product_list;

var_dump($_SESSION['products']);

?>

<form action="#" method="POST">
  <label for="fname">First name:</label><br>
  <input type="text" id="product" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form>