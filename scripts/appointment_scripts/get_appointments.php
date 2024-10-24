<?php

function getAppointments(){
    error_reporting(E_ALL);  
    ini_set('display_errors', 1); 

    // Include the config file
    require '../data/config.php';
    $appointments = [];

    // get the appointments from the database
    /*$query = "SELECT user.name as client, appointment.appointmentID as appointmentID, appointment.dateScheduled as date, appointment.status as status
            FROM appointment 
            INNER JOIN user 
            ON appointment.userID = user.userID";*/

    $query2 = "SELECT * FROM appointment Where userID IS NULL";
    $result = $conn->query($query2);

    $query = "SELECT u.email AS client, a.appointmentID AS appointmentID, a.scheduledDateTime AS date, a.status_ AS status, a.stylist AS stylist, a.serviceID AS service  
          FROM appointment a  
          LEFT JOIN user u ON a.userID = u.userID  
          LEFT JOIN service s ON a.serviceID = s.serviceID
          where a.userID IS NOT NULL";
    $appointment_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($appointment_result->num_rows > 0) {
        while($row = $appointment_result->fetch_assoc()) {
            $appointments[] = array(
                'client' => $row["client"],
                'appointmentID' => $row["appointmentID"],
                'date' => $row["date"],
                'status' => $row["status"],
                'stylist' => $row["stylist"],
                'service' => $row["service"]
            ); 
        }                              
    }else{
        echo "<script> console.log('No appointments found') </script>";  
    }

    if ($result->num_rows > 0) {  
        while($row = $result->fetch_assoc()) {  
            $appointments[] = array(
                'client' => $row["userEmail"],
                'appointmentID' => $row["appointmentID"],
                'date' => $row["scheduledDateTime"],
                'status' => $row["status_"],
                'stylist' => $row["stylist"],
                'service' => $row["serviceID"]
            );  
            echo " <script> console.log('user: " . $row["userEmail"] . "') </script>";
        }  
    }else{
        echo " <script> console.log('userEmail not found') </script>";
    }
    // Close the connection
    $conn->close();

    // sort the appointments by appointmentID
    usort($appointments, function($a, $b) {
        return $a['appointmentID'] - $b['appointmentID'];
    });
    return $appointments;
} 

 

 
    
   