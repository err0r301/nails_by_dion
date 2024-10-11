<?php  

function add_removeToRevenue($newAppointment) {  
    require '../data/config.php';  
    // get the old appointment record  
    $query = "SELECT * FROM appointment WHERE appointmentID = ?";  

    $stmt = $conn->prepare($query);  
    $stmt->bind_param("i", $newAppointment['appointmentID']);  
    $stmt->execute();  
    $result = $stmt->get_result();  
    echo "<script>console.log('Revenue test 1')</script>";  

    if ($result->num_rows > 0) {  
        $oldAppointment = $result->fetch_assoc();  
        sendNotification($oldAppointment, $newAppointment);
        $date = new DateTime($newAppointment['dateScheduled']);  
        $date = $date->format('Y-m');  

        //get the cost of the service  
        $query = "SELECT price FROM service WHERE serviceID = ?";  
        $stmt1 = $conn->prepare($query);  
        $stmt1->bind_param("s", $oldAppointment['serviceID']);  
        $stmt1->execute();  
        $result = $stmt1->get_result();  
        $price = $result->fetch_assoc();  
        $change = null; 
        $test1 = false;
        $test2 = false;
        $test3 = false;
        
        if ($oldAppointment['status_'] != 'Complete'){
            $test1 = true;
        }

        if ($newAppointment['status_'] == 'Complete'){
            $test2 = true;
        }

        if ($date == date('Y-m')){
            $test3 = true;
        }
        echo "<script>console.log('Revenue test 2. test1: $test1 test2: $test2 test3: $test3')</script>";  

        // Initialize stmt2 and stmt3  
        $stmt2 = null;   
        $stmt3 = null;  

        // Check if the appointment has changes from a non-Complete status to a Complete status  
        if ($oldAppointment['status_'] != 'Complete' && $newAppointment['status_'] == 'Complete' && $date == date('Y-m')) {  
            // update the revenue  
            echo "<script>console.log('Revenue test 3.0')</script>";  
            $query = "UPDATE service SET monthlyRevenue = monthlyRevenue + ? WHERE serviceID = ?";  
            $stmt2 = $conn->prepare($query);  
            $stmt2->bind_param("ds", $price['price'], $oldAppointment['serviceID']);  
            $stmt2->execute();  
            $change = 'increased';  
            echo "<script>console.log('Revenue test 3.1')</script>";  
        } else if ($oldAppointment['status_'] == 'Complete' && $newAppointment['status_'] != 'Complete' && $date == date('Y-m')) {  
            // update the revenue  
            echo "<script>console.log('Revenue test 4.0')</script>";  
            $query = "UPDATE service SET monthlyRevenue = monthlyRevenue - ? WHERE serviceID = ?";  
            $stmt3 = $conn->prepare($query);  
            $stmt3->bind_param("ds", $price['price'], $oldAppointment['serviceID']);  
            $stmt3->execute();  
            $change = 'decreased';  
            echo "<script>console.log('Revenue test 4.1')</script>";  
        }  

        // Check if either stmt2 or stmt3 was executed  
        $stmt2_affected = $stmt2 ? $stmt2->affected_rows : 0; // If stmt2 is null, count as zero affected  
        $stmt3_affected = $stmt3 ? $stmt3->affected_rows : 0; // If stmt3 is null, count as zero affected  

        if ($stmt2_affected == 1 || $stmt3_affected == 1) {  
            echo "<script>console.log('Revenue updated successfully. Change: " . $change . "')</script>";  
        } else {  
            echo "<script>console.log('Error updating revenue. No rows affected.')</script>";  
        }  

        $stmt->close();  
        if ($stmt1) $stmt1->close();  
        if ($stmt2) $stmt2->close();  
        if ($stmt3) $stmt3->close();  
        $conn->close();  
    }  
}

function sendNotification($oldAppointment, $newAppointment) {
    require '../data/config.php';
    $notification_message = null;
    $message = null;
    
     if ($oldAppointment['status_'] != "Confirmed" && $newAppointment['status_'] == "Confirmed") {
        $query = "SELECT * FROM auto_notification WHERE autoNotificationID = 'Appointment Confirmation'";
        $result = $conn->query($query);
     }

     if ($oldAppointment['status_'] != "Cancelled" && $newAppointment['status_'] == "Cancelled") {
        $query = "SELECT * FROM auto_notification WHERE autoNotificationID = 'Appointment Cancellation'";
        $result = $conn->query($query);
     }

     if ($oldAppointment['status_'] != "Complete" && $newAppointment['status_'] == "Complete") {
        $query = "SELECT * FROM auto_notification WHERE autoNotificationID = 'Appointment Completed'";
        $result = $conn->query($query);
     }

     if ($oldAppointment['dateScheduled'] != $newAppointment['dateScheduled']) {
        $query = "SELECT * FROM auto_notification WHERE autoNotificationID = 'Appointment Reschedule Confirmation'";
        $result = $conn->query($query);
     }

     if ($result->num_rows > 0) {
        $notification_message = $result->fetch_assoc();
        $message = $notification_message['message'];
        $date = new DateTime($newAppointment['dateScheduled']);
        $query = "SELECT * FROM user WHERE userID = $oldAppointment[userID]";
        $result = $conn->query($query);
        $user = $result->fetch_assoc();
        $message = getMessage($message, $user['name'], $oldAppointment['serviceID'], $date->format('l, F j, Y'), $date->format('g:i A'));
     }
     
        // add notification to database
        $query = "INSERT INTO notification (userID, message) VALUES (?, ?)";
        $stmt_notification = $conn->prepare($query);
        $stmt_notification->bind_param("is", $oldAppointment['userID'], $message);
        $stmt_notification->execute();
        if ($stmt_notification->affected_rows == 1) {
            echo "<script>console.log('Notification sent successfully.')</script>";
        } else {
            echo "<script>console.log('Error sending notification: " . $conn->error. "')</script>";
        }
        $stmt_notification->close();
        $conn->close();

}

function getMessage($temp, $name, $service, $date, $time) {
    $message = null;
    $message = str_replace('[name]', $name, $temp);
    if (strpos($message, '[service]') !== false) {
        $message = str_replace('[service]', $service, $message);
        $message = str_replace('[date]', $date, $message);
        $message = str_replace('[time]', $time, $message);
    }
    return $message;
}