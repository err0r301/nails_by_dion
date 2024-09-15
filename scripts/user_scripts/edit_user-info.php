<?php
// Include the config file
require '../data/config.php';
//require '../scripts/validate_input.php';

$info_error = null;
// Check if the form has been submitted
echo"<script> console.log('edit-user-info')</script>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['cell'])) {
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        // Validate the form data  
        echo"<script> console.log('name :$name email :$email cell :$cell')</script>";
        $info_error =  validateEmail($email,$info_error);
        $info_error =  validateCell($cell,$info_error);   
        $info_error =  validateName($name,$info_error); 

        if ( is_null($info_error)) {
            if (isset($_POST['role'])) {
                $role = $_POST['role'];
                $query = "SELECT userID FROM user WHERE email = '$email'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();

                $userID = $row['userID'];   
                $query = "UPDATE admin SET role = ? WHERE userID = '$userID'";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $role);
                $stmt->execute();
            }else{
                $userID = $_SESSION['user']['userID'];
            }
            // Update the user data in the database
            $query = "UPDATE user SET name = ?, email = ?, cell = ? WHERE userID = ?";   
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $name, $email, $cell, $userID);
            $stmt->execute();

            // Check if the update was successful
            
            if ($stmt->affected_rows > 0) {
                $success = "User details updated successfully!";
                if (!isset($_POST['role'])) {
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['cell'] = $cell;
                }
            } else {
                $info_error = "Failed to update user details.";
            }
            $stmt->close();
        }
    }
}
