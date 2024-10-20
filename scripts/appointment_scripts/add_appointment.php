<?php
// Include the config file
require '../data/config.php';
$add_appointment_confirmation = null;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['stylist']) && isset($_POST['date']) && isset($_POST['time'])) {
        $client_email = $_POST['email'];
        //$stylistID = $_POST['stylist'];
        $stylist = $_POST['stylist'];
        $bookedDateTime = date( 'Y-m-d H:i:s');
        $scheduled  = ($_POST['date'] . ' ' . $_POST['time']);
        $scheduledDateTime = date('Y-m-d H:i:s', strtotime($scheduled));
        $serviceID = $_POST ['service'];

        $userID = getEmail($conn, $client_email);
        $appointmentID = getMaxID($conn) + 1;

        echo "<script> console.log('client email: $client_email -- stylist : $stylist -- booked date :$bookedDateTime -- scheduled date :$scheduledDateTime -- user id :$userID service name :$serviceID')</script>";

    // Validate the form data
        if (empty($userID) || empty(/*$stylistID*/$stylist) || empty($bookedDateTime) || empty($scheduledDateTime) || empty($serviceID)) {
            $error = 'Please fill in all fields';
        } else {
            // Insert the appointment data into the database
            if ($userID == $client_email) {
                $query = "INSERT INTO appointment (appointmentID,stylist, dateBooked, scheduledDateTime, serviceID, userEmail) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("isssss", $appointmentID, $stylist, $bookedDateTime, $scheduledDateTime, $serviceID, $client_email);
            }else{
                $query = "INSERT INTO appointment (appointmentID, userID,stylist, dateBooked, scheduledDateTime, serviceID) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("iissss", $appointmentID, $userID, $stylist, $bookedDateTime, $scheduledDateTime, $serviceID);
            }
            
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows == 1) {
                echo "<script>console.log('Appointment created successfully')</script>";
                $add_appointment_confirmation = true;
            } else {
                echo "<script>console.log('Failed to create appointment')</script>";
                $add_appointment_confirmation = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

function getEmail($conn, $email){   
    $query = "SELECT userID FROM user WHERE email = ?";  
    $stmt = $conn->prepare($query);  
    $stmt->bind_param("s", $email);  
    $stmt->execute();  
    $result = $stmt->get_result();  
    $row = $result->fetch_assoc();  

    if ($row !== null && isset($row['userID'])) {  
        return $row['userID'];  
    } else {   
        return $email; 
    }  
}

function getMaxID($conn){
    $query = "SELECT MAX(appointmentID) AS maxID FROM appointment";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}