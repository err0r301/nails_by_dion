<?php
function getNotifications(){
    error_reporting(E_ALL);  
    ini_set('display_errors', 1); 

    // Include the config file
    require '../data/config.php';

    // get the appointments from the database
    $query = "SELECT * FROM notification";
    $notification_result = $conn->query($query);


    // Check if the data was retrieved successfully
    if ($notification_result->num_rows <= 0) {
        echo "<script>console.log('No notifications found')</script>";
        $conn->close();
        return "No notifications found";
    }else{
        echo "<script>console.log('Notifications found')</script>";
        $notifications = [];
        $sender = "NailsByDion";
        $title = "Appointment Reminder";

        while ($row = $notification_result->fetch_assoc()) {
            //$sender = $row['sender'];
            $message = $row['message'];
            $status = $row['status_'];
            //$title = $row['title'];
            $currentTime = new DateTime();
            $date = new DateTime($row['dateTime_']);
            if ($currentTime->format('Y-m-d') == $date->format('Y-m-d')) {
                $time = getTime($date);
            } else {
                $time = getMonth($date);
            }

            $notifications[] = array(
                                'sender' => $sender,
                                'message' => $message,
                                'title' => $title,
                                'time' => $time,
                                'status' => $status);
        }
        $output = json_encode($notifications);
        echo "<script>console.log(".$output.")</script>";
        $conn->close();
        return $notifications;
    }
}

function getTime($time){
    return $time->format('g:i A');
}

function getMonth($time){
    return $time->format('M d');
}