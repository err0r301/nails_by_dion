<?php
// Include the config file
require_once '../data/config.php';
echo "<script> console.log('add_inventory_item.php'); </script>";
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['product-name'];
    $stock = $_POST['product-stock'];
    $price = $_POST['product-price'];
    $id = getMaxID($conn) + 1;
    echo "<script> console.log('Name: " . $name . " Stock: " . $stock . " Price: " . $price . "'); </script>";

// Validate the form data
if (empty($name) || empty($stock) || empty($price)) {
    $error = 'Please fill in all fields';
} else {
    // Insert the inventory data into the database
    $query = "INSERT INTO inventory (inventoryID, name, stock, price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isii",$id, $name, $stock, $price);
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

function getMaxID($conn){
    $query = "SELECT MAX(inventoryID) AS maxID FROM inventory";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}