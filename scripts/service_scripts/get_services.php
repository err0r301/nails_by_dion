<?php
function getServices() {
    // Include the config file
    require '../data/config.php';

    // get the services from the database
    $query = "SELECT * FROM service";
    $service_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($service_result->num_rows <= 0) {
        echo "No services found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $service_result;
}