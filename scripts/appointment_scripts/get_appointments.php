<?php

function getAppointments(){
    error_reporting(E_ALL);  
    ini_set('display_errors', 1); 

    // Include the config file
    require '../data/config.php';

    // get the appointments from the database
    /*$query = "SELECT user.name as client, appointment.appointmentID as appointmentID, appointment.dateScheduled as date, appointment.status as status
            FROM appointment 
            INNER JOIN user 
            ON appointment.userID = user.userID";*/

    $query = "SELECT u.name AS client,  a.appointmentID as appointmentID,   a.dateScheduled as date,  a.status as status,  ua.name AS stylist  
            FROM   
                appointment a  
            JOIN   
                user u ON a.userID = u.userID  
            JOIN   
                admin ad ON a.adminID = ad.adminID  
            JOIN   
                user ua ON ad.userID = ua.userID;"; 
    $appointment_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($appointment_result->num_rows <= 0) {
        echo "No appointments found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $appointment_result;
}
