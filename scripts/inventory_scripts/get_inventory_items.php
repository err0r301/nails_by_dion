<?php
// Include the config file
require_once 'data/config.php';

// get the inventory data from the database
$query = "SELECT * FROM inventory";
$result = $conn->query($query);

// Check if the data was retrieved successfully
if ($result->num_rows <= 0) {
    echo "No inventory records found";                                   ////////////////////////
}
// Close the connection
$conn->close();
