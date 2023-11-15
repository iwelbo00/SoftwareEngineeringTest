<?php
// Object model used for DA Queries
class Inventory
{
    public $ID;
    public $name;
    public $qty;

    public function __construct($ID, $name, $qty)
    {
        $this->ID = $ID;
        $this->name = $name;
        $this->qty = $qty;
    }
}
?>