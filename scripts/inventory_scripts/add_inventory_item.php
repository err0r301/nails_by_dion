<?php
// Include the config file
require_once 'data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

// Validate the form data
if (empty($name) || empty($stock) || empty($image)) {
    $error = 'Please fill in all fields';
} else {
    // Insert the inventory data into the database
    $query = "INSERT INTO inventory (name, stock, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $name, $stock, $image);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows == 1) {
        $success = 'Inventory item created successfully';
        $stmt->close();
        $conn->close();
    } else {
        $error = 'Failed to create inventory item';
    }
}
}

