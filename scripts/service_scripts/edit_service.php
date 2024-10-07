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
        $category = $_POST['category'];
        $duration = $_POST['duration'];
        $status = $_POST['status'];

        $targetDir = "../_images/";
        $fileName = basename($_FILES['image']['name']);  
        $targetFilePath = $targetDir . $fileName;  

        if (!is_dir($targetDir)) {  
            mkdir($targetDir, 0755, true);  
        } 

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {  
            $image = $targetFilePath;  
            echo "<script> console.log('The image has been uploaded successfully. Image path: $image')</script>";  
        } else {  
            echo "<script> console.log('Sorry, there was an error uploading your file.')</script>";  
        }

        echo "<script> console.log('name :$serviceID, description :$description, price :$price, image :$image, category :$category, duration :$duration, status :$status')</script>";

        // Validate the form data
        if (/*empty($name) ||*/empty($serviceID) || empty($description) || empty($price) || empty($image) || empty($category) || empty($duration) || empty($status)) {
            echo "Please fill in all required fields.";
            exit;
        }else{
            // edit the service data in the database
            $query = "UPDATE service SET serviceID = ?,  description = ?, price = ?, image = ?, category = ?, duration = ?, status = ? WHERE serviceID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssdsssss", $serviceID,  $description, $price, $image, $category, $duration, $status, $serviceID);
            $stmt->execute();
            // Check if the edit was successful
            if ($stmt->affected_rows == 1) {
                echo "<script>console.log('Service record updated successfully.')</script>";
                $stmt->close();
            } else {
                echo "<script> console.log('Error updating service record: " . $stmt->error. "')</script>";
                error_reporting(E_ALL);  
                ini_set('display_errors', 1);  
            }

            $query = "UPDATE appointment SET serviceID = ? WHERE serviceID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $serviceID, $serviceID);
            $stmt->execute();
            $stmt->close();
        }
        $conn->close();
    }
}