<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<?php if(isset($_SESSION['logged'])){?>
<h1>Bienvenu(e) <?= ID_ADMIN ?> </h1>

<?php }?>
<table border="1" width="900">
    <tr>
        <th>Nom</th>
        <th>Type</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Image</th>
        <th>Ajout au panier</th>
    </tr>
<?php
foreach($animals as $i)
{
?>
    <tr>
        <td><?=$i->getNom()?></td>
        <td><?=$i->getType()?></td>
        <td><?=$i->getDescription()?></td>
        <td><?=$i->getPrix()?></td>
        <td><img src="<?=PATH_IMAGES.$i->getImage()?>" alt="<?=$i->getDescription()?>"/></td>
        <?php
            if(isset($_SESSION['logged'])){
                if(in_array ($i->getNom(), $_SESSION['nom'])){ ?>
                    <td> X </td>
                  <?php   } else {
                ?>
              <td> <a href='index.php?page=panier&id=<?=$i->getAnimalId()?>'> Ajouter au panier</a></td>
        <?php } }
         else {
        ?>
            <td>Ajouter au panier</td>
         <?php }
        ?>
    </tr>
<?php
}
?>
</table>

<?php require_once(PATH_VIEWS.'footer.php'); 
?>

