<?php
require_once __DIR__ . '/../Model/Inventory.php';
require_once __DIR__ . '/../Contract/Connection.php';
//contains all basic query functions for Inventory DB 
class InventoryDA {

	private $pdo;

	public function __construct() {
		$this->pdo = Connection::connect();

		if(!$this->pdo) {
			echo "Unable to connect to the database";
			exit;
		}
	}

	public function getInventory()
	{

		try {
			$query = "SELECT * FROM inventory";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			$inventoryItems = array();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$inventory = new Inventory($row['id'], $row['name'], $row['qty']);
				$inventoryItems[] = $inventory;
			}
			return $inventoryItems;

		} catch (PDOException $e) {
			echo "Database error: " . $e->getMessage();
		}
	}

	public function insertItem($name, $qty)
	{

		try {
			$query = "INSERT INTO Inventory (name, qty)
			VALUES (:name, :qty);";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR);
			$stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
			$stmt->execute();


		} catch (PDOException $e) {
			echo "Database error: " . $e->getMessage();
		}
	}

    public function getInventoryById($id) {

        try {
			$query = "SELECT * FROM Inventory WHERE id = :id";
			$stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $inventory = new Inventory($row['Id'], $row['name'], $row['qty']);
                return $inventory;
            } else {
                return null;
            }
		} catch (PDOException $e) {
			echo "Database error: " . $e->getMessage();
		}
        
    }

    public function deleteInventoryById($id) {

        try {
			$query = "DELETE FROM Inventory WHERE id = :id";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();

		} catch (PDOException $e) {
			echo "Database error: " . $e->getMessage();
		}
    }

    public function updateInventoryByQty($id, $qty) {

        try {
			$query = "UPDATE Inventory SET qty = :qty WHERE id = :id";
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(':qty', $qty, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();

		} catch (PDOException $e) {
			echo "Database error: " . $e->getMessage();
		}
    }
    
}
?>