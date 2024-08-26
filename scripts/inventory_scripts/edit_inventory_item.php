<?php
// Include the config file
require_once '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

// Validate the form data
if (empty($name) || empty($stock) || empty($image)) {
    echo "Please fill in all required fields.";
    exit;
}else{
    // edit the inventory data in the database
    $query = "UPDATE inventory SET name = ?, stock = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisi", $name, $stock, $image, $id);
    $stmt->execute();

    // Check if the edit was successful
    if ($stmt->affected_rows > 0) {
        echo "Inventory item updated successfully.";
    } else {
        echo "Failed to update inventory item.";
    }
    $stmt->close();
}
}
$conn->close();

