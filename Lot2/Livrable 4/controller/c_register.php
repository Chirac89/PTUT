<?php
if(isset($_POST['lastName'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthDate = $_POST['birthDate'];
    $confirm = "Registration failed ! Try again";
    if($database->checkEmail($email) && ($database->signIn($lastName, $firstName, $email, $password, $birthDate))==1){
        $confirm = "You have successfully signed in !";
        $_SESSION['id'] = $database->getCustomerID($_POST['email']);
    }
}