<?php
//récupère le nombre de page (soit le nombre de produits / 9)
if(isset($_GET['page'])){
    $pageSelected = $_GET['page'];
}else{
    $pageSelected = 1;
}