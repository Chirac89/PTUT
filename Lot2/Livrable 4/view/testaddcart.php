<?php

/*session_start();

var_dump($_POST);
if(!isset($_SESSION['productlist'])){
    echo "entrée test 1";
    $_SESSION['productlist']= array();
}

if(isset($_POST['product']) && isset($_POST['quantity'])){
    $test = 0;
    for($a = 0; $a < count($_SESSION['productlist']); $a++){
        if($_SESSION['productlist'][$a][0] == $_POST['product']){
            if($_SESSION['productlist'][$a][1] == ""){
                $oldqte = 0;
            }else{
                $oldqte =  $_SESSION['productlist'][$a][1];
            }
            $newqte = $oldqte + $_POST['quantity'];
            $_SESSION['productlist'][$a][1] = $newqte;
            $test++;
        }
    }
    if($test == 0){
        $addedProduct = array($_POST['product'],$_POST['quantity']);
        array_push($_SESSION['productlist'], $addedProduct);
    }

}

echo "</br> </br> SESSION : ";

var_dump($_SESSION['productlist']);
*/
session_unset();



?>

		<form class="add-to-cart" action="#" method="POST">
			<input type="text" name="product">
			<input type="text" name="quantity">
			<input type="submit" value="submit">
		</form>
