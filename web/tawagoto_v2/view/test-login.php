<?php

//include '../model/Connexion.php';
//require '../model/Product.php';
//require '../model/Database.php';
//require '../model/Category.php';
//require '../model/SubCategory.php';

//global $db;

$database = new Database($db);
/*
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
echo 'L adresse IP de l utilisateur est : ' .getIp(). "</br></br>";

echo 'L adresse IP de l utilisateur est : '.$_SERVER['REMOTE_ADDR']. "</br></br>";

session_start();


$_SESSION['pseudo'] = "chirac";

echo "son pseudo est" . $_SESSION['pseudo']. "</br></br>";

$liste = array('lundi', 'mardi', "mercredi");

$_SESSION['liste'] = $liste;

var_dump($_SESSION['liste']);

echo "</br></br>";

echo $_SESSION['liste'][1];

echo "</br></br>";

if(!isset($_SESSION['id'])){
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}

echo "</br></br>";
*/

//$email = "caroline.bernard@gmail.com";
//$password = "tawagoto";
//$hasspass = password_hash($password, PASSWORD_BCRYPT);

//echo $hasspass;

//echo "</br></br>";

//password_verify("tawagoto", $hasspass);

//$pwd = $database->createAccount("Bernard", "Caroline", $email, $password, "1984-12-01");

//echo $pwd . "</br> </br>";

session_start();

if(isset($_POST['logout'])){
    session_unset();
    $_SESSION['id'] = "guest";
}

if(!isset($_SESSION['id'])){
    $_SESSION['id'] = "guest";
    
}else if(($_SESSION['id'] == "guest") && isset($_POST['email'])){
    if($database->logIn($_POST['email'], $_POST['password'])){
        $_SESSION['id'] = $database->getCustomerID($_POST['email']);
    }
}