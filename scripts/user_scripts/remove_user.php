<?php
function removeUser( $userID) {
    // Include the config file
    require_once 'data/config.php';

    // remove the user data from the database
    $query = "DELETE FROM user WHERE userID = $userID";
    $result = $conn->query($query);

    // Check if the data was removed successfully
    if ($result) {
        echo "Account removed successfully.";
    } else {
        echo "Error removing account: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}