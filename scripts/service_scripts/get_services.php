<?php
// Include the config file
require_once '../data/config.php';

// get the services from the database
$query = "SELECT * FROM service";
$result = $conn->query($query);

// Check if the data was retrieved successfully
if ($result->num_rows <= 0) {
    echo "No services found";                                   ////////////////////////
}
// Close the connection
$conn->close();
