<?php
function getAppointments(){
    // Include the config file
    require_once '../data/config.php';

    // get the appointments from the database
    $query = "SELECT * FROM appointment";
    $appointment_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($appointment_result->num_rows <= 0) {
        echo "No appointments found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $appointment_result;
}
