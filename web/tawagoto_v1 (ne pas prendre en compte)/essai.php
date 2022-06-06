<?php


  //notes : faire des vues en mySQL pour simplier les requetes, 
  //assurer une meilleure lisibilité et une "indépendance"
  //des requêtes à la base données source.
  
  include 'Connexion.php';
  require 'Product.php';
  //require 'Category.php';

  global $db;

  $q = $db->query("Select * from products" 
    );

  while($user = $q->fetch()){
    $id = $user['PK_product_ID'];
    //echo "id : ". $id . "<br>";
    
    $cat = $user['FK_product_cat_ID'];
    //echo "id : ". $cat . "<br>";
    
    $subcat = $user['FK_product_subcat_ID'];
    //echo "id : ". $subcat . "<br>";
    
    $name = $user['product_name'];
    //echo "name : " . $name . "<br>";
    
    $price = $user['product_price'];
    //echo "id : ". $price . "<br>";
    
    $description = $user['product_description'];
    //echo "id : ". $description . "<br>";
    
    $alertThreshold = $user['product_alertThreshold'];
    //echo "id : ". $alertThreshold . "<br>";
    
    $stock = $user['product_stock'];
    //echo "id : ". $stock . "<br>";
    

    $product = new Product($id, $cat, $subcat,
        $name, $price, $description, $alertThreshold,
        $stock);
    
    /*echo $product->id ."<br>";
    echo $product->cat ."<br>";
    echo $product->subcat ."<br>";
    echo $product->name ."<br>";
    echo $product->price ."<br>";
    echo $product->description ."<br>";
    echo $product->alertThreshold ."<br>";
    echo $product->stock ."<br> <br> <br> <br>";*/
    
    echo $product;
    
    

  }

  /*$q = $db->prepare("INSERT INTO products(PK_product_ID, product_wording, FK_product_cat_ID, FK_product_subcat_ID) 
    VALUES(:id,:name, :cat, :subcat)");
  $q->execute([
    'id' => 'testid',
    'name' => 'testname',
    'cat' => 'CAT000000100000',
    'subcat' => 'SBC000000100000'
  ]);*/

  /*$category = new Category('CAT000000100000');
  echo $category->id;
  echo $category->label;
  foreach($category->subcats as $sb){
    echo $sb . "<br>";
  }*/


