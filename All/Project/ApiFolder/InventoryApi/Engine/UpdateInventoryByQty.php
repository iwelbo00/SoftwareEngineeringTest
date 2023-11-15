<?php
require_once __DIR__ . '/../DA/InventoryDA.php';

$inventoryDA = new InventoryDA();

$json = json_decode(file_get_contents('php://input'), true);

if($json !== null) {

    //uses DA layer to update qty of inventory item
    $inventoryDA->updateInventoryByQty($json['id'], $json['qty']);
}
?>