<?php
function getInventoryItems() {
    // Include the config file
    require '../data/config.php';

    // get the inventory data from the database
    $query = "SELECT * FROM inventory";
    $inventory_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($inventory_result->num_rows <= 0) {
        echo "No inventory records found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    echo "<script> console.log('Inventory list sent'); </script>";
    return $inventory_result;
}