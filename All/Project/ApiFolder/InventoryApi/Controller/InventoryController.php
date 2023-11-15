<?php
    $uri = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $uri);

    // Checking URI part 5 for desired command
    if(isset($parts[5])) {
        //add more scripts here
        if($parts[5] === 'getInventory'){
            require_once __DIR__ . '/../Engine/GetAllInventory.php';
        } elseif($parts[5] === 'insertInventory') {
            require_once __DIR__ . '/../Engine/InsertInventory.php';
        } elseif($parts[5] === 'getInventoryById') {
            require_once __DIR__ . '/../Engine/GetInventoryById.php';
        } elseif($parts[5] === 'deleteInventoryById') {
            require_once __DIR__ . '/../Engine/DeleteInventoryById.php';
        } elseif($parts[5] === 'updateInventoryByQty'){
            require_once __DIR__ . '/../Engine/UpdateInventoryByQty.php';
        } else {
            echo "Not a valid endpoint for /{$parts[5]}";
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Not a valid API call";
    }
?>