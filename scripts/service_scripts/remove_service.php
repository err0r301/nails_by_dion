<?php
    // Include the config file
    require '../data/config.php';
    echo "<script> console.log('remove_service.php')</script>";
    $remove_service_confirmation = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete-service-id'])) {
           $serviceID = $_POST['delete-service-id'];
           echo "<script> console.log('ServiceID : $serviceID ')</script>";
            // remove the appointment data from the database
            $query = "DELETE FROM `service` WHERE serviceID = '$serviceID'";
            $result = $conn->query($query);

            // Check if the data was removed successfully
            if ($result) {
                echo "<script> console.log('Service removed successfully. ')</script>";
                $remove_service_confirmation = true;
            } else {
                echo "<script> console.log('Error removing service: " . $conn->error. "')</script>";
                $remove_service_confirmation = false;
            }
        }
    }else
    {
        echo "<script> console.log('no serviceID') </script>";
    }
    // Close the database connection
    $conn->close();


