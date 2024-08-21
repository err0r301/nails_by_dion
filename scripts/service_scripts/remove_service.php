<?php
function removeService( $serviceID) {
    // Include the config file
    require_once 'data/config.php';

    // remove the service data from the database
    $query = "DELETE FROM service WHERE serviceID = $serviceID";
    $result = $conn->query($query);

    // Check if the data was removed successfully
    if ($result) {
        echo "Service removed successfully.";
    } else {
        echo "Error removing service: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}