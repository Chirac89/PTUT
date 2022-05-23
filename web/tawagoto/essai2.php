<?php


include 'Connexion.php';
require 'Product.php';
require 'Database.php';

global $db;

$table = "";

$database = new Database($db);

$res = $database->getOneByID(100031, $table);

echo $res;

$resAll = $database->getAll($table);


echo $resAll;
