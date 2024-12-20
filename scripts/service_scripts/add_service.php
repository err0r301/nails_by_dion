<?php
// Include the config file
require '../data/config.php';
$add_service_confirmation = null;
echo "<script> console.log('add service')</script>";
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['duration']) && isset($_POST['status']) && !isset($_POST['edit-service-id'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $duration = $_POST['duration'] . ":00";
        $status = $_POST['status'];
        //$id = getMaxID($conn) + 1;
        $targetDir = "../_images/";
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $image = $targetFilePath;
            echo "<script> console.log('The file has been uploaded successfully. Image path: ')</script>";
        } else {
            echo "<script> console.log('Sorry, there was an error uploading your file.')</script>";
        }

        echo "<script> console.log('name :$name, description :$description, price :$price, image :$image, category :$category, duration :$duration, status :$status')</script>";

        // Validate the form data
        if (trim(empty($name)) || trim(empty($description)) || empty($price) || empty($image) || empty($category) || empty($duration) || empty($status)) {
            $error = 'Please fill in all fields';
        } else {
            // Insert the service data into the database
            $query = "INSERT INTO service (serviceID, /*name,*/ description, price, image, category, duration, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param(/*"isssssss"*/"sssssss", /*$id,*/ $name, $description, $price, $image, $category, $duration, $status);
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows == 1) {
                echo "<script> console.log('Service created successfully')</script>";
                $add_service_confirmation = true;
            } else {
                echo "<script> console.log('Failed to create service')</script>";
                $add_service_confirmation = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

function getMaxID($conn)
{
    $query = "SELECT MAX(serviceID) AS maxID FROM service";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['maxID'];
}
