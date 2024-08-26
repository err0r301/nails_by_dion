<?php
// Include the config file
require_once '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['userID'];
    $serviceID = $_POST['serviceID'];
    $bookedDateTime = $_POST['bookedDateTime'];
    $scheduledDateTime = $_POST['scheduledDateTime'];
    $status = $_POST['status'];

// Validate the form data
if (empty($userID) || empty($serviceID) || empty($bookedDateTime) || empty($scheduledDateTime) || empty($status)) {
    $error = 'Please fill in all fields';
} else {
    // Insert the appointment data into the database
    $query = "INSERT INTO appointment (userID, serviceID, bookedDateTime, scheduledDateTime, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iisss", $userID, $serviceID, $bookedDateTime, $scheduledDateTime, $status);
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