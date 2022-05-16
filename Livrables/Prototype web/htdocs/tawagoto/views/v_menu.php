<?php
/*
 * TP PHP
 * Vue menu
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
				<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
					<a href="index.php">
						<?= MENU_ACCUEIL ?>
					</a>
				</li>
				<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
					<a href="index.php?page=liste">
						Liste des animaux
					</a>
				</li>
		</ul>

<?php if(isset($_SESSION['logged']))
{
//Menu Connexion/Deconnexion
?>
    <ul class="nav navbar-nav navbar-right">
			  <li <?= $page=='panier' ? 'class="active"':'' ?>>
					<a href="index.php?page=panier&vide=0">
						Vider le panier
					</a>
				</li>
				<li <?= $page=='panier' ? 'class="active"':'' ?>>
					<a href="index.php?page=panier">
						Votre panier
					</a>
				</li>
				<li>
					<a href="index.php?page=delogin">
						Logout
					</a>
				</li>
			</ul>
<?php
}
else
{
?>
    <ul class="nav navbar-nav navbar-right">
				<li <?= $page=='login' ? 'class="active"':'' ?>>
					<a href="index.php?page=login">
						Login
					</a>
				</li>
<?php
}
?>

    </ul>
  </div>
</nav>


