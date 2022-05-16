<?php
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Animal.php');

class AnimalDAO extends DAO
{
  
  public function getAnimals($animId)
  {
    if($animId == 0)
      $res = $this->queryAll('SELECT * FROM Animal');
    else
      $res = $this->queryAll('SELECT * FROM Animal WHERE AnimalID=?', array($animId));
    if($res == false)
      $animals = array();     
    else
    {
      foreach ($res as $p)
      {
        $animals[] = new Animal($p['AnimalID'], $p['Nom'], $p['Type'], $p['Description'], $p['Prix'], $p['Image']) ;
      }
    }
    return $animals;
  }

  /*public function getById($photoId)
  {
    $p = $this->queryRow('SELECT * FROM Photo WHERE photoId=?', array($photoId));
    if($p === false)
      $photo = null;
    else
      $photo = new Photo($p['description'], $p['catId'], $p['photoId'], $p['nomFich']) ;
    return $photo;
  }*/
}
