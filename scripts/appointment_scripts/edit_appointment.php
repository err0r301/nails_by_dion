<?php
// Include the config file
require_once '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentID = $_POST['appointmentID'];
    $userID = $_POST['userID'];
    $serviceID = $_POST['serviceID'];
    $bookedDateTime = $_POST['bookedDateTime'];
    $scheduledDateTime = $_POST['scheduledDateTime'];
    $status = $_POST['status'];

// Validate the form data
if (empty($appointmentID) || empty($userID) || empty($serviceID) || empty($bookedDateTime) || empty($scheduledDateTime) || empty($status)) {
    echo "<script>console.log('Please fill in all required fields.')</script>";
} else {
    // edit the appointment data in the database
    $query = "UPDATE appointment SET userID = ?, serviceID = ?, bookedDateTime = ?, scheduledDateTime = ?, status = ? WHERE appointmentID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iisssi", $userID, $serviceID, $bookedDateTime, $scheduledDateTime, $status, $appointmentID);
    $stmt->execute();

    // Check if the edit was successful
    if ($stmt->affected_rows == 1) {
        echo "<script>console.log('Appointment updated successfully.')</script>";
        $stmt->close();
    } else {
        echo "<script>console.log('Error updating appointment.')</script>";
    }
}
}
$conn->close();

