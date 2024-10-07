<?php
// Include the config file
require '../data/config.php';
$edit_userInfo_confirmation = null;
//require '../scripts/validate_input.php';

// Check if the form has been submitted
echo"<script> console.log('edit-user-info')</script>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit-name']) && isset($_POST['edit-email']) && isset($_POST['edit-cell'])) {
        $name = $_POST['edit-name']; 
        $email = $_POST['edit-email'];
        $cell = $_POST['edit-cell'];
        // Validate the form data  
        echo"<script> console.log('name :$name email :$email cell :$cell')</script>";
        $info_error = null;
        $info_error =  validateEmail($email,$info_error);
        $info_error =  validateCell($cell,$info_error);   
        $info_error =  validateName($name,$info_error); 

        if ( is_null($info_error)) {
            if (isset($_POST['edit-role'])) {
                $role = $_POST['edit-role'];
                $userID = $_POST['userID'];   
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
                echo"<script> console.log('User details updated successfully!')</script>";
                if (!isset($_POST['role'])) {
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['cell'] = $cell;
                }
                $edit_userInfo_confirmation = true;
            } else {
                echo"<script> console.log('Failed to update user details.')</script>";
                $edit_userInfo_confirmation = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

