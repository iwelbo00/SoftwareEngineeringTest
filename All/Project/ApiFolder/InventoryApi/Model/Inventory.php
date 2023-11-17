<?php
// Object model used for DA Queries
class Inventory
{
    public $id;
    public $name;
    public $qty;

    public function __construct($id, $name, $qty)
    {
        $this->id = $id;
        $this->name = $name;
        $this->qty = $qty;
    }
}
?>