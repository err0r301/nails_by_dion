<?php
// Include the config file
require_once '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];

    // Validate the form data
    if (trim(empty($name)) || trim(empty($description)) || empty($price) || empty($image) || empty($category) || empty($duration) || empty($status)) {
        $error = 'Please fill in all fields';
    } else {
        // Insert the service data into the database
        $query = "INSERT INTO service (name, description, price, image, category, duration, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdssss", $name, $description, $price, $image, $category, $duration, $status);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows == 1) {
            $success = 'Service created successfully';
            $stmt->close();
            $conn->close();
        } else {
            $error = 'Failed to create service';
        }
    }
}
