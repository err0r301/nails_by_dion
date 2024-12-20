<?php
// Include the config file
require '../data/config.php';
$remove_inventory_confirmation = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete-product-id'])) {
        $inventoryID = $_POST['delete-product-id'];

        // remove the inventory item data from the database
        $query = "DELETE FROM inventory WHERE inventoryID = $inventoryID";
        $result = $conn->query($query);

        // Check if the data was removed successfully
        if ($result) {
            echo "<script> console.log('Inventory item removed successfully.')</script>";
            $remove_inventory_confirmation = true;
        } else {
            echo "<script> console.log('Error removing inventory item: " . $conn->error . "')</script>";
            $remove_inventory_confirmation = false;
        }
    }
}
// Close the database connection
$conn->close();
