<?php
// Include the config file
require_once 'data/config.php';

function checkInsert($result, $dataName) {
    if ($result) {
        echo "$dataName data inserted successfully";
    } else {
        echo "Failed to insert $dataName data";
    }
}

// Dummy data
// insert multiple recodes of user data
$userQuery = "INSERT INTO user (name, email, cell, password, userType) 
                VALUES ('Dion', 'admin@nailsbydion.com', '0781234567', $hash_password('Admin@123')),";

checkInsert($userResult, "User");

// insert admin data
$adminQuery = "INSERT INTO admin (userID, profileImage, accessLevel, role) VALUES (1, 'profile.png', 'admin', 'admin')";

// insert service data

// insert appointment data

// insert gallery data

// insert inventory data

// insert notification data

// insert availability data

// Close the connection
$conn->close();