<?php
require_once __DIR__ . '/../DA/InventoryDA.php';
require_once __DIR__ . '/../Contract/JSONResponse.php';

$inventoryDA = new InventoryDA();

$json = json_decode(file_get_contents('php://input'), true);

if($json !== null) {

    //uses DA layer to get inventory by ID
    $inventory = $inventoryDA->getInventoryById($json['id']);

    //return json response with inventory object
    if(isset($inventory)) {
        $response = new JSONResponse();
        $response->render($inventory);
    } else {
        echo "No inventory matches ID given";
    }
}
?>