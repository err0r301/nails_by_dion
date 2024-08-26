<?php
function removeAppointment( $appointmentID) {
    // Include the config file
    require_once '../data/config.php';

    // remove the appointment data from the database
    $query = "DELETE FROM appointment WHERE appointmentID = $appointmentID";
    $result = $conn->query($query);

    // Check if the data was removed successfully
    if ($result) {
        echo "Appointment removed successfully.";
    } else {
        echo "Error removing appointment: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}




