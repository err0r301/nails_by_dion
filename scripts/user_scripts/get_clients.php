<?php
function getClients() {
    // Include the config file
    require '../data/config.php';

    // get the user data from the database with a user type of 'Client'
    $query = "SELECT * FROM appointment WHERE userType = 'Client'";
    $client_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($client_result->num_rows <= 0) {
        echo "No clients found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $client_result;
}