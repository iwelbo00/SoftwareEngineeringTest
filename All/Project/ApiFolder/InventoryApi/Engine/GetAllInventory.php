<?php
require_once __DIR__ . '/../DA/InventoryDA.php';
require_once __DIR__ . '/../Contract/JSONResponse.php';

$inventoryDA = new InventoryDA();

//uses DA layer to get all inventory items in table
$inventory = $inventoryDA->getInventory();

//returns json response with inventory array;
if(count($inventory) !== 0) {
    $response = new JSONResponse();
    $response->render($inventory);
} else {
    echo "No inventory items found";
}

?>