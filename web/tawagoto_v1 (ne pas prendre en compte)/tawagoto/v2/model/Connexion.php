<?php
    
        
  define('HOST', 'localhost');
  define('DB_NAME', 'tawagoto');
  define('USER', 'root');
  define('PASS', '');

  try{
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion > OK ! <br>";

  }catch(PDOException $e){
    echo $e;
  }