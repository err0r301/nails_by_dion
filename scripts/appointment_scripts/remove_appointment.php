<?php

    // Include the config file
    require_once '../data/config.php';
    echo "<script> console.log('remove_appointment.php')</script>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete-appointment-id'])) {
            $appointmentID = $_POST['delete-appointment-id'];
            // remove the appointment data from the database
            $query = "DELETE FROM appointment WHERE appointmentID = $appointmentID";
            $result = $conn->query($query);

            // Check if the data was removed successfully
            if ($result) {
                echo "<script> console.log('Appointment removed successfully. ')</script>";
            } else {
                echo "<script> console.log('Error removing appointment: " . $conn->error. "')</script>";
            }
        }
        echo "<script> console.log('appointmentID :$appointmentID') </script>";
    }else
    {
        echo "<script> console.log('no appointmentID') </script>";
    }
    // Close the database connection
    $conn->close();





