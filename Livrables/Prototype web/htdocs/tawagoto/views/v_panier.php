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

<?php require_once('./config/configuration.php');?>

<!--  Début de la page -->


<h1>Liste des animaux dans votre panier</h1>

<ul>
<?php

foreach($_SESSION['nom'] as $i) { ?>
  <li> <?php echo $i; ?> </li>
<?php }

?>
</ul>

<?php
$somme=0;
foreach($_SESSION['prix'] as $j) {
  $somme=$somme+$j;
}
?>
<h1>Total de la commande <?php echo $somme; ?></h1>

<ul>
<?php

foreach($_SESSION['prix'] as $j) { ?>
  <li> <?php echo $j; ?> </li>
<?php }

?>
</ul>
<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
