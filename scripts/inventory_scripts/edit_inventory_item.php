<?php
// Include the config file
require '../data/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit-appointment-id'])) {
        $inventoryID = $_POST['edit-appointment-id'];
        $name = $_POST['edit-product-name'];
        $stock = $_POST['edit-product-stock'];
        $price = $_POST['edit-product-price'];

        // Validate the form data
        if (empty($name) || empty($stock) || empty($price)) {
            echo "Please fill in all required fields.";
            exit;
        }else{
            // edit the inventory data in the database
            $query = "UPDATE inventory SET name = ?, stock = ?, price = ? WHERE inventoryID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sidi", $name, $stock, $price, $inventoryID);
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
}
$conn->close();

