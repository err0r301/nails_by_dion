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
