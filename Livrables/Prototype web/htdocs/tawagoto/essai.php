<?php

  echo "test de connection<br>";

  include 'connexion.php';
  require 'Products.php';
  require 'Category.php';

  global $db;

  /*$q = $db->query("Select * from products LIMIT 2 OFFSET 1");

  while($user = $q->fetch()){
    $id = $user['PK_product_ID'];
    echo "id : ". $user['PK_product_ID'] . "<br>";

    $name = $user['product_wording'];

    echo "name : " .$user['product_wording'] . "<br>";

    $product = new Products($id, $name);
    echo $product->id;
    echo $product->name ."<br>";

  }*/

  /*$q = $db->prepare("INSERT INTO products(PK_product_ID, product_wording, FK_product_cat_ID, FK_product_subcat_ID) 
    VALUES(:id,:name, :cat, :subcat)");
  $q->execute([
    'id' => 'testid',
    'name' => 'testname',
    'cat' => 'CAT000000100000',
    'subcat' => 'SBC000000100000'
  ]);*/

  $category = new Category('CAT000000100000');
  echo $category->id;
  echo $category->label;
  foreach($category->subcats as $sb){
    echo $sb . "<br>";
  }


