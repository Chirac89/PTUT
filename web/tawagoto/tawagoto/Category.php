<?php

//include 'connexion.php';

  class Category{
    public $id;
    public $name;

    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    function __construct($id, $name){
      
      $this->id = $id;
      $this->name=$name;
    }
    
    function __toString(){
        return $this->id . "</br>" .
            $this->name . "</br></br>";
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