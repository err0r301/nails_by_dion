<?php
function getAdmins() {
    // Include the config file
    require '../data/config.php';

    // get the user data from the database with a user type of 'Client'
    $query = "SELECT * FROM appointment WHERE userType = 'Admin'";
    $admin_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($admin_result->num_rows <= 0) {
        echo "No admins found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $admin_result;
}