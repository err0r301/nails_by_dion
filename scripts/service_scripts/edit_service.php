<?php
// Include the config file
require '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit-service-id'])) {
        //$serviceID = $_POST['serviceID'];
        //$name = $_POST['name'];
        $serviceID = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $duration = $_POST['duration'];
        $status = $_POST['status'];

        // Validate the form data
        if (/*empty($name) ||*/empty($serviceID) || empty($description) || empty($price) || empty($image) || empty($category) || empty($duration) || empty($status)) {
            echo "Please fill in all required fields.";
            exit;
        }else{
            // edit the service data in the database
            $query = "UPDATE service SET /*name = ?,*/ description = ?, price = ?, image = ?, category = ?, duration = ?, status = ? WHERE serviceID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param(/*"ssdssisi"*/"sdssiss", /*$name,*/ $description, $price, $image, $category, $duration, $status, $serviceID);
            $stmt->execute();
            // Check if the edit was successful
            if ($stmt->affected_rows == 1) {
                echo "Service record updated successfully.";
                $stmt->close();
            } else {
                echo "Error updating service record: " . $stmt->error;
            }
        }
    }
}

// edit the service data in the database

// Check if the edit was successful