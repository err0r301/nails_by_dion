<?php
function removeInventoryItem( $inventoryID) {
    // Include the config file
    require_once 'data/config.php';

    // remove the inventory item data from the database
    $query = "DELETE FROM inventory WHERE inventoryID = $inventoryID";
    $result = $conn->query($query);

    // Check if the data was removed successfully
    if ($result) {
        echo "Inventory item removed successfully.";
    } else {
        echo "Error removing inventory item: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}