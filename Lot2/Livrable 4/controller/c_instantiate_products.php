<?php
//génération des produits de la page
//génération de la liste des catégories dans la barre de menu à gauche
if(isset($_GET['cat'])){
    if($_GET['cat'] == "all"){
        $arrayCategories = $database->getAll("categories");
    }else{
        $cat = $database->getOneByID("categories", $_GET['cat']);
        $arrayCategories = $database->filterByCat("subcategories", $_GET['cat'], 0);
    }
    //instancie les produits qui correspondent à la recherche textuelle
    if(isset($_GET['search'])){
        $arrayProducts = $database->resultSearch($_GET['cat'], $_GET['search'], $pageSelected);
    }else{
        $arrayProducts = $database->filterByCat("products", $_GET['cat'], $pageSelected);
        $pageNumber = intdiv($database->countProductsByCat($_GET['cat']),9);
        $arrayCategories = $database->filterByCat("subcategories", $_GET['cat'],0);
    }
}else{
    //traitement similaire au précédent, mais quand le champ sous-catégorie est sélectionné
    if(isset($_GET['subcat'])){
        $pageNumber = intdiv($database->countProductsBySubCat($_GET['subcat']),9);
        $subcat = $database->getOneByID("subcategories", $_GET['subcat']);
        $arrayCategories = $database->filterByCat("subcategories", $subcat->cat, 0);
        $arrayProducts = $database->filterBySubCat("products", $_GET['subcat'], $pageSelected);
        $cat = $database->getOneByID("categories", $subcat->cat);
    }else{
        $pageNumber = intdiv($database->countAllProducts(),9);
        $arrayProducts = $database->getAllWithLimit("products", 9, ($pageSelected-1)*9);
        $arrayCategories = $database->getAll("categories");
    }
}