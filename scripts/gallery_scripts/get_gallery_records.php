<?php
// Include the config file
require_once '../data/config.php';

// get the gallery data from the database
$query = "SELECT * FROM gallery";
$result = $conn->query($query);

// Check if the data was retrieved successfully
if ($result->num_rows <= 0) {
    echo "No gallery records found";                                   ////////////////////////
}
// Close the connection
$conn->close();
