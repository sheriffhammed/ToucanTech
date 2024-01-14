<?php
function connect() {
   
    $hostname = "localhost"; //hostname
    $dbname = "toucantech"; //dbname
    $username = "root"; 
    $password = "";    
    // Create the DSN (data source name) by combining the database type, hostname and dbname
    $dsn = "mysql:host=$hostname;dbname=$dbname";
    try{
      $db = new PDO($dsn, $username, $password);
      return $db;
    }
    catch(Exception $e){
      echo "Connection failed: " . $e->Errormessage;
    }
   
  
}



