<?php
// Include the config file
require '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit-appointment-id'])) {
        $appointmentID = $_POST['edit-appointment-id'];
        $scheduled  = ($_POST['edit_appointment_date'] . ' ' . $_POST['edit_appointment_time']);
        $scheduledDateTime = date('Y-m-d H:i:s', strtotime($scheduled));
        //$stylistID = $_POST['edit_appointment_stylist'];
        $stylist = $_POST['edit_appointment_stylist'];
        $status = $_POST['edit_appointment_status'];

        // Validate the form data
        if (empty($appointmentID) ||empty($scheduledDateTime) || empty($status) || empty(/*$stylistID*/$stylist)) {
            echo "<script>console.log('Please fill in all required fields.')</script>";
            echo "<script>console.log('appointmentID : $appointmentID scheduledDateTime : $scheduledDateTime status :   $status stylist :$stylist')</script>";
        } else {
            // edit the appointment data in the database
            $query = "UPDATE appointment SET dateScheduled = ?, status_ = ?, stylist = ? WHERE appointmentID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $scheduledDateTime, $status, /*$stylistID*/$stylist, $appointmentID);
            $stmt->execute();

            // Check if the edit was successful
            if ($stmt->affected_rows == 1) {
                echo "<script>console.log('Appointment updated successfully.')</script>";
                $stmt->close();
            } else {
                echo "<script>console.log('Error updating appointment.')</script>";
            }
        }
    }
}
$conn->close();

