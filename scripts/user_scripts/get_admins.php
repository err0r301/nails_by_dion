<?php
function getAdmins() {
    // Include the config file
    require '../data/config.php';

    // get the user data from the database with a user type of 'Client'
    $query = "SELECT user.name, user.cell, user.email, admin.profileImage AS image, admin.accessLevel, admin.role , admin.adminID
              FROM user 
              INNER JOIN admin 
              ON user.userID = admin.userID";
    $admin_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($admin_result->num_rows <= 0) {
        echo "No admins found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $admin_result;
}