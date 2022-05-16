<?php
class Product
{
  public $name;
  public int $prix;
  public int $reduction;

  function __construct($nom){
    $this->name = $nom;
    //$this->prix = $prix;
    //$this->reduction = $reduction;    
  }

  function getPrixReduit(){
    return (($this->prix)*(($this->reduction)/100));
  }
}