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