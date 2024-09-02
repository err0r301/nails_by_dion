<?php

function getAppointments(){
    error_reporting(E_ALL);  
    ini_set('display_errors', 1); 

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
