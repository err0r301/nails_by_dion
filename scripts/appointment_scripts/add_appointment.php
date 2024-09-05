<?php
// Include the config file
require '../data/config.php';


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['stylist']) && isset($_POST['date']) && isset($_POST['time'])) {
        $client_email = $_POST['email'];
        $stylistID = $_POST['stylist'];
        $bookedDateTime = date( 'Y-m-d H:i:s');
        $scheduled  = ($_POST['date'] . ' ' . $_POST['time']);
        $scheduledDateTime = date('Y-m-d H:i:s', strtotime($scheduled));

        $userID = getEmail($conn, $client_email);
        $appointmentID = getMaxID($conn) + 1;

        echo "<script> console.log('client email: $client_email -- stylist id :$stylistID -- booked date :$bookedDateTime -- scheduled date :$scheduledDateTime -- user id :$userID')</script>";

    // Validate the form data
        if (empty($userID) || empty($stylistID) || empty($bookedDateTime) || empty($scheduledDateTime)) {
            $error = 'Please fill in all fields';
        } else {
            // Insert the appointment data into the database
            $query = "INSERT INTO appointment (appointmentID, userID, adminID, dateBooked, dateScheduled) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iiiss", $appointmentID, $userID, $stylistID, $bookedDateTime, $scheduledDateTime,);
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
}

function getEmail($conn, $email){
    $query = "SELECT userID FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['userID'];
}

function getMaxID($conn){
    $query = "SELECT MAX(appointmentID) AS maxID FROM appointment";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}