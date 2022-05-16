<?php
// Contrôle - Neutralisation des paramètres reçus

ini_set('display_errors', '1') ;
 error_reporting(E_ALL) ;
 
if(isset($_POST['login']))
{
  $login = htmlspecialchars($_POST['login']);

  if($login === ID_ADMIN)
  {
      $_SESSION['logged'] = true;
      $_SESSION['nom'] = array();
      $_SESSION['prix'] = array();
  }
      
  else
      $message = 'incorrect_identifiant';

}

if(isset($_SESSION['logged']))
{
  $message = 'connected';
  header('location:index.php?page=liste');
}

// Traitement des erreurs
if(isset($message))
  $alert = choixAlert($message);

require_once(PATH_VIEWS.$page.'.php'); 
