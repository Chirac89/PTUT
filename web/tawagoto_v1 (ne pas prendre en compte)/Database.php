<?php

class Database {
    
    private $database;
    
    function __construct($db) {
        $this->database = $db;
    }
    
    function getOneByID($id, $table) {
        $q = $this->database->prepare(
            
            "SELECT * from products where PK_product_ID = :id");
         $q->execute([
         'id' => $id,
         ]);
         
         $row = $q->fetch(PDO::FETCH_NUM);
         $res = new Product($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
         return $res;
    }
    
    function getAll($table){
        $q = $this->database->prepare(
            "SELECT * from products");
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            $res = new Product($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        }
        return $res;
    }
}