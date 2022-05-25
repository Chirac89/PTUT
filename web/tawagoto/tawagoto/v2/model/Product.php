<?php

  class Product{
    public $id;
    //public Category $cat; à voir plus tard
    public $cat;
    public $subcat;
    public $name;
    public $price;
    public $description;
    public $alertThreshold;
    public $stock;
    
    
    
    function __construct($id, $cat, $subcat,
        $name, $price, $description, $alertThreshold,
        $stock){
            $this->id = $id;
            $this->cat = $cat;
            $this->subcat = $subcat;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
            $this->alertThreshold = $alertThreshold;
            $this->stock = $stock;
            
    }
    
    function __toString(){
        return $this->id . "</br>" .
            $this->cat . "</br>" .
            $this->subcat . "</br>" .
            $this->name . "</br>" .
            $this->price . "</br>" .
            $this->description . "</br>" .
            $this->alertThreshold . "</br>" .
            $this->stock . "</br>";
    }
    
    function updateStock(){
        
    }
    //static function updateStock($prod){} //
    
    
    
    //getters
    public function getId()
    {
        return $this->id;
    }

    public function getCat()
    {
        return $this->cat;
    }

    public function getSubcat()
    {
        return $this->subcat;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAlertThreshold()
    {
        return $this->alertThreshold;
    }

    public function getStock()
    {
        return $this->stock;
    }

    //setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCat($cat)
    {
        $this->cat = $cat;
    }

    public function setSubcat($subcat)
    {
        $this->subcat = $subcat;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setAlertThreshold($alertThreshold)
    {
        $this->alertThreshold = $alertThreshold;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    
    //fonction de test
    
    public function getPathImage(){
        return "https://th.bing.com/th/id/OIP.h0-OFPdOWon5agPhwfexWQHaEL?w=300&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7";
    }
    
    public function getScore(){
        return 5;
    }

  }