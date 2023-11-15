<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    $uri = $_SERVER['REQUEST_URI'];
    $parts = explode('/',$uri);
   
    //routes to specified controllers for inventory API
    if(isset($parts[4])) {
        if($parts[4] === 'Inventory'){
            require 'InventoryApi/Controller/InventoryController.php';
        } else {
            echo "No API with the name {$parts[4]}";
        }
    } else {
        echo 'Not a valid API call';
    }
?>