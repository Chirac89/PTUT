<?php
//redirection vers la page de login du malin non connecté
/*if(!isset($_SESSION['logged']))
{
  header('Location: index.php?page=login');
  exit;
}
require_once(PATH_MODELS.'CategorieDAO.php');
require_once(PATH_MODELS.'PhotoDAO.php');
require_once(PATH_ENTITIES.'Photo.php');*/

require_once(PATH_MODELS.'AnimalDAO.php');



if(isset($_GET['id']))
{
    $idA = htmlspecialchars($_GET['id']);
    $anim = new AnimalDAO(null);
    $animals = $anim -> getAnimals($idA);
    
    
    foreach($animals as $i)
    {
      if(isset($_SESSION['nom']))
        $_SESSION['nom'][]=$i->getNom();
      if(isset($_SESSION['prix']))
        $_SESSION['prix'][]=$i->getPrix();       
    }
}

if(isset($_GET['vide']))
{
  $_SESSION['nom']=array();
    $_SESSION['prix']=array();
}
//Appel du modèle pour les catégories

require_once(PATH_VIEWS.$page.'.php'); 

?>
