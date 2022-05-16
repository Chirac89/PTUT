<?php
/*
 * DS PHP
 * Vue page index - page d'accueil
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
// En tête de page 
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->
<?php if(! isset($_SESSION['logged']))
{
?>
<h1> Page de Connexion </h1>

<form action="index.php?page=login" method="post">
  <label> Login
    <input type="text" name = "login" value="" />
  </label>
  <input type="submit" value="Connexion">
</form>
<?php
}
?>
<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
