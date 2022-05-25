<?php

class Database {
    
    private $database;
    
    function __construct($db) {
        $this->database = $db;
    }
    
    function getOneByID($id, $table) {
        $q = $this->database->prepare(
            
            "SELECT * from categories where PK_cat_ID = :id");
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
    
    function getFilteredObjects($table, $filter) {
        $arrayResponse = array();
        $q = $this->database->prepare("SELECT * from ".$table." WHERE FK_product_cat_ID = ".$filter);
        $q->execute();
        
        $res = $q->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $row){
            array_push($arrayResponse, constructObjects($table, $row));
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
            return $res;
    }
}