<?php
// Include the config file
require_once 'data/config.php';

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
    echo "Please fill in all required fields.";
} else {
    
}
}


// edit the appointment data in the database

// Check if the edit was successful