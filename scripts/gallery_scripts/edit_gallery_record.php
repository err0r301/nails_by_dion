<?php
// Include the config file
    require_once '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

// Validate the form data
if (empty($title) || empty($description) || empty($image)) {
    echo "Please fill in all the required fields.";
} else {
    // edit the gallery data in the database
    $query = "UPDATE gallery SET title = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $title, $description, $image, $id);
    $stmt->execute();

    // Check if the edit was successful
    if ($stmt->affected_rows == 1) {
        echo "Gallery record updated successfully.";
        $stmt->close();
    } else {
        echo "Error updating gallery record: " . $stmt->error;
    }
}
}
$conn->close();