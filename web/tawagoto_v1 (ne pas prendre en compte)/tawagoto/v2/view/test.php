<?php

include '../model/Connexion.php';
require '../model/Product.php';
require '../model/Database.php';
require '../model/Category.php';
require '../model/SubCategory.php';

global $db;

$database = new Database($db);

echo "<p>test image</p></br>";
echo "<img src=\"../assets/images/gameboy.webp\">";

?>

<img src="../favicon.png">