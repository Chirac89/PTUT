<?php

class Database {
    
    private $database;
    
    function __construct($db) {
        $this->database = $db;
    }
    
    function getOneByID($table, $id) {
        switch($table){
            case "categories":
                $field = "PK_cat_ID";
                break;
            case "subcategories":
                $field = "PK_subcat_ID";
                break;
            case "products":
                $field = "PK_product_ID";
                break;
        }
        $q = $this->database->prepare(
            
            "SELECT * from ".$table." where ".$field." = :id");
         $q->execute([
         'id' => $id,
         ]);
         $row = $q->fetch(PDO::FETCH_NUM);
         return constructObjects($table, $row);
    }
    
    function getAll($table){
        $arrayResponse = array();
        $q = $this->database->prepare("SELECT * from ".$table);
            //"SELECT * from products");
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects($table, $row));
        }
        return $arrayResponse;
    }
    
    function getAllWithLimit($table, $limit, $offset) {
        $arrayResponse = array();
        $q = $this->database->prepare("SELECT * from ".$table. " LIMIT ".$limit. " OFFSET ".$offset);
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects($table, $row));
        }
        return $arrayResponse;
    }
    
    function FilterByCat($table, $filter, $page) {
        $arrayResponse = array();
        switch ($table){
            case "products":
                $field = "FK_product_cat_ID";
                $limit = "LIMIT 9 OFFSET ".($page-1)*9;
                break;
            case "subcategories":
                $field = "FK_subcat_cat_ID";
                $limit ="";
                break;
        }
        if($filter == "all"){
            $sql = "SELECT * from ".$table." ".$limit;
        }else{
            $sql = "SELECT * from ".$table." WHERE ".$field." = ".$filter." ".$limit;
            }
        $q = $this->database->prepare($sql);
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects($table, $row));
        }
            
        return $arrayResponse;
    }
    
    function FilterBySubCat($table, $filter, $page) {
        $arrayResponse = array();
        $field = "FK_product_subcat_ID";
        $limit = "LIMIT 9 OFFSET ".($page-1)*9;

        $q = $this->database->prepare("SELECT * from ".$table." WHERE ".$field." = ".$filter." ".$limit);
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects($table, $row));
        }
        
        return $arrayResponse;
    }
    
    function CountAllProducts(){
        $q = $this->database->prepare("SELECT COUNT(PK_product_ID) from products");
        $q->execute();
        $res = $q->fetchColumn();
        return $res;
    }
    
    function CountProductsByCat($cat){
        if($cat == "all"){
            $sql = "SELECT COUNT(PK_product_ID) from products";
        }else{
            $sql = "SELECT COUNT(PK_product_ID) from products WHERE FK_product_cat_ID =".$cat;
        }
        $q = $this->database->prepare($sql);
        $q->execute();
        $res = $q->fetchColumn();
        return $res;
    }
    
    function CountProductsBySubCat($subcat){
        $q = $this->database->prepare("SELECT COUNT(PK_product_ID) from products WHERE FK_product_subcat_ID =".$subcat);
        $q->execute();
        $res = $q->fetchColumn();
        return $res;
    }
    
    function GetPicture($productID){
        $q = $this->database->prepare("SELECT picture_path from pictures WHERE FK_picture_product_ID =".$productID);
        $q->execute();
        $res = $q->fetchColumn();
        return $res;
    }
    
    function ResultSearch($cat, $filter, $page) {
        $arrayResponse = array();
        if($cat == "all"){
            $field = "";
        }else{$field = "FK_product_cat_ID =".$cat." AND ";}
        $limit = "LIMIT 9 OFFSET ".($page-1)*9;
        //echo "SELECT * from products WHERE ".$field."product_name LIKE '%".$filter."%' ".$limit;
        $q = $this->database->prepare("SELECT * from products WHERE ".$field."product_name LIKE '%".$filter."%' ".$limit);
        $q->execute();
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects("products", $row));
        }
        
        return $arrayResponse;
    }
    
    function logIn($email, $password){
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        $q = $this->database->prepare("SELECT customer_passwordHash from customers
            WHERE customer_email = :email");
        $q->execute([
            'email' => $email
        ]);
        $res = $q->fetchColumn();
        $testPassword = password_verify($password, $res);
        return $testPassword;
    }
    
    function getCustomerID($email){
        $q = $this->database->prepare("SELECT PK_customer_ID from customers
            WHERE customer_email = :email");
        $q->execute([
            'email' => $email
        ]);
        $res = $q->fetchColumn();
        return $res;
    }
    
    function createAccount($lastName, $firstName, $email, $password, $birthDate){
        $q = $this->database->prepare("SELECT COUNT(customer_email) FROM `customers` 
            WHERE customer_email = :email");
        $q->execute([
            'email' => $email
        ]);
        if($q->fetchColumn()){
            return false;
        }else{
            $this->signIn($lastName, $firstName, $email, $password, $birthDate);
            return true;
        }
    }      
    
    function signIn($lastName, $firstName, $email, $password, $birthDate) {
        
        $hashPass = password_hash($password, PASSWORD_BCRYPT);
        $q = $this->database->prepare("INSERT INTO `customers`
            (`customer_lastName`, `customer_firstName`, `customer_email`,
             `customer_passwordHash`, `customer_birthday`)
            VALUES (:lastName, :firstName, :email, :hashPass, :birthDate)");
        
        $q->execute([
            'lastName' => $lastName,
            'firstName' => $firstName,
            'email' => $email,
            'hashPass' => $hashPass,
            'birthDate' => $birthDate
        ]);
    }
    
    function CountProductCart($id){
        if($id == 'guest'){ //faire un test avant l'appel de cette fonction est mieux
            return 0;
        }else{
        $q = $this->database->prepare("SELECT SUM(`cart_quantity`) FROM carts WHERE `PK_FK_cart_customer_ID` = :id");
        $q->execute([
            'id' => $id
        ]);
        return $q->fetchColumn();
        }
    }
    
    function getDiscountOfProduct($id){
        $q = $this->database->prepare("SELECT promotion_discountRate FROM promotions, promoted_products 
            WHERE PK_FK_promotion_product_ID = :id;");
        $q->execute([
            'id' => $id
        ]);
        return $q->fetchColumn();
    }
    
    function addToCart($idClient, $idProduit, $qte){
        $q = $this->database->prepare("SELECT SUM(cart_quantity) FROM `carts` 
            WHERE `PK_FK_cart_customer_ID` = :idClient AND `PK_FK_cart_product_ID` = :idProduit");
        $q->execute([
            'idClient' => $idClient,
            'idProduit' => $idProduit
        ]);
        $oldQte = $q->fetchColumn();
        if(is_null($oldQte)){
            $q = $this->database->prepare("INSERT INTO `carts`
            (`PK_FK_cart_customer_ID`, `PK_FK_cart_product_ID`, `cart_quantity`)
            VALUES (:idClient, :idProduit, :qte)");
            $q->execute([
                'idClient' => $idClient,
                'idProduit' => $idProduit,
                'qte' => $qte
            ]);
        }else{
            $newQte = $oldQte + $qte;
            $q = $this->database->prepare("UPDATE `carts` 
            SET `cart_quantity`= :qte
            WHERE `PK_FK_cart_customer_ID`= :idClient AND `PK_FK_cart_product_ID`= :idProduit;");
            $q->execute([
                'idClient' => $idClient,
                'idProduit' => $idProduit,
                'qte' => $newQte
            ]);
        }
    }
    
    function getPromotedProducts(){
        $arrayResponse = array();
        $q = $this->database->prepare("SELECT PK_product_ID, promotion_discountRate 
        FROM `promoted_products`, `promotions`, `products` 
        WHERE `PK_FK_promotion_ID`= `PK_promotion_ID` 
        AND `PK_FK_promotion_product_ID` = `PK_product_ID` 
        ORDER BY (promotion_discountRate) 
        DESC LIMIT 9;");
        $q->execute();
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, $row);
        }
        return $arrayResponse;
    }
}

    function constructObjects($table, $row){
        switch ($table){
            case "products":
                $res = new Product($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
                return $res;
            case "categories":
                $res = new Category($row[0], $row[1]);
                return $res;
            case "subcategories":
                $res = new SubCategory($row[0], $row[1], $row[2]);
                return $res;
        }

    }