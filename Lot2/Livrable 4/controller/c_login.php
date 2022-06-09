<?php

$database = new Database($db);

session_start();

if(isset($_POST['logout'])){
    session_unset();
    $_SESSION['id'] = "guest";
}

if(!isset($_SESSION['id'])){
    $_SESSION['id'] = "guest";
    
}else if(($_SESSION['id'] == "guest") && isset($_POST['email'])){
    $confirm = "You failed to sign in. Try again !";
    if($database->logIn($_POST['email'], $_POST['password'])){
        $_SESSION['id'] = $database->getCustomerID($_POST['email']);
        $confirm = "You have succesfully signed in !";
    }
}