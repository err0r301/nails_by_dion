<?php
// Include the config file
require_once 'data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user']['userID'];
    $service_id = $_POST['serviceID'];
    $date_time = $_POST['date_time'];
    $stylist = $_POST['stylist'];

    // Validate the form data
    if (empty($user_id) || empty($service_id) || empty($date_time) || empty($stylist)) {
        $error = 'Please fill in all fields';
    } else {
        // Insert the appointment data into the database
        $query = "INSERT INTO appointments (user_id, service_id, date_time, stylist, comments) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iisss", $user_id, $service_id, $date_time, $stylist, $comments);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows == 1) {
            $success = 'Appointment created successfully';
            $stmt->close();
            $conn->close();
        } else {
            $error = 'Failed to create appointment';
        }
    }
}
