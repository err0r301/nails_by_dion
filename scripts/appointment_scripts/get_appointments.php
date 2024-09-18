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

    $query = "SELECT  u.name AS client, a.appointmentID AS appointmentID,  a.dateScheduled AS date,  a.status_ AS status,  a.stylist AS stylist,  a.serviceID AS service
    FROM   
        appointment a  
    JOIN   
        user u ON a.userID = u.userID  
    JOIN   
        service s ON a.serviceID = s.serviceID";  
    $appointment_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($appointment_result->num_rows <= 0) {
        echo "No appointments found";                                   ////////////////////////
    }
    // Close the connection
    $conn->close();
    return $appointment_result;
} 

 

 
    
   