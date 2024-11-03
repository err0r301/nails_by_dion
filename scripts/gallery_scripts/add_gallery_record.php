<?php
// Include the config file
require '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $date = $_POST['date'];

    // Validate the form data
    if (empty($name) || empty($image) || empty($date)) {
        echo "Please fill in all the required fields.";
    } else {
        // Insert the gallery data into the database
        $query = "INSERT INTO gallery (name, image, date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $image, $date);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows == 1) {
            echo "Gallery record created successfully.";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error creating gallery record: " . $stmt->error;
        }
    }
}
