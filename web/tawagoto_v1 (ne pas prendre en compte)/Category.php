<?php

//include 'connexion.php';

  class Category{
    public $id;
    public $label;
    public $subcats = array();

    
    function __construct($id){
      
      global $db;
      $q = $db->query("Select * from subcategories where FK_subcat_cat_ID ='" . $id . "'");
      
      $this->id = $id;

      while($subcat = $q->fetch()){
        $val = $subcat['subcat_wording'];
        array_push($this->subcats, $val);
      }
      
    }

  }



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