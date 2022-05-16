<?php

class Animal
{
  private $_animalId;

  private $_nom;

  private $_type;
  
  private $_description;

  private $_prix;

  private $_image;

  public function __construct($animalId, $nom, $type, $description, $prix, $image)
  {
    $this->_animalId = $animalId;
    $this->_nom = $nom;
    $this->_type = $type;
    $this->_description = $description;
    $this->_prix = $prix;
    $this->_image = $image;
  }

  public function getAnimalId() {
    return $this->_animalId;
  } 

  public function getNom() {
    return $this->_nom;
  } 

  public function setNom($nom){
    $this->_nom = $nom;
  }

  public function getType() {
    return $this->_type;
  } 

  public function setType($type){
    $this->_type = $type;
  }

  public function getDescription() {
    return $this->_description;
  } 

  public function setDescription($description){
    $this->_description = $description;
  }
  
  public function getPrix() {
    return $this->_prix;
  } 

  public function setPrix($prix){
    $this->_prix = $prix;
  }

  public function getImage() {
    return $this->_image;
  } 

  public function setImage($image){
    $this->_image = $image;
  }

}
