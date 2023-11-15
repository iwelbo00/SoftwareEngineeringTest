<?php
class Connection {
//creates a connection based on the type of database passed in parameter
    public static function connect(){
        $host = "mysql:host=localhost;dbname=database";
        try{
            $pdo = new PDO($host,'user', 'pass');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            die($e->getMessage());
        }    
    } 
}

?>