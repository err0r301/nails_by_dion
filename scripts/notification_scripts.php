<?php
function getAutoNotifications($title) {
    // Include the config file
    require '../data/config.php';

    // get the gallery data from the database
    $query = "SELECT * FROM auto_notification WHERE title = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $autoNotification_result = $stmt->get_result();
    $stmt->close();

    

    // Close the connection
    $conn->close();
    return $autoNotification_result;
}