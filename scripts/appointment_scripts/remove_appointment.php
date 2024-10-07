<?php

    // Include the config file
    require '../data/config.php';
    $remove_appointment_confirmation = null;
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
                $remove_appointment_confirmation = true;
            } else {
                echo "<script> console.log('Error removing appointment: " . $conn->error. "')</script>";
                $remove_appointment_confirmation = false;
            }
        }
    }else
    {
        echo "<script> console.log('no appointmentID') </script>";
    }
    // Close the database connection
    $conn->close();





